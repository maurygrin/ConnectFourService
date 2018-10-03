<?php
include "Move.php";
// include 'RandomStrategy.php';

$info = file_get_contents('../writable/playerInfo.json');
$id = $_GET['pid'];
$column = $_GET['move'];
$fil = preg_split("/[\":]/", $info);
$response = false;
$isWin = false;
$isDraw = false;
$xrand = rand(0, 6);
if ((strcasecmp($id, "") == 0)) {
    $reason = "Pid not specified";
    echo json_encode(array(
        "response" => $response,
        "reason" => $reason
    ));
} else if ((strcasecmp($column, "") == 0)) {
    $reason = "Move not specified";
    echo json_encode(array(
        "response" => $response,
        "reason" => $reason
    ));
} else if ((strcasecmp($id, $fil[1]) != 0)) {
    $reason = "Unknown pid";
    echo json_encode(array(
        "response" => $response,
        "reason" => $reason
    ));
} else {
    if ((strcasecmp($fil[2], "Random") == 0)) {
        $response = true;
        // echo ("{response: true, ack_move: {slot: 3,isWin: false,isDraw: false,row: []},move: {slot: 4,isWin: false,isDraw: false,row: []}}");
        echo json_encode(array(
            "response" => $response,
            "ack_move" => array(
                "slot" => $column,
                "isWin" => $isWin,
                "isDraw" => $isDraw,
                "row" => array()
            ),
            "move" => array(
                "slot" => $xrand,
                "isWin" => $isWin,
                "isDraw" => $isDraw,
                "row" => array()
            )
        ));
    }
}
?>

