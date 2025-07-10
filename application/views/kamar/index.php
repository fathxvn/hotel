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
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Data Kamar</h4>
    <a href="<?= site_url('kamar/tambah') ?>" class="btn btn-success">
      <i class="bi bi-plus"></i> Tambah
    </a>
  </div>

  <div class="custom-table-wrapper">
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nomor</th>
          <th>Tipe</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Lantai</th>
          <th>Kapasitas</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kamar as $i => $k): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $k->nomor_kamar ?></td>
          <td><?= $k->tipe_kamar ?></td>
          <td>Rp <?= number_format($k->harga_per_malam, 0, ',', '.') ?></td>
          <td>
            <?php
              $color = $k->status === 'Tersedia' ? 'success' : 'danger';
            ?>
            <span class="badge bg-<?= $color ?>"><?= $k->status ?></span>
          </td>
          <td><?= $k->lantai ?></td>
          <td><?= $k->kapasitas ?> Orang</td>
          <td class="text-truncate"><?= $k->deskripsi ?></td>
          <td>
            <a href="<?= site_url('kamar/edit/' . $k->id_kamar) ?>" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= site_url('kamar/hapus/' . $k->id_kamar) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ini?')">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
