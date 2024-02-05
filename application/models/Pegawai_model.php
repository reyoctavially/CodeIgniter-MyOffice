<?php

class Pegawai_model extends CI_model {
	public function getAllPegawai()
	{
		return $query = $this->db->get('pegawai_honorer')->result_array();
	}

	public function getAllPegawaiNip($nip_kasi)
	{

		$this->db->select('*');
		$this->db->from('pegawai_honorer');
		$this->db->where('nip_kasi', $nip_kasi);
		return $query = $this->db->get()->result_array();
	}

	public function getPegawaiByKode($kode_pegawai)
	{
		return $this->db->get_where('pegawai_honorer', ['kode_pegawai' => $kode_pegawai])->row_array();
	}

	public function getKodePegawai()
	{
		return $query = $this->db->get('pegawai_honorer')->result_array();
	}

	public function getKasi()
	{
		return $query = $this->db->get('kepala_seksi')->result_array();
	}

	public function getKasiNip($nip_kasi)
	{
		$this->db->select('*');
		$this->db->from('kepala_seksi');
		$this->db->where('nip_kasi', $nip_kasi);
		return $query = $this->db->get()->result_array();
	}

	public function tambahDataPegawai()
	{
		$data = array(
			'kode_pegawai' => $this->input->post('kode_pegawai', true),
			'nama_pegawai' => $this->input->post('nama_pegawai', true),
			'foto_pegawai' => 'default.png',
			'jabatan_pegawai' => $this->input->post('jabatan_pegawai', true),
			'telp_pegawai' => $this->input->post('telp_pegawai', true),
			'jalan_pegawai' => $this->input->post('jalan_pegawai', true),
			'no_rumah_pegawai' => $this->input->post('no_rumah_pegawai', true),
			'rt_pegawai' => $this->input->post('rt_pegawai', true),
			'rw_pegawai' => $this->input->post('rw_pegawai', true),
			'kec_pegawai' => $this->input->post('kec_pegawai', true),
			'kota_pegawai' => $this->input->post('kota_pegawai', true),
			'kode_pos_pegawai' => $this->input->post('kode_pos_pegawai', true),
			'email_pegawai' => $this->input->post('email_pegawai', true),
			'pass_pegawai' => password_hash($this->input->post('pass_pegawai'), PASSWORD_DEFAULT),
			'status_pegawai' => $this->input->post('status_pegawai', true),
			'is_active' => 0,
			'date_created' => time(),
			'nip_kasi' => $this->input->post('nip_kasi', true)
		);
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $this->input->post('email_pegawai'),
			'token' => $token,
			'date_created' => time() 
		];

		$this->db->insert('pegawai_honorer', $data);
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
		$this->email->to($this->input->post('email_pegawai', true));

		if ($type == "verify") {
			$this->email->subject('Aktivasi Akun Pegawai');
			$this->email->message('Klik tautan ini untuk verifikasi akun anda : ' . base_url() . 'auth/verify?email=' . $this->input->post('email_pegawai') . '&token=' . urlencode($token) . '');
		} else {
			
		}
		
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function editDataPegawai()
	{
		$data = array(
			'nama_pegawai' => $this->input->post('nama_pegawai', true),
			'jabatan_pegawai' => $this->input->post('jabatan_pegawai', true),
			'jalan_pegawai' => $this->input->post('jalan_pegawai', true),
			'no_rumah_pegawai' => $this->input->post('no_rumah_pegawai', true),
			'rt_pegawai' => $this->input->post('rt_pegawai', true),
			'rw_pegawai' => $this->input->post('rw_pegawai', true),
			'kec_pegawai' => $this->input->post('kec_pegawai', true),
			'kota_pegawai' => $this->input->post('kota_pegawai', true),
			'kode_pos_pegawai' => $this->input->post('kode_pos_pegawai', true),
			'email_pegawai' => $this->input->post('email_pegawai', true),
			'pass_pegawai' => $this->input->post('pass_pegawai', true),
			'status_pegawai' => $this->input->post('status_pegawai', true),
			'nip_kasi' => $this->input->post('nip_kasi', true)
		);
		$this->db->where('kode_pegawai', $this->input->post('kode_pegawai'));
		$this->db->update('pegawai_honorer', $data);
	}

	public function editCuti()
	{
		$data = array(
			'statuscuti' => 'Tidak Berlaku'
		);
		$this->db->where('kode_pegawai', $this->input->post('kode_pegawai'));
		$this->db->update('cuti', $data);
	}

	public function hapusDataPegawai($kode_pegawai)
	{
		$this->db->delete('pegawai_honorer', ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}

	// ------------------------------------------------------------------------------------
	
	public function tambahDataPegawaiRest($data)
	{
		$this->db->insert('pegawai_honorer', $data);
		return $this->db->affected_rows();
	}

	public function updateDataPegawaiRest($data, $kode_pegawai)
	{
		$this->db->update('pegawai_honorer', $data, ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}
}