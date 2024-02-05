<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Absensi_model');
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

		$data['judul'] = 'Data Absensi Pegawai';
		$data['absensi'] = $this->Absensi_model->getAllAbsensiNip($nip_kasi);
		$data['pegawai'] = $this->Absensi_model->getPegawaiNip($nip_kasi);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/absensi/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function cetak()
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$kode_pegawai = $this->input->post('kode_pegawai');
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');

		$data['judul'] = 'Cetak Data Cuti Pegawai';
		$data['absensi'] = $this->Absensi_model->cetakDataAbsensi($kode_pegawai, $awal, $akhir);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/absensi/cetak', $data);
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

		$data['judul'] = 'Data Absensi Pegawai';
		$data['absensi'] = $this->Absensi_model->getAbsensiByKode($kode_pegawai);
		$data['pegawai'] = $this->Absensi_model->getPegawaiByKode($kode_pegawai);
		$data['kode'] = $this->Absensi_model->getKodeAbsensi();
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/absensi/index', $data);
		$this->load->view('user/templates/footer');
	}

	public function absen_masuk($code)
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$get = $this->Absensi_model->getAbsenMasuk($kode_pegawai);
		$data['kasi'] = $this->Absensi_model->getKasiPegawaiByKode($kode_pegawai);
		$nip_kasi = $data['kasi']['nip_kasi'];

		if ($get != false) {
			$this->session->set_flashdata('flash2', 'melakukan absen masuk hari ini');
			redirect('Absensi/user_index');
		} else {
			$this->Absensi_model->simpanAbsenMasuk($code, $kode_pegawai, $nip_kasi);
			$this->session->set_flashdata('flash', 'melakukan absen masuk');
			redirect('Absensi/user_index');
		}
	}

	public function absen_keluar($code)
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');

		$get = $this->Absensi_model->getAbsenKeluar($kode_pegawai);

		if ($get != false) {
			$this->session->set_flashdata('flash2', 'melakukan absen keluar hari ini');
			redirect('Absensi/user_index');
		} else {
			$this->Absensi_model->simpanAbsenKeluar($kode_pegawai);
			$this->session->set_flashdata('flash', 'melakukan absen keluar');
			redirect('Absensi/user_index');
		}
	}
}
