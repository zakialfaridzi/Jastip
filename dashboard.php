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

    <title>HelloWorld - Admin Dashboard</title>


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

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


        <div class="content">

            <div class="animated fadeIn">

                <div class="row">
                <?php
$query = mysqli_query($con, "select IDtransaksi from tbltransaksi where date(tanggal_beli)=CURDATE();");
    $barangskrg = mysqli_num_rows($query);
    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body3">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                    <i><img src="images/itembag.png"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $barangskrg; ?></span></div>
                                            <div class="stat-heading">Entry Jastip Hari Ini</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php
$query1 = mysqli_query($con, "select IDtransaksi from tbltransaksi where date(tanggal_beli)-1;");
    $barangkmrn = mysqli_num_rows($query1);
    ?>
                        <div class="card">
                            <div class="card-body3">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                    <i><img src="images/itembag.png"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $barangkmrn ?></span></div>
                                            <div class="stat-heading">Entry Jastip Kemarin</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php
$query2 = mysqli_query($con, "select IDtransaksi from tbltransaksi where date(tanggal_beli)-7;");
    $barangseminggu = mysqli_num_rows($query2);
    ?>
                        <div class="card">
                            <div class="card-body3">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                    <i><img src="images/itembag.png"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $barangseminggu ?></span></div>
                                            <div class="stat-heading">Entry Jastip 7 Hari Terakhir</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php
$query3 = mysqli_query($con, "select IDtransaksi from tbltransaksi");
    $barangtotal = mysqli_num_rows($query3);
    ?>
                        <div class="card">
                            <div class="card-body3">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                    <i><img src="images/itembag.png"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                        <div class="stat-text"><span class="count"><?php echo $barangtotal ?></span></div>
                                            <div class="stat-heading">Total Entry Jastip</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        <div style="width: 500px;margin: 0px auto;">
        <center><h4>Kategori Terlaris</h4></center>
        <canvas id="myChart"></canvas>

    </div>

    <br/>
    <br/>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    <?php
$kategori = mysqli_query($con, "select * from tblcategory");
    while($row = mysqli_fetch_array($kategori)){?>
                "<?php echo $row['KategoriBarang'];?>",
    <?php }?>
                ],
                datasets: [{
                    label: '',
                    data: [
                    <?php
                    $kat = mysqli_query($con, "select * from tblcategory");
                    while ($rut = mysqli_fetch_array($kat)) { ?>
                    <?php $cat = $rut['KategoriBarang'];
                        $jumlah_teknik = mysqli_query($con, "select * from vprint where KategoriBarang='$cat'");
                        echo mysqli_num_rows($jumlah_teknik); ?>,
                    <?php }
    ?> ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>


<div style="width: 500px;margin: 0px auto;">
        <center><h4>Negara Paling Banyak Jasa Titip</h4></center>
        <canvas id="myChart2"></canvas>
    </div>

    <br/>
    <br/>

    <script>
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    <?php
$kategori = mysqli_query($con, "select distinct negara from tblbarang");
    while($row = mysqli_fetch_array($kategori)){?>
                "<?php echo $row['negara'];?>",
    <?php }?>
                ],
                datasets: [{
                    label: '',
                    data: [
                    <?php
                    $negara = mysqli_query($con, "select distinct negara from tblbarang");
                    while ($rot = mysqli_fetch_array($negara)) { ?>
                    <?php $neg = $rot['negara'];
                        $jumlah_teknik = mysqli_query($con, "select negara from tblbarang where negara='$neg'");
                        echo mysqli_num_rows($jumlah_teknik); ?>,
                    <?php }
    ?>
                    
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

    <div style="width: 500px;margin: 0px auto;">
        <center><h4>Kota Paling Banyak Jasa Titip</h4></center>
        <canvas id="myChart3"></canvas>

    </div>

    <br/>
    <br/>

    <script>
        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    <?php
$city = mysqli_query($con, "select distinct kota from tbljasa");
    while($row = mysqli_fetch_array($city)){?>
                "<?php echo $row['kota'];?>",
    <?php }?>
                ],
                datasets: [{
                    label: '',
                    data: [
                    <?php
                    $kota = mysqli_query($con, "select distinct kota from tbljasa");
                    while ($rot = mysqli_fetch_array($kota)) { ?>
                    <?php $kot = $rot['kota'];
                        $jumlah_teknik = mysqli_query($con, "select kota from tbljasa where kota='$kot'");
                        echo mysqli_num_rows($jumlah_teknik); ?>,
                    <?php }
    ?>  
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
                </div>

            </div>

        </div>

        <div class="clearfix"></div>

       <?php include_once 'includes/footer.php';?>




    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <script type="text/javascript" src="chartjs/Chart.js"></script>
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



</body>
</html>
<?php }?>