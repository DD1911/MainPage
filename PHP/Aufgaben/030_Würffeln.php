<?php
/*
* Würfeln
*
* Würfel eine Zahl (von 1 bis 6) und gib aus,
* was gewürfelt wurde:
* Super, eine 6!
* Immerhin noch eine 5!
* Das reicht nicht! (bei 1-4)
*/



$würfel = rand(1, 6);

if ($würfel == 6) {
    print "Super, eine 6!";
} elseif ($würfel == 5) {
    print "Immerhin noch eine 5!";
} else {
    print "Das reicht nicht!";
}
?>


