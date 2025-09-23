<?php

/*
 * Obst oder Gemüse
 *
 * Fülle EIN (nummerisches, eindimensionales) Array
 * mit Apfel, Birne, Kartoffel, Karotte und Banane.
 * Lies per Zufall ein Element des Arrays aus
 * und gib an, ob es sich um Obst oder Gemüse handelt.
 *
 * Hilfsmittel: array, rand(), switch-case
 *
 * Zusatz 1: Die Reihenfolge im Array soll beliebig veränderbar sein
 * Zusatz 2: Die Wörter Obst & Gemüse sollen im Quellcode
 *           nur je einmal benutzen.
 *           Wenn die beiden Wörter in einer Variablen gespeichert werden,
 *           darf auch diese nur an einer Stelle ausgegeben oder zugewiesen werden.
 */


/*
 * Obst oder Gemüse
 * Ein zufälliges Element wird ausgewählt und klassifiziert
 */

// 1. Array mit Früchten und Gemüse
// Array ist eine Liste die den begriff in einer [] mit "" auflistet.

$items = ["Apfel", "Birne", "Kartoffel", "Karotte", "Banane"];

// 2. Zufälliges Element aus dem Array auswählen
// wir nutzen count item -1 und die null um in der liste einen begriff zu waehlen rand($min, $max)
$random = rand(0, count($items) - 1);
// das ist das ausgewaehlte item also was nach dem random rauskommt.
$selectedItem = $items[$random];

// 3. Einmalige Variablen für die Wörter "Obst" und "Gemüse"
$typeObst = "Obst";
$typeGemuse = "Gemüse";

// 4. Klassifizierung mit switch-case
switch ($selectedItem) {
    case "Apfel":
    case "Birne":
    case "Banane":
        $type = $typeObst;
        break;
    case "Kartoffel":
    case "Karotte":
        $type = $typeGemuse;
        break;
    default:
        $type = "Unbekannt";
}

// 5. Ausgabe
echo "Das ausgewählte Element ist: $selectedItem<br>";
echo "Es handelt sich um: $type";

