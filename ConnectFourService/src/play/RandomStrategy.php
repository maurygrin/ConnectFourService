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

class RandomStrategy
{
    
    // Returns a random value
    
    public function getRandomX($board)
    {
        $flag = false;
        while ($flag == false) {
            $slotX = rand(0, 6);
            $flag = $board->checkFlag($slotX);
        }
        return $slotX;
    }
}
?>