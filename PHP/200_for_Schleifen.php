<?php

// ==================================
//          for-Schleife
// ==================================

// Zählschleifen haben immer 3 Teile:
// (Initialisierung; Bedingung; Veränderung)

// Initialisierung = Startwert (z. B. $i = 1)
// Bedingung       = wann die Schleife abbricht (z. B. $i <= 20)
// Veränderung     = was nach jedem Schleifendurchlauf passiert (z. B. $i++)

for ($i = 1; $i <= 20; $i++) {
    print 'Hello <br>';   // wird 20x ausgeführt
}

// ==================================
//          Varianten
// ==================================

// Beispiel: Zählen von 10 rückwärts bis 1
for ($i = 10; $i >= 1; $i--) {
    print "Countdown: $i <br>";
}

// Beispiel: Zählen in Zweierschritten
for ($i = 0; $i <= 10; $i += 2) {
    print "Gerade Zahl: $i <br>";
}

// ==================================
//          Endlosschleifen
// ==================================

// Eine for-Schleife ohne Bedingungen läuft unendlich:
// for (;;) { ... } entspricht "while(true)"

// Beispiel Endlosschleife (ACHTUNG: nur im Terminal stoppen mit CTRL+C)
# for (;;) {
#     print "Unendliche Schleife...<br>";
# }

