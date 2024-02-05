<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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

		$data['judul'] = 'Halaman Profil';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/profile/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function admin_edit()
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$nip_kasi = $this->session->userdata('nip_kasi');
		$data['judul'] = 'Halaman Edit Profil';

		$this->form_validation->set_rules('nama_kasi', 'nama kasi', 'required|trim');
		$this->form_validation->set_rules('telp_kasi', 'nomor telepon', 'required|trim');
		$this->form_validation->set_rules('jalan_kasi', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_kasi', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_kasi', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_kasi', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_kasi', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kota_kasi', 'nama kota', 'required|trim');
		$this->form_validation->set_rules('kode_pos_kasi', 'kode pos', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/profile/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$nama_kasi = $this->input->post('nama_kasi');
			$telp_kasi = $this->input->post('telp_kasi');
			$jalan_kasi = $this->input->post('jalan_kasi');
			$no_rumah_kasi = $this->input->post('no_rumah_kasi');
			$rt_kasi = $this->input->post('rt_kasi');
			$rw_kasi = $this->input->post('rw_kasi');
			$kec_kasi = $this->input->post('kec_kasi');
			$kota_kasi = $this->input->post('kota_kasi');
			$kode_pos_kasi = $this->input->post('kode_pos_kasi');

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['foto_kasi']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_kasi')) {
					$old_image = $data['login']['foto_kasi'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_kasi', $new_image);
				} else {
					$error = array('error' => $this->upload->display_errors());
				}
			}
			$this->db->set('nama_kasi', $nama_kasi);
			$this->db->set('telp_kasi', $telp_kasi);
			$this->db->set('jalan_kasi', $jalan_kasi);
			$this->db->set('no_rumah_kasi', $no_rumah_kasi);
			$this->db->set('rt_kasi', $rt_kasi);
			$this->db->set('rw_kasi', $rw_kasi);
			$this->db->set('kec_kasi', $kec_kasi);
			$this->db->set('kota_kasi', $kota_kasi);
			$this->db->set('kode_pos_kasi', $kode_pos_kasi);
			$this->db->where('nip_kasi', $nip_kasi);
			$this->db->update('kepala_seksi');

			$this->session->set_flashdata('flash', 'diperbarui');
			redirect('Profile/admin_index');
		}
	}

	public function admin_password()
	{
		if (!$this->session->userdata('email_kasi')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('kepala_seksi', [
			'nip_kasi' => $this->session->userdata('nip_kasi')
		])->row_array();

		$nip_kasi = $this->session->userdata('nip_kasi');
		$data['judul'] = 'Halaman Ganti Kata Sandi';

		$this->form_validation->set_rules('sandi_sekarang', 'current password', 'required|trim');
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/profile/password', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$sandi_sekarang = $this->input->post('sandi_sekarang');
			$sandi_baru = $this->input->post('sandi_baru');
			if (!password_verify($sandi_sekarang, $data['login']['pass_kasi'])) {
				$this->session->set_flashdata('flash', 'salah');
				redirect('profile/admin_password');
			} else {
				if ($sandi_sekarang == $sandi_baru) {
					$this->session->set_flashdata('flash2', ' ');
					redirect('profile/admin_password');
				} else {
					$pass_hash = password_hash($sandi_baru, PASSWORD_DEFAULT);

					$this->db->set('pass_kasi', $pass_hash);
					$this->db->where('nip_kasi', $nip_kasi);
					$this->db->update('kepala_seksi');
					$this->session->set_flashdata('flash3', 'diperbarui');
					redirect('profile/admin_index');
				}
			}
		}
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

		$data['judul'] = 'Halaman Profil';
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/profile/index', $data);
		$this->load->view('user/templates/footer');
	}

	public function user_edit()
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');
		$data['judul'] = 'Halaman Edit Profil';

		$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required|trim');
		$this->form_validation->set_rules('telp_pegawai', 'nomor telepon', 'required|trim');
		$this->form_validation->set_rules('jalan_pegawai', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_pegawai', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_pegawai', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_pegawai', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_pegawai', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kota_pegawai', 'nama kota', 'required|trim');
		$this->form_validation->set_rules('kode_pos_pegawai', 'kode pos', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('user/templates/header', $data);
			$this->load->view('user/profile/edit', $data);
			$this->load->view('user/templates/footer');
		} else {
			$nama_pegawai = $this->input->post('nama_pegawai');
			$telp_pegawai = $this->input->post('telp_pegawai');
			$jalan_pegawai = $this->input->post('jalan_pegawai');
			$no_rumah_pegawai = $this->input->post('no_rumah_pegawai');
			$rt_pegawai = $this->input->post('rt_pegawai');
			$rw_pegawai = $this->input->post('rw_pegawai');
			$kec_pegawai = $this->input->post('kec_pegawai');
			$kota_pegawai = $this->input->post('kota_pegawai');
			$kode_pos_pegawai = $this->input->post('kode_pos_pegawai');

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['foto_pegawai']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_pegawai')) {
					$old_image = $data['login']['foto_pegawai'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_pegawai', $new_image);
				} else {
					$error = array('error' => $this->upload->display_errors());
				}
			}
			$this->db->set('nama_pegawai', $nama_pegawai);
			$this->db->set('telp_pegawai', $telp_pegawai);
			$this->db->set('jalan_pegawai', $jalan_pegawai);
			$this->db->set('no_rumah_pegawai', $no_rumah_pegawai);
			$this->db->set('rt_pegawai', $rt_pegawai);
			$this->db->set('rw_pegawai', $rw_pegawai);
			$this->db->set('kec_pegawai', $kec_pegawai);
			$this->db->set('kota_pegawai', $kota_pegawai);
			$this->db->set('kode_pos_pegawai', $kode_pos_pegawai);
			$this->db->where('kode_pegawai', $kode_pegawai);
			$this->db->update('pegawai_honorer');

			$this->session->set_flashdata('flash', 'diperbarui');
			redirect('profile/user_index');
		}
	}

	public function user_password()
	{
		if (!$this->session->userdata('email_pegawai')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('pegawai_honorer', [
			'kode_pegawai' => $this->session->userdata('kode_pegawai')
		])->row_array();

		$kode_pegawai = $this->session->userdata('kode_pegawai');
		$data['judul'] = 'Halaman Ganti Kata Sandi';

		$this->form_validation->set_rules('sandi_sekarang', 'current password', 'required|trim');
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('user/templates/header', $data);
			$this->load->view('user/profile/password', $data);
			$this->load->view('user/templates/footer');
		} else {
			$sandi_sekarang = $this->input->post('sandi_sekarang');
			$sandi_baru = $this->input->post('sandi_baru');
			if (!password_verify($sandi_sekarang, $data['login']['pass_pegawai'])) {
				$this->session->set_flashdata('flash', 'salah');
				redirect('profile/user_password');
			} else {
				if ($sandi_sekarang == $sandi_baru) {
					$this->session->set_flashdata('flash2', ' ');
					redirect('profile/user_password');
				} else {
					$pass_hash = password_hash($sandi_baru, PASSWORD_DEFAULT);

					$this->db->set('pass_pegawai', $pass_hash);
					$this->db->where('kode_pegawai', $kode_pegawai);
					$this->db->update('pegawai_honorer');
					$this->session->set_flashdata('flash3', 'diperbarui');
					redirect('profile/user_index');
				}
			}
		}
	}
}
