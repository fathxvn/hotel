<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function get_total_pendapatan() {
        $this->db->select_sum('jumlah_bayar');

        $result = $this->db->get('pembayaran')->row();
        return $result->jumlah_bayar ?? 0;

    }

    public function get_jumlah_reservasi() {
        return $this->db->count_all('reservasi');
    }

    public function get_chart_pendapatan() {
        $query = $this->db->query("
            SELECT MONTH(tanggal_pembayaran) as bulan, SUM(jumlah_bayar) as total 
            FROM pembayaran 
            GROUP BY MONTH(tanggal_pembayaran)
        ");
        return $query->result();
    }

    public function get_total_pendapatan_layanan() {
        $this->db->select('SUM(l.harga * pl.jumlah) as total');
        $this->db->from('pesanan_layanan pl');
        $this->db->join('layanan_tambahan l', 'pl.id_layanan = l.id_layanan');
        $result = $this->db->get()->row();
        return $result->total ?? 0;
    }

    public function get_jumlah_pesanan_layanan() {
        return $this->db->count_all('pesanan_layanan');
    }

}
