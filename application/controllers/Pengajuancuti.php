<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuancuti extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pengajuancuti_model');
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

		$data['judul'] = 'Data Pengajuan Cuti Pegawai';
		$data['pengajuancuti'] = $this->Pengajuancuti_model->getAllPengajuancutiNip($nip_kasi);
		$data['pegawai'] = $this->Pengajuancuti_model->getPegawaiNip($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pengajuancuti/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function admin_simpan($kode_pengajuan_cuti)
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Menyimpan Pengajuan Cuti Pegawai';
		$data['cuti'] = $this->Pengajuancuti_model->getKodeCuti();
		$data['pengajuancuti'] = $this->Pengajuancuti_model->getPengajuanByKode($kode_pengajuan_cuti);
		$data['jeniscuti'] = ['Cuti kecil', 'Cuti besar'];

		$this->form_validation->set_rules('pemotongan_honor', 'pemotongan honor', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/pengajuancuti/simpan', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->Pengajuancuti_model->simpanPengajuanCuti();
			$this->Pengajuancuti_model->updatePengajuanCuti();
			$this->Pengajuancuti_model->updatePegawai();
			$this->session->set_flashdata('flash', 'disimpan');
			redirect('cuti/admin_index');
		}	
	}

	public function admin_detail($kode_pengajuan_cuti)
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$data['judul'] = 'Rincian Data Pengajuan Cuti Pegawai';
		$data['pengajuancuti'] = $this->Pengajuancuti_model->getPengajuanByKode($kode_pengajuan_cuti);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pengajuancuti/detail', $data);
		$this->load->view('admin/templates/footer');
	}

	public function admin_tolak($kode_pengajuan_cuti)
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$this->Pengajuancuti_model->tolakPengajuanCuti($kode_pengajuan_cuti);
		$this->session->set_flashdata('flash', 'ditolak');
		redirect('pengajuancuti/admin_index');
	}

	public function cetak(){
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$kode_pegawai = $this->input->post('kode_pegawai');

		$data['judul'] = 'Cetak Data Pengajuan Cuti Pegawai';
		$data['pengajuancuti'] = $this->Pengajuancuti_model->cetakDataPengajuanCuti($kode_pegawai);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pengajuancuti/cetak', $data);
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

		$data['judul'] = 'Data Pengajuan Cuti Pegawai';
		$data['pengajuancuti'] = $this->Pengajuancuti_model->getPengajuanByKodePegawai($kode_pegawai);
		$data['pegawai'] = $this->Pengajuancuti_model->getPegawaiByKode($kode_pegawai);
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/pengajuancuti/index', $data);
		$this->load->view('user/templates/footer');
	}

	public function user_detail($kode_pengajuan_cuti)
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$data['judul'] = 'Rincian Data Pengajuan Cuti Pegawai';
		$data['pengajuancuti'] = $this->Pengajuancuti_model->getPengajuanByKode($kode_pengajuan_cuti);
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/pengajuancuti/detail', $data);
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

		$data['judul'] = 'Pengjuan Cuti Pegawai';
		$data['pengajuancuti'] = $this->Pengajuancuti_model->getKasiPegawaiByKode($kode_pegawai);
		$data['kode'] = $this->Pengajuancuti_model->getKodePengajuan();
		$this->form_validation->set_rules('tgl_mulai_cuti', 'date start', 'required');
		$this->form_validation->set_rules('tgl_selesai_cuti', 'date end', 'required');
		$this->form_validation->set_rules('alasan_pengajuan_cuti', 'reason', 'required|trim');

		$mulai = $this->input->post('tgl_mulai_cuti');
		$selesai = $this->input->post('tgl_selesai_cuti');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/templates/header', $data);
			$this->load->view('user/pengajuancuti/tambah', $data);
			$this->load->view('user/templates/footer');
		} else {
			if ($mulai > $selesai) {
				$this->session->set_flashdata('flash', 'cuti');
				redirect('pengajuancuti/user_tambah');
			} else if($mulai < date('Y-m-d')) {
				$this->session->set_flashdata('flash2', '');
				redirect('pengajuancuti/user_tambah');
			} else {
				$this->Pengajuancuti_model->tambahPengajuanCuti();
				$this->session->set_flashdata('flash', 'mengajukan cuti');
				redirect('pengajuancuti/user_index');
			}
		}	
	}
}