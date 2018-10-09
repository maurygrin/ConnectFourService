<?php
/*
 * Mauricio Hidalgo
 * Mark Nunez
 * Programming Assignmet 1
 * PHP
 * CS3360 TR 10:30 - 11:50
 * 10/08/18
 */
class info
{

    public $width;

    public $height;

    public $strategies;

    public function __construct($width, $height, $strategies)
    {
        $this->width = $width;
        $this->height = $height;
        $this->strategies = $strategies;
    }

    public function toJson()
    {
        return json_encode($this);
    }
}

?>