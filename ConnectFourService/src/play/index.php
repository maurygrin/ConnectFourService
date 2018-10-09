<?php
require_once ("../play/Board.php");
require_once ("../play/RandomStrategy.php");

$pid = $_GET['pid'];
$column = $_GET['move'];
$info = json_decode(file_get_contents("../writable/$pid.txt"), true);
$pid2 = $info["pid"];
$strategy = $info["strategy"];
$response = false;
$isWin = false;
$isDraw = false;
if ((strcasecmp($pid, "") == 0)) {
    $reason = "Pid not specified";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} else if ((strcasecmp($column, "") == 0)) {
    $reason = "Move not specified";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} else if (! file_exists("../writable/$pid.txt")) {
    $reason = "Unknown pid";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} else if ((int) $column < 0 || (int) $column > 6) {
    $reason = "Invalid slot, " . $column;
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} else {
    if ((strcasecmp($strategy, "random") == 0)) {
        $b = $info["board"];
        $board = new Board($b);
        $xrand = RandomStrategy::getRandomX($board);
        $board->insertToken("0", $column);
        $board->insertToken("1", $xrand);
        $message = array(
            "response" => true,
            "ack_move" => array(
                "slot" => $column,
                "isWin" => $isWin,
                "isDraw" => $isDraw,
                "row" => array()
            ),
            "move" => array(
                "slot" => "$xrand",
                "isWin" => $isWin,
                "isDraw" => $isDraw,
                "row" => array()
            )
        );
        $board->writeInfo($pid);
    } else {
        $message = $strategy;
    }
}
echo json_encode($message);
?>