<div class="content-wrapper">
    <div class="content ml-2 mr-2">
        <?php foreach ($barang as $b): ?>
            <form action="<?php echo base_url() . 'Barang/update'; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="hidden" name="idbarang" id="idbarang" class="form-control" value="<?php echo $b->idbarang ?>">
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $b->nama ?>">
                </div>
                <div class="form-group">
                    <label>Keterangan Barang</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $b->keterangan ?>">
                </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $b->harga ?>">
                </div>
                <div class="form-group">
                    <label>Stok Barang</label>
                    <input type="text" name="stok" id="stok" class="form-control" value="<?php echo $b->stok ?>">
                </div>
                <div class="form-group">
                    <label>Kategori Barang</label>
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
                    <label>Foto Barang</label>
                    &emsp;<img src="<?php echo base_url(); ?>assets/foto/<?php echo $b->foto; ?>" width="75" height="75">
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>

                <button type="reset" class="btn btn-btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        <?php endforeach;?>
    </div>
</div>