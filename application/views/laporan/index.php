<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.card-summary {
    border-radius: 10px;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.07);
    transition: all 0.3s;
}
.card-summary:hover {
    transform: translateY(-3px);
}
.card-summary h6 {
    font-weight: 500;
    margin-bottom: 4px;
    font-size: 0.9rem;
}
.card-summary h5 {
    font-weight: 600;
    font-size: 1.2rem;
}
.chart-container {
    height: 320px;
    padding: 10px;
}
</style>

<div class="main-content p-4" id="main-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">📊 Laporan Statistik Hotel</h4>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-success card-summary">
                <div class="card-body">
                    <h6>Total Pendapatan</h6>
                    <h5>Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-primary card-summary">
                <div class="card-body">
                    <h6>Total Reservasi</h6>
                    <h5><?= $jumlah_reservasi ?> Reservasi</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-warning card-summary">
                <div class="card-body">
                    <h6>Pendapatan Layanan</h6>
                    <h5>Rp <?= number_format($total_pendapatan_layanan, 0, ',', '.') ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card bg-info card-summary">
                <div class="card-body">
                    <h6>Total Pesanan Layanan</h6>
                    <h5><?= $jumlah_pesanan_layanan ?> Pesanan</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Chart -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h6 class="card-title mb-3 text-primary fw-semibold">
                Grafik Pendapatan Bulanan 📈
            </h6>
            <div class="chart-container">
                <canvas id="chartPendapatan"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
const ctx = document.getElementById('chartPendapatan').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?= implode(',', array_map(fn($c) => "'Bulan $c->bulan'", $chart_pendapatan)) ?>],
        datasets: [{
            label: 'Pendapatan per Bulan',
            data: [<?= implode(',', array_map(fn($c) => $c->total, $chart_pendapatan)) ?>],
            backgroundColor: 'rgba(0, 123, 255, 0.7)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1,
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 12,
                        family: 'Poppins'
                    }
                }
            }
        }
    }
});
</script>

<?php $this->load->view('template/footer'); ?>
