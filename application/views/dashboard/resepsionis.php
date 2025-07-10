<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h3 class="fw-semibold text-primary">
            <i class="bi bi-person-badge-fill me-2"></i> Selamat Datang, <?= $nama ?> 👩‍💼 (Resepsionis)
        </h3>
        <p class="text-muted mb-0">Anda dapat memantau status reservasi, pembayaran, dan layanan tamu.</p>
    </div>

    <!-- Ringkasan -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check text-primary fs-3 mb-2"></i>
                    <h6 class="mb-1">Reservasi Hari Ini</h6>
                    <p class="text-muted mb-0"><?= $reservasi_hari_ini ?> Tamu</p>
                    <a href="<?= site_url('reservasi') ?>" class="btn btn-sm btn-outline-primary mt-2">Lihat Reservasi</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-cash-coin text-success fs-3 mb-2"></i>
                    <h6 class="mb-1">Belum Lunas</h6>
                    <p class="text-muted mb-0"><?= $reservasi_belum_lunas ?> Reservasi</p>
                    <a href="<?= site_url('pembayaran') ?>" class="btn btn-sm btn-outline-success mt-2">Bayar Sekarang</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-person-check-fill text-warning fs-3 mb-2"></i>
                    <h6 class="mb-1">Check-in Hari Ini</h6>
                    <p class="text-muted mb-0"><?= $jumlah_checkin ?> Tamu</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-box-arrow-left text-danger fs-3 mb-2"></i>
                    <h6 class="mb-1">Check-out Hari Ini</h6>
                    <p class="text-muted mb-0"><?= $jumlah_checkout ?> Tamu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>
