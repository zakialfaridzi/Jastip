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

    <title>HelloWorld - Admin Manage Barang Keluar</title>


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
                                    <li><a href="manage-pesanankeluar.php">Manage Pesanan</a></li>
                                    <li class="active">Manage Pesanan Keluar</li>
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
                            <strong class="card-title">Manage Pesanan Keluar</strong>
                        </div>
                        <div class="card-body">
                             <table class="table">
                <thead>
                <tr>
                    <tr>
                  <th>No.</th>
                    <th>ID Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th colspan="3"><center>Action</center></th>
                    </tr>
                </tr>
                </thead>
               <?php
$ret = mysqli_query($con, "SELECT * from vprint where status='out'");
    $cnt = 1;
    $NoPesanan = mt_rand(100000000, 999999999);
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $delete = mysqli_query($con, "DELETE FROM tbltransaksi where IDtransaksi='$id'");
        header("location:manage-pesananmasuk.php");
        header("location:manage-pesanankeluar.php");
    }
    while ($row = mysqli_fetch_array($ret)) {
        ?>

                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['IDtransaksi'] ?></td>
                  <td><?php echo $row['nama_pembeli']; ?></td>
                  <td><?php echo $row['KategoriBarang']; ?></td>
                  <td><?php echo $row['NamaBarang']; ?></td>
                  <td>
                    <a href="view-pesanankeluar.php?viewid=<?php echo $row['IDtransaksi']; ?>">View</a>
                  </td>
                  <td>
                  <a href="print.php?id=<?php echo $row['IDtransaksi']; ?>">Print</a>
                  </td>
                  <td>
                  <form method="post">
                    <?php echo "<button name='delete' style='border:none; background:none;' value=" . $row['idtransaksi'] . ">Delete</button>"; ?>
                    </form>
                  </td>
                </tr>
                <?php
$cnt = $cnt + 1;
    }?>
              </table>

                    </div>
                </div>
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