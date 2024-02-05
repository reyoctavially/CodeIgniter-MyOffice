<?php

class Cuti_model extends CI_model
{
	public function getAllCuti()
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = cuti.kode_pegawai');
		$this->db->order_by('tglmulaicuti', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getAllCutiNip($nip_kasi)
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = cuti.kode_pegawai');
		$this->db->where('cuti.nip_kasi', $nip_kasi);
		$this->db->order_by('tglmulaicuti', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getCutiByKode($kode_cuti)
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = cuti.kode_pegawai');
		$this->db->where('cuti.kode_cuti', $kode_cuti);
		$this->db->order_by('tglmulaicuti', 'DESC');
		return $query = $this->db->get()->row_array();
	}

	public function getCutiByKodePegawai($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = cuti.kode_pegawai');
		$this->db->where('cuti.kode_pegawai', $kode_pegawai);
		$this->db->order_by('tglmulaicuti', 'DESC');
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

	public function getPegawaiNip($nip_kasi)
	{

		$this->db->select('*');
		$this->db->from('pegawai_honorer');
		$this->db->where('nip_kasi', $nip_kasi);
		return $query = $this->db->get()->result_array();
	}

	public function cetakDataCuti($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = cuti.kode_pegawai');
		$this->db->where('cuti.kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->result_array();
	}

	// ------------------------------------------------------------------------------------

	public function hapusDataCutiRest($kode_pegawai)
	{
		$this->db->delete('cuti', ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}

	public function tambahDataCutiRest($data)
	{
		$this->db->insert('cuti', $data);
		return $this->db->affected_rows();
	}

	public function updateDataCutiRest($data, $kode_cuti)
	{
		$this->db->update('cuti', $data, ['kode_cuti' => $kode_cuti]);
		return $this->db->affected_rows();
	}
}
