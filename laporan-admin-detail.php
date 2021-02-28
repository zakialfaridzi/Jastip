<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {

    ?>
<!doctype html>

<html class="no-js" lang="">
<head>

    <title>HelloWorld - Laporan</title>


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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->

  <?php include_once 'includes/sidebar.php';?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once 'includes/header.php';?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="laporan-admin.php">Admin Laporan</a></li>
                                    <li class="active">Admin Laporan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">



                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Laporan</strong>
                        </div>
                        <div class="card-body">
                            <?php
$fdate = date_format($_POST["fromdate"], "%d-%M-%Y, %h:%i:%s");
    $tdate = date_format($_POST['todate'], "%d-%M-%Y, %h:%i:%s");

    ?>
<h5 align="center" style="color:blue">Laporan Penjualan</h5>
                             <table class="table">
                <thead>
                    <tr>
                        <tr>
                            <th>NO</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal Pembelian</th>
                            <th>Nama Pembeli</th>
                            <th>Merk</th>
                            <th>Action</th>
                        </tr>
                    </tr>
                </thead>
               <?php
$ret = mysqli_query($con, "select * from vprint where date(tanggal_beli) between '$fdate' and '$tdate'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {

        ?>

                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['IDtransaksi']; ?></td>
                  <td><?php echo $row['tanggal_beli']; ?></td>
                  <td><?php echo $row['nama_pembeli']; ?></td>
                  <td><?php echo $row['KategoriBarang']; ?></td>

                  <td><a href="view-pesananmasuk.php?viewid=<?php echo $row['IDtransaksi']; ?>">View</a></td>
                </tr>
                <?php
$cnt = $cnt + 1;
    }?>
              </table>

                    </div>
                </div>
            </div>



        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include_once 'includes/footer.php';?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }?>