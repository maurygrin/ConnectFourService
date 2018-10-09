<?php
/*
 * Mauricio Hidalgo
 * Mark Nunez
 * Programming Assignmet 1
 * PHP
 * CS3360 TR 10:30 - 11:50
 * 10/08/18
 */
include 'info.php';
$width = 7;
$height = 6;
$strategies = array(
    "Smart",
    "Random"
);

echo (new info($width, $height, $strategies)) -> toJson();

?>