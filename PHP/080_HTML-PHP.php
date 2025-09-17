<?php
/*
========================================================
HTML & PHP
--------------------------------------------------------
- HTML: Struktur & Darstellung der Webseite (läuft im Browser).
- PHP: Programmiersprache für dynamische Inhalte (läuft auf dem Server).
- Zusammenspiel: PHP erzeugt HTML → Browser zeigt nur fertiges HTML an.
========================================================
*/
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>HTML & PHP Wissensnotiz</title>
</head>
<body>

<!-- ========================================
     HTML-Teil: Statische Inhalte
     ======================================== -->
<h1>Willkommen auf meiner PHP-Demo-Seite</h1>
<p>Diese Seite zeigt, wie HTML und PHP zusammenarbeiten.</p>

<hr>

<!-- ========================================
     PHP-Teil: Dynamische Inhalte
     ======================================== -->
<h2>Dynamischer Inhalt mit PHP</h2>
<p>Das heutige Datum ist:</p>

<?php
// PHP-Bereich beginnt mit <?php und endet mit ?>
// Die Funktion date() liefert das aktuelle Datum
// echo gibt Text oder HTML an den Browser aus
echo "<strong>" . date("d.m.Y") . "</strong>";
?>

<hr>

<!-- ========================================
     HTML-Formular (Nutzereingabe)
     ======================================== -->
<h2>Formular-Beispiel</h2>
<form method="post" action="">
    <!-- Label und Eingabefeld -->
    <label for="name">Dein Name:</label>
    <input type="text" id="name" name="name">
    <!-- Absende-Button -->
    <button type="submit">Absenden</button>
</form>

<?php
// ========================================
// PHP verarbeitet das Formular
// ========================================
// $_SERVER["REQUEST_METHOD"] gibt an, wie die Seite aufgerufen wurde.
// "POST" = Formular wurde abgeschickt.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // $_POST enthält die Formulardaten (hier: Eingabe im Feld "name")
    $name = $_POST["name"];

    // Sicherheitsregel: htmlspecialchars() verhindert XSS (Schadcode im HTML)
    $name = htmlspecialchars($name);

    // Ausgabe: Begrüßung mit dem Namen
    echo "<p>Hallo, <strong>$name</strong>! Schön, dass du hier bist.</p>";
}
?>

<hr>

<!-- ========================================
     Wissensnotiz-Regeln (als Kommentare im Code)
     ======================================== -->

<?php
/*
--------------------------------------------------------
REGELN & BEST PRACTICES
--------------------------------------------------------
1. PHP-Code immer in <?php ... ?> schreiben.
2. HTML ist für Darstellung zuständig, PHP für Logik.
3. Niemals PHP-Quellcode an den Nutzer senden.
4. Nutzer-Eingaben IMMER validieren & bereinigen:
   - htmlspecialchars() gegen XSS
   - prepared statements (bei Datenbanken) gegen SQL-Injection
5. Strukturieren: HTML für Layout, PHP für Logik trennen (z. B. mit Templates).
6. Kommentare nutzen, um den Code verständlich zu machen.
7. Testen: Prüfen, ob PHP aktiviert ist (z. B. mit phpinfo()).
--------------------------------------------------------
*/
?>

</body>
</html>
