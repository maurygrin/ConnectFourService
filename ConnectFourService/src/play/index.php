<?php
/*
 * Mauricio Hidalgo
 * Mark Nunez
 * Programming Assignmet 1
 * PHP
 * CS3360 TR 10:30 - 11:50
 * 10/08/18
 */
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

// Check if there is a pid

if ((strcasecmp($pid, "") == 0)) {
    $reason = "Pid not specified";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} 

// Check if there is a move

else if ((strcasecmp($column, "") == 0)) {
    $reason = "Move not specified";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} 

// Check if the pid match with the given pid from the game 

else if (! file_exists("../writable/$pid.txt")) {
    $reason = "Unknown pid";
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} 

// Check if move is valid

else if ((int) $column < 0 || (int) $column > 6) {
    $reason = "Invalid slot, " . $column;
    $message = array(
        "response" => false,
        "reason" => $reason
    );
} 

// Check for strategy

else {
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