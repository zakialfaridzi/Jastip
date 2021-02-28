<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $idbarang = $_GET['barang'];
        $idlogin = $_SESSION['jastip'];
        $NamaBarang = $_POST['NamaBarang'];
        $Merk = $_POST['Merk'];
        $negara = $_POST['negara'];
        $caption = $_POST['caption'];
        $hargaBarang = $_POST['hargaBarang'];
        $harga_jastip = $_POST['harga_jastip'];
        $kategori = $_POST['fk_idkategori'];
        $files = $_FILES['fotobrg']['name'];
        $file_tmp = $_FILES['fotobrg']['tmp_name'];
        move_uploaded_file($file_tmp, 'images/' . $files);
        $foto = $files;
        $kota = $_POST['kota'];

        $query = mysqli_query($con, "INSERT INTO `tblbarang`
            ( `NamaBarang`, `Merk`, `negara`, `hargaBarang`, `harga_jastip`, `fk_idkategori`, `fk_iduser`, `fotobrg`, `caption`, `kota`)
     VALUES ('$NamaBarang','$Merk','$negara','$hargaBarang','$harga_jastip', '$kategori', '$idlogin', '$foto', '$caption', '$kota')");
        if ($query) {
            $msg = "Jastip Berhasil ditambahkan";
            header('location:nitip.php');
        } else {
            $msg = "Ada yang salah, coba lagi.";
        }
    }
    ?>
<!doctype html>
<html class="no-js" lang="">
<head>

    <title>HelloWorld - Tambah Jastip</title>


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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                                    <li><a href="add-jastip.php">Jastip</a></li>
                                    <li class="active">Tambah Jastip</li>
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
                                <strong>Tambah </strong> Jastip
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
        echo $msg;
    }?> </p>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Nama Barang</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="NamaBarang" class="form-control" placeholder="Nama Barang" required="true">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Merk Barang</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="Merk" class="form-control" placeholder="Merk Barang" required="true">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Negara</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="negara" class="form-control" required>
                                                <option value=" ">Pilih Negara</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Amerika">Amerika</option>
                                                <option value="Inggris">Inggris</option>
                                                <option value="Jepang">Jepang</option>
                                                <option value="China">China</option>
                                                <option value="Thailand">Thailand</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="negara" class="form-control" placeholder="Negara" required="true">
                                        </div> --><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Kota</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <!-- <input type="text" id="catename" name="kota" class="form-control" placeholder="Kota" required="true"> -->
                                            <select name="kota" class="form-control">
                                                <option>pilih kota</option>
                                                <option>Luar Negeri</option>
                                                <option value="Jakarta">Jakarta</option>
                                                <option value="Bandung">Bandung</option>
                                                <option value="Yogyakarta">Yogyakarta</option>
                                                <option value="Surabaya">Surabaya</option>
                                            </select>
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Caption</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="caption" class="form-control" placeholder="Caption barang" required="true">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Harga Barang</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="hargaBarang" class="form-control" placeholder="Harga Barang" required="true">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Harga Jastip</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="harga_jastip" class="form-control" placeholder="Harga Jastip" required="true">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Kategori Barang</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="fk_idkategori" id="catename" class="form-control">
                                                <option value="0">Select Category</option>
                                                <?php $query = mysqli_query($con, "select * from tblcategory");
    while ($row = mysqli_fetch_array($query)) {
        ?>
                                                 <option value="<?php echo $row['IDkategori']; ?>"><?php echo $row['KategoriBarang']; ?></option>
                                             <?php }?>
                                            </select>
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Foto Barang</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" name="fotobrg" required="true">
                                        </div><br><br>
                                    </div>



                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Post</button></p>
                                </form>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6">


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