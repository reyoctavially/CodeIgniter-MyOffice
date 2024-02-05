<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index_post()
	{
		$email_pegawai = $this->input->post('email_pegawai');
		$pass_pegawai = $this->input->post('pass_pegawai');

		$pegawai = $this->db->get_where('pegawai_honorer', ['email_pegawai' => $email_pegawai])->row_array();
		if ($pegawai) {
			if ($pegawai['is_active'] == 1) {
				if ($pegawai['status_pegawai'] == "Nonaktif") {
					$this->response([
						'status' => FALSE,
						'message' => 'Maaf, anda tidak dapat login'
					], REST_Controller::HTTP_OK);
				} else {
					if (password_verify($pass_pegawai, $pegawai['pass_pegawai'])) {
						$this->response([
							'status' => TRUE,
							'data' => $pegawai
						], REST_Controller::HTTP_OK);
					} else {
						$this->response([
							'status' => FALSE,
							'message' => 'Maaf, password salah'
						], REST_Controller::HTTP_OK);
					}
				}
			} else {
				$this->response([
					'status' => FALSE,
					'message' => 'Maaf, email tersebut belum melakukan aktivasi'
				], REST_Controller::HTTP_OK);
			}
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'Maaf, email tersebut belum terdaftar'
			], REST_Controller::HTTP_OK);
		}
	}
}
