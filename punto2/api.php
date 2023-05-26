<?php

header("Content-Type: application/json; charset=UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function myAutoload($class)
{
    $ruta = dirname(__DIR__);
    require $ruta . '/config/methods.php';
}

spl_autoload_register('myAutoload');

echo json_encode($_DATA, JSON_PRETTY_PRINT);

$msg = match($METHOD){
    "POST" => punto_2::calcular($_DATA),
    default => "Método no permitido"
};

echo ($msg);

?>