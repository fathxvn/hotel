<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4>Tambah Pesanan Layanan</h4>

    <form action="<?= site_url('pesanan_layanan/simpan') ?>" method="post">
        <div class="mb-3">
            <label>Reservasi</label>
            <select name="id_reservasi" class="form-control" required>
                <option value="">-- Pilih Tamu --</option>
                <?php foreach($reservasi as $r): ?>
                <option value="<?= $r->id_reservasi ?>"><?= $r->nama_lengkap ?> - Kamar <?= $r->nomor_kamar ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Layanan</label>
            <select name="id_layanan" class="form-control" required>
                <option value="">-- Pilih Layanan --</option>
                <?php foreach($layanan as $l): ?>
                <option value="<?= $l->id_layanan ?>"><?= $l->nama_layanan ?> - Rp <?= number_format($l->harga, 0, ',', '.') ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required min="1" value="1">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pesanan_layanan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
