<?php

class Absensi_model extends CI_model
{
	public function getAllAbsensi()
	{
		$this->db->select('*');
		$this->db->from('absensi_pegawai');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = absensi_pegawai.kode_pegawai');
		$this->db->order_by('tanggal_absen', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getAllAbsensiNip($nip_kasi)
	{
		$this->db->select('*');
		$this->db->from('absensi_pegawai');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = absensi_pegawai.kode_pegawai');
		$this->db->where('absensi_pegawai.nip_kasi', $nip_kasi);
		$this->db->order_by('tanggal_absen', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getKodeAbsensi()
	{
		return $query = $this->db->get('absensi_pegawai')->result_array();
	}

	public function getAbsensiByKode($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('absensi_pegawai');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = absensi_pegawai.kode_pegawai');
		$this->db->where('absensi_pegawai.kode_pegawai', $kode_pegawai);
		$this->db->order_by('tanggal_absen', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPegawaiByKode($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pegawai_honorer');
		$this->db->where('kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->result_array();
	}

	public function getPegawai()
	{
		return $query = $this->db->get('pegawai_honorer')->result_array();
	}

	public function getStatusPegawaiByKode($kode_pegawai)
	{
		$this->db->select('status_pegawai');
		$this->db->from('pegawai_honorer');
		$this->db->where('kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->row_array();
	}

	public function getPegawaiNip($nip_kasi)
	{

		$this->db->select('*');
		$this->db->from('pegawai_honorer');
		$this->db->where('nip_kasi', $nip_kasi);
		return $query = $this->db->get()->result_array();
	}

	public function cetakDataAbsensi($kode_pegawai, $awal, $akhir)
	{
		return $query = $this->db->query("SELECT * FROM absensi_pegawai JOIN pegawai_honorer USING(kode_pegawai) WHERE kode_pegawai = '$kode_pegawai' AND tanggal_absen BETWEEN '$awal' AND '$akhir'")->result_array();
	}

	public function getKasiPegawaiByKode($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('kepala_seksi');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.nip_kasi = kepala_seksi.nip_kasi');
		$this->db->where('pegawai_honorer.kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->row_array();
	}

	public function getAbsenMasuk($kode_pegawai)
	{
		$tanggal_absen = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('absensi_pegawai');
		$this->db->where('tanggal_absen', $tanggal_absen);
		$this->db->where('kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->result_array();
	}

	public function getAbsenkeluar($kode_pegawai)
	{
		$tanggal_absen = date('Y-m-d');
		$jam_keluar = "00:00:00";

		$this->db->select('*');
		$this->db->from('absensi_pegawai');
		$this->db->where('tanggal_absen', $tanggal_absen);
		$this->db->where('jam_keluar !=', $jam_keluar);
		$this->db->where('kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->result_array();
	}

	public function simpanAbsenMasuk($code, $kode_pegawai, $nip_kasi)
	{
		date_default_timezone_set("Asia/Jakarta");
		$data = array(
			'kode_absensi' => $code,
			'tanggal_absen' => date('Y-m-d'),
			'jam_masuk' => date('H:i:s'),
			'jam_keluar' => '00:00:00',
			'kode_pegawai' => $kode_pegawai,
			'nip_kasi' => $nip_kasi
		);
		$this->db->insert('absensi_pegawai', $data);
	}

	public function simpanAbsenKeluar($kode_pegawai)
	{
		date_default_timezone_set("Asia/Jakarta");
		$data = array(
			'jam_keluar' => date('H:i:s')
		);
		$this->db->where('kode_pegawai', $kode_pegawai);
		$this->db->update('absensi_pegawai', $data);
	}

	// ------------------------------------------------------------------------------------

	public function hapusDataAbsensiRest($kode_pegawai)
	{
		$this->db->delete('absensi_pegawai', ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}

	public function tambahDataAbsensiRest($data)
	{
		$this->db->insert('absensi_pegawai', $data);
		return $this->db->affected_rows();
	}

	public function updateDataAbsensiRest($data, $kode_pegawai)
	{
		$this->db->update('absensi_pegawai', $data, ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}
}
