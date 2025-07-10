<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4>Tambah Pembayaran</h4>

    <form action="<?= site_url('pembayaran/simpan') ?>" method="post">
        <div class="mb-3">
            <label for="id_reservasi">Pilih Reservasi</label>
            <select name="id_reservasi" id="id_reservasi" class="form-control" required>
                <option value="">-- Pilih Reservasi --</option>
                <?php foreach ($reservasi as $r): ?>
                    <option value="<?= $r->id_reservasi ?>">
                        <?= $r->nama_lengkap ?> - Kamar <?= $r->nomor_kamar ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="Tunai">Tunai</option>
                <option value="Kartu Kredit">Kartu Kredit</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input type="datetime-local" name="tanggal_pembayaran" class="form-control" value="<?= date('Y-m-d\TH:i') ?>" required>
        </div>

        <div class="mb-3">
            <label for="status_pembayaran">Status</label>
            <select name="status_pembayaran" class="form-control" required>
                <option value="Berhasil">Berhasil</option>
                <option value="Gagal">Gagal</option>
                <option value="Pending">Pending</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" placeholder="Opsional..."></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('pembayaran') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
