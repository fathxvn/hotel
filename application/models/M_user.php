<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function get_user($username) {
        $this->db->where('username', $username);
        $this->db->where('status', 'Aktif');
        return $this->db->get('pengguna')->row();
    }
}
