<?php

class Aircraft
{
    public $lidojumaKods;
    public $izlidosanasLidosta;
    public $pasazieruSedvietuSkaits;
    public $videjaisAtrums;
    function __construct($lidojumaKods, $izlidosanasLidosta, $pasazieruSedvietuSkaits, $videjaisAtrums)
    {
        $this->lidojumaKods = $lidojumaKods;
        $this->izlidosanasLidosta = $izlidosanasLidosta;
        $this->pasazieruSedvietuSkaits = $pasazieruSedvietuSkaits;
        $this->videjaisAtrums = $videjaisAtrums;
    }
}