<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<style>
  .custom-table-wrapper {
    border-radius: 12px;
    background: #ffffff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    padding: 20px;
    overflow-x: auto;
    margin-bottom: 2rem;
  }

  .custom-table table {
    width: 100%;
    min-width: 950px;
    border-collapse: separate;
    border-spacing: 0;
  }

  .custom-table th {
    background-color: #e3f2fd;
    color: #0d47a1;
    font-weight: 600;
    white-space: nowrap;
  }

  .custom-table td,
  .custom-table th {
    padding: 12px 14px;
    vertical-align: middle;
  }

  .custom-table tr:nth-child(even) {
    background-color: #f7f9fc;
  }

  .custom-table tr:hover {
    background-color: #e3f2fd;
  }

  .table-sm th, .table-sm td {
    padding: 6px 10px;
    font-size: 0.9rem;
  }

  .badge {
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
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Layanan Tambahan</h4>
    <a href="<?= site_url('layanan/tambah') ?>" class="btn btn-success">
      <i class="bi bi-plus"></i> Tambah Layanan
    </a>
  </div>

  <div class="custom-table-wrapper">
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Layanan</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($layanan as $i => $l): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $l->nama_layanan ?></td>
          <td>Rp <?= number_format($l->harga, 0, ',', '.') ?></td>
          <td><span class="badge bg-success">Tersedia</span></td>
          <td><?= $l->deskripsi ?></td>
          <td>
            <a href="<?= site_url('pesanan_layanan/tambah/' . $l->id_layanan) ?>" class="btn btn-sm btn-primary">
              <i class="bi bi-plus-circle"></i> Ambil Layanan
            </a>
          </td>
        </tr>

        <!-- Sub-tabel Pesanan -->
        <tr>
          <td colspan="6" class="bg-light">
            <strong>Daftar yang sudah ambil layanan ini:</strong>
            <?php if (!empty($l->pesanan)): ?>
            <div class="table-responsive mt-2">
              <table class="table table-sm table-bordered mb-0">
                <thead class="table-secondary">
                  <tr>
                    <th>Nama Tamu</th>
                    <th>No Kamar</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pesan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($l->pesanan as $p): ?>
                  <tr>
                    <td><?= $p->nama_lengkap ?></td>
                    <td><?= $p->nomor_kamar ?></td>
                    <td><?= $p->jumlah ?></td>
                    <td><?= $p->tanggal_pesanan ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <?php else: ?>
              <p class="text-muted mt-2 mb-0">Belum ada yang ambil layanan ini.</p>
            <?php endif ?>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
