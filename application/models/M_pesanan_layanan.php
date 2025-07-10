<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan_layanan extends CI_Model {

    public function get_all() {
        $this->db->select('pl.*, r.id_reservasi, t.nama_lengkap, l.nama_layanan, l.harga');
        $this->db->from('pesanan_layanan pl');
        $this->db->join('reservasi r', 'pl.id_reservasi = r.id_reservasi');
        $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
        $this->db->join('layanan_tambahan l', 'pl.id_layanan = l.id_layanan');
        return $this->db->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('pesanan_layanan', $data);
    }

    public function delete($id) {
        return $this->db->delete('pesanan_layanan', ['id_pesanan' => $id]);
    }

   public function get_total_pendapatan() {
    $this->db->select('SUM(pl.jumlah * lt.harga) AS total');
    $this->db->from('pesanan_layanan pl');
    $this->db->join('layanan_tambahan lt', 'lt.id_layanan = pl.id_layanan'); // ✅ BENAR
    return $this->db->get()->row()->total;
    }


    public function count_pesanan() {
    return $this->db->count_all('pesanan_layanan');
    }

}
