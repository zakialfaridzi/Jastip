<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
error_reporting(0);
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {?>



<!doctype html>

 <html class="no-js" lang="">
<head>

    <title>HelloWorld - Dashboard</title>


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>

   <?php include_once 'includes/sidebar.php';?>

        <?php include_once 'includes/header.php';?>

<!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
<!-- card yang kecil multiple -->
<div class="card-deck">
  <div class="card">
    <img src="images/www.png" height="200px;" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">HelloWorld</h5>
      <p class="card-text">Apa itu HelloWorld? Kita adalah sebuah perantara penyedia jastip secara global!</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Terakhir di update 5 menit yang lalu</small>
    </div>
  </div>

  <div class="card">
    <img src="images/jst6.png" height="200px;" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Apa bisa menitip barang besar seperti furniture?</h5>
      <p class="card-text">Oh jelas bisa dong HelloWorld gituloh.</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Terakhir di update 10 menit yang lalu</small>
    </div>
  </div>

  <div class="card">
    <img src="images/jst5.jfif" height="200px;" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">HelloWorld? Startup material?</h5>
      <p class="card-text">Doain kami jadi startup ya! hehe</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Terakhir di update 15 menit yang lalu</small>
    </div>
  </div>
</div>

<!-- card yang panjang -->
                <center>
                <br><br>
                <div class="card mb-3" style="width: 1200px;">
                    <a href="nitip.php"><img src="images/jst.jpg" width="300px" height="380px" class="card-img-top" alt="gambar jastip"></a>
                    <div class="card-body">
                        <a href="nitip.php"><h5 class="card-title">Menitip dan Membuka Titipan Barang!</h5></a>
                        <p class="card-text">
                        Disini kamu bisa loh kalau mau bikin penitipan dan menitip pada suatu penitipan barang secara spesifik. Efficient shopping with us!
                        </p>
                        <p class="card-text"><small class="text-muted">Terakhir di update 15 menit yang lalu</small></p>
                    </div>
                </div>
                <div class="card mb-3" style="width: 1200px;">
                    <a href="nitip.php"><img src="images/jst3.jpg" width="300px" height="380px" class="card-img-top" alt="gambar jastip"></a>
                    <div class="card-body">
                        <a href="nitip.php"><h5 class="card-title">Menitip dan Membuka Jasa Penitipan Barang</h5></a>
                        <p class="card-text">
                        Disini kamu juga bisa kalau ingin membuka suatu jastip ke suatu negara atau kota, try your luck with us!
                        </p>
                        <p class="card-text"><small class="text-muted">Terakhir di update 25 menit yang lalu</small></p>
                    </div>
                </div>
                </center>

                </div>
                <!-- /Widgets -->

            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
       <?php include_once 'includes/footer.php';?>




    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>
</body>
</html>
<?php }?>