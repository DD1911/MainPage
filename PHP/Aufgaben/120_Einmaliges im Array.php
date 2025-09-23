<?php

/*
 * Einmaliges im Array
 *
 * Schreibe ein Programm, das ein Array mit neun Zahlen befüllt.
 * Dabei sollen vier Zahlen doppelt vorkommen
 * und eine Zahl nur einmal.
 *
 * Schreibe dann ein Programm, das aus diesem Array die Zahl findet,
 * die nur einmal vorkommt.
 */

// Schritt 1: 4 Zahlen generieren, die doppelt vorkommen
$doppelteZahlen = [];
while (count($doppelteZahlen) < 4) {
    $zufall = rand(0, 9);
    // Damit keine gleichen Doppel-Zahlen doppelt erstellt werden
    if (!in_array($zufall, $doppelteZahlen)) {
        $doppelteZahlen[] = $zufall;
    }
}
// Schritt 2: Array zusammenstellen (4 Zahlen doppelt + 1 Einzelzahl)
$array = [];

// doppelte Zahlen hinzufügen
foreach ($doppelteZahlen as $zahl) {
    $array[] = $zahl;
    $array[] = $zahl;
}

// Einzelzahl hinzufügen (muss nicht in den Doppelzahlen vorkommen)
do {
    $einmalig = rand(0, 9);
} while (in_array($einmalig, $doppelteZahlen));

$array[] = $einmalig;

// Array mischen, damit die Reihenfolge zufällig ist
shuffle($array);

echo "Array: ";
print_r($array);

// Schritt 3: Zahl finden, die nur einmal vorkommt
foreach ($array as $zahl) {
    if (count(array_keys($array, $zahl)) === 1) {
        echo "Die Zahl, die nur einmal vorkommt, ist: $zahl\n";
        break;
    }
}



