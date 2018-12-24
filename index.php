<?php
  require("weather_constants.php");
  $filename = "realtime.txt";
  while(!file_exists($filename));
  $file = fopen($filename,"r");
  $rawData = fread($file, filesize($filename));
  fclose($file);
  $splitted = explode(" ", $rawData);
?>

<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Aerotre - Meteo</title>
  </head>

  <body class="night">

    <div class="container">
      <header class="container__header">
        <center>Place</center>
      </header>

<!-- Wind row -->
      <div class="row">
        <div class="box left">

          <div class="content bg-box">
            <p class="text"> <i class="fas fa-wind"></i> </p>
          </div>

          <div class="content bg-box">
            <p class="text splitted" id="wind_speed"><?php echo($splitted[WIND_AVERAGE_SPEED]); ?><span class="unit" id="wind_speed_unit"><?php echo($splitted[WIND_UNIT]); ?></span></p>
            <p class="text splitted" id="wind_speed_beaufort"><?php echo($splitted[WIND_BEAUFORT]); ?><span class="unit" id="wind_speed_unit">Beaufort</span></p>
          </div>

        </div>
        <div class="box right">

          <div class="content bg-box">
            <p class="text splitted" id="wind_direction_word"><?php echo($splitted[WIND_DIRECTION_COMPASS]); ?></p>
            <p class="text splitted" id="wind_direction_degree"><?php echo($splitted[WIND_DIRECTION_DEG]); ?>&deg;</p>
          </div>

          <div class="content bg-box">
            <p class="text"><i class="far fa-compass"></i></p>
          </div>

        </div>
      </div>

<!-- Temperature row -->

      <div class="row">
        <div class="box left">

          <div class="content bg-box">
            <p class="text"><i class="fas fa-temperature-low"></i> </p>
          </div>

          <div class="content bg-box">
            <p class="text" id="temp_value"><?php echo($splitted[TEMP_OUT]); ?><span class="unit" id="temp_unit">&deg;<?php echo($splitted[TEMP_UNIT]); ?></span></p>
          </div>

        </div>

        <div class="box right">

          <div class="content bg-box">
            <p class="text" id="temp_trend"><?php echo($splitted[TEMP_TREND]);?><span class="unit" id="temp_unit">&deg;<?php echo($splitted[TEMP_UNIT]); ?></span></p>
          </div>

          <div class="content bg-box">
            <p class="text"><i class="fas <?php echo(($splitted[TEMP_TREND] >= 0)?"fa-arrow-up":"fa-arrow-down"); ?>"></i></p>
          </div>

        </div>
      </div>

<!-- Pressure row -->

      <div class="row">

        <div class="box left">

          <div class="content bg-box">
            <p class="text"><i class="fas fa-tachometer-alt"></i></p>
          </div>

          <div class="content bg-box">
            <p class="text" id="press_value"><?php echo($splitted[PRESS]);?><span class="unit" id="press_unit"><?php echo($splitted[PRESS_UNIT]);?></span></p>
          </div>

        </div>

        <div class="box right">

          <div class="content bg-box">
            <p class="text"><?php echo($splitted[PRESS_TREND]);?><span class="unit" id="press_unit"><?php echo($splitted[PRESS_UNIT]);?></span></p>
          </div>

          <div class="content bg-box">
            <p class="text"><i class="fas <?php echo(($splitted[PRESS_TREND] >= 0)?"fa-arrow-up":"fa-arrow-down"); ?>"></i></p>
          </div>

        </div>

      </div>

<!-- Rain-Humidity row -->

      <div class="row">

        <div class="box left">

          <div class="content bg-box">
            <p class="text"><i class="fas fa-cloud-rain"></i></p>
          </div>

          <div class="content bg-box">
            <p class="text" id="rain_value"><?php echo($splitted[RAIN_CURRENT_RATE]);?><span class="unit" id="rain_unit"><?php echo($splitted[RAIN_UNIT]."/hr");?></span></p>
          </div>

        </div>

        <div class="box right">

          <div class="content bg-box">
            <p class="text" id="hum_value"><?php echo($splitted[HUM_REL]); ?><span class="unit" id="hum_unit">&percnt;</span></p>
          </div>

          <div class="content bg-box">
            <p class="text"><i class="fas fa-tint"></i></p>
          </div>

        </div>

      </div>

      <div class="box fill bg-box">

        <div class="content half">
          <p class="text"><i class="far fa-clock"></i></p>
        </div>
        <div class="content half">
          <div class="responsive">
            <p class="text" id="time_contact">Dati del: <?php echo($splitted[DATE]); ?> alle ore <?php echo($splitted[TIME]) ?></p>
          </div>
        </div>
      </div>

    </div>

    <div class="bg-night"></div>
  </body>
</html>
