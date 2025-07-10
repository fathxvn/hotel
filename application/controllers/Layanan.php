<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }
        $this->load->model('M_layanan');
    }

    public function index() {
    $this->load->model('M_layanan');

    $layanan = $this->M_layanan->get_with_pesanan();
    foreach ($layanan as $l) {
        $l->pesanan = $this->M_layanan->get_pesanan_by_layanan($l->id_layanan);
    }

    $data['layanan'] = $layanan;
    $this->load->view('layanan/index', $data);
}


    public function tambah() {
        $this->load->view('layanan/form');
    }

    public function simpan() {
        $data = [
            'nama_layanan' => $this->input->post('nama_layanan'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        ];

        $this->M_layanan->insert($data);
        redirect('layanan');
    }

    public function edit($id) {
        $data['layanan'] = $this->M_layanan->get_by_id($id);
        $this->load->view('layanan/form', $data);
    }

    public function update($id) {
        $data = [
            'nama_layanan' => $this->input->post('nama_layanan'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        ];
        $this->M_layanan->update($id, $data);
        redirect('layanan');
    }

    public function hapus($id) {
        $this->M_layanan->delete($id);
        redirect('layanan');
    }
}
