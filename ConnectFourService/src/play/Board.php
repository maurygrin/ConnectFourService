<?php
/*
 * Mauricio Hidalgo
 * Mark Nunez
 * Programming Assignmet 1
 * PHP
 * CS3360 TR 10:30 - 11:50
 * 10/08/18
 */
class Board
{

    public $board;

    public $user = "0";

    public $server = "1";

    public $WIDTH = 7;

    public $HEIGHT = 6;

    public $win = array();
    
    public $count;

    public function __construct($b)
    {
        if (strcasecmp($b, "") == 0) {
            $this->board = array();
            for ($i = 0; $i < 6; $i ++) {
                $this->board[$i] = array();
                for ($j = 0; $j < 7; $j ++) {
                    $this->board[$i][$j] = "#";
                }
            }
        } else {
            $this->board = $b;
        }
    }

    public function writeInfo($pid)
    {
        $get = json_decode(file_get_contents("../writable/$pid.txt"), true);
        $strategy = $get["strategy"];
        $info = array(
            "pid" => $pid,
            "strategy" => $strategy,
            "board" => $this->board,
            "win" => ""
        );
        file_put_contents("../writable/$pid.txt", json_encode($info));
    }

    public function getBoard($pid)
    {
        $info = json_decode(file_get_contents('../writable/' . $pid . '.json'));
        $b = new self();
        $b->board = $info["board"];
        $b->win = $info["win"];
        return $b;
    }

    public function insertToken($token, $position)
    {
        for ($i = 6; $i >= 0; $i --) {
            if (strcasecmp($this->board[$i][$position], "#") != 0) {
                $this->board[$i][$position] = $token;
            }
        }
    }

    public function checkFlag($position)
    {
        if (strcmp($this->board[0][$position], "#") == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDraw()
    {
        for ($i = 0; $i < 6; $i ++) {
            for ($j = 0; $j < 7; $j ++) {
                if (strcasecmp($this->board[$i][$j], "#") == 0) {
                    return false;
                }
            }
        }
        return true;
    }

    public function checkWin()
    {
        return false;
    }
}
?>