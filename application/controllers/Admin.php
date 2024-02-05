<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email_kasi', 'email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pass_kasi', 'password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('admin/templates/auth_header', $data);
			$this->load->view('admin/auth/login', $data);
			$this->load->view('admin/templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email_kasi = $this->input->post('email_kasi');
		$pass_kasi = $this->input->post('pass_kasi');

		$kasi = $this->db->get_where('kepala_seksi', ['email_kasi' => $email_kasi])->row_array();
		if ($kasi) {
			if ($kasi['is_active'] == 1) {
				if ($kasi['status_kasi'] == "Nonaktif") {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, anda dapat bisa login!</div');
					redirect('admin');
				} else {
					if (password_verify($pass_kasi, $kasi['pass_kasi'])) {
						$data = [
							'nip_kasi' => $kasi['nip_kasi'],
							'email_kasi' => $kasi['email_kasi'],
							'role_id' => $kasi['role_id']
						];
						$this->session->set_userdata($data);
						redirect('home/admin_index');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, password salah!</div');
						redirect('admin');
					}
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, email tersebut belum melakukan aktivasi!</div');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, email tersebut belum terdaftar!</div');
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nip_kasi');
		$this->session->unset_userdata('email_kasi');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih, Anda telah berhasil logout!</div');
		redirect('admin');
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('kepala_seksi', ['email_kasi' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email_kasi', $email);
					$this->db->update('kepala_seksi');
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .' berhasil di aktivasi, silahkan login!</div');
					redirect('admin');
				} else {
					$this->db->delete('kepala_seksi', ['email_kasi' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! token sudah tidak berlaku.</div');
					redirect('admin');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! token tidak valid.</div');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! email salah.</div');
			redirect('admin');
		}
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email_kasi', 'email', 'required|trim|valid_email');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Lupa Kata Sandi';
			$this->load->view('admin/templates/auth_header', $data);
			$this->load->view('admin/auth/forgotPassword', $data);
			$this->load->view('admin/templates/auth_footer');
		} else {
			$email = $this->input->post('email_kasi');
			$user = $this->db->get_where('kepala_seksi', ['email_kasi' => $email, 'is_active' => 1])->row_array();
			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time() 
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tolong cek email untuk reset kata sandi anda!</div');
				redirect('admin/forgotPassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum aktivasi!</div');
				redirect('admin/forgotPassword');
			}
		}
	}

	public function reset()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('kepala_seksi', ['email_kasi' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal reset kata sandi! token tidak valid.</div');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal reset kata sandi! email tidak terdaftar</div');
			redirect('admin');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('admin');
		}
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Reset Kata Sandi';
			$this->load->view('admin/templates/auth_header', $data);
			$this->load->view('admin/auth/changePassword', $data);
			$this->load->view('admin/templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('sandi_baru'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('pass_kasi', $password);
			$this->db->where('email_kasi', $email);
			$this->db->update('kepala_seksi');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi telah diganti! silahkan login</div');
			redirect('admin');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'myoffice096@gmail.com',
			'smtp_pass' => '@Aquila1998',
			'smtp_port' => 465,
			'meiltype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('myoffice096@gmail.com', 'My Office');
		$this->email->to($this->input->post('email_kasi', true));

		if ($type == "verify") {
			$this->email->subject('Aktivasi Akun Kepala Seksi');
			$this->email->message('Klik tautan ini untuk verifikasi akun anda : ' . base_url() . 'admin/verify?email=' . $this->input->post('email_kasi') . '&token=' . urlencode($token) . '');
		} else if($type == "forgot") {
			$this->email->subject('Reset kata sandi');
			$this->email->message('Klik tautan ini untuk reset kata sandi anda : ' . base_url() . 'admin/reset?email=' . $this->input->post('email_kasi') . '&token=' . urlencode($token) . '');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}