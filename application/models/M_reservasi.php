<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reservasi extends CI_Model {

    // Ambil semua data reservasi + tamu + kamar
    public function get_all() {
        $this->db->select('r.*, t.nama_lengkap, k.nomor_kamar');
        $this->db->from('reservasi r');
        $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
        $this->db->join('kamar k', 'r.id_kamar = k.id_kamar');
        return $this->db->get()->result();
    }

    // Insert data reservasi baru
    public function insert($data) {
        // Set status pembayaran default kalau tidak dikirim
        if (!isset($data['status_pembayaran'])) {
            $data['status_pembayaran'] = 'Belum Bayar';
        }
        return $this->db->insert('reservasi', $data);
    }

    // Ambil satu data reservasi berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('reservasi', ['id_reservasi' => $id])->row();
    }

    // Update data reservasi
    public function update($id, $data) {
        $this->db->where('id_reservasi', $id);
        return $this->db->update('reservasi', $data);
    }

    // Hapus data reservasi
    public function delete($id) {
        return $this->db->delete('reservasi', ['id_reservasi' => $id]);
    }

    // Ambil reservasi yang statusnya belum lunas (Belum Bayar saja)
    public function get_belum_lunas() {
        $this->db->select('r.*, t.nama_lengkap, k.nomor_kamar');
        $this->db->from('reservasi r');
        $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
        $this->db->join('kamar k', 'r.id_kamar = k.id_kamar');
        $this->db->where_in('r.status_pembayaran', ['Belum Bayar', 'Deposit']); // <- Lebih fleksibel
        return $this->db->get()->result();
    }

    public function count_aktif() {
    return $this->db->where('status_reservasi', 'Dipesan')->from('reservasi')->count_all_results();
}

    public function count_hari_ini() {
    $today = date('Y-m-d');
    return $this->db->where('tanggal_reservasi', $today)
                    ->from('reservasi')
                    ->count_all_results();
}

public function count_status($status) {
    return $this->db->where('status_reservasi', $status)
                    ->from('reservasi')
                    ->count_all_results();
}



}
