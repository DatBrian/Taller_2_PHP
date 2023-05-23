<?php

header("Content-Type: application/json; charset=UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

echo json_encode($_DATA, JSON_PRETTY_PRINT);

$msg = match ($METHOD) {
    "POST" => calcular($_DATA),
    default => "Método no permitido",
};

echo $msg;

//FUNCIONES

function calcular(array $array)
{
    $notas = valor_notas($array);
    $msg = ($notas !== false) ? proceso($array) : "Notas no válidas";
    return $msg;
}


function proceso(array $array)
{
    $suma = (float) array_sum($array);
    $prom = (float) $suma / count($array);
    $msg = mensage($prom);
    $msg .= ", Promedio: " . $prom;
    return $msg;
}

function mensage(float $promedio)
{
    $msg = ($promedio <= 3.9) ? "Estudie" : "Becado";
    return $msg;
}

function validar(string $nota)
{
    if (is_numeric($nota)) {
        return (float) $nota;
    } else {
        return false;
    }
}

function valor_notas(array $notas)
{
    $notas_V = (array) [];
    foreach ($notas as $nota => $valor) {
        $nota = validar($valor);

        if ($nota === false) {
            return false;
        }

        $notas_V[] = $nota;
    }
    return $notas_V;
}

?>