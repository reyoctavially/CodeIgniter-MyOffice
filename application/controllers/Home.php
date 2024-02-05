<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
	}
	
	public function admin_index()
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Halaman home';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/home/index', $data);
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

		$data['judul'] = 'Halaman home';
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/home/index', $data);
		$this->load->view('user/templates/footer');
	}
}