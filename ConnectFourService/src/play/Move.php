<?php

class Move{
    public $pos;
    public $isWin;
    public $isDraw;
    public $row;
    
    public $posCPU;

    
    function winningMove(){

    }
    
    
    
    
    function makePlayerMove($int){
        $this -> pos = $int;
        $this -> isWin = false;
        $this -> isDraw = false;
        if ($this -> isWin == false && $this -> isDraw == false ){
            $this -> row = [];
        }
    }
    
    function makeOpponentMove(){        
        $this -> posCPU = 1;
        $this -> isWin = false;
        $this -> isDraw = false;
        if ($this -> isWin == false && $this -> isDraw == false ){
            $this -> row = [];
        }
    }
}
$slot = $_GET['move'];
$playerMove = makePlayerMove($slot);  // instance of Move
if ($playerMove->isWin || $playerMove->isDraw) {
    echo createResponse($playerMove); exit;
}
$opponentMove = makeOpponentMove(); // instance of Move
echo createResponse($playerMove, $opponentMove);
function createResponse($playerMove, $opponentMove = null) {
    $result = array("response" => true, "ack_move" => $playerMove);
    if ($opponentMove != null) { $result["move"] = $opponentMove; }
    return json_encode($result);
}
?>