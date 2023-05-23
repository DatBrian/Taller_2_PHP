<?php

header("Content-Type: application/json; charset=UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

echo json_encode($_DATA, JSON_PRETTY_PRINT);

$suma = (float) array_sum($_DATA);

$prom = (float) $suma / 3;

echo json_encode(["prom" => ($prom <= 3.9) ? "Estudie" : "Becado"], JSON_PRETTY_PRINT);



echo $prom;
?>