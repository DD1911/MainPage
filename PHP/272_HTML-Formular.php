<?php
// Mit var_dump($_GET) werden alle per GET übermittelten Daten angezeigt.
// GET = Daten werden in der URL sichtbar (z. B. index.php?name=Max).
var_dump($_GET);

// Mit var_dump($_POST) werden alle per POST übermittelten Daten angezeigt.
// POST = Daten werden unsichtbar im Hintergrund übertragen (z. B. bei Formularen).
var_dump($_POST);

// Wenn das Formular abgeschickt wurde (per POST), prüfen wir hier, ob ein Wert vorhanden ist.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sicherstellen, dass das Feld "vornameS" existiert und nicht leer ist.
    if (!empty($_POST['vornameS'])) {
        // Eingabe mit htmlspecialchars() bereinigen, um XSS (Cross-Site-Scripting) zu verhindern.
        $vorname = htmlspecialchars($_POST['vornameS'], ENT_QUOTES, 'UTF-8');
        echo "<p>Hallo, $vorname! Schön, dass du das Formular benutzt hast.</p>";
    } else {
        echo "<p>Bitte gib einen Vornamen ein.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>HTML-Formular</title>
</head>
<body>

<h1>HTML-Formular</h1>

<!--
    Formular:
    - action = $_SERVER['PHP_SELF'] bedeutet, dass das Formular an die gleiche Datei geschickt wird.
    - method="post" sorgt dafür, dass die Daten im Hintergrund übertragen werden.
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    <label for="vornameS">Vorname:</label>
    <input type="text" id="vornameS" name="vornameS" required>
    <input type="submit" value="Abschicken">

</form>

</body>
</html>
