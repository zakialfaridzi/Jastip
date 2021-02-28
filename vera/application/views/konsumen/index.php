<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pesan Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Konsumen/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Pesan Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <?php echo $this->session->flashdata('message'); ?>



        <table class="table mt-3">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th colspan="5">
                    <center>Action</center>
                </th>
            </tr>

            <?php $no = 1;
            foreach ($barang as $b) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $b->nama ?></td>
                    <td><?php echo $b->keterangan ?></td>
                    <td><?php echo $b->harga ?></td>
                    <td><?php echo $b->stok ?></td>
                    <td><?php echo $b->kategori ?></td>
                    <td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $b->foto; ?>" width="75" height="75"></td>
                    <td>
                        <center>
                            <?php echo anchor('Konsumen/detail/' . $b->idbarang, '<div class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Pesan</div>') ?>
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