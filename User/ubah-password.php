<?php
session_start();
include 'includes/dbconnection.php';
error_reporting(0);
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['jastip'];
        $cpassword = $_POST['passwordskrg'];
        $newpassword = $_POST['passwordbaru'];
        $query = mysqli_query($con, "select IDuser from tbluser where IDuser='$adminid' and password='$cpassword'");
        $row = mysqli_fetch_array($query);
        if ($row > 0) {
            $ret = mysqli_query($con, "update tbluser set password='$newpassword' where IDuser='$adminid'");
            $msg = "Password berhasil diganti.";
        } else {

            $msg = "Password salah.";
        }

    }

    ?>
<!doctype html>
<html class="no-js" lang="">
<head>

    <title>HelloWorld - Ganti Password</title>


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

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.passwordbaru.value!=document.changepassword.confirmpassword.value)
{
alert('Password baru dan Password anda tidak cocok.');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}
</script>

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
                                    <li><a href="ubah-password.php">Ubah Password</a></li>
                                    <li class="active">Ubah Password</li>
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
                                <strong>Ubah </strong> Password
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
        echo $msg;
    }?> </p>
                                   <?php
$adminid = $_SESSION['jastip'];
    $ret = mysqli_query($con, "select * from tbluser where IDuser='$adminid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {

        ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password Sekarang</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="passwordskrg" class=" form-control" required= "true" value=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Password Baru</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="passwordbaru" class="form-control" value="" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
                                        <div class="col-12 col-md-9"> <input type="password" name="confirmpassword" class="form-control" value="" required="true"></div>
                                    </div>



                                    <?php }?>
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Change</button></p>
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