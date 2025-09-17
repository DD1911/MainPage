<?php

// Operatoren in PHP: Strings verbinden

$vorname = 'Daniel';
$nachname = 'Smith';
$alter = 30;

// 1. Verkettung mit doppelten Anführungszeichen
// Variablen werden direkt im String interpretiert
print("Hello $vorname $nachname, du bist $alter Jahre alt.");
// Ausgabe: Hello Daniel Smith, du bist 30 Jahre alt.
print '<br>';

// 2. Verkettung mit dem Verkettungsoperator "."
// Mehrere Strings und Zahlen zusammenfügen
print $vorname . " " . $nachname . " ist " . $alter . " Jahre alt.";
// Ausgabe: Daniel Smith ist 30 Jahre alt.
print '<br>';

// 3. Kombination von doppelten Anführungszeichen und Verkettungsoperator
print "Name: " . $vorname . " " . $nachname . ", Alter: $alter";
// Ausgabe: Name: Daniel Smith, Alter: 30
print '<br>';

// 4. Verkettung mehrerer Zeichenketten und Variablen
$stadt = "Málaga";
print $vorname . " " . $nachname . " aus " . $stadt . " ist " . $alter . " Jahre alt.";
// Ausgabe: Daniel Smith aus Málaga ist 30 Jahre alt.
print '<br>';

// 5. Tipp: Innerhalb von doppelten Anführungszeichen kann man auch geschweifte Klammern {} verwenden
// um Variablen klar abzugrenzen
print 'Hallo {$vorname} {$nachname}, willkommen in {$stadt}!';
// Ausgabe: Hallo Daniel Smith, willkommen in Málaga!
print '<br>';
