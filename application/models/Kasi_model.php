<?php

class Kasi_model extends CI_model {
	public function getAllKasi()
	{
		return $query = $this->db->get('kepala_seksi')->result_array();
	}

	public function getKasiByKode($nip_kasi)
	{
		return $this->db->get_where('kepala_seksi', ['nip_kasi' => $nip_kasi])->row_array();
	}

	public function getKodeKasi()
	{
		return $query = $this->db->get('kepala_seksi')->result_array();
	}

	public function tambahDataKasi()
	{
		$data = array(
			'nip_kasi' => $this->input->post('nip_kasi', true),
			'nama_kasi' => $this->input->post('nama_kasi', true),
			'foto_kasi' => 'default.png',
			'jabatan_kasi' => $this->input->post('jabatan_kasi', true),
			'telp_kasi' => $this->input->post('telp_kasi', true),
			'jalan_kasi' => $this->input->post('jalan_kasi', true),
			'no_rumah_kasi' => $this->input->post('no_rumah_kasi', true),
			'rt_kasi' => $this->input->post('rt_kasi', true),
			'rw_kasi' => $this->input->post('rw_kasi', true),
			'kec_kasi' => $this->input->post('kec_kasi', true),
			'kota_kasi' => $this->input->post('kota_kasi', true),
			'kode_pos_kasi' => $this->input->post('kode_pos_kasi', true),
			'email_kasi' => $this->input->post('email_kasi', true),
			'pass_kasi' => password_hash($this->input->post('pass_kasi'), PASSWORD_DEFAULT),
			'status_kasi' => $this->input->post('status_kasi', true),
			'is_active' => 0,
			'date_created' => time()
		);
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $this->input->post('email_kasi'),
			'token' => $token,
			'date_created' => time() 
		];

		$this->db->insert('kepala_seksi', $data);
		$this->db->insert('user_token', $user_token);
		$this->_sendEmail($token, 'verify');
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
		} else {
			
		}

		
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function editDataKasi()
	{
		$data = array(
			'nama_kasi' => $this->input->post('nama_kasi', true),
			'jabatan_kasi' => $this->input->post('jabatan_kasi', true),
			'jalan_kasi' => $this->input->post('jalan_kasi', true),
			'no_rumah_kasi' => $this->input->post('no_rumah_kasi', true),
			'rt_kasi' => $this->input->post('rt_kasi', true),
			'rw_kasi' => $this->input->post('rw_kasi', true),
			'kec_kasi' => $this->input->post('kec_kasi', true),
			'kota_kasi' => $this->input->post('kota_kasi', true),
			'kode_pos_kasi' => $this->input->post('kode_pos_kasi', true),
			'email_kasi' => $this->input->post('email_kasi', true),
			'pass_kasi' => $this->input->post('pass_kasi', true),
			'status_kasi' => $this->input->post('status_kasi', true)
		);
		$this->db->where('nip_kasi', $this->input->post('nip_kasi'));
		$this->db->update('kepala_seksi', $data);
	}

	public function hapusDataKasi($nip_kasi)
	{
		$this->db->delete('kepala_seksi', ['nip_kasi' => $nip_kasi]);
	}

	// ------------------------------------------------------------------------------------
	
	public function tambahDataKasiRest($data)
	{
		$this->db->insert('kepala_seksi', $data);
		return $this->db->affected_rows();
	}

	public function updateDataKasiRest($data, $nip_kasi)
	{
		$this->db->update('kepala_seksi', $data, ['nip_kasi' => $nip_kasi]);
		return $this->db->affected_rows();
	}
}