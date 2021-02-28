<div class="content-wrapper">
    <div class="content">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Detail Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Barang/index/'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Detail Barang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <?php foreach ($detail as $detail) : ?>
                <table class="table">
                    <tr>
                        <th>Nama Barang</th>
                        <td><?php echo $detail->nama ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Barang</th>
                        <td><?php echo $detail->keterangan ?></td>
                    </tr>
                    <tr>
                        <th>Harga Barang</th>
                        <td><?php echo $detail->harga ?></td>
                    </tr>
                    <tr>
                        <th>Stok Barang</th>
                        <td><?php echo $detail->stok ?></td>
                    </tr>
                    <tr>
                        <th>Kategori Barang</th>
                        <td><?php echo $detail->kategori ?></td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" width="150" height="150"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php foreach ($konsumenData as $konsumenData) : ?>
                                <form action="<?= base_url('Konsumen/pesanBarang'); ?>" method="post">
                                    <label>
                                        Jumlah pesanan
                                    </label>
                                    <input type="number" name="jumlahbarang">
                                    <input type="hidden" name="namabarang" value="<?= $detail->nama; ?>">
                                    <input type="hidden" name="hargabarang" value="<?= $detail->harga; ?>">
                                    <input type="hidden" name="totalharga" value="<?= $detail->harga; ?>">
                                    <input type="hidden" name="kategoribarang" value="<?= $detail->kategori; ?>">
                                    <input type="hidden" name="keteranganbarang" value="<?= $detail->keterangan; ?>">
                                    <input type="hidden" name="alamat" value="<?= $konsumenData->alamat; ?>">
                                    <input type="hidden" name="namakonsumen" value="<?= $konsumenData->username; ?>">
                                    <input type="hidden" name="idbarang" value="<?= $detail->idbarang; ?>">
                                    <input type="hidden" name="statuspemesanan" value="Pending">
                                    <button class="btn btn-primary mt-1 mb-2">
                                        Pesan
                                    </button>
                                </form>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>

            &emsp;<a href="<?php echo base_url('Konsumen/index'); ?>" class="btn btn-secondary mt-1 mb-2">Back</a>
        </div>
    </div>
</div>