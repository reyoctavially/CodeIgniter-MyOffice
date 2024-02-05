<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class pengajuancuti extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajuancuti_model');
	}

	public function index_get()
	{
		$kode_pegawai = $this->get('kode_pegawai');
		if ($kode_pegawai == null) {
			$pengajuancuti = $this->Pengajuancuti_model->getAllPengajuancuti();
		} else {
			$pengajuancuti = $this->Pengajuancuti_model->getPengajuanByKodePegawai($kode_pegawai);
		}

		if ($pengajuancuti) {
			$this->response([
				'status' => TRUE,
				'data' => $pengajuancuti
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'pengajuancuti tidak ditemukan'
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
			if ($this->Pengajuancuti_model->hapusDataPengajuanRest($kode_pegawai) > 0) {
				$this->response([
					'status' => TRUE,
					'data' => $kode_pegawai,
					'message' => 'Data pengajuan cuti berhasil dihapus.'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'pengajuan cuti tidak ditemukan'
				], REST_Controller::HTTP_OK);
			}
		}
	}

	public function index_post()
	{
		$data['pengajuan_cuti'] = $this->Pengajuancuti_model->getKodePengajuan();
		$pengajuancuti = $data['pengajuan_cuti'];
		foreach ($pengajuancuti as $ct) :
			$split = explode('-', $ct['kode_pengajuan_cuti']);
			$number = str_pad($split[1] + 1, 3, 0, STR_PAD_LEFT);
			$code = "PC-" . $number;
		endforeach;
		$data = [
			'kode_pengajuan_cuti' => $code,
			'tgl_pengajuan_cuti' => date('Y-m-d'),
			'alasan_pengajuan_cuti' => $this->post('alasan_pengajuan_cuti'),
			'tgl_mulai_cuti' => $this->post('tgl_mulai_cuti'),
			'tgl_selesai_cuti' => $this->post('tgl_selesai_cuti'),
			'status_pengajuan_cuti' => "Menunggu",
			'ket_pengajuan_cuti' => "Menunggu persetujuan dari kepala seksi",
			'kode_pegawai' => $this->post('kode_pegawai'),
			'nip_kasi' => $this->post('nip_kasi')
		];
		$mulai = $this->input->post('tgl_mulai_cuti');
		$selesai = $this->input->post('tgl_selesai_cuti');

		if ($mulai > $selesai) {
			$this->response([
				'status' => FALSE,
				'message' => 'Tanggal mulai tidak boleh melebihi tanggal selesai'
			], REST_Controller::HTTP_OK);
		} else if ($mulai < date('Y-m-d')) {
			$this->response([
				'status' => FALSE,
				'message' => 'Tanggal mulai cuti sudah terlewat'
			], REST_Controller::HTTP_OK);
		} else {
			$this->Pengajuancuti_model->tambahDataPengajuanRest($data);
			$this->response([
				'status' => TRUE,
				'message' => 'Berhasil mengajukan cuti'
			], REST_Controller::HTTP_OK);
		}
	}

	public function index_put()
	{
		$kode_pengajuan_cuti = $this->put('kode_pengajuan_cuti');
		$data = [
			'tgl_pengajuan_cuti' => $this->post('tgl_pengajuan_cuti'),
			'alasan_pengajuan_cuti' => $this->post('alasan_pengajuan_cuti'),
			'tgl_mulai_cuti' => $this->post('tgl_mulai_cuti'),
			'tgl_selesai_cuti' => $this->post('tgl_selesai_cuti'),
			'status_pengajuan_cuti' => $this->post('status_pengajuan_cuti'),
			'ket_pengajuan_cuti' => $this->post('ket_pengajuan_cuti'),
			'kode_pegawai' => $this->post('kode_pegawai'),
			'nip_kasi' => $this->post('nip_kasi')
		];

		if ($this->Pengajuancuti_model->updateDataPengajuanRest($data, $kode_pengajuan_cuti) > 0) {
			$this->response([
				'status' => TRUE,
				'message' => 'Data pengajuan cuti berhasil diperbarui'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Data pengajuan cuti gagal diperbarui'
			], REST_Controller::HTTP_OK);
		}
	}
}
