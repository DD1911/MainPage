<?php

/*
 * Reiseziele
 *
 * Fülle ein Array mit deinen fünf Lieblingsreisezielen
 * und gib diese durchnummeriert aus.
 *
 * Hilfsmittel: Array, foreach
 */

$nummer = 1;

$MLRZ = ["Granada","Sevilla","Mallorca","Fuerteventura","Genf"];

foreach ($MLRZ as $ziel) {
    echo $nummer . ": " . $ziel . ", ";
    $nummer ++;
}