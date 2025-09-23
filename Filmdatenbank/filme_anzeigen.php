<?php
// ==========================
// 1. Datenbank-Verbindung einbinden
// ==========================
// $db ist das globale PDO-Objekt für DB-Zugriffe
// require_once stellt sicher, dass die Verbindung nur einmal eingebunden wird
global $db;
require_once 'lib/Datenbank_verbindung.php';

// ==========================
// 2. Aktuelle Filter aus URL-Parametern holen
// ==========================
// $_GET enthält alle GET-Parameter aus der URL
// Null-Koaleszenz-Operator ?? sorgt dafür, dass Standardwerte leer sind, falls Parameter nicht gesetzt
$selectedGenre = $_GET['genre'] ?? ''; // Genre-Filter
$selectedFSK   = $_GET['fsk'] ?? '';   // FSK-Filter

// ==========================
// 3. Alle eindeutigen Genres und FSK-Werte aus der Datenbank holen
// ==========================
// DISTINCT sorgt dafür, dass keine Duplikate zurückkommen
// ORDER BY sortiert alphabetisch bzw. numerisch
$genres = $db->query('SELECT DISTINCT genre FROM filme ORDER BY genre ASC')->fetchAll(PDO::FETCH_COLUMN);
$fsks   = $db->query('SELECT DISTINCT fsk FROM filme ORDER BY fsk ASC')->fetchAll(PDO::FETCH_COLUMN);

// ==========================
// 4. Filme aus der Datenbank laden mit optionalen Filtern
// ==========================
$where = [];  // Array für WHERE-Bedingungen
$params = []; // Array für Prepared-Statement-Parameter

// Prüfen, ob ein Genre ausgewählt wurde und Filter-Bedingung hinzufügen
if ($selectedGenre) {
    $where[] = 'genre = :genre';  // Platzhalter für Prepared Statement
    $params[':genre'] = $selectedGenre; // Wert an Platzhalter binden
}

// Prüfen, ob FSK ausgewählt wurde und Filter-Bedingung hinzufügen
if ($selectedFSK) {
    $where[] = 'fsk = :fsk';      // Platzhalter
    $params[':fsk'] = $selectedFSK; // Wert binden
}

// Basis-SQL-Abfrage
$sql = 'SELECT * FROM filme';

// Wenn Filter-Bedingungen existieren, WHERE-Klausel anhängen
if ($where) {
    // Bedingungen mit AND verbinden
    $sql .= ' WHERE ' . implode(' AND ', $where);
}

// Prepared Statement erstellen (schützt vor SQL-Injection)
$stmt = $db->prepare($sql);
$stmt->execute($params); // Ausführen mit Parametern

// Alle Filme als assoziatives Array holen
$filme = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ==========================
// 5. Spalten definieren, die in der Übersicht NICHT angezeigt werden
// ==========================
$spaltenEntfernen = ['cover', 'jahr', 'einspielergebnis', 'laenge', 'vertrieb'];
$headings = [];

