<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Kasi_model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
	}
	public function index()
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Data Kepala Seksi';
		$data['kasi'] = $this->Kasi_model->getAllKasi();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kasi/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Tambah Data Kepala Seksi';
		$data['kasi'] = $this->Kasi_model->getKodeKasi();
		$data['jabatan'] = ['Kasi bidang informatika', 'Kasi bidang komunikasi', 'Kasi bidang statistik'];
		$data['status'] = ['Aktif', 'Nonaktif', 'Cuti'];
		$this->form_validation->set_rules('nama_kasi', 'name', 'required|trim');
		$this->form_validation->set_rules('telp_kasi', 'phone', 'required|trim');
		$this->form_validation->set_rules('jalan_kasi', 'street', 'required|trim');
		$this->form_validation->set_rules('no_rumah_kasi', 'house number', 'required|trim');
		$this->form_validation->set_rules('rt_kasi', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_kasi', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_kasi', 'districts', 'required|trim');
		$this->form_validation->set_rules('kota_kasi', 'city name', 'required|trim');
		$this->form_validation->set_rules('kode_pos_kasi', 'postal code', 'required|trim');
		$this->form_validation->set_rules('email_kasi', 'email', 'required|trim|valid_email|is_unique[kepala_seksi.email_kasi]',[
			'is_unique' => 'This email hash already registered!'
		]);
		$this->form_validation->set_rules('pass_kasi', 'password', 'required|trim|min_length[6]|matches[pass_kasi2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('pass_kasi2', 'password', 'required|trim|matches[pass_kasi]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/kasi/tambah', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->Kasi_model->tambahDataKasi();
			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('kasi');
		}	
	}

	public function edit($nip_kasi)
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Edit Data Kepala Seksi';
		$data['kasi'] = $this->Kasi_model->getKasiByKode($nip_kasi);
		$data['jabatan'] = ['Kasi bidang informatika', 'Kasi bidang komunikasi', 'Kasi bidang statistik'];
		$data['status'] = ['Aktif', 'Nonaktif', 'Cuti'];

		$this->form_validation->set_rules('nama_kasi', 'nama kasi', 'required|trim');
		$this->form_validation->set_rules('telp_kasi', 'nomor telepon', 'required|trim');
		$this->form_validation->set_rules('jalan_kasi', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_kasi', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_kasi', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_kasi', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_kasi', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kota_kasi', 'nama kota', 'required|trim');
		$this->form_validation->set_rules('kode_pos_kasi', 'kode pos', 'required|trim');
		$this->form_validation->set_rules('email_kasi', 'alamat email', 'required|trim');
		$this->form_validation->set_rules('pass_kasi', 'password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/kasi/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->Kasi_model->editDataKasi();
			$this->session->set_flashdata('flash2', 'diubah');
			redirect('kasi');
		}	
	}

	public function hapus($nip_kasi)
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$this->Kasi_model->hapusDataKasi($nip_kasi);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('kasi');
	}

	public function detail($nip_kasi)
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Rincian Data Kepala Seksi';
		$data['kasi'] = $this->Kasi_model->getKasiByKode($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kasi/detail', $data);
		$this->load->view('admin/templates/footer');
	}

	public function cetak()
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();
		
		$data['judul'] = 'Cetak Data Kepala Seksi';
		$data['kasi'] = $this->Kasi_model->getAllKasi();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kasi/cetak', $data);
		$this->load->view('admin/templates/footer');
	}
}