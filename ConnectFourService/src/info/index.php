<?php
include 'info.php';
$width = 7;
$height = 6;
$strategies = array(
    "Smart",
    "Random"
);

echo (new info($width, $height, $strategies))->toJson();
?>