<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login') || $this->session->userdata('role') !== 'admin') {
            redirect('auth');
        }

        // Admin full akses, tidak perlu load semua di sini
    }

    public function index() {
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('admin/index', $data);
    }
}
