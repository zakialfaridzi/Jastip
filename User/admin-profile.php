<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['ubah'])) {
        if (isset($_POST['submit'])) {
            $userid = $_SESSION['jastip'];
            $nama = $_POST['nama'];
            $nohp = $_POST['nohp'];
            $alamat = $_POST['alamat'];
            $files = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp, 'images/' . $files);
            $foto = $files;
            $up = mysqli_query($con, "SELECT * from tbluser where IDuser='$userid'");
            $data = mysqli_fetch_array($up);
            $query = mysqli_query($con, "update tbluser set nama ='$nama', nohp='$nohp', alamat='$alamat', foto='$foto' where IDuser='$userid'");
            if ($query) {
                $msg = "Profile & Foto $nama berhasil di update.";
            } else {
                $msg = "Ada yang salah, coba lagi boi.";
            }
        }        
    }
    if (isset($_POST['submit'])) {
        $userid = $_SESSION['jastip'];
        $nama = $_POST['nama'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];

        $query = mysqli_query($con, "update tbluser set nama ='$nama', nohp='$nohp', alamat='$alamat' where IDuser='$userid'");
        if ($query) {
            $msg = "Profile $nama berhasil di update.";
        } else {
            $msg = "Ada yang salah, coba lagi boi.";
        }
    }
    ?>
<!doctype html>
<html class="no-js" lang="">
<head>

    <title>HelloWorld - Profile User</title>


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
                                    <li><a href="admin-profile.php">Profile</a></li>
                                    <li class="active">User Profile</li>
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
                    <div class="col-lg-6">
                        <div class="card">


                        </div>

                    </div>



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>User </strong> Profile
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
        echo $msg;
    }?> </p>
                                   <?php
$userid = $_SESSION['jastip'];
    $ret = mysqli_query($con, "select * from tbluser where IDuser='$userid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {

        ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama User</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="nama" name="nama" type="text" value="<?php echo $row['nama']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Username</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="username" name="username" type="text" value="<?php echo $row['username']; ?>"  readonly='true'></div>
                                    </div>
                                    
                                        <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Nomor Rekening</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="norek" name="norek" type="text" value="<?php echo $row['norek']; ?>"  readonly='true'></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Nomor HP</label></div>
                                        <div class="col-12 col-md-9"> <input class="form-control " id="nohp" pattern="\d*" name="nohp" type="text" value="<?php echo $row['nohp']; ?>" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat</label></div>
                                        <div class="col-12 col-md-9"><input class=" form-control" id="nama" name="alamat" type="text" value="<?php echo $row['alamat']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Foto</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="checkbox" name="ubah" class="">Ceklis jika ingin mengubah foto <br>
                                            <input class="form-control " id="foto" name="foto" type="file" value="<?php echo  $row['foto']; ?>"readonly='true'></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input class="form-control " id="email" name="email" type="email" value="<?php echo $row['email']; ?>" required="true" readonly='true'></div>
                                    </div>


                                    <?php }?>
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Update</button></p>
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