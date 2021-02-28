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

    <title>HelloWorld - Admin View Pesanan Keluar</title>


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
                                    <li><a href="manage-pesanankeluar.php">View Pesanan</a></li>
                                    <li class="active">View Pesanan Keluar</li>
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
                            <strong class="card-title">View Pesanan Keluar</strong>
                        </div>
                        <div class="card-body">

              <?php
$ID_Pesanan = $_GET['viewid'];
    $ret = mysqli_query($con, "SELECT * FROM `vprint` where IDtransaksi='$ID_Pesanan';");
    while ($row = mysqli_fetch_array($ret)) {

        ?>                       <table border="1" class="table table-bordered mg-b-0">

<tr>
                                <th>Nomor Pesanan</th>
                                   <td><?php echo $row['IDtransaksi']; ?></td>
                                   </tr>
<tr>
                                <th>Kategori Barang</th>
                                   <td><?php echo $row['KategoriBarang']; ?></td>
                                   </tr>
                                <tr>
                                <th>Nama Barang</th>
                                   <td><?php echo $row['NamaBarang']; ?></td>
                                   </tr>
                                   <tr>
                                    <th>Nama Pembeli</th>
                                      <td><?php echo $row['nama_pembeli']; ?></td>
                                  </tr>
                                      <tr>
                                       <th>Nomor HP Pembeli</th>
                                        <td><?php echo $row['nohp_pembeli']; ?></td>
                                    </tr>
                                    <tr>
                               <th>Tanggal Beli</th>
                                <td><?php echo $row['tanggal_beli']; ?></td>
                            </tr>
                            <tr>
                               <th>Tanggal Kasih</th>
                                <td><?php echo $row['tanggal_terima']; ?></td>
                            </tr>
                            <tr>
                               <th>Harga Jastip</th>
                                <td><?php echo $row['harga_jastip']; ?></td>
                            </tr>
                            <tr>
    <th>Keterangan</th>
    <td><?php echo $row['keterangan']; ?></td>
  </tr>
   <tr>
    <th>Status</th>
    <td><?php echo $row['status']; ?></td>
  </tr>
<tr>




</table>

                    </div>
                </div>









<?php }?>
            </div>



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