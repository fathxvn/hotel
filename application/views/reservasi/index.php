<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<style>
.custom-table-wrapper {
  border-radius: 12px;
  overflow-x: auto;
  background: #ffffff;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
  margin-bottom: 2rem;
  padding: 20px;
}

.custom-table table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  table-layout: auto;
  min-width: 950px;
}

.custom-table th {
  background-color: #e3f2fd;
  color: #0d47a1;
  font-weight: 600;
  white-space: nowrap;
}

.custom-table td,
.custom-table th {
  padding: 10px 14px;
  vertical-align: middle;
}

.custom-table tr:nth-child(even) {
  background-color: #f7f9fc;
}

.custom-table tr:hover {
  background-color: #e3f2fd;
}

.custom-table .text-truncate {
  max-width: 150px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.custom-table .badge {
  font-size: 0.75rem;
  padding: 6px 10px;
  border-radius: 12px;
}

@media (max-width: 768px) {
  .custom-table table {
    font-size: 0.9rem;
    min-width: unset;
  }
}
</style>

<div class="main-content p-4" id="main-content">
  <!-- ✅ Tombol tambah tidak mentok ke atas -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Reservasi</h4>
    <a href="<?= site_url('reservasi/tambah') ?>" class="btn btn-success">
      <i class="bi bi-plus"></i> Tambah
    </a>
  </div>

  <div class="custom-table-wrapper">
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Tamu</th>
          <th>Kamar</th>
          <th>Check-in</th>
          <th>Check-out</th>
          <th>Jml</th>
          <th>Harga</th>
          <th>Bayar</th>
          <th>Reservasi</th>
          <th>Tgl Reservasi</th>
          <th>Catatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reservasi as $i => $r): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $r->nama_lengkap ?></td>
          <td><?= $r->nomor_kamar ?></td>
          <td><?= $r->tanggal_check_in ?></td>
          <td><?= $r->tanggal_check_out ?></td>
          <td><?= $r->jumlah_tamu ?></td>
          <td>Rp <?= number_format($r->total_harga, 0, ',', '.') ?></td>
          <td>
            <?php $clr = $r->status_pembayaran === 'Sudah Bayar' ? 'success' : 'danger'; ?>
            <span class="badge bg-<?= $clr ?>"><?= $r->status_pembayaran ?></span>
          </td>
          <td>
            <?php
              $color = match ($r->status_reservasi) {
                'Dipesan' => 'info',
                'Check-in' => 'primary',
                'Check-out' => 'success',
                'Batal' => 'danger',
                default => 'secondary',
              };
            ?>
            <span class="badge bg-<?= $color ?>"><?= $r->status_reservasi ?></span>
          </td>
          <td><?= $r->tanggal_reservasi ?></td>
          <td class="text-truncate"><?= $r->catatan ?></td>
          <td>
            <a href="<?= site_url('reservasi/edit/' . $r->id_reservasi) ?>" class="btn btn-sm btn-primary">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= site_url('reservasi/hapus/' . $r->id_reservasi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus reservasi?')">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
