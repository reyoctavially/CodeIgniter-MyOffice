<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Cuti_model');
	}

	public function admin_index(){
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$nip_kasi = $data['login']['nip_kasi'];

		$data['judul'] = 'Data Cuti Pegawai';
		$data['cuti'] = $this->Cuti_model->getAllCutiNip($nip_kasi);
		$data['pegawai'] = $this->Cuti_model->getPegawaiNip($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/cuti/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function admin_detail($kode_cuti){
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();
		
		$data['judul'] = 'Rincian Data Cuti Pegawai';
		$data['cuti'] = $this->Cuti_model->getCutiByKode($kode_cuti);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/cuti/detail', $data);
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

		$data['judul'] = 'Cetak Data Cuti Pegawai';
		$data['cuti'] = $this->Cuti_model->cetakDataCuti($kode_pegawai);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/cuti/cetak', $data);
		$this->load->view('admin/templates/footer');
	}
	
	// ------------------------------------------------------------------------------------

	public function user_index(){
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$data['judul'] = 'Data Cuti Pegawai';
		$data['cuti'] = $this->Cuti_model->getCutiByKodePegawai($kode_pegawai);
		$data['pegawai'] = $this->Cuti_model->getPegawaiByKode($kode_pegawai);
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/cuti/index', $data);
		$this->load->view('user/templates/footer');
	}

	public function user_detail($kode_cuti){
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');
		
		$data['judul'] = 'Rincian Data Cuti Pegawai';
		$data['cuti'] = $this->Cuti_model->getCutiByKode($kode_cuti);
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/cuti/detail', $data);
		$this->load->view('user/templates/footer');
	}
}