<?php
//-----------------
// Datentypen in PHP
//-----------------

// 1. Zeichenketten (Strings)
print gettype('Hello');  // Ausgabe: string
print '<br>';

// 2. Ganzzahlen (Integer)
print gettype(123456);   // Ausgabe: integer
print '<br>';

// 3. Fließkommazahlen (Float / Double)
print gettype(123.456);  // Ausgabe: double (alias für float)
print '<br>';

// 4. Unterstrich als Tausendertrenner (PHP 7.4+)
print gettype(123_456.789_333); // Ausgabe: double
print '<br>';

// 5. Wahrheitswerte (Boolean)
print gettype(true);  // Ausgabe: boolean
print '<br>';
print gettype(false); // Ausgabe: boolean
print '<br>';

// 6. Vergleichsoperatoren
// == prüft nur den Wert, nicht den Datentyp
print '123 == "123" : ' . (123 == '123');
print '<br>';
var_dump(123 == '123'); // zeigt Typ und Wert

// === prüft Wert UND Datentyp
print '<br>';
print '123 === "123" : ' . (123 === '123');
print '<br>';
var_dump(123 === '123');

// 7. Null-Wert
$var = null;
print gettype($var);  // Ausgabe: NULL
print '<br>';

// 8. Array
$arr = [1, 2, 3];
print gettype($arr);  // Ausgabe: array
print '<br>';

// 9. Objekt
$obj = new stdClass();
print gettype($obj);  // Ausgabe: object
print '<br>';

// 10. Ressource (z. B. Datei)
$file = fopen('php://memory', 'r');
print gettype($file); // Ausgabe: resource
print '<br>';
fclose($file);

// 11. Typumwandlung / Mischtypen
$zahlAlsString = "123";
print gettype($zahlAlsString); // string
print '<br>';
print gettype((int)$zahlAlsString); // integer
print '<br>';
