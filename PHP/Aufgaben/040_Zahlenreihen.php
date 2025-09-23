<?php
/* * * Zahlenreihen ** */

/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
* 1 2 3 4 5
*/
for ($i = 1; $i <= 5; $i++) {
    print $i . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* 100 90 80 70 60 50 40 30 20 10
*/
for ($c = 100; $c >= 10; $c-= 10) {
    print $c . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* 2000 3000 4000 5000 6000
*/
for ($t = 2000; $t <= 6000; $t += 1000) {
    print $t . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* 2 1.5 1 0.5 0 -0.5 -1
*/
for ($g = 2; $g >= -1; $g -= 0.5) {
    print $g . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* 1 2.2 3.4 4.6 5.8 7 8.2 9.4
*/
for ($u = 1; $u <= 9.4; $u += 1.2) {
    print $u . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* 13 17 21 25 29
*/
for ($d = 13; $d <= 29; $d += 4) {
    print $d . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* Z5 Z7 Z9 Z11 Z13
*/
for ($z = 5; $z <= 13; $z += 2) {
    print 'Z' . $z . ' ';
}
print '<br>';
/*
* Schreibe eine for-Schleife, die Folgendes ausgibt:
* a2b3 a12b13 a22b23
*/
for ($a = 2; $a <= 22; $a += 10) {
    $b = $a + 1;
    print 'a' . $a . 'b' . $b . ' ';
}

print '<br>';
/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
* 1 2 3 4 5 6 8 9 10
*/
for ($e = 1; $e <= 10; $e += 1) {
    print $e . ' ';
}
print '<br>';
/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
* 13 17 21 /29 33 37 / 45
*/
for ($x = 0; $x <= 6; $x++) {
    if ($x < 3) {
        print 13 + $x * 4 . ' ';
    } elseif ($x < 6) {
        print 29 + ($x - 3) * 4 . ' ';
    } else {
        print 45;
    }
}
print '<br>';
/*
* Schreibe ein Programm, das per for-Schleife
* alle Zahlen von 1 bis 20 addiert
* und danach das Endergebnis ausgibt.
*/
//Ich brauch eine zweite variable summe um zu addieren.
$summe = 0;

for ($y = 1; $y <= 20; $y++) {
    $summe += $i;
}
print "Die Summe von 1 bis 20 ist: $summe";
print '<br>';

/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
* 1 2 3 4 5 4 3 2 1
* - - - - - 6 7 8 9
*/

for ($z = 1; $z <= 9; $z++) {
    if ($z <= 5) {
        print $z . ' ';
    } else {
        print (10 - $z) . ' ';
    }
}

print '<br>';


/*
* Schreibe ein Programm, das mit EINER for-Schleife
* alle natürlichen Zahlen von 1 bis 39 sowie 61 bis 100
* (jeweils einschließlich) der Größe nach ausgibt.
* 1 2 3 4 ..... 36 37 38 39 61 62 63 64 ... 97 98 99 100
*/
for ($d = 1; $d <= 79; $d++) {
    if ($d <= 39) {
        print $d . ' ';
    } else {
        print ($d + 21) . ' ';
    }
}

print '<br>';