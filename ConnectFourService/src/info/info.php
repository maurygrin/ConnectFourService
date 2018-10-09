<?php

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