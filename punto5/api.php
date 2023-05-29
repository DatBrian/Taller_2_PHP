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

var_dump($_DATA);

$msg = match ($METHOD) {
    "POST" => punto_5::calcular($_DATA),
    default => "Método no permitido"
};

var_dump($msg);

?>