<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

    public function get_all() {
        return $this->db->get('karyawan')->result();
    }

    public function insert($data) {
        return $this->db->insert('karyawan', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('karyawan', ['id_karyawan' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->update('karyawan', $data, ['id_karyawan' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('karyawan', ['id_karyawan' => $id]);
    }
}
