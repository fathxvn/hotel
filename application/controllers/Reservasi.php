<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('M_reservasi');
        $this->load->model('M_tamu');
        $this->load->model('M_kamar');
    }

    public function index() {
        $data['reservasi'] = $this->M_reservasi->get_all();
        $this->load->view('reservasi/index', $data);
    }

    public function tambah() {
        $data['tamu'] = $this->M_tamu->get_all();
        $data['kamar'] = $this->M_kamar->get_all();
        $this->load->view('reservasi/form', $data);
    }

    public function simpan() {
    $id_kamar = $this->input->post('id_kamar');
    $checkin = $this->input->post('tanggal_check_in');
    $checkout = $this->input->post('tanggal_check_out');

    // Ambil data kamar untuk dapatkan harga_per_malam
    $kamar = $this->M_kamar->get_by_id($id_kamar);
    $harga_per_malam = $kamar->harga_per_malam ?? 0;

    // Hitung jumlah hari menginap
    $start = new DateTime($checkin);
    $end = new DateTime($checkout);
    $interval = $start->diff($end);
    $jumlah_hari = $interval->days;

    // Jika checkout <= checkin, set minimal 1 malam
    if ($jumlah_hari <= 0) $jumlah_hari = 1;

    // Hitung total harga
    $total_harga = $jumlah_hari * $harga_per_malam;

    $data = [
        'id_tamu' => $this->input->post('id_tamu'),
        'id_kamar' => $id_kamar,
        'tanggal_check_in' => $checkin,
        'tanggal_check_out' => $checkout,
        'jumlah_tamu' => $this->input->post('jumlah_tamu'),
        'total_harga' => $total_harga,
        'status_pembayaran' => 'Belum Bayar',
        'status_reservasi' => 'Dipesan',
        'tanggal_reservasi' => $this->input->post('tanggal_reservasi'),
        'catatan' => $this->input->post('catatan')
    ];

    $this->M_reservasi->insert($data);
    redirect('reservasi');
}

    public function edit($id) {
    $data['reservasi'] = $this->M_reservasi->get_by_id($id);
    $this->load->view('reservasi/edit_status', $data);
}

    public function update($id) {
        $data = [
        'status_reservasi' => $this->input->post('status_reservasi')
     ];
     $this->M_reservasi->update($id, $data);
        redirect('reservasi');
}

    public function hapus($id) {
        $this->M_reservasi->delete($id);
        redirect('reservasi');
    }
}
