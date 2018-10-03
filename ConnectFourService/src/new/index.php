<?php

define('STRATEGY', 'strategy');

$strategy = $_GET[STRATEGY];
$response = false;
$pid = uniqid();

if ((strcasecmp($strategy, "") == 0)){   
    $reason = "strategy not specified";
    echo json_encode(array("response" => $response, "reason" => $reason));
}
else if (!((strcasecmp($strategy, "smart") == 0) || (strcasecmp($strategy, "random") == 0))){
    $reason = "Unknown Strategy";
    echo json_encode(array("response" => $response, "reason" => $reason));
}
else {
    $response = true;
    file_put_contents("../writable/playerInfo.json",json_encode($pid.":".$strategy));
    echo json_encode(array("response" => $response, "pid" => $pid));
}
?>