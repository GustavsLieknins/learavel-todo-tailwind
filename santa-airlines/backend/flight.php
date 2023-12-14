<?php

class Flight
{
    public $lidojumaKods;
    public $izlidosanasLidosta;
    public $galamerkaLidosta;
    public $izlidosanasDatums;
    public $lidmasina;
    function __construct($lidojumaKods, $izlidosanasLidosta, $galamerkaLidosta, $izlidosanasDatums, $lidmasina)
    {
        $this->lidojumaKods = $lidojumaKods;
        $this->izlidosanasLidosta = $izlidosanasLidosta;
        $this->galamerkaLidosta = $galamerkaLidosta;
        $this->izlidosanasDatums = $izlidosanasDatums;
        $this->lidmasina = $lidmasina;
    }
    function getDistance()
    {
    
            $latitude1 = $this->izlidosanasLidosta->lat;
            $longitude1 = $this->izlidosanasLidosta->long;
            $latitude2 = $this->galamerkaLidosta->lat;
            $longitude2 = $this->galamerkaLidosta->long;
            $deltaLatitude = deg2rad($latitude2 - $latitude1);
            $deltaLongitude = deg2rad($longitude2 - $longitude1);
            $a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2) +
                cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) *
                sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $distance = 6371 * $c;
            return $distance;
    }

    function getDuration()
    {
        $distance = $this->getDistance();
        $flightTimeHours = $distance / $this->lidmasina->videjaisAtrums;
        $flightTimeMinutes = $flightTimeHours * 60;
        $totalTime = $flightTimeMinutes + 30;
        return round($totalTime);
    }

    public function calculateLandingTime() 
    {
        $destinationLat = $this->galamerkaLidosta->lat;
        $destinationLong = $this->galamerkaLidosta->long;
        $minutesToAdd = round($this->getDuration());
        $apiUrl = "https://tu.proti.lv/timezones/?latitude={$destinationLat}&longitude={$destinationLong}";
        $json = file_get_contents($apiUrl);
        $data = json_decode($json, true);
        $newTimeZone = $data["timezones"][0];
        date_default_timezone_set($newTimeZone);
        $landingTime = new DateTime();
        $landingTime->modify("+{$minutesToAdd} minutes");
        return $landingTime->format('Y-m-d H:i:s');
    }
}