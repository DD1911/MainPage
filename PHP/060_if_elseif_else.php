<?php

// ---------------------------
// if – elseif – else in PHP
// ---------------------------

$zahl = 11;

/*
   WICHTIG ZU BEACHTEN:
   - Die Bedingung steht IMMER in runden Klammern ( ... ).
     Beispiel: if ($zahl == 42)
   - Der Code, der ausgeführt werden soll, MUSS in geschweiften Klammern { ... } stehen.
     Auch bei nur einer Zeile: { print 'Text'; }
   - Ohne geschweifte Klammern wird nur die **erste Anweisung** ausgeführt,
     was leicht zu Fehlern führen kann, wenn später weitere Zeilen hinzugefügt werden.
*/

if ($zahl == 42) {
    // print() gibt einen Wert aus.
    // Hier wird die Zeichenkette 'Yeah, 42!' auf der Webseite ausgegeben.
    print 'Yeah, 42!';
} elseif ($zahl == 17) {
    // elseif wird nur geprüft, wenn die vorherige if-Bedingung falsch war.
    print 'Yeah, 17!';
} else {
    // else wird ausgeführt, wenn keine vorherige Bedingung zutrifft.
    print 'Weder 42 noch 17!';
}
print '<br>';

// ---------------------------
// Mehrere Bedingungen kombinieren
// ---------------------------

$alter = 20;

// Logische Operatoren:
// && → UND, || → ODER, ! → NICHT
if ($alter >= 18 && $zahl != 42) {
    // Dieser Block wird ausgeführt, wenn beide Bedingungen wahr sind
    print "Du bist volljährig und die Zahl ist nicht 42.";
} elseif ($alter < 18 || $zahl == 42) {
    // Dieser Block wird ausgeführt, wenn mindestens eine Bedingung wahr ist
    print "Du bist minderjährig oder die Zahl ist 42.";
} else {
    // Dieser Block wird ausgeführt, wenn keine der Bedingungen zutrifft
    print "Keine der Bedingungen trifft zu.";
}
print '<br>';

// ---------------------------
// Kurzschreibweise ohne geschweifte Klammern (nicht empfohlen)
// ---------------------------
if ($zahl == 42)
    print 'Nur diese Zeile gehört zum if!';
// Achtung: zusätzliche Zeilen würden **immer** ausgeführt werden, selbst wenn die Bedingung falsch ist
print '<br>';

// ---------------------------
// Ausgabe- und Debug-Funktionen
// ---------------------------

// print()
// - Gibt einen Wert auf der Webseite aus
// - Kann Strings, Zahlen oder Variablen ausgeben
print("Beispiel mit print<br>");

// var_dump()
// - Zeigt **Wert** UND **Datentyp** einer Variablen an
// - Nützlich beim Debuggen
var_dump($zahl);  // Ausgabe: int(11)
print '<br>';

$wert = "Hallo Welt";
var_dump($wert);  // Ausgabe: string(10) "Hallo Welt"
print '<br>';

// Zusammenfassung:
// - print() → einfache Ausgabe
// - var_dump() → zeigt Typ + Wert (Debugging)
// - if-elseif-else → steuert den Programmfluss je nach Bedingung
// - Klammern richtig setzen, um Fehler zu vermeiden
