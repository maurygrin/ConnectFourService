<?php
require_once ("../play/Board.php");
$strategy = $_GET['strategy'];
$pid = uniqid();
$message = array();

if ((strcasecmp($strategy, "") == 0)) {
    $reason = "Strategy not specified";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} else if (! ((strcasecmp($strategy, "Smart") == 0) || (strcasecmp($strategy, "Random") == 0))) {
    $reason = "Unknown Strategy";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} else {
    $message = array(
        "response" => true,
        "pid" => $pid
    );
    $info = array(
        "pid" => $pid,
        "strategy" => $strategy,
        "board" => "",
        "win" => ""
    );
    file_put_contents("../writable/$pid.txt", json_encode($info));
    $board = $get["board"];
    new Board($board);
}

echo json_encode($message);
?>