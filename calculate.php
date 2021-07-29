<?php

require_once 'scale.php';

$from_unit = '';
$to_unit = '';
$value = 0.0;

function convert(string $src_unit, string $dst_unit, float $value, array $unit_list): float
{
    $result = 0.0;
    foreach($unit_list as $unit_name => $unit_value)
    {
        if ($src_unit === $unit_name)
        {
            $result = $value * $unit_value;
            
            break;
        }
    }

    foreach($unit_list as $unit_name => $unit_value)
    {
        if ($dst_unit === $unit_name)
        {
            $result = $result * (1 / $unit_value);

            break;
        }

    }
    
    return $result;
}

function temperature(string $src_unit, float $value): float
{
    $result = 0;
    switch($src_unit) {
        case 'kelvin':
            $result = $value - 273.5;
            break;
        case 'fahrenheit':
            $result = (32 * $value - 32) * 5/9;
            break;
        default:
            // temperature is in degree celsius
            $result = $value;
    }

    return $result;
}

function convert_temperature(string $src, string $dst, float $value): float
{
    $std_value = temperature($src, $value);
    $result = 0;
    switch($dst) {
        case 'kelvin':
            $result = $std_value + 273.5;
            break;
        case 'fahrenheit':
            $result = ($std_value * 1.8) / 32 + 32;
            break;
        default:
            $result = $std_value;
    }

    return $result;
}
