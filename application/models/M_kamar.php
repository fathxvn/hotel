<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kamar extends CI_Model {
    public function get_all() {
        return $this->db->get('kamar')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('kamar', ['id_kamar' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('kamar', $data);
    }

      public function update($id, $data) {
        return $this->db->update('kamar', $data, ['id_kamar' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('kamar', ['id_kamar' => $id]);
    }
}

?>