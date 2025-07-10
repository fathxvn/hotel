<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index() {
        if ($this->session->userdata('is_login')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    public function login_process() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->M_user->get_user($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'user_id'   => $user->id_pengguna,
                'username'  => $user->username,
                'nama'      => $user->nama_lengkap,
                'level'     => $user->level,
                'is_login'  => TRUE
            ]);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