if (!empty($filme)) {
    // Alle Spaltennamen aus der ersten Zeile holen (z.B. id, titel, genre, fsk, ...)
    $headings = array_keys($filme[0]);

    // "id" und unerwünschte Spalten entfernen
    $headings = array_filter($headings, fn($col) => $col !== 'id' && !in_array($col, $spaltenEntfernen));

    // Überschriften für die Tabelle formatieren
    foreach ($headings as $k => $v) {
        $headings[$k] = $v === 'fsk' ? strtoupper($v) : ucfirst($v); // FSK komplett groß, andere Spalten nur erster Buchstabe groß
    }

    // ==========================
    // 6. Daten für die Anzeige vorbereiten
    // ==========================
    foreach ($filme as $key => $film) {
        // ID separat speichern für Klick-Link zur Detailseite
        $filme[$key]['_id'] = $film['id'];

        // Alle nicht anzuzeigenden Spalten aus den Daten entfernen
        foreach (array_merge(['id'], $spaltenEntfernen) as $spalte) {
            unset($film[$spalte]);
        }

        // Sichtbare Daten in '_data' speichern, getrennt von der ID
        $filme[$key]['_data'] = $film;
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Film Übersicht</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ==========================
           Neon-Überschrift
        ========================== */
        h1.title {
            text-align: center;                 /* Zentriert den Text horizontal */
            font-family: 'Segoe UI', Roboto, sans-serif; /* Schriftart für modernen Look */
            font-size: 48px;                    /* Große Schrift */
            color: #00e5ff;                     /* Neon-Türkis */
            text-transform: uppercase;          /* Alle Buchstaben groß */
            letter-spacing: 4px;                /* Abstand zwischen Buchstaben */
            font-weight: 900;                   /* Sehr fett, damit Glow gut sichtbar */
            text-shadow:                         /* Neon-Glow-Effekt */
                    0 0 5px #00e5ff,
                    0 0 10px #00e5ff,
                    0 0 20px #ff00ff,
                    0 0 30px #ff00ff;
            margin: 30px 0;                     /* Abstand oben und unten */
            animation: neonPulse 3s infinite alternate; /* Pulsierende Animation */
        }

        /* Animation für Neon-Glow */
        @keyframes neonPulse {
            0% {
                text-shadow:
                        0 0 5px #00e5ff,
                        0 0 10px #00e5ff,
                        0 0 20px #ff00ff,
                        0 0 30px #ff00ff;
            }
            50% {
                text-shadow:
                        0 0 15px #00e5ff,
                        0 0 25px #00e5ff,
                        0 0 35px #ff00ff,
                        0 0 50px #ff00ff;
            }
            100% {
                text-shadow:
                        0 0 5px #00e5ff,
                        0 0 10px #00e5ff,
                        0 0 20px #ff00ff,
                        0 0 30px #ff00ff;
            }
        }

        /* ==========================
           Filter-Leiste (Genre + FSK)
        ========================== */
        form.filter {
            display: flex;               /* Elemente nebeneinander anordnen */
            gap: 15px;                   /* Abstand zwischen Elementen */
            justify-content: center;      /* Horizontal zentrieren */
            margin-bottom: 25px;         /* Abstand zur Tabelle */
        }

        form.filter select {
            padding: 8px 12px;           /* Innenabstand */
            border-radius: 6px;          /* Runde Ecken */
            border: none;                /* Kein Rahmen */
            font-size: 14px;             /* Schriftgröße */
            cursor: pointer;             /* Maus zeigt Hand */
            background: linear-gradient(135deg, #00e5ff, #7f00ff); /* Farbverlauf */
            color: #100e0e;
            font-weight: bold;
        }

        form.filter select:hover {
            transform: scale(1.05);      /* Leichtes Vergrößern beim Hover */
        }

        /* ==========================
           Tabelle
        ========================== */
        table {
            border-collapse: collapse;           /* Grenzen zusammenfassen */
            width: 80%;                           /* Breite der Tabelle */
            margin: 0 auto 50px auto;            /* Zentriert und Abstand unten */
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        th, td {
            padding: 12px 18px;                  /* Innenabstand */
            border: 1px solid #444;              /* Rahmenfarbe */
            text-align: left;                     /* Links ausrichten */
        }

        th {
            background: linear-gradient(135deg, #ff007f, #7f00ff, #00e5ff); /* Farbverlauf */
            color: #fff;
            text-transform: uppercase;
        }

        th.fsk-header {
            font-weight: bold;                    /* Fett */
            text-transform: uppercase;            /* Großbuchstaben */
        }

        tr:nth-child(even) { background: rgba(255,255,255,0.05); } /* Zebra-Effekt */

        tr:hover {
            background: #00e5ff;                  /* Neonblau beim Hover */
            color: #000;                          /* Schwarz für besseren Kontrast */
            cursor: pointer;                       /* Hand-Symbol */
        }
    </style>
</head>
<body>
<h1 class="title">Film Übersicht</h1>

<!-- ==========================
     Filterformular (Genre + FSK)
========================== -->
<form method="get" class="filter">
    <!-- Genre-Filter -->
    <label for="genre">Genre:</label>
    <select name="genre" id="genre" onchange="this.form.submit()">
        <option value="">-- Alle Genres --</option>
        <?php foreach ($genres as $genre): ?>
            <option value="<?= htmlspecialchars($genre) ?>" <?= $genre === $selectedGenre ? 'selected' : '' ?>>
                <?= htmlspecialchars($genre) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- FSK-Filter -->
    <label for="fsk">FSK:</label>
    <select name="fsk" id="fsk" onchange="this.form.submit()">
        <option value="">-- Alle FSK --</option>
        <?php foreach ($fsks as $fsk): ?>
            <option value="<?= htmlspecialchars($fsk) ?>" <?= $fsk === $selectedFSK ? 'selected' : '' ?>>
                <?= htmlspecialchars($fsk) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Für Benutzer ohne JS -->
    <noscript><button type="submit">Filtern</button></noscript>
</form>

<!-- ==========================
     Tabelle der Filme
========================== -->
<?php if (!empty($filme)): ?>
    <table>
        <tr>
            <?php foreach ($headings as $heading): ?>
                <th class="<?= strtolower($heading) === 'fsk' ? 'fsk-header' : '' ?>">
                    <?= htmlspecialchars($heading) ?>
                </th>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($filme as $film): ?>
            <!-- Klickbare Zeile → Detailseite -->
            <tr onclick="location.href='film_anzeigen.php?id=<?= $film['_id'] ?>'">
                <?php foreach ($film['_data'] as $value): ?>
                    <td><?= htmlspecialchars($value) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Es sind derzeit keine Filme vorhanden.</p>
<?php endif; ?>
</body>
</html>
