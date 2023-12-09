<?php

include_once "Shape.php";
class Rectangle extends Shape
{
    public $width;
    public $height;
    public $area;
    function __construct($color, $width, $height)
    {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
        $this->area = $this->calculateArea();
    }
    public function calculateArea()
    {
        return $this->width * $this->height;
    }
}