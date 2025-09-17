<?php

//=================================
//          Funktionen in PHP
//=================================

// 1. Funktionsdefinition mit Parametern
// Eine Funktion ist ein wiederverwendbarer Block von Code.
// Parameter sind Platzhalter, die beim Funktionsaufruf mit Werten (Argumenten) gefüllt werden.

function addiere($zahl1, $zahl2) {
    return $zahl1 + $zahl2;   // Die Funktion gibt die Summe zurück
}

// Funktionsaufruf mit Argumenten
echo addiere(4, 7);  // Ausgabe: 11
echo '<br>';


// 2. Funktion mit Standardwerten (Default-Werten)
// Wenn beim Aufruf ein Parameter nicht angegeben wird, wird der Standardwert verwendet.

function addiere2($zahl1, $zahl2 = 1) {
    return $zahl1 + $zahl2;
}

echo addiere2(4, 7);  // Ausgabe: 11 (4 + 7)
echo '<br>';
echo addiere2(4);     // Ausgabe: 5  (4 + 1, weil $zahl2 den Standardwert 1 nimmt)
echo '<br>';
echo addiere2(7);     // Ausgabe: 8
echo '<br>';

// 3. Funktionen mit mehr Logik
// Funktionen können beliebig komplex sein und auch Bedingungen enthalten.

function multipliziere($a, $b) {
    if (!is_numeric($a) || !is_numeric($b)) {
        return "Beide Werte müssen Zahlen sein!";
    }
    return $a * $b;
}

echo multipliziere(3, 5);   // Ausgabe: 15
echo '<br>';
echo multipliziere(3, "x"); // Ausgabe: Beide Werte müssen Zahlen sein!
echo '<br>';


// 4. Funktionen mit Rückgabewert und ohne Rückgabewert
// - Mit return: Funktion liefert einen Wert zurück
// - Ohne return: Funktion gibt nur direkt etwas aus

function hallo($name) {
    echo "Hallo, $name! <br>";
}

hallo("Daniel");   // Ausgabe: Hallo, Daniel!
hallo("Maria");    // Ausgabe: Hallo, Maria!


// 5. Funktionen mit beliebig vielen Parametern (Variadische Funktionen)
// Mit ...$werte kann man eine unbestimmte Anzahl an Argumenten übergeben.

function summe(...$werte) {
    return array_sum($werte);  // array_sum summiert alle Werte in einem Array
}

echo summe(1, 2, 3, 4, 5); // Ausgabe: 15
echo '<br>';


// 6. Funktionen können auch andere Funktionen aufrufen
function quadrat($x) {
    return $x * $x;
}

function summeDerQuadrate($a, $b) {
    return quadrat($a) + quadrat($b);
}

echo summeDerQuadrate(3, 4); // Ausgabe: 25 (9 + 16)
echo '<br>';


//=================================
//   Zusammenfassung zu Funktionen
//=================================
/*
- Funktionen helfen, Code wiederverwendbar und übersichtlich zu machen.
- Parameter können Pflicht oder optional (mit Default-Wert) sein.
- Funktionen können Werte zurückgeben (return) oder nur etwas ausgeben (echo).
- Mit variadischen Parametern (...$werte) kann man unendlich viele Argumente übergeben.
*/

