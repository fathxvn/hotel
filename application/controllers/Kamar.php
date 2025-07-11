<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('M_kamar');
    }

    public function index() {
        $data['kamar'] = $this->M_kamar->get_all();
        $this->load->view('kamar/index', $data);
    }

    public function tambah() {
        $this->load->view('kamar/form');
    }

    public function simpan() {
        $data = [
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'tipe_kamar' => $this->input->post('tipe_kamar'),
            'harga_per_malam' => $this->input->post('harga_per_malam'),
            'status' => $this->input->post('status'),
            'lantai' => $this->input->post('lantai'),
            'kapasitas' => $this->input->post('kapasitas'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->M_kamar->insert($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        redirect('kamar');
    }

    public function edit($id) {
        $data['kamar'] = $this->M_kamar->get_by_id($id);
        $this->load->view('kamar/form', $data);
    }

    public function update($id) {
        $data = [
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'tipe_kamar' => $this->input->post('tipe_kamar'),
            'harga_per_malam' => $this->input->post('harga_per_malam'),
            'status' => $this->input->post('status'),
            'lantai' => $this->input->post('lantai'),
            'kapasitas' => $this->input->post('kapasitas'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->M_kamar->update($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
        redirect('kamar');
    }

    public function hapus($id) {
        $this->M_kamar->delete($id);
        redirect('kamar');
    }
}
