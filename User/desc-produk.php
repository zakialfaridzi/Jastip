<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $idbrg = $_GET['barang'];
        $idpembeli = $_SESSION['jastip'];
        $idpenjasa = $_POST['idpenjasa'];
        $kategoriid = $_POST['idkate'];
        $namaBarang = $_POST['namabarang'];
        $ket = $_POST['ketbrg'];
        $total = $_POST['totalaja'];
        $hargaongkir = $_POST['hargaongkir'];
        $totalhrg = $total + $hargaongkir;
        $query = mysqli_query($con, "INSERT INTO `tbltransaksi`
            (`fk_idpembeli`, `fk_idpenjasa`, `fk_idkat`, `barang`, `harga_ongkir`, `harga_total`, `keterangan`, `status`) 
            VALUES 
            ('$idpembeli','$idpenjasa','$kategoriid','$namaBarang','$hargaongkir','$totalhrg','$ket','pending')");
        if ($query) {
            echo "<script>alert('Entry Pesanan sudah ditambahkan');</script>";
            echo "<script>window.location.href ='laporan-pembelian.php'</script>";
        } else {
            echo "<script>alert('Ada yang salah, Coba Lagi.');</script>";
        }

    }
    ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <title>Hello World - Tambah Barang</title>
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
                                    <li class="active">Description</li>
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
                    <div class="media">
                        <?php
                        $id = $_GET['barang'];
                        $foto = mysqli_query($con, "SELECT * from tblbarang where IDbarang='$id'");
                        while ($fot = mysqli_fetch_array($foto)) {
                        ?>
                      <?="<img src='".$fot['foto']." class='mr-3'>"?>
                        
                      <div class="media-body">
                        <h5 class="mt-0"><?php echo $fot['NamaBarang'] ?></h5>
                        INI DESKPRIPSI BARANG
                      </div>
                      <?php } ?>
                    </div>
                    <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Pesan</button></p>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php include_once 'includes/footer.php';?>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php }?>