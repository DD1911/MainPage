<?php
// ==========================
// 1. Datenbankverbindung
// ==========================

// Mit require_once wird die Datei "lib/Datenbank_verbindung.php" eingebunden.
// Vorteil von require_once: Sie wird nur einmal geladen (kein doppeltes Einbinden möglich).
// In dieser Datei befindet sich die zentrale PDO-Verbindung zur Datenbank ($db-Objekt).
// Dadurch bleibt der Code sauber und wartbar, weil die Verbindung an einer Stelle zentral gepflegt wird.
require_once 'lib/Datenbank_verbindung.php';

// ==========================
// 2. ID aus URL prüfen
// ==========================

// Über die URL kann ein Benutzer die ID eines Films übergeben, z. B. film_anzeigen.php?id=3.
// $_GET['id'] liest diesen Wert aus der URL.
// Der Null-Koaleszenz-Operator (??) sorgt dafür, dass $id = null gesetzt wird,
// falls kein Wert übergeben wurde (z. B. Aufruf ohne "?id=...").
$id = $_GET['id'] ?? null;

// ==========================
// 3. Film aus der Datenbank laden
// ==========================

// Prüfen, ob eine ID vorhanden ist UND ob sie nur aus Ziffern besteht.
// ctype_digit() stellt sicher, dass wirklich nur eine positive Ganzzahl übergeben wurde
// → Schutz vor SQL-Injection (bösartige Eingaben wie "1 OR 1=1" würden hier abgefangen).
if ($id !== null && ctype_digit($id)) {
    // Eine vorbereitete SQL-Anweisung (Prepared Statement) verwenden.
    // Vorteil: Platzhalter (:id) verhindern SQL-Injection, weil PDO die Werte automatisch "escaped".
    $stmt = $db->prepare('SELECT * FROM filme WHERE id = :id;');

    // Das Prepared Statement wird mit einem Wert für den Platzhalter ":id" ausgeführt.
    // $id ist hier ein sicher geprüfter Integer.
    $stmt->execute([':id' => $id]);

    // fetch() holt genau einen Datensatz als assoziatives Array zurück.
    // Beispiel: ['id' => 3, 'titel' => 'Inception', 'genre' => 'Science Fiction', ...]
    $film = $stmt->fetch();
} else {
    // Falls keine gültige ID übergeben wurde (z. B. "?id=abc" oder gar kein Parameter),
    // wird $film = null gesetzt, damit später kein Film angezeigt wird.
    $film = null;
}

// ==========================
// 4. Coverbild prüfen
// ==========================

