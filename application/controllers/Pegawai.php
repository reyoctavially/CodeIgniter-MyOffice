<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pegawai_model');
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

		$nip_kasi = $data['login']['nip_kasi'];

		$data['judul'] = 'Data Pegawai';
		$data['pegawai'] = $this->Pegawai_model->getAllPegawaiNip($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pegawai/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$nip_kasi = $data['login']['nip_kasi'];

		$data['judul'] = 'Tambah Data Pegawai';
		$data['pegawai'] = $this->Pegawai_model->getKodePegawai();
		$data['kasi'] = $this->Pegawai_model->getKasiNip($nip_kasi);
		$data['jabatan'] = ['Staff bidang informatika', 'Staff bidang komunikasi', 'Staff bidang statistik'];
		$data['status'] = ['Aktif', 'Nonaktif', 'Cuti'];
		$this->form_validation->set_rules('nama_pegawai', 'name', 'required|trim');
		$this->form_validation->set_rules('telp_pegawai', 'phone', 'required|trim');
		$this->form_validation->set_rules('jalan_pegawai', 'street', 'required|trim');
		$this->form_validation->set_rules('no_rumah_pegawai', 'house number', 'required|trim');
		$this->form_validation->set_rules('rt_pegawai', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_pegawai', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_pegawai', 'districts', 'required|trim');
		$this->form_validation->set_rules('kota_pegawai', 'city name', 'required|trim');
		$this->form_validation->set_rules('kode_pos_pegawai', 'postal code', 'required|trim');
		$this->form_validation->set_rules('email_pegawai', 'email', 'required|trim|valid_email|is_unique[pegawai_honorer.email_pegawai]',[
			'is_unique' => 'This email hash already registered!'
		]);
		$this->form_validation->set_rules('pass_pegawai', 'password', 'required|trim|min_length[6]|matches[pass_pegawai2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('pass_pegawai2', 'password', 'required|trim|matches[pass_pegawai]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/pegawai/tambah', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->Pegawai_model->tambahDataPegawai();
			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('Pegawai');
		}	
	}

	public function edit($kode_pegawai)
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Edit Data Pegawai';
		$data['pegawai'] = $this->Pegawai_model->getPegawaiByKode($kode_pegawai);
		$data['kasi'] = $this->Pegawai_model->getKasi();
		$data['jabatan'] = ['Staff bidang informatika', 'Staff bidang komunikasi', 'Staff bidang statistik'];
		$data['status'] = ['Aktif', 'Nonaktif', 'Cuti'];

		$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required|trim');
		$this->form_validation->set_rules('telp_pegawai', 'nomor telepon', 'required|trim');
		$this->form_validation->set_rules('jalan_pegawai', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_pegawai', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_pegawai', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_pegawai', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_pegawai', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kota_pegawai', 'nama kota', 'required|trim');
		$this->form_validation->set_rules('kode_pos_pegawai', 'kode pos', 'required|trim');
		$this->form_validation->set_rules('email_pegawai', 'alamat email', 'required|trim');
		$this->form_validation->set_rules('pass_pegawai', 'password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/pegawai/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->Pegawai_model->editDataPegawai();
			$this->Pegawai_model->editCuti();
			$this->session->set_flashdata('flash2', 'diubah');
			redirect('pegawai');
		}	
	}

	public function hapus($kode_pegawai)
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$this->Pegawai_model->hapusDataPegawai($kode_pegawai);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('pegawai');
	}

	public function detail($kode_pegawai)
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Rincian Data Pegawai';
		$data['pegawai'] = $this->Pegawai_model->getPegawaiByKode($kode_pegawai);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pegawai/detail', $data);
		$this->load->view('admin/templates/footer');
	}

	public function cetak()
	{
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$nip_kasi = $data['login']['nip_kasi'];
		
		$data['judul'] = 'Cetak Data Pegawai';
		$data['pegawai'] = $this->Pegawai_model->getAllPegawaiNip($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pegawai/cetak', $data);
		$this->load->view('admin/templates/footer');
	}
}