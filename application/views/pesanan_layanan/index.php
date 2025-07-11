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
    <h4 class="mb-0">Data Pesanan Layanan</h4>
    <a href="<?= site_url('pesanan_layanan/tambah') ?>" class="btn btn-success">
      <i class="bi bi-plus"></i> Tambah Pesanan
    </a>
  </div>

  <div class="custom-table-wrapper">
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Tamu</th>
          <th>Layanan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Tanggal Pesan</th>
          <th>Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pesanan as $i => $p): ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= $p->nama_lengkap ?></td>
          <td><?= $p->nama_layanan ?></td>
          <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
          <td><?= $p->jumlah ?></td>
          <td><?= $p->tanggal_pesanan ?></td>
          <td>
            <span class="badge bg-info text-dark">Rp <?= number_format($p->harga * $p->jumlah, 0, ',', '.') ?></span>
          </td>
          <td>
            <a href="<?= site_url('pesanan_layanan/hapus/'.$p->id_pesanan) ?>" class="btn btn-sm btn-danger tombol-hapus">
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
