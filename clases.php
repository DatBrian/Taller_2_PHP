<?php

class calcular_notas
{
    public static function calcular(array $array)
    {
        $notas = self::valor_notas($array);
        $msg = ($notas !== false) ? self::proceso($array) : "Notas no válidias";
        return $msg;
    }

    public static function proceso(array $array)
    {
        $suma = (float) array_sum($array);
        $prom = (float) $suma / count($array);
        $msg = self::message($prom);
        $msg .= ", Promedio: " . $prom;
        return $msg;
    }

    public static function message(float $promedio)
    {
        $msg = ($promedio <= 3.9) ? "Estudie" : "Becado";
        return $msg;
    }

    public static function valor_notas(array $notas)
    {
        $notas_V = (array) [];
        foreach ($notas as $nota => $valor) {
            $nota = self::validar($valor);

            $notas_V[] = $nota !== false ? $nota : false;
        }

        return in_array(false, $notas_V, true) ? false : $notas_V;

    }

    public static function validar(string $nota)
    {
        return (is_numeric($nota)) ? (float) $nota : (boolean) false;
    }
}

?>