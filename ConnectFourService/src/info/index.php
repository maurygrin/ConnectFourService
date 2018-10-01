<?php
$strategies = array("Smart" => "SmartStrategy", "Random" => "RandomStrategy");
$info = array("width" => 7, "height" => 6, "strategies" => array_keys($strategies));
echo json_encode($info); 
?>
