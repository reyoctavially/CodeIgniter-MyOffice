<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Cuti extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuti_model');
	}

	public function index_get()
	{
		$kode_pegawai = $this->get('kode_pegawai');
		if ($kode_pegawai == null) {
			$cuti = $this->Cuti_model->getAllCuti();
		} else {
			$cuti = $this->Cuti_model->getcutiByKodePegawai($kode_pegawai);
		}

		if ($cuti) {
			$this->response([
				'status' => TRUE,
				'data' => $cuti
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data cuti tidak ditemukan'
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
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->Cuti_model->hapusDataCutiRest($kode_pegawai) > 0) {
				$this->response([
					'status' => TRUE,
					'data' => $kode_pegawai,
					'message' => 'Data cuti berhasil dihapus.'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'cuti tidak ditemukan'
				], REST_Controller::HTTP_OK);
			}
		}
	}

	public function index_post()
	{
		$data['cuti'] = $this->Cuti_model->getKodeCuti();
		$cuti = $data['cuti'];
		foreach ($cuti as $ct) :
			$split = explode('-', $ct['kode_cuti']);
			$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
			$code = "CT-" . $number;
		endforeach;
		$data = [
			'kode_cuti' => $code,
			'jenis_cuti' => $this->post('jenis_cuti'),
			'pemotongan_honor' => $this->post('pemotongan_honor'),
			'tglmulaicuti' => $this->post('tglmulaicuti'),
			'tglselesaicuti' => $this->post('tglselesaicuti'),
			'statuscuti' => $this->post('statuscuti'),
			'kode_pegawai' => $this->post('kode_pegawai'),
			'nip_kasi' => $this->post('nip_kasi'),
			'kode_pengajuan_cuti' => $this->post('kode_pengajuan_cuti')
		];
		if ($this->Cuti_model->tambahDataCutiRest($data) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data cuti berhasil ditambahkan'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data cuti gagal ditambahkan'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_put()
	{
		$kode_cuti = $this->put('kode_cuti');
		$data = [
			'jenis_cuti' => $this->post('jenis_cuti'),
			'pemotongan_honor' => $this->post('pemotongan_honor'),
			'tglmulaicuti' => $this->post('tglmulaicuti'),
			'tglselesaicuti' => $this->post('tglselesaicuti'),
			'statuscuti' => $this->post('statuscuti'),
			'kode_pegawai' => $this->post('kode_pegawai'),
			'nip_kasi' => $this->post('nip_kasi'),
			'kode_pengajuan_cuti' => $this->post('kode_pengajuan_cuti')
		];

		if ($this->Cuti_model->updateDataCutiRest($data, $kode_cuti) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data cuti berhasil diperbarui'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data cuti gagal diperbarui'
			], REST_Controller::HTTP_OK);
		}
	}
}
