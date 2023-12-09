<?php
header("Access-Control-Allow-Origin: *");
include "Rectangle.php";
include "Circle.php";

$Rectangle1 = New Rectangle("Red", 420, 69);
$CirleK = New Circle("Blue", 250, 250, 8.9);

// echo $Rectangle1->calculateArea();

echo json_encode([$Rectangle1, $CirleK]);
// echo json_encode($CirleK);