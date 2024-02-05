<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kasi extends REST_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Kasi_model');
	}

	public function index_get()
	{
		$nip_kasi = $this->get('nip_kasi');
		if ($nip_kasi == null) {
			$Kasi = $this->Kasi_model->getAllKasi();
		} else {
			$Kasi = $this->Kasi_model->getKasiByKode($nip_kasi);
		}
		
		if ($Kasi) {
			$this->response([
				'status' => TRUE,
				'data' => $Kasi
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Kasi tidak ditemukan'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_delete()
	{
		$nip_kasi = $this->delete('nip_kasi');
		if ($nip_kasi == null) {
			$this->response([
				'status' => FALSE,
				'message' => 'Periksa kembali nip kasi!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->Kasi_model->hapusDataKasi($nip_kasi) > 0) {
				$this->response([
					'status' => TRUE,
					'data' => $nip_kasi,
					'message' => 'Data kasi berhasil dihapus.'
				], REST_Controller::HTTP_NO_CONTENT);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'Kasi tidak ditemukan'
				], REST_Controller::HTTP_BAD_REQUEST);
			}	
		}
	}

	public function index_post()
	{
		$data = [
			'nip_kasi' => $this->post('nip_kasi'),
			'nama_kasi' => $this->post('nama_kasi'),
			'foto_kasi' => 'default.png',
			'jabatan_kasi' => $this->post('jabatan_kasi'),
			'telp_kasi' => $this->post('telp_kasi'),
			'jalan_kasi' => $this->post('jalan_kasi'),
			'no_rumah_kasi' => $this->post('no_rumah_kasi'),
			'rt_kasi' => $this->post('rt_kasi'),
			'rw_kasi' => $this->post('rw_kasi'),
			'kec_kasi' => $this->post('kec_kasi'),
			'kota_kasi' => $this->post('kota_kasi'),
			'kode_pos_kasi' => $this->post('kode_pos_kasi'),
			'email_kasi' => $this->post('email_kasi'),
			'pass_kasi' => password_hash($this->post('pass_kasi'), PASSWORD_DEFAULT),
			'status_kasi' => $this->post('status_kasi'),
			'is_active' => 0,
			'date_created' => time()
		];
		if ($this->Kasi_model->tambahDataKasiRest($data) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data kasi berhasil ditambahkan'
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data kasi gagal ditambahkan'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$nip_kasi = $this->put('nip_kasi');
		$data = [
			'nama_kasi' => $this->post('nama_kasi'),
			'jabatan_kasi' => $this->post('jabatan_kasi'),
			'telp_kasi' => $this->post('telp_kasi'),
			'jalan_kasi' => $this->post('jalan_kasi'),
			'no_rumah_kasi' => $this->post('no_rumah_kasi'),
			'rt_kasi' => $this->post('rt_kasi'),
			'rw_kasi' => $this->post('rw_kasi'),
			'kec_kasi' => $this->post('kec_kasi'),
			'kota_kasi' => $this->post('kota_kasi'),
			'kode_pos_kasi' => $this->post('kode_pos_kasi'),
			'status_kasi' => $this->post('status_kasi')
		];

		if ($this->Kasi_model->updateDataKasiRest($data, $nip_kasi) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data kasi berhasil diperbarui'
			], REST_Controller::HTTP_NO_CONTENT);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data kasi gagal diperbarui'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}