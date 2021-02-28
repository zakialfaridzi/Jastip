<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';

if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $almt = $_POST['alamat'];
    $jk = $_POST['jk'];
    $ktp = $_POST['noktp'];
    $pass = $_POST['passwd'];
    $query = mysqli_query($con, "INSERT into tbluser(nama,username,email,nohp,alamat,gender,noktp,password)
    values(
        '$nama',
        '$uname',
        '$email',
        '$nohp',
        '$almt',
        '$jk',
        '$ktp',
        '$pass'
         )");
    if ($query) {
        echo "<script>alert('Entry Barang sudah ditambahkan');</script>";
        echo "<script>window.location.href ='index.php'</script>";
    } else {
        echo "<script>alert('Ada yang salah, Coba Lagi.');</script>";
    }
}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>

    <title>HelloWorld - Login</title>


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
function checkpass(){
if(document.regist.passwd.value!=document.regist.confirmpassword.value)
{
alert('Password baru dan Password sekarang tidak cocok.');
document.regist.confirmpassword.focus();
return false;
}
return true;
}

</script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img src="images/www.png">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post" name="regist" onsubmit="return checkpass();">
                         <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
    echo $msg;
}?> </p>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                           <input class="form-control" type="text" placeholder="nama lengkap" required="true" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="username" required="true">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="@example.com" required="true">
                        </div>
                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input type="text" class="form-control" name="nohp" placeholder="08XXXX" required="true">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="alamat lengkap" required="true"></textarea>
                            <!-- <input type="text" class="form-control" name="username" placeholder="Password" required="true"> -->
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <input type="radio" name="jk" required="true">Laki-Laki
                            <input type="radio" name="jk" required="true">Perempuan
                        </div>
                        <div class="form-group">
                            <label>Nomor KTP</label>
                            <input type="text" class="form-control" name="noktp" placeholder="320XXXXXXX" required="true">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="passwd" placeholder="password" required="true">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="true">
                        </div>
                        <!-- <div class="checkbox">

                            <label class="pull-left">
                                <a href="forgot-password.php">Forgot Password?</a>
                            </label>

                            <label class="pull-right">
                                <a href="admin.php">Admin Login</a>
                            </label>


                        </div> -->
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
