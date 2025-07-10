<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4><?= isset($tamu) ? 'Edit Tamu' : 'Tambah Tamu' ?></h4>

    <form action="<?= isset($tamu) ? site_url('tamu/update/' . $tamu->id_tamu) : site_url('tamu/simpan') ?>" method="post">
        
        <div class="mb-3">
            <label>Nama Tamu</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?= $tamu->nama_lengkap ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label>No KTP</label>
            <input type="number" name="no_ktp" class="form-control" value="<?= $tamu->no_ktp ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $tamu->alamat ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="<?= $tamu->no_telepon ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $tamu->email ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $tamu->tanggal_lahir ?? '' ?>">
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-laki" <?= (isset($tamu) && $tamu->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= (isset($tamu) && $tamu->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('tamu') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
