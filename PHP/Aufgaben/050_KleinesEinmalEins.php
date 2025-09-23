<?php
/*
* Kleines Einmaleins
*
* Schreibe ein Programm,
* welches das kleine Einmaleins formatiert ausgibt:
*
* 001 002 003 004 005 006 007 008 009 010
* 002 004 006 008 010 012 014 016 018 020
* 003 006 009 012 015 018 021 024 027 030
* 004 008 012 016 020 024 028 032 036 040
* 005 010 015 020 025 030 035 040 045 050
* 006 012 018 024 030 036 042 048 054 060
* 007 014 021 028 035 042 049 056 063 070
* 008 016 024 032 040 048 056 064 072 080
* 009 018 027 036 045 054 063 072 081 090
* 010 020 030 040 050 060 070 080 090 100
*
* Zusatz 1: Färbe jede 2. Zeile silber ein.
*
* Zusatz 2: Benutze für die Ausgabe eine HTML-Tabelle.
*/
// Initialisierung = Startwert (z. B. $i = 1)
// Bedingung       = wann die Schleife abbricht (z. B. $i <= 20)
// Veränderung     = was nach jedem Schleifendurchlauf passiert (z. B. $i++)
// Eine Schleife läuft nur in einer Richtung (z. B. nur Zeilen oder nur Spalten).
//Das kleine Einmaleins ist aber eine Tabelle (10 Zeilen × 10 Spalten).
//Darum brauchst du 2 Schleifen:
//die äußere Schleife für die Zeilen (1er–10er Reihe),
//die innere Schleife für die Spalten (jeweils 1–10 Multiplikationen).
//👉 Ohne 2 Schleifen könntest du nicht alle Kombinationen von i × j erzeugen.


for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        // sprintf sorgt dafür, dass die Zahl immer 3-stellig ist (mit führenden Nullen)
        echo sprintf("%03d ", $i * $j);
    }
    echo "\n"; // Zeilenumbruch nach jeder Zeile in der zeile damit es immer nach 10 den umbruch macht
}

//Das %03d kommt aus der sprintf()-Funktion in PHP und bedeutet:
//Zerlegt:
//%d → steht für eine ganze Zahl (Integer).
//03 → sagt: die Zahl soll mindestens 3 Stellen breit sein.
//0 → wenn die Zahl kürzer ist, fülle sie mit Nullen von links auf.


/*
 * Kleines Einmaleins in einer HTML-Tabelle
 *
 * Aufgabe:
 * - 10 × 10 Tabelle mit den Ergebnissen von 1×1 bis 10×10
 * - Jede 2. Zeile silber einfärben
 * - Ausgabe formatiert mit führenden Nullen (z. B. 001, 002, 010 …)
 */


// HTML und CSS für die Tabelle
echo "
<style>
    table {
        border-collapse: collapse;   /* Zellenränder werden zusammengezogen */
        margin: 20px;                /* Abstand nach außen */
        font-family: monospace;      /* gleiche Zeichenbreite für Zahlen */
    }
    td {
        border: 1px solid black;     /* Rahmen um jede Zelle */
        padding: 6px 10px;           /* Innenabstand (ähnlich cellpadding) */
        text-align: center;          /* Inhalte zentrieren */
    }
    tr:nth-child(even) {
        background-color: silver;    /* jede 2. Zeile grau einfärben */
    }
</style>
";

echo "<table>";

// Äußere Schleife = Zeilen (1er–10er Reihe)
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>"; // neue Tabellenzeile öffnen

    // Innere Schleife = Spalten (1–10 Multiplikationen pro Zeile)
    for ($j = 1; $j <= 10; $j++) {
        // sprintf("%03d") sorgt für 3-stellige Zahlen mit führenden Nullen
        $wert = sprintf("%03d", $i * $j);
        echo "<td>$wert</td>";
    }

    echo "</tr>"; // Tabellenzeile schließen
}

echo "</table>";
