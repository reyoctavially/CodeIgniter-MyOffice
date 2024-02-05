<?php

class Kesehatan_model extends CI_model
{
	public function getAllKesehatan()
	{
		$this->db->select('*');
		$this->db->from('kesehatan');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = kesehatan.kode_pegawai');
		$this->db->order_by('tgl_input_kesehatan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getAllKesehatanNip($nip_kasi)
	{
		$this->db->select('*');
		$this->db->from('kesehatan');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = kesehatan.kode_pegawai');
		$this->db->where('kesehatan.nip_kasi', $nip_kasi);
		$this->db->order_by('tgl_input_kesehatan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getKesehatanByKodePegawai($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('kesehatan');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = kesehatan.kode_pegawai');
		$this->db->where('kesehatan.kode_pegawai', $kode_pegawai);
		$this->db->order_by('tgl_input_kesehatan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPegawai()
	{
		return $query = $this->db->get('pegawai_honorer')->result_array();
	}

	public function getPegawaiNip($nip_kasi)
	{

		$this->db->select('*');
		$this->db->from('pegawai_honorer');
		$this->db->where('nip_kasi', $nip_kasi);
		return $query = $this->db->get()->result_array();
	}

	public function getPegawaiByKode($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pegawai_honorer');
		$this->db->where('kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->result_array();
	}

	public function getKasiPegawaiByKode($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('kepala_seksi');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.nip_kasi = kepala_seksi.nip_kasi');
		$this->db->where('pegawai_honorer.kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->row_array();
	}

	public function getKesehatanByKode($kode_kesehatan)
	{
		$this->db->select('*');
		$this->db->from('kesehatan');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = kesehatan.kode_pegawai');
		$this->db->where('kesehatan.kode_kesehatan', $kode_kesehatan);
		return $query = $this->db->get()->row_array();
	}

	public function getKodeKesehatan()
	{
		return $query = $this->db->get('kesehatan')->result_array();
	}

	public function tambahKesehatan()
	{
		$data = array(
			'kode_kesehatan' => $this->input->post('kode_kesehatan', true),
			'tgl_input_kesehatan' => date('Y-m-d'),
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan', true),
			'suhu_tubuh_pegawai' => $this->input->post('suhu_tubuh_pegawai', true),
			'hasil_swab_pegawai' => $this->input->post('hasil_swab_pegawai', true),
			'status_vaksinasi_pegawai' => $this->input->post('status_vaksinasi_pegawai', true),
			'kode_pegawai' => $this->input->post('kode_pegawai', true),
			'nip_kasi' => $this->input->post('nip_kasi', true)
		);
		$this->db->insert('kesehatan', $data);
	}

	public function cetakDataKesehatan($kode_pegawai, $awal, $akhir)
	{
		return $query = $this->db->query("SELECT * FROM kesehatan JOIN pegawai_honorer USING(kode_pegawai) WHERE kode_pegawai = '$kode_pegawai' AND tgl_input_kesehatan BETWEEN '$awal' AND '$akhir'")->result_array();
	}

	// ------------------------------------------------------------------------------------

	public function tambahDataKesehatanRest($data)
	{
		$this->db->insert('kesehatan', $data);
		return $this->db->affected_rows();
	}

	public function hapusDataKesehatanRest($kode_pegawai)
	{
		$this->db->delete('kesehatan', ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}


	public function updateDataKesehatanRest($data, $kode_kesehatan, $kode_pegawai)
	{
		$this->db->update('kesehatan', $data, ['kode_kesehatan' => $kode_kesehatan, 'kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}
}
