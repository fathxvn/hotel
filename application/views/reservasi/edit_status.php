<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <h4>Edit Status Reservasi</h4>

    <form action="<?= site_url('reservasi/update/' . $reservasi->id_reservasi) ?>" method="post">
        <div class="mb-3">
            <label for="status_reservasi">Status Reservasi</label>
            <select name="status_reservasi" id="status_reservasi" class="form-control" required>
                <option value="Dipesan" <?= $reservasi->status_reservasi == 'Dipesan' ? 'selected' : '' ?>>Dipesan</option>
                <option value="Check-in" <?= $reservasi->status_reservasi == 'Check-in' ? 'selected' : '' ?>>Check-in</option>
                <option value="Check-out" <?= $reservasi->status_reservasi == 'Check-out' ? 'selected' : '' ?>>Check-out</option>
                <option value="Batal" <?= $reservasi->status_reservasi == 'Batal' ? 'selected' : '' ?>>Batal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('reservasi') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php $this->load->view('template/footer'); ?>
