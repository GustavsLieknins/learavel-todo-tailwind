<?php

class Airport
{
    public $lidostasIATA;
    public $lat;
    public $long;
    function __construct($lidostasIATA, $lat, $long)
    {
        $this->lidostasIATA = $lidostasIATA;
        $this->lat = $lat;
        $this->long = $long;
    }
}