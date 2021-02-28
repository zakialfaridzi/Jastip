<?php
include 'db.php';
?>

<div id="right-panel" class="right-panel">
<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php"><img src="images/logo123.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">

                        <div class="form-inline">

                        </div>


                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php

$conn=mysqli_connect('localhost','root','','jastip');

function query($query){

    global $conn;

    $result=mysqli_query($conn,$query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
}
$idlogin = $_SESSION['jastip'];
$datas=query("SELECT * FROM tbluser where IDuser ='$idlogin'");

?>

<?php foreach ($datas as $up) { ?>
                        <?php echo $up['nama']; ?> &nbsp;&nbsp;
                        <!-- <img class="user-avatar rounded-circle" src="images/jordan.jpg" alt="" width="50" height="50"> -->
                        
                            <img class="user-avatar rounded-circle" src="images/<?php echo $up['foto']; ?>" alt="" width="50" height="50"> <?php } ?>
                    
                        

                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="admin-profile.php"><i class="fa fa- user"></i>Profile</a>

                            <a class="nav-link" href="ubah-password.php"><i class="fa fa -cog"></i>Ganti Password</a>

                            <a class="nav-link" href="index.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </header>
