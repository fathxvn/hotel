<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan extends CI_Model {

    public function get_all() {
        return $this->db->get('layanan_tambahan')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('layanan_tambahan', ['id_layanan' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('layanan_tambahan', $data);
    }

    public function update($id, $data) {
        return $this->db->update('layanan_tambahan', $data, ['id_layanan' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('layanan_tambahan', ['id_layanan' => $id]);
    }

    public function get_with_pesanan() {
        $this->db->select('l.*');
        $this->db->from('layanan_tambahan l');
        return $this->db->get()->result();
    }

    public function get_pesanan_by_layanan($id_layanan) {
        $this->db->select('pl.*, t.nama_lengkap, k.nomor_kamar, pl.tanggal_pesanan');
        $this->db->from('pesanan_layanan pl');
        $this->db->join('reservasi r', 'pl.id_reservasi = r.id_reservasi');
        $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
        $this->db->join('kamar k', 'r.id_kamar = k.id_kamar');
        $this->db->where('pl.id_layanan', $id_layanan);
        return $this->db->get()->result();
    }


}
