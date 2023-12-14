<?php

header("Access-Control-Allow-Origin: *");

include "aircraft.php";
include "airport.php";
include "flight.php";
$departureTime = new DateTime();
$aircraft = new Aircraft("Airbus", "A220-300", 120, 850);
$origin = new Airport("RIX", 56.924, 23.971);
$destination = new Airport("BER", 52.36506274207413, 13.501090112238558);
$flight = new Flight("SA503", $origin, $destination, $departureTime, $aircraft);


echo $flight->getDistance();
echo $flight->getDuration();
echo $flight->calculateLandingTime();