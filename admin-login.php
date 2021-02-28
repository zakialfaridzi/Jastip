<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';

if (isset($_SESSION['login'])) {
    header("location:dashboard.php");
}
if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "select * from tbladmin where UserName_adm='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['jastip'] = $ret['IDadmin'];

        header("location:dashboard.php");
    } else {
        $msg = "Ada yang salah, Coba lagi.";
    }
}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>

    <title>HelloWorld - Admin Login</title>


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
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
    <a href="/jastip/index.php">user</a>
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img src="images/www.png">
                    </a>
                </div>
                <div class="login-form">
                    <form method='post'>
                         <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
    echo $msg;
}?> </p>
                        <div class="form-group">
                            <label>Admin Username</label>
                           <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                        </div>
                        <div class="checkbox">

                            <label class="pull-left">
                                <a href="forgot-password-admin.php">Forgot Password?</a>
                            </label>
                        </div>
                        <?php ?>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button></a>


                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
