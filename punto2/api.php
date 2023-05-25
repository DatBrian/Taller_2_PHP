<?php

header("Content-Type: application/json; charset=UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function nyAutoload($class)
{
    require __DIR__ . '/clases.php';
}
spl_autoload('myAutoload');

echo json_encode($_DATA, JSON_PRETTY_PRINT);

?>