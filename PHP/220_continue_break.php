<?php

// ====================================
//          continue
// ====================================
// "continue" überspringt den aktuellen Schleifendurchlauf
// und springt direkt zur nächsten Iteration der Schleife

echo "Beispiel continue:<br>";

for ($i = 10; $i > 0; $i--) {
    if ($i == 7) continue;     // überspringe i = 7
    echo $i . ' ';             // Ausgabe: 10 9 8 6 5 4 3 2 1
}

echo "<br><br>";

// ====================================
//          break
// ====================================
// "break" beendet die gesamte Schleife sofort

echo "Beispiel break:<br>";

for ($i = 10; $i > 0; $i--) {
    if ($i == 7) break;        // Schleife sofort abbrechen
    echo $i . ' ';             // Ausgabe: 10 9 8
}

echo "<br>";

// ====================================
//          Hinweis
// ====================================
// Ohne geschweifte Klammern {} wird nur die **nächste Anweisung** von if/else betroffen.
// Bei mehreren Anweisungen immer {} benutzen, sonst passieren unerwartete Dinge.


