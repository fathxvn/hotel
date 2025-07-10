<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }
        $this->load->model('M_tamu');
    }

    public function index() {
        $data['tamu'] = $this->M_tamu->get_all();
        $this->load->view('tamu/index', $data);
    }

    public function tambah() {
        $this->load->view('tamu/form');
    }

    public function simpan() {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_ktp' => $this->input->post('no_ktp'),
            'alamat' => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        ];
        $this->M_tamu->insert($data);
        redirect('tamu');
    }

    public function edit($id) {
        $data['tamu'] = $this->M_tamu->get_by_id($id);
        $this->load->view('tamu/form', $data);
    }

    public function update($id) {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_ktp' => $this->input->post('no_ktp'),
            'alamat' => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        ];
        $this->M_tamu->update($id, $data);
        redirect('tamu');
    }

    public function hapus($id) {
        $this->M_tamu->delete($id);
        redirect('tamu');
    }
}
