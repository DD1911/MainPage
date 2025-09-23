<?php

/*
 * Lottoziehung
 *
 * Schreibe ein Programm, das sechs verschiedene
 * Lottozahlen (6 aus 49) zieht und ausgibt.
 *
 * Hilfsmittel: Array, Schleife/Verzweigung, in_array()
 */


// Array, um die gezogenen Zahlen zu speichern
$lottozahlen = [];

// Solange wir weniger als 6 Zahlen haben, weiterziehen
while (count($lottozahlen) < 6) {
    // Zufallszahl zwischen 1 und 49
    $zahl = rand(1, 49);

    // Prüfen, ob die Zahl schon gezogen wurde
    if (!in_array($zahl, $lottozahlen)) {
        $lottozahlen[] = $zahl; // Zahl hinzufügen
    }
}

// Ausgabe der gezogenen Lottozahlen
echo "Gezogene Lottozahlen: " . implode(", ", $lottozahlen);




// Telefonnummer random erstellen

$land = [];
$vorwahlen = [];
$nummer = [];

// 3-stellige Landesvorwahl
while(count($land) < 3) {
    $land[] = rand(0, 9);
}

// 4-stellige Ortsvorwahl
while(count($vorwahlen) < 4) {
    $vorwahlen[] = rand(0, 9);
}

// 6-stellige eigentliche Nummer
while(count($nummer) < 6) {
    $nummer[] = rand(0, 9);
}

// Arrays zu Strings zusammenfügen
// impolde verwandelt ein Array in einen String
$landCode = implode($land);
$vorwahlCode = implode($vorwahlen);
$nummerCode = implode($nummer);

// Ausgabe
echo "Zufällige Telefonnummer: +$landCode $vorwahlCode $nummerCode";
