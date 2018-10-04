<?php
class Board{
    const COLUMNS = 7;
    const ROWS = 6;
    private $cells;
    
    public function initializeCells(){
      for ($i = 0; $i < self::COLUMNS; ++$i) {
         $this->cells[$i] = array();
         for ($j = 0; $j < self::ROWS; ++$j) {
              $this->cells[$i][$j] = 2;
         }
        }
    }
    
    public function insertToken($token, $position){
        for ($i = 0; $i < COLUMNS; ++ $i) {
            if (strcasecmp($this->cells[$i][$position], null) == 0) {
                $this->cells[$i][$position] = $token;
                return;
            }
        }
    }
    
    public function reset(){
        $this->initializeCells();
    }
}
?>