<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Kesehatan_model');
		$this->load->library('form_validation');
	}
	public function admin_index()
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$nip_kasi = $data['login']['nip_kasi'];

		$data['judul'] = 'Data Kesehatan Pegawai';
		$data['kesehatan'] = $this->Kesehatan_model->getAllKesehatanNip($nip_kasi);
		$data['pegawai'] = $this->Kesehatan_model->getPegawaiNip($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kesehatan/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function admin_detail($kode_kesehatan)
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Rincian Data Kesehatan Pegawai';
		$data['kesehatan'] = $this->Kesehatan_model->getKesehatanByKode($kode_kesehatan);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kesehatan/detail', $data);
		$this->load->view('admin/templates/footer');
	}

	public function cetak(){
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$kode_pegawai = $this->input->post('kode_pegawai');
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');

		$data['judul'] = 'Cetak Data Kesehatan Pegawai';
		$data['kesehatan'] = $this->Kesehatan_model->cetakDataKesehatan($kode_pegawai, $awal, $akhir);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/kesehatan/cetak', $data);
		$this->load->view('admin/templates/footer');
	}

	// ------------------------------------------------------------------------------------

	public function user_index()
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$data['judul'] = 'Data kesehatan';
		$data['kesehatan'] = $this->Kesehatan_model->getKesehatanByKodePegawai($kode_pegawai);
		$data['pegawai'] = $this->Kesehatan_model->getKesehatanByKode($kode_pegawai);
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/kesehatan/index', $data);
		$this->load->view('user/templates/footer');
	}

	public function user_detail($kode_kesehatan)
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$data['judul'] = 'Rincian Data Kesehatan pegawai';
		$data['kesehatan'] = $this->Kesehatan_model->getKesehatanByKode($kode_kesehatan);
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/kesehatan/detail', $data);
		$this->load->view('user/templates/footer');
	}

	public function user_tambah()
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$data['judul'] = 'Tambah Data Kesehatan';
		$data['jenis_pekerjaan'] = ['Work from office', 'Work from home'];
		$data['swab'] = ['Negatif', 'Positif'];
		$data['kesehatan'] = $this->Kesehatan_model->getKasiPegawaiByKode($kode_pegawai);
		$data['kode'] = $this->Kesehatan_model->getKodeKesehatan();
		$this->form_validation->set_rules('suhu_tubuh_pegawai', 'temperature', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/templates/header', $data);
			$this->load->view('user/kesehatan/tambah', $data);
			$this->load->view('user/templates/footer');
		} else {
			$this->Kesehatan_model->tambahKesehatan();
			$this->session->set_flashdata('flash', 'menyimpan data kesehatan');
			redirect('kesehatan/user_index');
		}	
	}
}