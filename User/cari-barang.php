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

    <title>HelloWorld - Cari Pesanan</title>


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
                                    <li><a href="cari-pesanan.php">Cari Pesanan</a></li>
                                    <li class="active">Cari Pesanan</li>
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
                            <strong class="card-title">Cari Barang</strong>
                        </div>
                        <div class="card-body">
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
        echo $msg;
    }?> </p>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cari ID Transaksi</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="searchdata" name="searchdata" class="form-control"  required="required" autofocus="autofocus" ></div>
                                    </div>



                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="search" >Search</button></p>
                                </form>

 <?php
if (isset($_POST['search'])) {

        $sdata = $_POST['searchdata'];
        ?>
  <h4 align="center">Hasil tentang keyword "<?php echo $sdata; ?>" </h4>
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>Nomor</th>


                    <th>ID transaksi</th>
                    <th>Nama Barang</th>
                    <th>Nama Pembeli</th>

                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret = mysqli_query($con, "select * from detailmasuk where IDtransaksi like '$sdata'");
        $num = mysqli_num_rows($ret);
        if ($num > 0) {
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {

                ?>

                <tr>
                  <td><?php echo $cnt; ?></td>


                  <td><?php echo $row['IDtransaksi']; ?></td>
                  <td><?php echo $row['NamaBarang']; ?></td>
                  <td><?php echo $row['nama']; ?></td>

                  <td><a href="view-pesananmasuk.php?viewid=<?php echo $row['IDtransaksi']; ?>">View</a></td>
                </tr>
                <?php
$cnt = $cnt + 1;
            }} else {?>
     <tr>
    <td colspan="8"> ID tidak ketemu. </td>

  </tr>

<?php }}?>
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