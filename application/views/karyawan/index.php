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

  .badge-status {
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
    <h4 class="mb-0">Data Karyawan</h4>
    <a href="<?= site_url('karyawan/tambah') ?>" class="btn btn-success">
      <i class="bi bi-plus"></i> Tambah Karyawan
    </a>
  </div>

  <div class="custom-table-wrapper">
    <table class="table custom-table align-middle table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Telepon</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($karyawan as $i => $k): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= $k->nama_lengkap ?></td>
          <td><?= $k->jabatan ?></td>
          <td><?= $k->no_telepon ?></td>
          <td><?= $k->email ?></td>
          <td><?= $k->alamat ?></td>
          <td><?= $k->tanggal_masuk ?></td>
          <td>
            <?php
              $clr = ($k->status === 'Aktif') ? 'success' : 'secondary';
            ?>
            <span class="badge bg-<?= $clr ?> badge-status"><?= $k->status ?></span>
          </td>
          <td>
            <a href="<?= site_url('karyawan/edit/' . $k->id_karyawan) ?>" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= site_url('karyawan/hapus/' . $k->id_karyawan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
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
