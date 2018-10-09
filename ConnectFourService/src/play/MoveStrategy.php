<?php

include 'SmartStrategy.php';
include 'RandomStrategy.php';

abstract class MoveStrategy
{

    public function inf($pid)
    {
        $info = json_decode(file_get_contents('../writable/' . $pid . '.json'));
        
        if($info["strategy"] == "smart"){
            new SmartStrategy();
        }
        else{
            new RandomStrategy();
        }
    }
}
?>