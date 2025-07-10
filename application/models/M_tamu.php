<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tamu extends CI_Model {

    public function get_all() {
        return $this->db->get('tamu')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('tamu', ['id_tamu' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('tamu', $data);
    }

    public function update($id, $data) {
        return $this->db->update('tamu', $data, ['id_tamu' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('tamu', ['id_tamu' => $id]);
    }
}
