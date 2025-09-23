<?php
/*
* Kleinste von drei Zahlen
*
* Schreibe ein Programm,
* das drei Variablen mit zufälligen Zahlen befüllt.
* Dann soll das Programm testen,
* welcher Zahlenwert der kleinste ist und diesen ausgeben.
*
* Hilfsmittel: rand(), if-elseif-else
*/



$var1 = rand(0,9);
$var2 = rand(0,9);
$var3 = rand(0,9);

if ($var1 <= $var2 && $var1 <= $var3) {
    print "$var1 ist die kleinste Zahl";
} elseif ($var2 <= $var1 && $var2 <= $var3) {
    print "$var2 ist die kleinste Zahl";
} else {
    print "$var3 ist die kleinste Zahl";
}
?>





