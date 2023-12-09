<?php

include_once "Rectangle.php";
class Circle extends Rectangle
{
    public $radius;
    public $area;
    function __construct($color, $width, $height,$radius)
    {
        parent::__construct($color, $width, $height);
        $this->radius = $radius;
        $this->area = $this->calculateArea();
    }
    public function calculateArea()
    {
        return 3.14159265359 * ($this->radius * $this->radius);
    }
}