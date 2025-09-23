<?php

/*
 * Teilbar
 *
 * Schreibe ein Skript, das alle Zahlen von 1 bis 100 ausgibt,
 * die durch drei teilbar sind.
 * Hilfsmittel: Schleife, if, Modulo
 *
 * Zusatz 1: Gib die Anzahl der Zahlen aus
 *
 * Zusatz 2: Das Programm soll nun alle Zahlen ausgeben,
 *           die durch 3 ODER 7 teilbar sind.
 */

// Dieses Skript gibt Zahlen von 1 bis 100 aus, die bestimmte Bedingungen erfüllen

// Zähler für die Anzahl der Zahlen, die durch 3 teilbar sind
$countDiv3 = 0;

// Teil 1: Alle Zahlen von 1 bis 100, die durch 3 teilbar sind
echo "Zahlen von 1 bis 100, die durch 3 teilbar sind:<br>";

for ($i = 1; $i <= 100; $i++) {
    // Prüfen, ob $i durch 3 teilbar ist
    if ($i % 3 == 0) {
        echo $i . " ";  // Zahl ausgeben
        $countDiv3++;   // Zähler erhöhen
    }
}

// Gesamtanzahl ausgeben
echo "<br>Gesamtanzahl: $countDiv3<br><br>";


//==================================================================================================================

// Zähler für die Anzahl der Zahlen, die durch 3 oder 7 teilbar sind
$countDiv3or7 = 0;

// Teil 2: Alle Zahlen von 1 bis 100, die durch 3 oder 7 teilbar sind
echo "Zahlen von 1 bis 100, die durch 3 oder 7 teilbar sind:<br>";

for ($i = 1; $i <= 100; $i++) {
    // Prüfen, ob $i durch 3 oder 7 teilbar ist
    if ($i % 3 == 0 || $i % 7 == 0) {
        echo $i . " ";          // Zahl ausgeben
        $countDiv3or7++;        // Zähler erhöhen
    }
}

// Gesamtanzahl ausgeben
echo "<br>Gesamtanzahl: $countDiv3or7";


