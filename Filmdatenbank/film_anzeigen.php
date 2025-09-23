<?php
// ==========================
// 1. Datenbankverbindung
// ==========================

// require_once stellt sicher, dass die Datei nur einmal eingebunden wird
// Die Datei enthält das $db PDO-Objekt, das wir für Datenbankabfragen nutzen
require_once __DIR__ . '/lib/Datenbank_verbindung.php';

// ==========================
// 2. ID aus URL prüfen
// ==========================

// $_GET['id'] liest die Film-ID aus der URL, z. B. film_anzeigen.php?id=3
// Null-Koaleszenz-Operator ?? sorgt dafür, dass $id null ist, falls kein Parameter übergeben wird
$id = $_GET['id'] ?? null;

// ==========================
// 3. Film aus der Datenbank laden
// ==========================

// Prüfen, ob eine ID übergeben wurde und nur aus Ziffern besteht
// ctype_digit() verhindert unsichere Eingaben wie "1 OR 1=1"
if ($id !== null && ctype_digit($id)) {

    // Prepared Statement schützt vor SQL-Injection
    $stmt = $db->prepare('SELECT * FROM filme WHERE id = :id;');

    // Ausführen des Statements mit sicherem Integer-Wert
    $stmt->execute([':id' => $id]);

    // fetch() holt genau einen Datensatz als assoziatives Array
    $film = $stmt->fetch(PDO::FETCH_ASSOC);

} else {
    // Keine gültige ID → Film existiert nicht
    $film = null;
}

// ==========================
// 4. Coverbild prüfen
// ==========================

// Wir wollen das Cover nur anzeigen, wenn:
// 1) Der Film existiert
// 2) Das Feld 'cover' nicht leer ist
// 3) Die Datei tatsächlich im Ordner "Cover/" existiert
$coverPath = null;
if ($film && !empty($film['cover'])) {

    // __DIR__ liefert den absoluten Pfad zum aktuellen Skript
    $tmpPath = __DIR__ . '/Cover/' . $film['cover'];

    // file_exists prüft, ob die Datei physisch vorhanden ist
    if (file_exists($tmpPath)) {
        // Relativer Pfad für die HTML-Ausgabe
        $coverPath = 'Cover/' . $film['cover'];
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Film anzeigen</title>

    <!-- Cyberpunk-Style CSS -->
    <link rel="stylesheet" href="style2.css">

    <!-- Inline-CSS für Layout Container und Cover/Info -->
    <style>
        /* ==========================
           Hauptcontainer: Cover + Infos nebeneinander
        ========================== */
        .container {
            display: flex;                     /* Flexbox für nebeneinander */
            max-width: 1000px;                 /* Maximalbreite für Lesbarkeit */
            margin: 20px auto;                 /* Zentrieren mit Abstand oben/unten */
            border-radius: 20px;               /* Abgerundete Ecken */
            overflow: hidden;                  /* Inhalte bleiben innerhalb des Containers */
            background: rgba(15,15,25,0.9);   /* Dunkler Cyberpunk-Hintergrund */
            box-shadow: 0 0 25px rgba(0,255,255,0.4), 0 0 50px rgba(255,0,255,0.2); /* Neon-Glow */
            backdrop-filter: blur(12px);       /* Blur-Effekt für futuristisches Design */
            animation: glowPulse 6s infinite alternate; /* Pulsierender Glow */
        }

        /* ==========================
           Linke Box: Cover
        ========================== */
        .cover-box {
            flex: 0 0 400px;                   /* feste Breite */
            display: flex;                     /* Flexbox für Bildfüllung */
            align-items: stretch;              /* Bild streckt sich über die gesamte Höhe */
        }

        .cover-box img {
            width: 100%;                        /* volle Breite */
            height: 100%;                       /* volle Höhe */
            object-fit: cover;                  /* Bild wird zugeschnitten, Seitenverhältnis bleibt */
            border-radius: 12px;                /* leicht abgerundete Ecken */
            border: 2px solid rgba(255,255,255,0.2); /* subtiler Rahmen */
        }

        /* ==========================
           Rechte Box: Filminformationen
        ========================== */
        .info-box {
            flex: 1;                            /* Restliche Breite einnehmen */
            padding: 20px;                      /* Innenabstand */
            display: flex;
            flex-direction: column;             /* Zeilen untereinander */
        }

        .info-box .info-row {
            display: flex;                      /* Label links, Wert rechts */
            padding: 10px 0;                    /* Abstand oben/unten */
            border-bottom: 1px solid rgba(255,255,255,0.2); /* Trennlinie */
        }

        .info-box .info-row:last-child {
            border-bottom: none;                /* letzte Zeile ohne Trennlinie */
        }

        /* Label-Stil */
        .info-box .label {
            font-weight: bold;                   /* fett */
            width: 150px;                        /* feste Breite */
        }

        /* FSK Label immer großgeschrieben */
        .info-box .label.fsk-label {
            text-transform: uppercase;
        }

        /* Pulsierender Glow für Container */
        @keyframes glowPulse {
            from {
                box-shadow: 0 0 15px rgba(0,255,255,0.3), 0 0 30px rgba(255,0,255,0.15);
            }
            to {
                box-shadow: 0 0 25px rgba(0,255,255,0.6), 0 0 50px rgba(255,0,255,0.3);
            }
        }
    </style>
</head>
<body>
<h1>Film anzeigen</h1>

<?php if ($film): ?>
    <div class="container">

        <!-- ==========================
             Linke Seite: Filmcover
        ========================== -->
        <div class="cover-box">
            <?php if ($coverPath): ?>
                <!-- Bild nur anzeigen, wenn existiert -->
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
                // 'cover' und 'id' werden nicht in der Info-Box angezeigt
                if ($spalte === 'cover' || $spalte === 'id') continue;

                // ==========================
                // 2. Label formatieren
                // ==========================
                $labelClass = '';
                if ($spalte === 'fsk') {
                    $labelClass = 'fsk-label';          // FSK komplett groß
                    $displayLabel = strtoupper($spalte);
                } elseif ($spalte === 'laenge') {
                    $displayLabel = 'Länge';            // besser lesbar
                } else {
                    $displayLabel = ucfirst($spalte);   // erster Buchstabe groß
                }

                // ==========================
                // 3. Werte formatieren
                // ==========================
                if ($spalte === 'einspielergebnis') {
                    // Formatierung mit Punkt und Komma: 1234.5 → "1.234,50 Mio €"
                    $wert = number_format($wert, 2, ',', '.') . ' Mio €';
                } elseif ($spalte === 'laenge') {
                    $wert = $wert . ' Minuten';
                }
                ?>

                <!-- ==========================
                     Ausgabe einer einzelnen Zeile
                ========================== -->
                <div class="info-row">
                    <span class="label <?= $labelClass ?>"><?= htmlspecialchars($displayLabel) ?>:</span>
                    <span><?= htmlspecialchars($wert) ?></span>
                </div>

            <?php endforeach; ?>
        </div>

    </div>

    <!-- Zurück-Link -->
    <p><a href="filme_uebersicht.php">Zurück zur Übersicht</a></p>

<?php else: ?>
    <!-- Falls kein Film gefunden -->
    <p>Kein Film mit dieser ID vorhanden.</p>
    <p><a href="filme_uebersicht.php">Zurück zur Übersicht</a></p>
<?php endif; ?>

</body>
</html>
