<?php

require_once '../scale.php';

$title = $_GET['title'];

switch($title) {
  case 'Area':
    $standard_scale = SQ_METERS;
    $options = [
      'square inch',
      'square yard',
      'square millimeter',
      'square centimeter',
      'square meter',
      'square kilometer'
      ];
    break;
  case 'Distance':
    $standard_scale = METERS;
    $options = [
      'inch',
      'yard',
      'millimeter',
      'centimeter',
      'meter',
      'kilometer'
      ];
    break;
  case 'Speed':
    $standard_scale = METERS_PER_SECOND;
    $options = [
      'meters per second',
      'kilometers per hour',
      'kilometers per minute',
      'kilometers per second',
      'meters per hour',
      'meters per minute'
    ];
    break;
  case 'Time':
    $standard_scale = SECONDS;
    $options = [
      'milliseconds',
      'microseconds',
      'seconds',
      'minutes',
      'hour',
      'day',
      'year'
    ];
    break;
  case 'Temperature':
    $options = [
      'kelvin',
      'fahrenheit',
      'degree celsius'
    ];
    break;
  default:
      echo 'Something went wrong';
}

require_once 'postValues.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $title; ?> convertor</title>
  <link rel="stylesheet" href="../style.css">
  <script type="text/javascript" src="../script.js"></script>
</head>
<body>
  <div class="content">
    <div class="title"><?= $title; ?> Conversion</div>
    <div class="container">
    <form action=".\form.php?title=<?= $title; ?>" method="POST">
      <div class="select-group">
        <div class="label">From</div>
        <select name="from_unit" id="source" onchange="selectInput()">
          <option value=""></option>
          <?php
          
          foreach($options as $option_name)
          {
            $option = str_replace(' ', '_', $option_name);
            
            echo "<option value={$option}";
            
            if ($from_unit === $option)
              echo " selected";
            
            echo ">{$option_name}</option>";
          }

          ?>
          </select>
          <div class="input-select" id="inputSelect">
            <input id="inputValues" type="number" step="0.01" name="initialValue">
          </div>
        </div>
      <div class="row-2">
        <div class="label">To</div>
        <select name="to_unit" id="units">
        <?php
        
        foreach($options as $option_name)
        {
          $option = str_replace(' ', '_', $option_name);
          
          echo "<option value={$option}";

          if ($to_unit === $option)
            echo " selected";

          echo ">{$option_name}</option>";
        }
        
        ?>          
        </select>
      </div>
      <div>
        <small><?= $result ?? 0; ?></small>
      </div>
      <div class="calculate row-2">
      <input type="submit" name="calculate" value="calculate" id="calculate" />
      </div>
    </form>
    </div>
    <a class="back-home" href="../index.php">Choose a different unit</a>
  </div>
</body>
</html>