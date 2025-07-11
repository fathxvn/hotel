<link rel="stylesheet" href="assets/styles.css">
<style>
    .sidebar {
    width: 250px;
    min-height: 100vh;
    background: linear-gradient(to bottom, #0d6efd, #0a58ca);
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    overflow-x: hidden;
    transition: width 0.3s ease;
    z-index: 1000;
}

.sidebar.closed {
    width: 70px;
}

.sidebar .nav-link {
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.sidebar .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.15);
}

.sidebar .link-text {
    transition: all 0.3s ease;
}

.sidebar.closed .link-text {
    opacity: 0;
    visibility: hidden;
    display: none;
}

.sidebar .sidebar-title {
    font-weight: 600;
    transition: opacity 0.3s;
}

.sidebar.closed .sidebar-title {
    display: none;
}

</style>

<?php $level = $this->session->userdata('level'); ?>

<!-- SIDEBAR -->
<nav class="sidebar p-3 d-flex flex-column" id="sidebar">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center gap-2">
            <img src="https://cdn-icons-png.flaticon.com/512/270/270014.png" alt="Logo" width="30" height="30">
            <span class="fw-bold fs-5 sidebar-title">Hotel</span>
        </div>
        <button class="btn btn-sm btn-light d-md-inline d-none" onclick="toggleSidebar()" title="Toggle Sidebar">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <ul class="nav flex-column sidebar-menu gap-1">
        <!-- Dahsboard - SEMUA ROLE BISA -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('dashboard') ?>">
                <i class="bi bi-house-door-fill"></i><span class="link-text">Dashboard</span>
            </a>
        </li>

        <!-- menu hanya untuk admin dan manager -->
         <?php if($level == 'Admin' || $level == 'Manager'): ?>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('kamar') ?>">
                <i class="bi bi-building-fill-check"></i><span class="link-text">Kamar</span>
            </a>
        </li>
        <?php endif; ?>
        
        <!-- menu hanya untuk admin dan resepsionis -->
         <?php if($level == 'Admin' || $level == 'Resepsionis'): ?>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('tamu') ?>">
                <i class="bi bi-person-lines-fill"></i><span class="link-text">Tamu</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Reservasi dan pembayaran untuk admin dan resepsionis -->
         <?php if($level == 'Admin' || $level == 'Resepsionis'): ?>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('reservasi') ?>">
                <i class="bi bi-calendar-check-fill"></i><span class="link-text">Reservasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('pembayaran') ?>">
                <i class="bi bi-cash-coin"></i><span class="link-text">Pembayaran</span>
            </a>
        </li>
        <?php endif;?>

        <!-- Layanan hanya untuk admin -->
         <?php if($level == 'Admin'): ?>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('layanan') ?>">
                <i class="bi bi-tools"></i><span class="link-text">Layanan Tambahan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('pesanan_layanan') ?>">
                <i class="bi bi-box-seam"></i><span class="link-text">Pesanan Layanan</span>
            </a>
        </li>
        <?php endif;?>

        <!-- Karyawan hanya untuk admin -->
         <?php if($level == 'Admin'): ?>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('karyawan') ?>">
                <i class="bi bi-person-workspace"></i><span class="link-text">Karyawan</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Laporan untuk admin dan manager -->
         <?php if($level == 'Admin' || $level == 'Manager'): ?>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="<?= site_url('laporan') ?>">
                <i class="bi bi-graph-up"></i><span class="link-text">Laporan Statistik</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- logout - semua role bisa -->
        <li class="nav-item mt-2">
            <a class="nav-link d-flex align-items-center gap-2 text-danger" href="<?= site_url('auth/logout') ?>">
                <i class="bi bi-box-arrow-right"></i><span class="link-text">Logout</span>
            </a>
        </li>
    </ul>
</nav>
