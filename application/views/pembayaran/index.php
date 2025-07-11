<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<style>
  .custom-table-wrapper {
    border-radius: 12px;
    overflow-x: auto;
    background: #ffffff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
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

  .custom-table .badge {
    font-size: 0.75rem;
    padding: 6px 10px;
    border-radius: 12px;
  }

  .custom-table .text-truncate {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  @media (max-width: 768px) {
    .custom-table table {
      font-size: 0.9rem;
    }
  }
</style>

<div class="main-content p-4" id="main-content">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Data Pembayaran</h4>
    <a href="<?= site_url('pembayaran/tambah') ?>" class="btn btn-success">
      <i class="bi bi-plus"></i> Tambah
    </a>
  </div>

  <!-- TABEL PEMBAYARAN -->
  <div class="custom-table-wrapper">
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Tamu</th>
          <th>No. Kamar</th>
          <th>Jumlah Bayar</th>
          <th>Metode</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pembayaran as $i => $p): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $p->nama_lengkap ?></td>
          <td><?= $p->nomor_kamar ?></td>
          <td>Rp <?= number_format($p->jumlah_bayar, 0, ',', '.') ?></td>
          <td><?= $p->metode_pembayaran ?></td>
          <td><?= $p->tanggal_pembayaran ?></td>
          <td>
            <?php
              $clr = $p->status_pembayaran == 'Berhasil' ? 'success' : ($p->status_pembayaran == 'Pending' ? 'warning' : 'danger');
            ?>
            <span class="badge bg-<?= $clr ?>"><?= $p->status_pembayaran ?></span>
          </td>
          <td class="text-truncate"><?= $p->keterangan ?></td>
          <td>
            <a href="<?= site_url('pembayaran/hapus/' . $p->id_pembayaran) ?>" class="btn btn-sm btn-danger tombol-hapus">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <!-- TABEL BELUM LUNAS -->
  <div class="custom-table-wrapper mt-5">
    <h5 class="mb-3">Reservasi Belum Lunas</h5>
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Tamu</th>
          <th>No. Kamar</th>
          <th>Total Tagihan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reservasi_belum_lunas as $i => $r): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $r->nama_lengkap ?></td>
          <td><?= $r->nomor_kamar ?></td>
          <td>Rp <?= number_format($r->total_harga, 0, ',', '.') ?></td>
          <td>
            <?php
              $clr = $r->status_pembayaran === 'Sudah Bayar' ? 'success' : 'danger';
            ?>
            <span class="badge bg-<?= $clr ?>"><?= $r->status_pembayaran ?></span>
          </td>
          <td>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalBayar<?= $r->id_reservasi ?>">
              <i class="bi bi-cash"></i> Bayar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalBayar<?= $r->id_reservasi ?>" tabindex="-1">
              <div class="modal-dialog">
                <form action="<?= site_url('pembayaran/simpan') ?>" method="post" class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Pembayaran untuk <?= $r->nama_lengkap ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id_reservasi" value="<?= $r->id_reservasi ?>">
                    <div class="mb-3">
                      <label>Jumlah Bayar</label>
                      <input type="number" name="jumlah_bayar" class="form-control" value="<?= $r->total_harga ?>" required>
                    </div>
                    <div class="mb-3">
                      <label>Metode Pembayaran</label>
                      <select name="metode_pembayaran" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Metode --</option>
                        <option value="Tunai">Tunai</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="E-Wallet">E-Wallet</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Status</label>
                      <select name="status_pembayaran" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Status --</option>
                        <option value="Berhasil">Berhasil</option>
                        <option value="Gagal">Gagal</option>
                        <option value="Pending">Pending</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Keterangan</label>
                      <textarea name="keterangan" class="form-control" rows="2">Pembayaran oleh <?= $r->nama_lengkap ?></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Modal -->
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
