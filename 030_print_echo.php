<?php

// print & echo sind beides Sprachkonstrukte in PHP, die zur Ausgabe dienen.
// Strings (Zeichenketten) müssen in Anführungszeichen gesetzt werden.

// Ausgabe mit print
print 'Hello';
print '<br>';

// Ausgabe mit echo
echo 'Hello';
print '<br>';

$var = 'Daniel';

// print mit Klammern
print($var);
print '<br>';

// Unterschied einfache vs. doppelte Anführungszeichen

// 1. Einfache Anführungszeichen: Inhalt wird wörtlich ausgegeben
print('Hello $var');
// Ausgabe: Hello $var
print '<br>';

// 2. Doppelte Anführungszeichen: Variablen werden ersetzt, Steuerzeichen ausgewertet
print("Hello $var\n");
// Ausgabe: Hello Daniel (plus Zeilenumbruch im Quelltext)
print '<br>';

// 3. HTML-Zeilenumbruch für Browser
print("Hello $var<br>");
// Ausgabe: Hello Daniel (sichtbarer Zeilenumbruch im Browser)
