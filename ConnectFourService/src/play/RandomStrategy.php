 <?php
require_once ("../play/Board.php");

class RandomStrategy
{
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