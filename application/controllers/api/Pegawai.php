<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pegawai extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model');
	}

	public function index_get()
	{
		$kode_pegawai = $this->get('kode_pegawai');
		if ($kode_pegawai == null) {
			$pegawai = $this->Pegawai_model->getAllPegawai();
		} else {
			$pegawai = $this->Pegawai_model->getPegawaiByKode($kode_pegawai);
		}

		if ($pegawai) {
			$this->response([
				'status' => TRUE,
				'data' => $pegawai
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Pegawai tidak ditemukan'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_delete()
	{
		$kode_pegawai = $this->delete('kode_pegawai');
		if ($kode_pegawai == null) {
			$this->response([
				'status' => FALSE,
				'message' => 'Periksa kembali kode pegawai!'
			], REST_Controller::HTTP_OK);
		} else {
			if ($this->Pegawai_model->hapusDataPegawai($kode_pegawai) > 0) {
				$this->response([
					'status' => TRUE,
					'data' => $kode_pegawai,
					'message' => 'Data pegawai berhasil dihapus.'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'Pegawai tidak ditemukan'
				], REST_Controller::HTTP_OK);
			}
		}
	}

	public function index_post()
	{
		$data['pegawai'] = $this->Pegawai_model->getKodePegawai();
		$pegawai = $data['pegawai'];
		foreach ($pegawai as $pgw) :
			$split = explode('-', $pgw['kode_pegawai']);
			$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
			$code = "PG-" . $number;
		endforeach;

		$data = [
			'kode_pegawai' => $code,
			'nama_pegawai' => $this->post('nama_pegawai'),
			'foto_pegawai' => 'default.png',
			'jabatan_pegawai' => $this->post('jabatan_pegawai'),
			'telp_pegawai' => $this->post('telp_pegawai'),
			'jalan_pegawai' => $this->post('jalan_pegawai'),
			'no_rumah_pegawai' => $this->post('no_rumah_pegawai'),
			'rt_pegawai' => $this->post('rt_pegawai'),
			'rw_pegawai' => $this->post('rw_pegawai'),
			'kec_pegawai' => $this->post('kec_pegawai'),
			'kota_pegawai' => $this->post('kota_pegawai'),
			'kode_pos_pegawai' => $this->post('kode_pos_pegawai'),
			'email_pegawai' => $this->post('email_pegawai'),
			'pass_pegawai' => password_hash($this->post('pass_pegawai'), PASSWORD_DEFAULT),
			'status_pegawai' => $this->post('status_pegawai'),
			'is_active' => 0,
			'date_created' => time(),
			'nip_kasi' => $this->post('nip_kasi')
		];
		if ($this->Pegawai_model->tambahDataPegawaiRest($data) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data pegawai berhasil ditambahkan'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data pegawai gagal ditambahkan'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_put()
	{
		$kode_pegawai = $this->put('kode_pegawai');
		$data = [
			'nama_pegawai' => $this->post('nama_pegawai'),
			'jabatan_pegawai' => $this->post('jabatan_pegawai'),
			'telp_pegawai' => $this->post('telp_pegawai'),
			'jalan_pegawai' => $this->post('jalan_pegawai'),
			'no_rumah_pegawai' => $this->post('no_rumah_pegawai'),
			'rt_pegawai' => $this->post('rt_pegawai'),
			'rw_pegawai' => $this->post('rw_pegawai'),
			'kec_pegawai' => $this->post('kec_pegawai'),
			'kota_pegawai' => $this->post('kota_pegawai'),
			'kode_pos_pegawai' => $this->post('kode_pos_pegawai'),
			'status_pegawai' => $this->post('status_pegawai'),
			'nip_kasi' => $this->post('nip_kasi')
		];

		if ($this->Pegawai_model->updateDataPegawaiRest($data, $kode_pegawai) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data pegawai berhasil diperbarui'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data pegawai gagal diperbarui'
			], REST_Controller::HTTP_OK);
		}
	}
}
