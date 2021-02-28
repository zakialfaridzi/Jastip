<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $idbrg = $_GET['jasa'];
        $idpembeli = $_SESSION['jastip'];
        $idpenjasa = $_POST['penjasa'];
        $idkat = $_POST['idkat'];
        $barang = $_POST['barang'];
        $note = $_POST['note'];
        $addr = $_POST['alamat'];
        $ongkir = $_POST['hargaongkir'];
        $hargabrg = $_POST['hargabrg'];
        $maxhrg = $_POST['max'];
        $hrgjasa = $_POST['hrgjastip'];
        if ($hargabrg > $maxhrg) {
            echo "<script>alert('Harga Barang Melebihi batas');</script>";
        } else{
            $upt = mysqli_query($con, "UPDATE tbluser set alamat='$addr' where IDuser='$idpembeli'");
            $query = mysqli_query($con, "INSERT INTO `tbltransaksi`
            (`fk_idpembeli`, `fk_idpenjasa`, `fk_idkat`, `barang`, `keterangan`, `status`, `harga_ongkir`, `harga_barang`, `harga_jastip`) VALUES 
            ('$idpembeli','$idpenjasa','$idkat','$barang','$note','pending','$ongkir', '$hargabrg', '$hrgjasa')");
        if ($query) {
            echo "<script>alert('Entry Pesanan sudah ditambahkan');</script>";
            echo "<script>window.location.href ='laporan-pembelian.php'</script>";
        } else {
            echo "<script>alert('Ada yang salah, Coba Lagi.');</script>";
        }
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
   <?php 
   include_once 'includes/sidebar.php';
   include_once 'includes/header.php';
   ?>

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
                                    <li><a href="nitip.php">Dashboard</a></li>
                                    <li class="active">Titip Barang</li>
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
                        <strong>Deskripsi Penjasa</strong>
                    </div>
                    <?php
                    $idjasa = $_GET['jasa'];
                    $desc = mysqli_query($con, "SELECT * from tbljasa tj join tbluser tu  
                        on tj.fk_penjasa=tu.IDuser
                        where idjasa ='$idjasa'");
                    foreach ($desc as $key) {
                    ?>
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $key['nama']; ?></h5>
                    <p class="card-text"><small class="text-muted"><?php echo "Di ".$key['kota']." - ".$key['negara']."<br> Tanggal Pulang : ".$key['tanggal_pulang']; ?></small></p>
                    <p class="card-text"><font style="color: black;"><?php echo $key['caption']; ?></font></p>
                    <p class="card-text"><small class="text-muted">Maksimal harga barang <?php echo $key['max_harga']; ?></small></p>
                    <p class="card-text"><small class="text-muted">Harga Jasa Titip <?php echo $key['harga_jastip']; ?></small></p>
                    <p class="card-text"><small class="text-muted">Diposting pada <?php echo $key['tanggal_post']; ?></small></p>
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Titip
                  </button>
                  <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    <div class="card-header">
                        <strong>Titip Apa?</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <p style="font-size:16px; color:red" align="center">
                                <?php if ($msg) {
                                echo $msg;
                                }?>
                            </p>
    <?php
// $id=$_POST['pesan'];
    $idlogin = $_SESSION['jastip'];
    $select = mysqli_query($con, "SELECT * from tbljasa tj join tblcategory tc on tj.fk_idkategori=tc.IDkategori join tbluser tu on tj.fk_penjasa=tu.IDuser where idjasa=$idjasa");
    $pembeli = mysqli_query($con, "SELECT * from tbluser where IDuser ='$idlogin'");
    $list = mysqli_fetch_assoc($select);
    $get = mysqli_fetch_assoc($pembeli);
    ?>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kategori</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo "<input type='text' id='katbrg' name='katbrg' class='form-control' disabled value='" . $list['KategoriBarang'] . "'>"; ?>
                        <?php echo "<input type='hidden' name='idkat' class='form-control'value='".$list['fk_idkategori']."'>"; ?>
                        <?php echo "<input type='hidden' name='penjasa' class='form-control'value='".$list['fk_penjasa']."'>"; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Barang</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name="barang" class="form-control" placeholder='Masukan nama barang' ></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Catatan</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name="note" class="form-control" placeholder="Catatan untuk ukuran/warna/type barang"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat Anda</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='alamat' name='alamat' class='form-control' value='" . $get['alamat'] . "''> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ongkir</label></div>
                    <div class="col-12 col-md-9">
                        <!-- <input type="text" id="hargaongkir" name="hargaongkir" class="form-control"> -->
                        <select name="hargaongkir" class="form-control">
                            <option value="15000">FEDEX Rp. 15.000</option>
                            <option value="20000">DHL Rp. 20.000</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Jasa Titip</label></div>
                    <div class="col-12 col-md-9">
                       <?php echo "<input type='text' id='hrgjastip' name='hrgjastip' class='form-control' value='" . $list['harga_jastip'] . "'>"; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Input Harga Barang</label></div>
                    <div class="col-12 col-md-9">
                        <?php
                        echo " 
                        <input type='text'  name='max' class='form-control' value='".$list['max_harga']."' hidden>
                        <input type='text' id='hargabrg' name='hargabrg' class='form-control'  > "; ?>
                    </div>
                </div>
                <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" >Pesan</button></p>
            </form>
            </div>
                  </div>
                </div>
                  </div>
              <?php } ?>
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