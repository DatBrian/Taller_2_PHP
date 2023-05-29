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

            $notas_V[] = ($nota !== false) ? $nota : false;
        }

        return in_array(false, $notas_V, true) ? false : $notas_V;

    }

    public static function validar(string $num)
    {
        return (is_numeric($num)) ? (float) $num : (boolean) false;
    }
}

class punto_2 extends calcular_notas
{

    public static function calcular(array $array):string
    {
        $num = $array["number"];
        $num = self::validar($num);
        $msg = self::proceso_2($num);
        return $msg;
    }

    public static function proceso_2(float $num):string
    {   
        $msg = ($num == 10) ? "El número es par y es igual a 10" : self::validate($num);
        
        return $msg;
    }

    public static function validate(float $num): string{
        $par;
        $mayor;
        $num % 2 == 0 ? $par = "es par" : $par = "es impar";
        $num > 10 ? $mayor = "es mayor a 10" : $mayor = "es menor a 10";

        $msg = "El número $par y $mayor";

        return $msg;
    }
}

class punto_3 extends calcular_notas
{

    public static function calcular(array $array):string
    {
        $notas = self::valor_notas($array);
        $msg = ($notas !== false) ? self::proceso_3($notas) : "Notas no válidias";
        return $msg;
    }

    public static function proceso_3(array $array):string
    {
        $res = $array[0];
        $cor = $array[1];
        $vol = $res * $cor;
        $msg = "El voltaje es: $vol (v)";
        return $msg;
    }
}

class punto_4 extends calcular_notas
{

    public static function calcular(array $array)
    {
        $nombreM = "";
        $mayor = 0;
        for ($i = 1; $i <= 3; $i++) {
            $nombre = "nameP" . $i;
            $edad = "edadP" . $i;

            if ($array[$edad] > $mayor) {
                $mayor = $array[$edad];
                $nombreM = $array[$nombre];
            }
        }

        $msg = "La persona mayor es: " . $nombreM;
        return $msg;
    }
}

class punto_5 extends calcular_notas
{
    public static function calcular(array $array)
    {
        $nums = self::valor_notas($array);
        $msg = ($nums !== false) ? self::proceso_5($nums) : "Notas no válidias";
        return $msg;
    }

    public static function proceso_5($nums)
    {

        $msg = ($nums[0] > $nums[1]) ? "La suma es: " . ($nums[0] + $nums[1]) . " y la diferencia es: " . ($nums[0] - $nums[1])
            : "El producto es: " . ($nums[0] * $nums[1]) . " y la división es: " . ($nums[0] / $nums[1]);

        return $msg;
    }
}

?>