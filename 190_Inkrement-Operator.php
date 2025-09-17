<?php

// ====================================
//          Inkrement-Operator
// ====================================

// Startwert
$zahl1 = 0;

// Variante 1: Klassische Addition
$zahl1 = $zahl1 + 1;  // $zahl1 wird um 1 erhöht
print $zahl1 . '<br>';   // Ausgabe: 1

// Variante 2: Kurzschreibweise mit +=
$zahl1 += 1;             // wieder +1
print $zahl1 . '<br>';   // Ausgabe: 2

// Variante 3: Inkrement-Operator
$zahl1++;                // erhöht $zahl1 um 1
print $zahl1 . '<br>';   // Ausgabe: 3

// ====================================
//          Dekrement-Operator
// ====================================

// Variante 1: Dekrement (verringert um 1)
$zahl1--;                // zieht 1 ab
print $zahl1 . '<br>';   // Ausgabe: 2

// Variante 2: Wieder -= (Kurzschreibweise)
$zahl1 -= 1;             // wieder -1
print $zahl1 . '<br>';   // Ausgabe: 1

// ====================================
//          Prä- vs. Post-Inkrement
// ====================================

// Unterschied zwischen ++$x und $x++
// Prä-Inkrement (++$x): zuerst erhöhen, dann Wert zurückgeben
// Post-Inkrement ($x++): zuerst Wert zurückgeben, dann erhöhen

$zahl2 = 5;

// Post-Inkrement
print $zahl2++ . '<br>';   // Ausgabe: 5 (erst ausgeben, dann +1)
print $zahl2 . '<br>';     // Ausgabe: 6 (neuer Wert)

// Prä-Inkrement
print ++$zahl2 . '<br>';   // Ausgabe: 7 (erst +1, dann ausgeben)

?>
