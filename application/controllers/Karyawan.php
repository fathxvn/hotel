<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('M_karyawan');
    }

    public function index() {
        $data['karyawan'] = $this->M_karyawan->get_all();
        $this->load->view('karyawan/index', $data);
    }

    public function tambah() {
        $this->load->view('karyawan/form');
    }

    public function simpan() {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'status' => $this->input->post('status')
        ];
        $this->M_karyawan->insert($data);
        redirect('karyawan');
    }

    public function edit($id) {
        $data['karyawan'] = $this->M_karyawan->get_by_id($id);
        $this->load->view('karyawan/form_edit', $data);
    }

    public function update($id) {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'status' => $this->input->post('status')
        ];
        $this->M_karyawan->update($id, $data);
        redirect('karyawan');
    }

    public function hapus($id) {
        $this->M_karyawan->delete($id);
        redirect('karyawan');
    }
}
