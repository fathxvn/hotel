<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4><?= isset($layanan) ? 'Edit' : 'Tambah' ?> Layanan</h4>

    <form action="<?= isset($layanan) ? site_url('layanan/update/' . $layanan->id_layanan) : site_url('layanan/simpan') ?>" method="post">
        <div class="mb-3">
            <label>Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control" value="<?= isset($layanan) ? $layanan->nama_layanan : '' ?>" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= isset($layanan) ? $layanan->harga : '' ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?= isset($layanan) ? $layanan->deskripsi : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Tersedia" <?= (isset($layanan) && $layanan->status == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
                <option value="Tidak Tersedia" <?= (isset($layanan) && $layanan->status == 'Tidak Tersedia') ? 'selected' : '' ?>>Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('layanan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
