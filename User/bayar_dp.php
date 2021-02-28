<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['cancel'])) {
        $idtr = $_GET['cancel'];
        $upd = mysqli_query($con, "UPDATE tbltransaksi set status='canceled', tanggal_terima =null where IDtransaksi='$idtr'");
        if ($upd) {
            echo "<script>alert('Pesanan sudah dibatalkan');</script>";
            header("location:laporan-pembelian.php");
        } else {
            echo "<script>alert('Ada yang salah');</script>";

        }
    }

    ?>
<!doctype html>

<html class="no-js" lang="">
<head>

    <title>HelloWorld - View Laporan Pembelian</title>


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

  <?php include_once 'includes/sidebar.php';?>

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
                                    <li><a href="laporan-pembelian.php">Riwayat Pembelian</a></li>
                                    <li class="active">Rincian Pembelian</li>
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
                            <strong class="card-title">Rincian Pembelian</strong>
                        </div>
                        <div class="card-body">

              <?php
$idlog = $_SESSION['jastip'];
    $ID_Pesanan = $_GET['viewid'];
    $ret = mysqli_query($con, "SELECT * FROM vprint where IDtransaksi='TRN$ID_Pesanan'");
    while ($row = mysqli_fetch_array($ret)) {
        ?>
              <table border="1" class="table table-bordered mg-b-0">
                                <tr>
                                  <th>Nomor Pesanan</th>
                                  <td><?php echo $row['IDtransaksi']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nama Pembeli</th>
                                  <td><?php echo $row['nama_pembeli']; ?></td>
                                </tr>
                                <tr>
                                  <th>Barang</th>
                                  <td><?php echo $row['NamaBarang']; ?></td>
                                </tr>
                                <tr>
                                    <th>Harga Total</th>
                                    <td><?php echo $row['harga_total']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nama Penjasa</th>
                                  <td><?php echo $row['nama_penjual']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nomor HP Penjasa</th>
                                     <td><?php echo $row['nohp_penjual']; ?></td>
                                </tr>
                                <tr>
                                    <th>DP</th>
                                    <td><?php echo $row['harga_total']*0.5; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Rekening</th>
                                    <td><?php echo $row['norek']; ?></td>
                                </tr>
                                </table>

                            <?php

        if ($row['status'] == 'On Delivery') {?>
                                <form method="get">
                                    <button type="submit" name="cancel" class="btn btn-danger" value="<?php echo $ID_Pesanan; ?>">DP</button>
                                </form>

                            <?php }?>
                    </div>
                </div>
      <?php }?>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php include_once 'includes/footer.php';?>

</div><
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }?>