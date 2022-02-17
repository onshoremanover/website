<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="audio.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="topnav">
      <a href="/">Home</a>
      <a href="/podcast/">Podcast</a>
      <a href="/podcast/feed.xml">Feed</a>
      <a href="/cornerblog/">Cornerblog</a>
      <a href="/html/mili.html">Mili</a>
      <a href="/me/index.html">Me</a>
      <a class="active" href="/podcast/">Time</a>
  </div>

<?php

//Calculate Today Progression
$H_now = date('H');

$pro_today = $H_now/24*100;

$pro_today = round($pro_today,1);

//Calulate Week Progression
$d_o_w = date('w');

//Sontag
if ($d_o_w==0) {
  $d_o_w = 7;
}

$deja_h = ($d_o_w-1)*24;

$pro_week = ($deja_h+$H_now)/(7*24)*100;

$pro_week = round($pro_week,1);

//Calculate Month Progression
$d_o_m = date('d');
$total_d_o_m = date('t');

$pro_month = $d_o_m/$total_d_o_m*100;

$pro_month = round($pro_month,1);

//Calculate Year Progression
$day_of_year = date('z') + 1;

$pro_year = $day_of_year/365*100;

$pro_year = round($pro_year,1);

//Calulate Life Progression
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $dob = $_POST["dob"];
}

function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}


$date = date("Y-m-d");

$diff = dateDiffInDays($date, $dob);

$pro_life = ($diff/(83*365))*100;

$pro_life = round($pro_life,1);

?>



  <div class="hauptbehaelter">

    </section>
    <section class="padding-lr20" class="center">
        <h2>Progression</h2>

        <form action="" method="post">
          <label for="start">Date of Birth:</label><br>

          <input type="date" id="dob" name="dob"
            min="1920-01-01" max="2021-12-31"><br>
          <input type="submit">
        </form><br>

        <div class="container">
          <p>Today</p>
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped
              active" role="progressbar" aria-valuenow="<?= $pro_today?>" aria-valuemin="0"
              aria-valuemax="100" style="width:<?= $pro_today?>%">
              <?= $pro_today ?>%
            </div>
          </div>
          <p>Week</p>
          <div class="progress">
            <div class="progress-bar progress-bar-info progress-bar-striped
              active" role="progressbar" aria-valuenow="<?= $pro_week?>" aria-valuemin="0"
              aria-valuemax="100" style="width:<?= $pro_week?>%">
              <?= $pro_week?>%
            </div>
          </div>
          <p>Month</p>
          <div class="progress">
            <div class="progress-bar progress-bar-warning progress-bar-striped
              active" role="progressbar" aria-valuenow="<?= $pro_month?>" aria-valuemin="0"
              aria-valuemax="100" style="width:<?= $pro_month?>%">
              <?= $pro_month?>%
            </div>
          </div>
          <p>Year</p>
          <div class="progress">
            <div class="progress-bar progress-bar-danger progress-bar-striped
              active" role="progressbar" aria-valuenow="<?= $pro_year?>" aria-valuemin="0"
              aria-valuemax="100" style="width:<?= $pro_year?>%">
              <?= $pro_year ?>%
            </div>
          </div>
          <p>Life</p>
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped
              active" role="progressbar" aria-valuenow="<?= $pro_life?>" aria-valuemin="0"
              aria-valuemax="100" style="width:<?= $pro_life?>%">
              <?= $pro_life?>%
          </div>
        </div>
      </div>
    </div>
</body>

</html>
