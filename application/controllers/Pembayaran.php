<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Pembayaran extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('M_pembayaran');
        $this->load->model('M_reservasi');

        
    }

    public function index() {
    $this->load->model('M_pembayaran');
    $this->load->model('M_reservasi');

    $data['pembayaran'] = $this->M_pembayaran->get_all();
    $data['reservasi_belum_lunas'] = $this->M_reservasi->get_belum_lunas(); // <-- PENTING

    $this->load->view('pembayaran/index', $data);
}


    public function tambah() {
        $data['reservasi'] = $this->M_reservasi->get_all();
        $this->load->view('pembayaran/form', $data);
    }

  public function simpan() {
    $id_reservasi = $this->input->post('id_reservasi');

    $data = [
        'id_reservasi' => $id_reservasi,
        'jumlah_bayar' => $this->input->post('jumlah_bayar'),
        'metode_pembayaran' => $this->input->post('metode_pembayaran', TRUE),
        'status_pembayaran' => $this->input->post('status_pembayaran', TRUE), // Ex: 'Berhasil'
        'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran') ?? date('Y-m-d H:i:s'),
        'keterangan' => $this->input->post('keterangan', TRUE),
    ];

    $this->M_pembayaran->insert($data);

    // Jika transaksi berhasil, update status reservasi
    if ($data['status_pembayaran'] === 'Berhasil') {
        $this->M_reservasi->update($id_reservasi, ['status_pembayaran' => 'Sudah Bayar']);
    }
    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');

    redirect('pembayaran');
}

    public function bayar($id_reservasi) {
        $this->load->model('M_reservasi');
        $reservasi = $this->M_reservasi->get_by_id($id_reservasi);

        if (!$reservasi) show_404();

        $data['reservasi'] = $reservasi;
        $this->load->view('pembayaran/form_bayar', $data);
}

 public function hapus($id) {
        $this->M_pembayaran->delete($id);
        redirect('pembayaran');
    }

}

?>