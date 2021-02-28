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
        $hargabarang = $_POST['hargabarang'];
        $hargajastip = $_POST['hargajastip'];
        $query = mysqli_query($con, "INSERT INTO `tbltransaksi`
            (`fk_idpembeli`, `fk_idpenjasa`, `fk_idkat`, `barang`, `harga_ongkir`, `harga_barang`, `harga_jastip`, `keterangan`, `status`) 
            VALUES 
            ('$idpembeli','$idpenjasa','$kategoriid','$namaBarang','$hargaongkir', '$hargabarang', '$hargajastip', '$ket', 'pending')");
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
                                    <li><a href="add-pesanan.php">Barang</a></li>
                                    <li class="active">Tambah Barang</li>
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
                        <strong>Tambah Pesanan</strong>
                    </div>
                    <div class="card-body card-block">
                        <!-- <form method="post" enctype="multipart/form-data" class="form-horizontal"> -->
                            <form method="post">
                            <p style="font-size:16px; color:red" align="center">
                                <?php if ($msg) {
        echo $msg;
    }?>
                            </p>
                    <?php
// $id=$_POST['pesan'];
    $idbarang = $_GET['id'];
    $idlogin = $_SESSION['jastip'];
    $select = mysqli_query($con, "SELECT KategoriBarang, Merk, NamaBarang, fk_iduser, nama, nohp, alamat, hargaBarang, harga_jastip, fk_idkategori
                                                    from tblbarang tb
                                                    join tbluser tu
                                                    on tb.fk_iduser=tu.IDuser
                                                    join tblcategory tc
                                                    on tb.fk_idkategori=tc.IDkategori
                                                    where IDbarang='$idbarang';");
    $pembeli = mysqli_query($con, "SELECT * from tbluser where IDuser ='$idlogin'");
    $list = mysqli_fetch_assoc($select);
    $get = mysqli_fetch_assoc($pembeli);
    $hargabrg=$list['hargaBarang'];
    $hargajs=$list['harga_jastip'];
    $harga=$hargabrg+$hargajs;
    ?>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kategori Barang</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo "<input type='text' id='katbrg' name='katbrg' class='form-control' disabled value='".$list['KategoriBarang']."'>"; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Merk Barang</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='merk' name='merk' class='form-control' disabled value='" . $list['Merk'] . "'> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Barang</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo "<input type='text' name='namabarang' class='form-control' readonly value='" . $list['NamaBarang'] . "''> "; ?>
                        <?php echo "<input type='hidden' name='idpenjasa' value='" . $list['fk_iduser'] . "'>"; ?>
                        <?php echo "<input type='hidden' name='idkate' value='" . $list['fk_idkategori'] . "'>"; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tambah Keterangan Barang</label></div>
                    <div class="col-12 col-md-9">
                        <textarea name='ketbrg' class='form-control' placeholder="Tambahkan Keterangan barang seperti warna/ukuran/dll"></textarea>
                    </div>
                </div>
                <input type="hidden" name="fk_iduser">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pembeli</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='namapembeli' name='nama' class='form-control' disabled value='" . $get['nama'] . "''> "; ?>
                        
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor HP Pembeli</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='nohp_pembeli' name='nohp_pembeli' class='form-control' disabled value='" . $get['nohp'] . "''> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='alamat' name='alamat' class='form-control' disabled value='" . $get['alamat'] . "''> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Barang</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='hargabarang' name='hargabarang' class='form-control' readonly value='" . $list['hargaBarang'] . "''> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Jastip</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='hargajastip' name='hargajastip' class='form-control' readonly value='" . $list['harga_jastip'] . "''> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Ongkir</label></div>
                    <div class="col-12 col-md-9">
                        <!-- <input type="text" id="hargaongkir" name="hargaongkir" class="form-control"> -->
                        <select name="hargaongkir" class="form-control">
                            <option value="15000">FEDEX Rp. 15.000</option>
                            <option value="20000">DHL Rp. 20.000</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total Belum Termasuk Ongkir</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='totalaja' name='totalaja' class='form-control' readonly value='".$harga."''> "; ?>
                    </div>
                </div>
                <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Pesan</button></p>
            </form>
            </div>
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