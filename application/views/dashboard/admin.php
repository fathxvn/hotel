<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<div class="main-content p-4" id="main-content">
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h3 class="fw-semibold text-primary">
            <i class="bi bi-person-gear me-2"></i> Halo, <?= $nama ?> (Admin)
        </h3>
        <p class="text-muted mb-0">Selamat datang di panel administrator. Anda memiliki akses penuh untuk mengelola sistem hotel.</p>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-person-lines-fill text-primary fs-2 mb-2"></i>
                    <h6 class="mb-1">Data Tamu</h6>
                    <p class="text-muted mb-0"><?= $jumlah_tamu ?> Tamu</p>
                    <a href="<?= site_url('tamu') ?>" class="btn btn-sm btn-outline-primary mt-2">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-building-fill-check text-success fs-2 mb-2"></i>
                    <h6 class="mb-1">Data Kamar</h6>
                    <p class="text-muted mb-0"><?= $jumlah_kamar ?> Kamar</p>
                    <a href="<?= site_url('kamar') ?>" class="btn btn-sm btn-outline-success mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill text-warning fs-2 mb-2"></i>
                    <h6 class="mb-1">Data Karyawan</h6>
                    <p class="text-muted mb-0"><?= $jumlah_karyawan ?> Orang</p>
                    <a href="<?= site_url('karyawan') ?>" class="btn btn-sm btn-outline-warning mt-2">Kelola</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-tools text-danger fs-2 mb-2"></i>
                    <h6 class="mb-1">Layanan Tambahan</h6>
                    <p class="text-muted mb-0"><?= $jumlah_layanan ?> Jenis</p>
                    <a href="<?= site_url('layanan') ?>" class="btn btn-sm btn-outline-danger mt-2">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>
