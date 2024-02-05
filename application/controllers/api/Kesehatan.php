<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kesehatan extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kesehatan_model');
	}

	public function index_get()
	{
		$kode_pegawai = $this->get('kode_pegawai');
		if ($kode_pegawai == null) {
			$kesehatan = $this->Kesehatan_model->getAllKesehatan();
		} else {
			$kesehatan = $this->Kesehatan_model->getKesehatanByKodePegawai($kode_pegawai);
		}

		if ($kesehatan) {
			$this->response([
				'status' => TRUE,
				'data' => $kesehatan
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'data kesehatan tidak ditemukan'
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
			if ($this->Kesehatan_model->hapusDataKesehatanRest($kode_pegawai) > 0) {
				$this->response([
					'status' => TRUE,
					'data' => $kode_pegawai,
					'message' => 'Data kesehatan berhasil dihapus.'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'data kesehatan tidak ditemukan'
				], REST_Controller::HTTP_OK);
			}
		}
	}

	public function index_post()
	{
		$data['kesehatan'] = $this->Kesehatan_model->getKodeKesehatan();
		$kesehatan = $data['kesehatan'];
		foreach ($kesehatan as $ks) :
			$split = explode('-', $ks['kode_kesehatan']);
			$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
			$code = "KS-" . $number;
		endforeach;
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'kode_kesehatan' => $code,
			'tgl_input_kesehatan' => date('Y-m-d'),
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'suhu_tubuh_pegawai' => $this->input->post('suhu_tubuh_pegawai'),
			'hasil_swab_pegawai' => $this->input->post('hasil_swab_pegawai'),
			'status_vaksinasi_pegawai' => $this->input->post('status_vaksinasi_pegawai'),
			'kode_pegawai' => $this->input->post('kode_pegawai'),
			'nip_kasi' => $this->input->post('nip_kasi')
		];
		if ($this->Kesehatan_model->tambahDataKesehatanRest($data) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data kesehatan berhasil ditambahkan'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data kesehatan gagal ditambahkan'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_put()
	{
		$kode_absensi = $this->put('kode_absensi');
		$kode_pegawai = $this->put('kode_pegawai');
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'tgl_input_kesehatan' => date('Y-m-d'),
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'suhu_tubuh_pegawai' => $this->input->post('suhu_tubuh_pegawai'),
			'hasil_swab_pegawai' => $this->input->post('hasil_swab_pegawai'),
			'status_vaksinasi_pegawai' => $this->input->post('status_vaksinasi_pegawai'),
		];

		if ($this->Kesehatan_model->updateDataKesehatanRest($data, $kode_absensi, $kode_pegawai) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data kesehatan berhasil diperbarui'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data kesehatan gagal diperbarui'
			], REST_Controller::HTTP_OK);
		}
	}
}
