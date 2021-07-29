<?php

require_once '../calculate.php';

if (isset($_POST['calculate']))
{
  $from_unit = $_POST['from_unit'];
  $to_unit   = $_POST['to_unit'];
  $value     = $_POST['initialValue'];

  if ($title === 'Temperature')
    $result = convert_temperature($from_unit, $to_unit, $value);
  else
    $result = convert($from_unit, $to_unit, $value, $standard_scale);
}

?>