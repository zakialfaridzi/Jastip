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
$cid = $_GET['id'];
    $ret = mysqli_query($con, "select * from vprint where IDtransaksi='$cid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {
        ?>

<div  id="exampl">

      <table border="1" class="table table-bordered mg-b-0">
        <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> Struk Jastip</th>

        </tr>

                            <tr>
                                <th>ID Transaksi</th>
                                   <td><?php echo $row['IDtransaksi']; ?></td>
                                <th>Kategori Barang</th>
                                   <td><?php echo $row['KategoriBarang']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                   <td colspan="3"><?php echo $row['NamaBarang']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Pembeli</th>
                                  <td><?php echo $row['nama_pembeli']; ?></td>
                                <th>Nomor HP Pembeli</th>
                                  <td><?php echo $row['nohp_pembeli']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Penjual</th>
                                  <td><?php echo $row['nama_pembeli']; ?></td>
                                <th>Nomor HP Penjual</th>
                                  <td><?php echo $row['nohp_penjual']; ?></td>
                            </tr>
                            <tr>
                               <th>Tanggal Beli</th>
                                  <td><?php echo $row['tanggal_beli']; ?></td>
                                  <th>Harga Barang</th>
                                  <td><?php echo $row['hargaBarang']; ?></td>
                            </tr>
                            <tr>
                              <th>Harga Ongkir</th>
                              <td><?php echo $row['harga_ongkir']; ?></td>
                              <th>Harga Total</th>
                              <td><?php echo $row['harga_total']; ?></td>
                            </tr>
                            <tr>
                              <th>Harga Jastip</th>
                              <td><?php echo $row['harga_jastip']; ?></td>
                              <th>Status</th>
                              <td><?php echo $row['status'] ?></td>
                            </tr>
                            <tr>

      <tr>
<?php if ($row['keterangan'] != "") {?>
        <th>Tanggal Terima</th>
        <td><?php echo $row['tanggal_terima']; ?></td>
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