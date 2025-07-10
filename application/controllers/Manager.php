<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login') || $this->session->userdata('role') !== 'manager') {
            redirect('auth');
        }

        $this->load->model('M_pembayaran');
        $this->load->model('M_reservasi');
        $this->load->model('M_pesanan_layanan');
    }

    public function index() {
        $data['nama'] = $this->session->userdata('nama');

        $data['total_pendapatan'] = $this->M_pembayaran->get_total_pendapatan() ?? 0;
        $data['reservasi_aktif'] = $this->M_reservasi->count_aktif() ?? 0;
        $data['total_pendapatan_layanan'] = $this->M_pesanan_layanan->get_total_pendapatan() ?? 0;
        $data['total_pesanan_layanan'] = $this->M_pesanan_layanan->count_pesanan() ?? 0;
        $data['chart_pendapatan'] = $this->M_pembayaran->get_chart_pendapatan_bulanan() ?? [];

        $this->load->view('dashboard/manager', $data);
    }
}
