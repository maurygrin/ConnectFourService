<?php
require_once ("../play/Board.php");
class SmartStrategy {
    public $X;
    //public $board;
    
    public function __construct($board){
        $this -> X = randomX();
    }
    
    public function randomX() {
        $slotX = rand(0,6);
        return $slotX;
    }
}
?>