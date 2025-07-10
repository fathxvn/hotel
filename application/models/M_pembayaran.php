<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

    public function get_all() {
    $this->db->select('p.*, r.id_reservasi, t.nama_lengkap, k.nomor_kamar');
    $this->db->from('pembayaran p');
    $this->db->join('reservasi r', 'p.id_reservasi = r.id_reservasi');
    $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
    $this->db->join('kamar k', 'r.id_kamar = k.id_kamar');
    return $this->db->get()->result();
}


    public function delete($id) {
        return $this->db->delete('pembayaran', ['id_pembayaran' => $id]);
    }


    public function insert($data) {
        return $this->db->insert('pembayaran', $data);
    }
    
    public function get_total_pendapatan() {
    return $this->db->select_sum('jumlah_bayar')->get('pembayaran')->row()->jumlah_bayar;
}

public function get_chart_pendapatan_bulanan() {
    return $this->db->query("
        SELECT MONTH(tanggal_pembayaran) AS bulan, SUM(jumlah_bayar) AS total
        FROM pembayaran
        GROUP BY MONTH(tanggal_pembayaran)
        ORDER BY bulan ASC
    ")->result();
}


}