// Wir wollen das Coverbild nur dann anzeigen, wenn:
// a) der Film-Datensatz überhaupt ein "cover"-Feld hat,
// b) der Wert im Feld nicht leer ist,
// c) und die Datei im Verzeichnis "Cover/" tatsächlich existiert.
$coverPath = null;
if ($film && !empty($film['cover'])) {
    // __DIR__ = aktuelles Verzeichnis, in dem dieses PHP-Skript liegt.
    // Wir bauen den vollständigen Dateipfad zusammen, um sicherzugehen,
    // dass die Datei existiert.
    $tmpPath = __DIR__ . '/Cover/' . $film['cover'];

    // file_exists() prüft, ob die Datei physisch auf der Festplatte liegt.
    if (file_exists($tmpPath)) {
        // Falls die Datei da ist, speichern wir den relativen Pfad (für HTML-Ausgabe).
        $coverPath = 'Cover/' . $film['cover'];
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Film anzeigen</title>

    <!-- style2.css enthält allgemeine Layout-Regeln (Farben, Schriften usw.) -->
    <link rel="stylesheet" href="style2.css">

    <!-- Hier fügen wir zusätzliche CSS-Regeln hinzu,
         die nur für diese Seite gelten (z. B. Container für Cover + Infos). -->
    <style>
        /* Container für Cover + Infos nebeneinander */
        .container {
            display: flex;               /* Flexbox → Elemente nebeneinander darstellen */
            max-width: 1000px;           /* Maximale Breite → Inhalt bleibt lesbar */
            margin-top: 20px;            /* Abstand nach oben */
            border: 2px solid #2b83c5;   /* Rahmenfarbe */
            border-radius: 15px;         /* Abgerundete Ecken */
            overflow: hidden;            /* Inhalt schneidet nicht aus dem Container */
            background-color: #151010;      /* Hintergrund schwarz */
        }

        /* Linke Box für das Filmcover */
        .cover-box {
            flex: 0 0 400px;             /* Feste Breite von 400px */
            display: flex;               /* Flexbox, damit Bild gestreckt wird */
            align-items: stretch;        /* Bild füllt die Box */
        }

        /* Bild im Cover-Bereich */
        .cover-box img {
            width: 100%;                 /* Bild füllt die ganze Breite */
            height: 100%;                /* Bild füllt die ganze Höhe */
            object-fit: cover;           /* Bild wird zugeschnitten, damit Seitenverhältnis bleibt */
            display: block;              /* Keine zusätzlichen Abstände */
        }

        /* Rechte Box für die Filminformationen */
        .info-box {
            flex: 1;                     /* Restliche Breite füllen */
            padding: 20px;               /* Innenabstand */
            display: flex;
            flex-direction: column;      /* Infos untereinander anzeigen */
        }

        /* Jede Info-Zeile (z. B. "Titel: Inception") */
        .info-box .info-row {
            display: flex;               /* Label links, Wert rechts */
            padding: 10px 0;             /* Abstand oben/unten */
            border-bottom: 1px solid #f6f8fa; /* Trennlinie */
        }

        /* Letzte Info-Zeile ohne Trennlinie */
        .info-box .info-row:last-child {
            border-bottom: none;
        }

        /* Label-Bereich (linke Spalte) */
        .info-box .label {
            font-weight: bold;           /* Fettgedruckt */
            width: 150px;                /* Feste Breite */
        }

        /* FSK-Label soll immer großgeschrieben sein */
        .info-box .label.fsk-label {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<h1>Film anzeigen</h1>

<?php if ($film): ?>
    <!-- Hauptcontainer für Cover + Infos -->
    <div class="container">

        <!-- ==========================
             Linke Seite: Filmcover
             ========================== -->
        <div class="cover-box">
            <?php if ($coverPath): ?>
                <!-- Das Coverbild wird nur angezeigt, wenn eine Datei gefunden wurde -->
                <img src="<?= htmlspecialchars($coverPath) ?>" alt="Filmcover">
            <?php endif; ?>
        </div>

        <!-- ==========================
             Rechte Seite: Filmdetails
             ========================== -->
        <div class="info-box">
            <?php foreach ($film as $spalte => $wert): ?>
                <?php
                // ==========================
                // 1. Spalten herausfiltern
                // ==========================
                // Wir wollen bestimmte Spalten nicht anzeigen:
                // - "cover": weil das Bild schon links separat angezeigt wird
                // - "id": soll im Hintergrund erhalten bleiben, aber nicht sichtbar ausgegeben werden
                if ($spalte === 'cover') continue;
                if ($spalte === 'id') continue;

                // ==========================
                // 2. Label (Spaltennamen) formatieren
                // ==========================
                $labelClass = '';
                if ($spalte === 'fsk') {
                    // "FSK" → komplett groß
                    $labelClass = 'fsk-label';
                    $displayLabel = strtoupper($spalte);
                } elseif ($spalte === 'laenge') {
                    // "laenge" → schöner als "Länge" darstellen
                    $displayLabel = 'Länge';
                } else {
                    // Alle anderen Spalten → nur erster Buchstabe groß
                    $displayLabel = ucfirst($spalte);
                }

                // ==========================
                // 3. Werte formatieren
                // ==========================
                if ($spalte === 'einspielergebnis') {
                    // Zahl schön formatieren: 1234.5 → "1.234,50 Mio €"
                    $wert = number_format($wert, 2, ',', '.') . ' Mio €';
                } elseif ($spalte === 'laenge') {
                    // Länge in Minuten anzeigen
                    $wert = $wert . ' Minuten';
                }
                ?>
                <!-- ==========================
                     Ausgabe einer einzelnen Zeile
                     Label links, Wert rechts
                     ========================== -->
                <div class="info-row">
                    <span class="label <?= $labelClass ?>"><?= htmlspecialchars($displayLabel) ?>:</span>
                    <span><?= htmlspecialchars($wert) ?></span>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <!-- Zurück-Link zur Übersicht aller Filme -->
    <p><a href="filme_uebersicht.php">Zurück zur Übersicht</a></p>

<?php else: ?>
    <!-- Falls keine gültige ID oder kein Film gefunden -->
    <p>Kein Film mit dieser ID vorhanden.</p>
    <p><a href="filme_uebersicht.php">Zurück zur Übersicht</a></p>
<?php endif; ?>

</body>
</html>
