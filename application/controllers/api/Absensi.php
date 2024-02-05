<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Absensi extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Absensi_model');
	}

	public function index_get()
	{
		$kode_pegawai = $this->get('kode_pegawai');
		if ($kode_pegawai == null) {
			$absensi = $this->Absensi_model->getAllAbsensi();
		} else {
			$absensi = $this->Absensi_model->getAbsensiByKode($kode_pegawai);
		}

		if ($absensi) {
			$this->response([
				'status' => TRUE,
				'data' => $absensi
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'absensi tidak ditemukan'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_delete()
	{
		$kode_pegawai = $this->delete('kode_pegawai');
		if ($kode_pegawai == null) {
			$this->response([
				'status' => FALSE,
				'message' => 'Periksa kembali kode_pegawai!'
			], REST_Controller::HTTP_OK);
		} else {
			if ($this->Absensi_model->hapusDataAbsensiRest($kode_pegawai) > 0) {
				$this->response([
					'status' => TRUE,
					'data' => $kode_pegawai,
					'message' => 'Data absensi berhasil dihapus.'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'absensi tidak ditemukan'
				], REST_Controller::HTTP_OK);
			}
		}
	}

	public function index_post()
	{
		$data['absensi'] = $this->Absensi_model->getKodeAbsensi();
		$absensi = $data['absensi'];
		foreach ($absensi as $ct) :
			$split = explode('-', $ct['kode_absensi']);
			$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
			$code = "SN-" . $number;
		endforeach;
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'kode_absensi' => $code,
			'tanggal_absen' => date('Y-m-d'),
			'jam_masuk' => date('H:i:s'),
			'jam_keluar' => '00:00:00',
			'kode_pegawai' => $this->post('kode_pegawai'),
			'nip_kasi' => $this->post('nip_kasi')
		];
		$kode_pegawai = $this->post('kode_pegawai');
		$pegawai = $this->Absensi_model->getStatusPegawaiByKode($kode_pegawai);
		$kode['kode'] = $this->Absensi_model->getAbsenMasuk($kode_pegawai);
		if ($pegawai['status_pegawai'] == "Aktif") {
			if ($kode['kode'] != false) {
				$this->response([
					'status' => FALSE,
					'message' => 'Anda sudah melakukan absen masuk hari ini'
				], REST_Controller::HTTP_OK);
			} else {
				$this->Absensi_model->tambahDataAbsensiRest($data);
				$this->response([
					'status' => TRUE,
					'message' => 'Berhasil melakukan absen masuk'
				], REST_Controller::HTTP_OK);
			}
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Anda sedang cuti'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_put()
	{
		$kode_pegawai = $this->put('kode_pegawai');
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'jam_keluar' => date('H:i:s')
		];

		$get = $this->Absensi_model->getAbsenKeluar($kode_pegawai);

		if ($get != false) {
			$this->response([
				'status' => FALSE,
				'message' => 'Anda sudah melakukan absen keluar hari ini'
			], REST_Controller::HTTP_OK);
		} else {
			$this->Absensi_model->updateDataAbsensiRest($data, $kode_pegawai);
			$this->response([
				'status' => TRUE,
				'message' => 'Berhasil melakukan absen keluar'
			], REST_Controller::HTTP_OK);
		}
	}
}
