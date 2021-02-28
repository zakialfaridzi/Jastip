<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $idlog = $_SESSION['jastip'];
        $kategori = $_POST['kategori'];
        $negara = $_POST['negara'];
        $caption = $_POST['caption'];
        $pulang = $_POST['pulang'];
        $max = $_POST['penitip'];
        $maxhrg = $_POST['maxHarga'];
        $kota = $_POST['kota'];
        $hargaJastip = $_POST['hargaJastip'];
        $query = mysqli_query($con, "INSERT INTO `tbljasa`
            (`fk_penjasa`, `fk_idkategori`, `negara`, `kota`, `harga_jastip`, `tanggal_pulang`, `caption`, `max_penitip`, `max_harga`)
            VALUES
            ('$idlog','$kategori','$negara','$kota', '$hargaJastip', '$pulang','$caption','$max', '$maxhrg')");
        if ($query) {
            $msg = "Jastip Berhasil ditambahkan";
            // header('location:nitip.php');
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
                                    <li><a href="add-jasa.php">Jastip</a></li>
                                    <li class="active">Buka Jastip</li>
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
                                <strong>Buka</strong> Jastip
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
        echo $msg;
    }?> </p>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Kategori</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="kategori" id="catename" class="form-control">
                                                <option value="0">Select Category</option>
                                                <?php 
                                                $query = mysqli_query($con, "select * from tblcategory");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                 <option value="<?php echo $row['IDkategori']; ?>"><?php echo $row['KategoriBarang']; ?></option>
                                                <?php } ?>
                                            </select>
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
                                            <!-- <input type="text" id="catename" name="negara" class="form-control" placeholder="Negara" required="true"> -->
                                        </div><br><br>
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
                                            <label for="text-input" class=" form-control-label">caption</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="caption" class="form-control" placeholder="caption"></textarea>
                                        </div><br><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tanggal Pulang</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="pulang" class="form-control" required="true">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Maksimal Penitip</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="penitip" class="form-control" placeholder="Maksimal Penitip">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Maksimal Harga Nitip</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="maxHarga" class="form-control" placeholder="Maksimal Harga">
                                        </div><br><br>
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Harga Jastip</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="hargaJastip" class="form-control" placeholder="Harga Jastip" required>
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