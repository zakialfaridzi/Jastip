<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('konsumen/index/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php foreach ($konsumenData as $i) : ?>
        <div class="content" style="margin: 50px;">
            <?php echo $this->session->flashdata('message'); ?>

            <form action="<?= base_url('Konsumen/editProfile'); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Username</label>
                        <input type="" class="form-control" name="username" value="<?= $i->username; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $i->email; ?>">
                </div>
                <div class=" form-group">
                    <label for="inputAddress2">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" value="<?= $i->nama_lengkap_konsumen; ?>">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $i->alamat; ?>">
                </div>
                <div class="form-group gender">
                    <span class="custom-label"><strong>I am a: </strong></span>
                    <label class="radio-inline">

                        <?php if ($i->jenis_kelamin == 'Laki-laki') : ?>
                            <input type="radio" name="jenis_kelamin" checked id="gender" value="Laki-laki" readonly>Laki-laki
                    </label>
                <?php elseif ($i->jenis_kelamin == 'Perempuan') :  ?>
                    <label class="radio-inline">
                        <input type="radio" name="gender" checked id="gender" value="_erempuan" readonly>Perempuan
                    </label>
                <?php else : ?>
                    <input type="radio" name="jenis_kelamin" id="gender" value="Laki-laki">Laki-laki
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jenis_kelamin" id="gender" value="Perempuan">Perempuan
                    </label>
                <?php endif; ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Tanggal lahir</label>
                    <input type="date" class="form-control" name="tanggallahir" value="<?= $i->tanggal_lahir; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>

    <?php endforeach; ?>

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