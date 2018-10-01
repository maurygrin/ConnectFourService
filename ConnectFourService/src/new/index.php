<?php
//File: new/index.php
require_once '../common/constants.php';
require_once '../common/utils.php';
require_once '../play/Game.php';

$game= new Game($strategy);
$pid = uniqid();
$file = DATA_DIR . $pid . DATA_EXT;
if (storeState($file, $game->toJsonString())) {
    echo json_encode(array("response" => true, PID => $pid));
} 
else {
    echo createResponse("Failed to store game data");
}
//class Game {
//}
?>