<?php

/*
 * Liebingslottozahlen
 *
 * Befülle ein Array mit deinen Liebingslottozahlen
 * und gib sie per foreach als HTML-Liste aus.
 */

$lieblingslottozahlen = ["280312", "223413", "980314", "480315", "488316"];

// HTML-Liste starten
// in PHP mit eine HTML liste starten <ul></ul>
echo "<ul>";

    foreach ($lieblingslottozahlen as $zahl) {
        echo "<li>$zahl</li>";
}

echo "</ul>";