<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4><?= isset($kamar) ? 'Edit Kamar' : 'Tambah Kamar' ?></h4>

    <form action="<?= isset($kamar) ? site_url('kamar/update/' . $kamar->id_kamar) : site_url('kamar/simpan') ?>" method="post" class="mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nomor Kamar</label>
                <input type="text" name="nomor_kamar" class="form-control" value="<?= $kamar->nomor_kamar ?? '' ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Tipe Kamar</label>
                <input type="text" name="tipe_kamar" class="form-control" value="<?= $kamar->tipe_kamar ?? '' ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Harga per Malam</label>
                <input type="number" name="harga_per_malam" class="form-control" value="<?= $kamar->harga_per_malam ?? '' ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option <?= isset($kamar) && $kamar->status == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                    <option <?= isset($kamar) && $kamar->status == 'Terisi' ? 'selected' : '' ?>>Terisi</option>
                    <option <?= isset($kamar) && $kamar->status == 'Pemeliharaan' ? 'selected' : '' ?>>Pemeliharaan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Lantai</label>
                <input type="number" name="lantai" class="form-control" value="<?= $kamar->lantai ?? '' ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" value="<?= $kamar->kapasitas ?? '' ?>" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?= $kamar->deskripsi ?? '' ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($kamar) ? 'Update' : 'Simpan' ?></button>
        <a href="<?= site_url('kamar') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
