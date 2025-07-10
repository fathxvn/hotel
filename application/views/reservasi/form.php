<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4>Tambah Reservasi</h4>

    <form action="<?= site_url('reservasi/simpan') ?>" method="post">
        <div class="mb-3">
            <label for="id_tamu">Nama Tamu</label>
            <select name="id_tamu" id="id_tamu" class="form-control" required>
                <option value="">-- Pilih Tamu --</option>
                <?php foreach ($tamu as $t): ?>
                    <option value="<?= $t->id_tamu ?>"><?= $t->nama_lengkap ?> (<?= $t->no_ktp ?>)</option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_kamar">Nomor Kamar</label>
            <select name="id_kamar" id="id_kamar" class="form-control" required>
                <option value="">-- Pilih Kamar --</option>
                <?php foreach ($kamar as $k): ?>
                    <option value="<?= $k->id_kamar ?>">
                        <?= $k->nomor_kamar ?> - <?= $k->tipe_kamar ?> (<?= $k->status ?>)
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tanggal_check_in">Tanggal Check-in</label>
                <input type="date" name="tanggal_check_in" id="tanggal_check_in" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tanggal_check_out">Tanggal Check-out</label>
                <input type="date" name="tanggal_check_out" id="tanggal_check_out" class="form-control" required>
            </div>
        </div>

            <div class="mb-3">
                <label for="jumlah_tamu">Jumlah Tamu</label>
                <input type="number" name="jumlah_tamu" id="jumlah_tamu" class="form-control" min="1" placeholder="Misal: 2" required>
            </div>


        <div class="mb-3">
            <!-- <label for="status_pembayaran">Status Pembayaran</label>
            <select name="" id="status_pembayaran" class="form-control" required>
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Lunas">Sudah Bayar</option>
            </select> -->
        </div>

        <!-- <div class="mb-3">
            <label for="status_reservasi">Status Reservasi</label>
            <select name="status_reservasi" id="status_reservasi" class="form-control" required>
                <option value="Aktif">Aktif</option>
                <option value="Check-in">Check-in</option>
                <option value="Check-out">Check-out</option>
                <option value="Batal">Batal</option>
            </select>
        </div> -->

        <div class="mb-3">
            <label for="tanggal_reservasi">Tanggal Reservasi</label>
            <input type="date" name="tanggal_reservasi" id="tanggal_reservasi" class="form-control" value="<?= date('Y-m-d') ?>" required>
        </div>

        <div class="mb-3">
            <label for="catatan">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Opsional..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('reservasi') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
