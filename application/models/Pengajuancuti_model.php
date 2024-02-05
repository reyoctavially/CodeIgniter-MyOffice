<?php

class Pengajuancuti_model extends CI_model
{
	public function getAllPengajuancuti()
	{
		$this->db->select('*');
		$this->db->from('pengajuan_cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = pengajuan_cuti.kode_pegawai');
		$this->db->order_by('tgl_pengajuan_cuti', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getAllPengajuancutiNip($nip_kasi)
	{
		$this->db->select('*');
		$this->db->from('pengajuan_cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = pengajuan_cuti.kode_pegawai');
		$this->db->where('pengajuan_cuti.nip_kasi', $nip_kasi);
		$this->db->order_by('tgl_pengajuan_cuti', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPengajuanByKodePegawai($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pengajuan_cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = pengajuan_cuti.kode_pegawai');
		$this->db->where('pengajuan_cuti.kode_pegawai', $kode_pegawai);
		$this->db->order_by('tgl_pengajuan_cuti', 'DESC');
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

	public function getPengajuanByKode($kode_pengajuan_cuti)
	{
		$this->db->select('*');
		$this->db->from('pengajuan_cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = pengajuan_cuti.kode_pegawai');
		$this->db->where('pengajuan_cuti.kode_pengajuan_cuti', $kode_pengajuan_cuti);
		$this->db->order_by('tgl_pengajuan_cuti', 'DESC');
		return $query = $this->db->get()->row_array();
	}

	public function getKodeCuti()
	{
		return $query = $this->db->get('cuti')->result_array();
	}

	public function getKodePengajuan()
	{
		return $query = $this->db->get('pengajuan_cuti')->result_array();
	}

	public function tambahPengajuanCuti()
	{
		$data = array(
			'kode_pengajuan_cuti' => $this->input->post('kode_pengajuan_cuti', true),
			'tgl_pengajuan_cuti' => date('Y-m-d'),
			'alasan_pengajuan_cuti' => $this->input->post('alasan_pengajuan_cuti', true),
			'tgl_mulai_cuti' => $this->input->post('tgl_mulai_cuti', true),
			'tgl_selesai_cuti' => $this->input->post('tgl_selesai_cuti', true),
			'status_pengajuan_cuti' => "Menunggu",
			'ket_pengajuan_cuti' => "Menunggu persetujuan dari kepala seksi",
			'kode_pegawai' => $this->input->post('kode_pegawai', true),
			'nip_kasi' => $this->input->post('nip_kasi', true)
		);
		$this->db->insert('pengajuan_cuti', $data);
	}

	public function simpanPengajuanCuti()
	{
		$data = array(
			'kode_cuti' => $this->input->post('kode_cuti', true),
			'jenis_cuti' => $this->input->post('jenis_cuti', true),
			'pemotongan_honor' => $this->input->post('pemotongan_honor', true),
			'tglmulaicuti' => $this->input->post('tglmulaicuti', true),
			'tglselesaicuti' => $this->input->post('tglselesaicuti', true),
			'statuscuti' => 'Berlaku',
			'kode_pegawai' => $this->input->post('kode_pegawai', true),
			'nip_kasi' => $this->input->post('nip_kasi', true),
			'kode_pengajuan_cuti' => $this->input->post('kode_pengajuan_cuti', true)
		);
		$this->db->insert('cuti', $data);
	}

	public function updatePengajuanCuti()
	{
		$data = array(
			'status_pengajuan_cuti' => 'Disetujui',
			'ket_pengajuan_cuti' => 'Cuti telah disetujui'
		);
		$this->db->where('kode_pengajuan_cuti', $this->input->post('kode_pengajuan_cuti'));
		$this->db->update('pengajuan_cuti', $data);
	}

	public function updatePegawai()
	{
		$data = array(
			'status_pegawai' => 'Cuti'
		);
		$this->db->where('kode_pegawai', $this->input->post('kode_pegawai'));
		$this->db->update('pegawai_honorer', $data);
	}

	public function tolakPengajuanCuti($kode_pengajuan_cuti)
	{
		$data = array(
			'status_pengajuan_cuti' => 'Ditolak',
			'ket_pengajuan_cuti' => 'Cuti telah ditolak'
		);
		$this->db->where('kode_pengajuan_cuti', $kode_pengajuan_cuti);
		$this->db->update('pengajuan_cuti', $data);
	}

	public function cetakDataPengajuanCuti($kode_pegawai)
	{
		$this->db->select('*');
		$this->db->from('pengajuan_cuti');
		$this->db->join('pegawai_honorer', 'pegawai_honorer.kode_pegawai = pengajuan_cuti.kode_pegawai');
		$this->db->where('pengajuan_cuti.kode_pegawai', $kode_pegawai);
		return $query = $this->db->get()->result_array();
	}

	// ------------------------------------------------------------------------------------

	public function hapusDataPengajuanRest($kode_pegawai)
	{
		$this->db->delete('pengajuan_cuti', ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}

	public function tambahDataPengajuanRest($data)
	{
		$this->db->insert('pengajuan_cuti', $data);
		return $this->db->affected_rows();
	}

	public function updateDataPengajuanRest($data, $kode_pengajuan_cuti)
	{
		$this->db->update('pengajuan_cuti', $data, ['kode_pengajuan_cuti' => $kode_pengajuan_cuti]);
		return $this->db->affected_rows();
	}
}
