<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resepsionis extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login') || $this->session->userdata('role') !== 'resepsionis') {
            redirect('auth');
        }

        // Load model yang diperlukan
        $this->load->model('Reservasi_model');
        $this->load->model('Pembayaran_model');
    }

    public function index() {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('resepsionis/index', $data);
    }
}
