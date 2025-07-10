<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_layanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }
        $this->load->model('M_pesanan_layanan');
        $this->load->model('M_reservasi');
        $this->load->model('M_layanan'); // pastikan model ini tersedia
    }

    public function index() {
        $data['pesanan'] = $this->M_pesanan_layanan->get_all();
        $this->load->view('pesanan_layanan/index', $data);
    }

    public function tambah() {
        $data['reservasi'] = $this->M_reservasi->get_all();
        $data['layanan'] = $this->M_layanan->get_all();
        $this->load->view('pesanan_layanan/form', $data);
    }

    public function simpan() {
        $data = [
            'id_reservasi' => $this->input->post('id_reservasi'),
            'id_layanan' => $this->input->post('id_layanan'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_pesanan' => date('Y-m-d H:i:s')
        ];
        $this->M_pesanan_layanan->insert($data);
        redirect('pesanan_layanan');
    }

    public function hapus($id) {
        $this->M_pesanan_layanan->delete($id);
        redirect('pesanan_layanan');
    }
}
