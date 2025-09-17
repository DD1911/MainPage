<?php
// ============================================
//              while - do-while
// ============================================

// Kopfgesteuerte Schleifen (while):
// - Erst wird die Bedingung geprüft
// - Dann der Schleifenkörper ausgeführt
// - Vorteil: Läuft nur, wenn die Bedingung von Anfang an true ist

// Beispiel: Zählschleife mit while
$i = 1;
while ($i <= 10) {                  // Bedingung: so lange i <= 10
    echo $i . ' ';                  // Ausgabe der Zahl
    $i++;                           // Veränderung: i um 1 erhöhen
}
echo '<br><br>';

// Beispiel: unbestimmte Wiederholung
// Würfeln, solange KEINE 6 fällt
while (rand(1, 6) != 6) {           // Bedingung: Ergebnis ist ungleich 6
    echo 'NOPE ';                     // Ausgabe für jeden Versuch
}
echo '6 gefunden!<br><br>';


// ============================================
//              do-while
// ============================================

// Fußgesteuerte Schleifen (do-while):
// - Erst wird der Schleifenkörper mindestens EINMAL ausgeführt
// - Dann die Bedingung geprüft
// - Vorteil: Der Code wird garantiert mindestens einmal ausgeführt

// Beispiel 1: Klassisches Zählen
$j = 1;
do {
    echo "Wert von j: $j <br>";  // Ausgabe
    $j++;                        // Veränderung
} while ($j <= 5);               // Bedingung: läuft solange j <= 5

echo "<hr>";

// Beispiel 2: Würfeln, bis eine 6 fällt
do {
    $wurf = rand(1, 6);          // Zufallszahl von 1 bis 6
    echo $wurf . ' ';            // Ausgabe des Wurfs
} while ($wurf != 6);            // Bedingung: wiederholen solange KEINE 6
echo "<br>Fertig – eine 6 wurde gewürfelt!";


/*
====================================================
                while vs. do-while
====================================================

Eine Schleife ist ein Kontrollfluss-Konstrukt, mit dem
ein Programm bestimmte Befehle mehrfach ausführt.
Ob und wie oft, hängt von einer Bedingung ab.

----------------------------------------------------
1. while-Schleife (kopfgesteuert)
----------------------------------------------------
- Ablauf:
    1. ZUERST wird die Bedingung geprüft
    2. NUR wenn die Bedingung true ist, wird der Block ausgeführt
    3. Danach wieder zurück zu Schritt 1

- Wichtig:
    -> Die Schleife kann also auch 0x laufen,
       wenn die Bedingung gleich am Anfang false ist.

- Typischer Einsatz:
    -> Wenn man VORHER weiß, ob man überhaupt starten soll.
    -> Beispiel: "Solange Akku > 20%, spiele Musik."
                 Wenn Akku schon bei 15% ist, startet die Schleife gar nicht.

----------------------------------------------------
2. do-while-Schleife (fußgesteuert)
----------------------------------------------------
- Ablauf:
    1. ZUERST wird der Block ausgeführt
    2. DANACH wird die Bedingung geprüft
    3. Falls die Bedingung true ist, wiederhole den Block

- Wichtig:
    -> Der Schleifenblock wird MINDESTENS EINMAL ausgeführt,
       auch wenn die Bedingung von Anfang an false ist.

- Typischer Einsatz:
    -> Wenn man etwas auf jeden Fall mindestens einmal tun muss,
       bevor man entscheiden kann, ob es weitergeht.
    -> Beispiel: "Würfle eine Zahl, bis eine 6 kommt."
                 -> Man muss mindestens einmal würfeln, um zu prüfen.

----------------------------------------------------
3. Vergleich auf einen Blick
----------------------------------------------------
| Merkmal                 | while                | do-while                  |
|--------------------------|----------------------|---------------------------|
| Bedingung wird geprüft   | vor dem 1. Durchlauf | nach dem 1. Durchlauf     |
| Mindestens 1x ausführen? | NEIN (evtl. 0x)      | JA (immer mindestens 1x)  |
| Typische Anwendung       | Prüfen VORHER        | Aktion mindestens EINMAL  |

----------------------------------------------------
4. Beispiele
----------------------------------------------------
while:
    while ($zahl < 10) {
        echo $zahl;
        $zahl++;
    }
    -> Läuft nur, wenn $zahl < 10 schon beim Start true ist.

do-while:
    do {
        echo $zahl;
        $zahl++;
    } while ($zahl < 10);
    -> Läuft mindestens einmal, selbst wenn $zahl >= 10 ist.
====================================================
*/

