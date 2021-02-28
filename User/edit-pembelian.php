<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $ID_Pesanan = $_GET['viewid'];
        $Keterangan = $_POST['Keterangan'];
        $rating = $_POST['rating'];
        $query = mysqli_query($con, "UPDATE tbltransaksi set keterangan='$Keterangan', status='Out', tanggal_terima=now(), rating='$rating' where IDtransaksi='$ID_Pesanan'");
        if ($query) {
            
            echo "<script>alert('Terima Kasih');</script>";
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
                                    <li class="active">View Laporan Pembelian</li>
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
                            <strong class="card-title">View Laporan Pembelian</strong>
                        </div>
                        <div class="card-body">

              <?php
$ID_Pesanan = $_GET['viewid'];
    $ret = mysqli_query($con, "SELECT * FROM vprint where IDtransaksi='TRN$ID_Pesanan';");
    while ($row = mysqli_fetch_array($ret)) {
        ?>                       <table border="1" class="table table-bordered mg-b-0">
                                <tr>
                                  <th>Nama Pembeli</th>
                                     <td><?php echo $row['nama_pembeli']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nomor Pesanan</th>
                                     <td><?php echo $row['IDtransaksi']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nama Penjual</th>
                                     <td><?php echo $row['nama_penjual']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nomor HP Penjual</th>
                                     <td><?php echo $row['nohp_penjual']; ?></td>
                                </tr>
                                <tr>
                                  <th>Nama Barang</th>
                                     <td><?php echo $row['NamaBarang']; ?></td>
                                </tr>
                                <tr>
                                  <th>Harga Barang</th>
                                     <td><?php echo "Rp " . number_format($row['hargaBarang'], 2, ',', '.'); ?></td>
                                </tr>
                                   <tr>
                                    <th>Harga Jastip</th>
                                      <td><?php echo "Rp " . number_format($row['harga_jastip'], 2, ',', '.'); ?></td>
                                  </tr>
                                      <tr>
                                       <th>Harga Ongkir</th>
                                        <td><?php echo "Rp " . number_format($row['harga_ongkir'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                               <th>Harga Total</th>
                                <td><?php echo "Rp " . number_format($row['harga_total'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                               <th>Tanggal Beli</th>
                                <td><?php echo $row['tanggal_beli']; ?></td>
                            </tr>
                            <?php  
                                if ($row['status'] == 'Out') { ?>
                                <tr>
                                    <th>Tanggal Terima</th>
                                    <td><?php echo $row['tanggal_terima']; ?></td>
                                </tr>
                                <?php } ?>
                            <tr>
                               <th>Status</th>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                            <!-- <tr>
                              <th>Keterangan</th>
                              <td>
                                <textarea name="Keterangan" placeholder="" rows="12" cols="14" class="form-control" required="true"></textarea>
                              </td>
                            </tr>
                            <p style="text-align: center;"><td> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Update</button></p></td> -->
</table>
                    </div>
                </div>
                <table class="table mb-0">

<?php if ($row['status'] == "on delivery") {?>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
            echo $msg;
        }?> </p>

<tr>
        <th>Rating</th>
        <td><input type="radio" name="rating" value="1">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="rating" value="2">2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="rating" value="3">3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="rating" value="4">4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="rating" value="5">5</td>
</tr>

  <tr>
    <th>Keterangan :</th>
    <td>
    <textarea name="Keterangan" placeholder="" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr>



                                 <tr>  <p style="text-align: center;"><td> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Update</button></p></td></tr>
                                </form>
                            </table>
<?php } else {?>
    <table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Keterangan</th>
    <td><?php echo $row['keterangan']; ?></td>
  </tr>
<tr>




<?php }?>
</table>






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