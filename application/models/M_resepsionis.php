<?php
class M_reservasi extends CI_Model {

    public function get_all() {
        $this->db->select('r.*, t.nama_lengkap, k.nomor_kamar');
        $this->db->from('reservasi r');
        $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
        $this->db->join('kamar k', 'r.id_kamar = k.id_kamar');
        return $this->db->get()->result();
    }

    public function insert($data) {
        if (!isset($data['status_pembayaran'])) {
            $data['status_pembayaran'] = 'Belum Bayar';
        }
        return $this->db->insert('reservasi', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('reservasi', ['id_reservasi' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id_reservasi', $id);
        return $this->db->update('reservasi', $data);
    }

    public function delete($id) {
        return $this->db->delete('reservasi', ['id_reservasi' => $id]);
    }

    public function get_belum_lunas() {
        $this->db->select('r.*, t.nama_lengkap, k.nomor_kamar');
        $this->db->from('reservasi r');
        $this->db->join('tamu t', 'r.id_tamu = t.id_tamu');
        $this->db->join('kamar k', 'r.id_kamar = k.id_kamar');
        $this->db->where_in('r.status_pembayaran', ['Belum Bayar', 'Deposit']);
        return $this->db->get()->result();
    }

    public function count_aktif() {
        return $this->db->where('status_reservasi', 'Dipesan')->from('reservasi')->count_all_results();
    }

    // Tambahan untuk resepsionis
    public function count_hari_ini() {
        $today = date('Y-m-d');
        return $this->db->where('tanggal_reservasi', $today)->from('reservasi')->count_all_results();
    }

    public function count_status($status) {
        return $this->db->where('status_reservasi', $status)->from('reservasi')->count_all_results();
    }
}
?>
