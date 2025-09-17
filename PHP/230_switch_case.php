<?php
// ============================================
//              switch-case
// ============================================

// Switch-case ist eine Alternative zu vielen if-elseif-else
// Es prüft eine Variable auf mehrere feste Werte

$tag = rand(1, 7); // Zufallstag zwischen 1 und 7

// switch prüft den Wert von $tag
switch ($tag) {
    case 1:
        echo 'Montag';
        break; // stoppt die switch-Ausführung nach Treffer
    case 2:
        echo 'Dienstag';
        break;
    case 3:
        echo 'Mittwoch';
        break;
    case 4:
        echo 'Donnerstag';
        break;
    case 5:
        echo 'Freitag';
        break;
    case 6:
        echo 'Samstag';
        break;
    case 7:
        echo 'Sonntag';
        break;
    default:           // optional, falls $tag außerhalb 1–7
        echo 'Ungültiger Tag';
        break;
}

echo "<br>";

// ============================================
//          Erklärung
// ============================================
// 1. switch wertet die Variable $tag aus.
// 2. case prüft jeden möglichen Wert.
// 3. break beendet die switch-Ausführung nach einem Treffer.
// 4. default wird ausgeführt, wenn kein case passt.
// 5. Vorteil: übersichtlicher als viele if-elseif-Anweisungen.
