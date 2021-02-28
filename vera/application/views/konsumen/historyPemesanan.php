<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">History Pemesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Konsumen/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">History Pemesanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <?php echo $this->session->flashdata('message'); ?>

        <!-- Button trigger modal -->

        <table class="table mt-3">
            <tr style="text-align: center">
                <th>ID Pesanan</th>
                <th>Nama Barang</th>
                <th>Jumlah Pesanan</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th colspan="5">
                    <center>Action</center>
                </th>
            </tr>

            <?php
            foreach ($pesanan as $b) : ?>
                <tr style="text-align: center">
                    <td><?php echo $b->idpesanan; ?></td>
                    <td><?php echo $b->namabarang ?></td>
                    <td><?php echo $b->jumlahbarang ?></td>
                    <td><?php echo $b->hargabarang ?></td>
                    <td><?php echo $b->totalharga ?></td>
                    <td><?php echo $b->statuspemesanan ?></td>
                    <td>
                        <center>
                            <?php echo anchor('Konsumen/detailPesanan/' . $b->idpesanan, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i> detail pesanan</div>') ?>
                        </center>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="BarangModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'Barang/tambah'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Barang</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="text" name="stok" id="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Barang</label>
                        <select class="form-control form-control-sm" id="kategori" name="kategori">
                            <option value="Baju">Baju</option>
                            <option value="Celana">Celana</option>
                            <option value="Topi">Topi</option>
                            <option value="Kertas">Kertas</option>
                            <option value="Sticker">Sticker</option>
                            <option value="Pin">Pin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Barang</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>