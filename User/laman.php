<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
error_reporting(0);
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
        $addr = $_POST['alamat'];
        $upd = mysqli_query($con, "UPDATE tbluser set alamat='$addr' where IDuser='$idpembeli'");
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

    <title>HelloWorld - Dashboard</title>


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>

    <?php include_once 'includes/sidebar.php';?>
    <?php include_once 'includes/header.php';?>

        <div class="content">
            <div class="row no-gutters">
               <?php
$id = $_GET['barang'];
    $query = mysqli_query($con, "select * from tblbarang where IDbarang='$id'");
    while ($row = mysqli_fetch_assoc($query)) {?>
                <div class="card" style="width: 18rem;">
                  <?php echo "<img src='images/" . $row['fotobrg'] . "' class='card-img-top' alt='' width='100px' height='300'>"; ?>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">


                        <?php echo $row['NamaBarang']; ?>

                    </h5>
                    <p class="card-text" color="black"><?php echo $row['caption']; ?></p>
                    <?php $tgl = Date('d-m-Y', strtotime("+3 days"));?>
                    <p class="card-text"><small class="text-muted">Estimasi kedatangan 3 hari tanggal <?php echo $tgl; ?> </small></p>
                    <p class="card-text"> Harga : <?php echo $row['hargaBarang'] ?></p>
                    <button class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Lanjutkan Pemesanan</button>
                    <?php }?>
                  </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
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
    $idbarang = $_GET['barang'];
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
    $hargabrg = $list['hargaBarang'];
    $hargajs = $list['harga_jastip'];
    $harga = $hargabrg + $hargajs;
    ?>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kategori Barang</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo "<input type='text' id='katbrg' name='katbrg' class='form-control' disabled value='" . $list['KategoriBarang'] . "'>"; ?>
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
                        <?php //echo " <input type='text' id='alamat' name='alamat' class='form-control' value='" . $get['alamat'] . "''> "; ?>
                        <textarea class='form-control' name="alamat" ><?php echo $get['alamat']; ?></textarea>
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
                        <?php echo " <input type='text' id='totalaja' name='totalaja' class='form-control' readonly value='" . $harga . "''> "; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total DP yang harus dibayar</label></div>
                    <div class="col-12 col-md-9">
                        <?php echo " <input type='text' id='dp' name='dp' class='form-control' readonly value='" . $list['hargaBarang'] * 0.5 . "''> "; ?>
                    </div>
                </div>
                <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Pesan</button></p>
            </form>
            </div>
        </div>
    </div>

                    </div>
        </div>
    </div>


        <div class="clearfix"></div>

       <?php include_once 'includes/footer.php';?>




    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>
</body>
</html>
<?php }?>