<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        if (!in_array($this->session->userdata('level'), ['Admin', 'Manager'])) {
            show_404();
        }
        $this->load->model('M_laporan');
    }

   public function index() {
    $this->load->model('M_laporan');
    $data['total_pendapatan'] = $this->M_laporan->get_total_pendapatan();
    $data['jumlah_reservasi'] = $this->M_laporan->get_jumlah_reservasi();
    $data['total_pendapatan_layanan'] = $this->M_laporan->get_total_pendapatan_layanan();
    $data['jumlah_pesanan_layanan'] = $this->M_laporan->get_jumlah_pesanan_layanan();
    $data['chart_pendapatan'] = $this->M_laporan->get_chart_pendapatan();
    $this->load->view('laporan/index', $data);
}

}
