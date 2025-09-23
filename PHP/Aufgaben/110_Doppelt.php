<?php

/*
 * Doppelt
 *
 * Schreibe eine Funktion, die überprüft,
 * ob in einem Array keine doppelten Elemente sind.
 * Der Funktion wird das Array übergeben
 * und sie soll true oder false zurückgeben.
 *
 */

// Funktion, die prüft, ob ein Array keine Duplikate enthält
function hatKeineDuplikate(array $arr): bool {
    // array_unique entfernt Duplikate – wenn die Länge gleich bleibt, gibt es keine Duplikate
    return count($arr) === count(array_unique($arr));
}

// Beispiel-Array mit zufälligen Zahlen
$doppelt = [];
while (count($doppelt) < 5) {
    $doppelt[] = rand(0, 20);
}

// Prüfung durchführen
var_dump(hatKeineDuplikate($doppelt));

