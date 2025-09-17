<?php
// -----------------------------
// Arrays in PHP
// -----------------------------

// 1. Numerisches Array
// Ein numerisches Array speichert Elemente in einer geordneten Reihenfolge.
// Die Indizes sind standardmäßig Zahlen, beginnend bei 0.
// In Python entspricht dies einer Liste.

$leute = ['Peter', 'Paul', 'Mary'];

// var_dump() zeigt detaillierte Informationen über das Array
var_dump($leute);

// Zugriff auf Elemente über den Index
echo $leute[0] . "\n"; // Ausgabe: Peter
echo $leute[1] . "\n"; // Ausgabe: Paul
echo $leute[2] . "\n"; // Ausgabe: Mary

// Array erweitern
$leute[] = 'Anna';  // Fügt "Anna" am Ende des Arrays hinzu
echo $leute[3] . "\n"; // Ausgabe: Anna

// Schleife über ein numerisches Array mit foreach
echo "Liste aller Leute:\n";
foreach ($leute as $person) {
    echo "- $person\n";
}

// -----------------------------
// Assoziatives Array
// -----------------------------
// Ein assoziatives Array speichert Daten als Schlüssel-Wert-Paare.
// In Python entspricht dies einem Dictionary.

$person = [
    'vorname' => 'Daniel',
    'nachname' => 'Smith',
    'alter' => 39
];

// var_dump() zeigt den kompletten Inhalt des Arrays
var_dump($person);

// Zugriff auf Werte über den Schlüssel
echo "Vorname: " . $person['vorname'] . "\n";  // Daniel
echo "Nachname: " . $person['nachname'] . "\n"; // Smith
echo "Alter: " . $person['alter'] . "\n";      // 39

// Hinzufügen neuer Schlüssel-Wert-Paare
$person['beruf'] = 'Fachinformatiker';
echo "Beruf: " . $person['beruf'] . "\n";      // Fachinformatiker

// Schleife über ein assoziatives Array mit foreach
echo "Alle Informationen zur Person:\n";
foreach ($person as $key => $value) {
    echo "$key: $value\n";
}

// -----------------------------
// Misch-Array (numerisch + assoziativ)
// -----------------------------
// PHP erlaubt auch Arrays, die sowohl numerische als auch assoziative Schlüssel haben

$mixed = [
    'name' => 'Anna',
    0 => 'Python',
    1 => 'PHP'
];

var_dump($mixed);

// Zugriff
echo $mixed['name'] . "\n"; // Anna
echo $mixed[0] . "\n";      // Python
echo $mixed[1] . "\n";      // PHP

// Schleife über ein gemischtes Array mit foreach
echo "Inhalt des gemischten Arrays:\n";
foreach ($mixed as $key => $value) {
    echo "$key => $value\n";
}

// -----------------------------
// Zusammenfassung
// -----------------------------
// - Numerische Arrays: geordnete Listen, Zugriff über Indizes
// - Assoziative Arrays: Schlüssel-Wert-Paare, Zugriff über Schlüssel
// - Misch-Arrays: Kombination aus numerischen und assoziativen Schlüsseln
// - Arrays können erweitert werden und mit foreach durchlaufen werden
// - foreach liefert automatisch Werte und optional Schlüssel

