<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        // Load semua model yang dibutuhkan di dashboard
        $this->load->model('M_reservasi');
        $this->load->model('M_pembayaran');
        $this->load->model('M_pesanan_layanan');
    }

    public function index() {
        $data['nama'] = $this->session->userdata('nama');
        $data['level'] = $this->session->userdata('level');

        switch ($data['level']) {
            case 'Admin':
                // semua data administratif
                $data['jumlah_tamu'] = $this->db->count_all('tamu');
                $data['jumlah_kamar'] = $this->db->count_all('kamar');
                $data['jumlah_karyawan'] = $this->db->count_all('karyawan');
                $data['jumlah_layanan'] = $this->db->count_all('layanan_tambahan');

                $this->load->view('dashboard/admin', $data);
                break;

           case 'Manager':
                $data['total_pendapatan'] = $this->M_pembayaran->get_total_pendapatan() ?? 0;
                $data['reservasi_aktif'] = $this->M_reservasi->count_aktif() ?? 0;
                $data['reservasi_hari_ini'] = $this->M_reservasi->count_hari_ini() ?? 0; // ← Tambahkan ini
                $data['total_pendapatan_layanan'] = $this->M_pesanan_layanan->get_total_pendapatan() ?? 0;
                $data['total_pesanan_layanan'] = $this->M_pesanan_layanan->count_pesanan() ?? 0;
                $data['chart_data'] = $this->M_pembayaran->get_chart_pendapatan_bulanan();

                $this->load->view('dashboard/manager', $data);
                break;

            case 'Resepsionis':
                $this->load->model('M_reservasi');
                $this->load->model('M_pembayaran');

                $data['nama'] = $this->session->userdata('nama');
                $data['reservasi_hari_ini'] = $this->M_reservasi->count_hari_ini();
                $data['reservasi_belum_lunas'] = count($this->M_reservasi->get_belum_lunas());
                $data['jumlah_checkin'] = $this->M_reservasi->count_status('Check-in');
                $data['jumlah_checkout'] = $this->M_reservasi->count_status('Check-out');

                $this->load->view('dashboard/resepsionis', $data);
                break;

            default:
                show_error("Role tidak dikenali.");
        }
    }
}
