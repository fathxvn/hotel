<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="main-content p-4" id="main-content">
    <div class="bg-light p-4 rounded shadow-sm mb-4">
       <h3 class="fw-semibold text-primary">
    <i class="bi bi-person-badge-fill me-2"></i> 
    Halo, <?= $nama ?> <span class="text-secondary">(Manager)</span>
</h3>

        <p class="text-muted mb-0">Berikut ringkasan operasional hotel. Gunakan data ini untuk memantau performa hotel.</p>
    </div>

    <!-- Ringkasan -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <h6>Pendapatan Total</h6>
                    <h5>Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <h6>Reservasi Aktif</h6>
                    <h5><?= $reservasi_aktif ?> Reservasi</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-warning text-white shadow-sm">
                <div class="card-body">
                    <h6>Pendapatan Layanan</h6>
                    <h5>Rp <?= number_format($total_pendapatan_layanan, 0, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-info text-white shadow-sm">
                <div class="card-body">
                    <h6>Pesanan Layanan</h6>
                    <h5><?= $total_pesanan_layanan ?> Pesanan</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h6 class="fw-semibold text-primary mb-3">Grafik Pendapatan Bulanan</h6>
            <div style="height: 320px;">
                <canvas id="chartManager"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartManager').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?= implode(',', array_map(fn($c) => "'Bulan $c->bulan'", $chart_data)) ?>],
        datasets: [{
            label: 'Pendapatan Bulanan',
            data: [<?= implode(',', array_map(fn($c) => $c->total, $chart_data)) ?>],
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            tension: 0.4,
            fill: true,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: { font: { family: 'Poppins' } }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: value => 'Rp ' + value.toLocaleString('id-ID')
                }
            }
        }
    }
});
</script>
<?php $this->load->view('template/footer'); ?>