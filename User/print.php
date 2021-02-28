  <?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['jastip'] == 0)) {
    header('location:logout.php');
} else {

    ?>
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
<?php
$cid = $_GET['viewid'];
    $ret = mysqli_query($con, "select * from vprint where IDtransaksi='TRN$cid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {
        ?>

<div  id="exampl">

      <table border="1" class="table table-bordered mg-b-0">
        <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> Struk Jastip</th>

        </tr>

                            <tr>
                                <th>Nomor Pesanan</th>
                                   <td><?php echo $row['IDtransaksi']; ?></td>
                                <th>Barang</th>
                                   <td><?php echo $row['NamaBarang']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Pemesan</th>
                                   <td><?php echo $row['nama_pembeli']; ?></td>
                                <th>Nomor HP Pembeli</th>
                                   <td><?php echo $row['nohp_pembeli']; ?></td>
                            </tr>
                            <tr>
                                <th>Harga Barang</th>
                                   <td><?php echo "Rp " . number_format($row['hargaBarang'], 2, ',', '.'); ?></td>
                                <th>Harga Jastip</th>
                                  <td><?php echo "Rp " . number_format($row['harga_jastip'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Harga Ongkir</th>
                              <td><?php echo "Rp " . number_format($row['harga_ongkir'], 2, ',', '.'); ?></td>
                                <th>Harga Total</th>
                                  <td><?php echo "Rp " . number_format($row['harga_total'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                              <th>DP</th>
                              <td>
                                <?php  
                                  if ($row['status'] == "pending") {
                                    echo "-";
                                  } else{
                                    $dp = $row['harga_total']*0.5;
                                  echo "Rp " . number_format($dp, 2, ',', '.');
                                  }
                                ;?>
                              </td>
                              <th>Kekurangan Pembayaran</th>
                              <td>
                                <?php if ($row['status'] == "menunggu pembayaran"){
                                  echo "Rp " . number_format(($row['harga_total']-$dp), 2, ',', '.');
                                } 
                                  if ($row['status'] == "on delivery") {
                                    echo "Lunas";
                                  }
              
                                  if ($row['status'] == "sudah lunas") {
                                    echo "Lunas";
                                  }
                                  if ($row['status'] == "Out") {
                                    echo "Lunas";
                                  }
                                  if ($row['status'] == "in process") {
                                    echo "Rp " . number_format(($row['harga_total']-$dp), 2, ',', '.');
                                  }
                                  else{
                                    echo "";
                                  }
                                ?>
                              </td>
                            </tr>
                            <tr>
                                <th>Nama Penjasa</th>
                                  <td><?php echo $row['nama_penjual']; ?></td>
                                <th>Nomor HP Penjasa</th>
                                  <td><?php echo $row['nohp_penjual']; ?></td>
                            </tr>
                            <tr>
                               <th>Tanggal Beli</th>
                                  <td><?php echo $row['tanggal_beli']; ?></td>     
                                <th>Tanggal Kasih</th>
        <td><?php echo $row['tanggal_terima']; ?></td>
        <tr>                    
                              <th>Status</th>
                              <td>
                              <?php
if ($row['status'] == "on delivery") {
  echo "Barang Sedang Dikirim";
}
if ($row['status'] == "menunggu dp") {
  echo "Belum Bayar DP";
}
if ($row['status'] == "menunggu pembayaran") {
  echo "Belum Melunasi Barang";
}
if ($row['status'] == "sudah lunas") {
  echo "Barang Sudah Lunas. Menunggu Barang Datang";
}
if ($row['status'] == "Out") {
  echo "Transaksi Sudah selesai";
}
if ($row['status'] == "pending") {
  echo "Transaksi Belum Diproses";
}
if ($row['status'] == "in process") {
  echo "Transaksi Dalam Proses";
}

        ;?>
                              </td>
 
<?php if ($row['keterangan'] != "") {?>
        
        <th>Keterangan</th>
        <td colspan="3"><?php echo $row['keterangan']; ?></td>
      </tr>
<?php }?>
  <tr>
    <td colspan="4" style="text-align:center; cursor:pointer"><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)"  ></i></td>
  </tr>

</table>
            <?php }}?>
          </div>
            <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>