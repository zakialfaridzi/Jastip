<div class="content-wrapper">
    <div class="content">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Pemesanan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Barang/index/'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Detail Pemesanan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <?php foreach ($pesanan as $pesanan) : ?>
                <table class="table">
                    <tr>
                        <th>ID Pesanan</th>
                        <td><?php echo $pesanan->idpesanan ?></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td><?php echo $pesanan->namabarang ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Barang</th>
                        <td><?php echo $pesanan->jumlahbarang ?></td>
                    </tr>
                    <tr>
                        <th>Harga Barang</th>
                        <td><?php echo $pesanan->hargabarang ?></td>
                    </tr>
                    <tr>
                        <th>Stok Barang</th>
                        <td><?php echo $pesanan->totalharga ?></td>
                    </tr>
                    <tr>
                        <th>Kategori Barang</th>
                        <td><?php echo $pesanan->kategoribarang ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Barang</th>
                        <td><?php echo $pesanan->keteranganbarang ?></td>
                    </tr>
                    <tr>
                        <th>Nama Konsumen</th>
                        <td><?php echo $pesanan->namakonsumen ?></td>
                    </tr>
                    <tr>
                        <th>Status Pemesanan</th>
                        <td style="color:red;"><?php echo $pesanan->statuspemesanan ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($pesanan->statuspemesanan == 'Pending') : ?>
                                <a href="<?= base_url(); ?>Konsumen/batalkanPesanan/<?= $pesanan->idpesanan; ?>" style="text-decoration:none; background-color:red; color: white;">Batalkan Pesanan</a>
                            <?php else : ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>

            &emsp;<a href="<?php echo base_url('Konsumen/statusPemesanan'); ?>" class="btn btn-secondary mt-1 mb-2">Back</a>
        </div>
    </div>
</div>