<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klinik_m extends CI_Model
{

	public function tambah()
	{
		$data = array(
			'kodeKlinik'		=> $this->input->post('kodeKlinik'),
			'klinik'		=> $this->input->post('klinik'),
			'pj'			=> $this->input->post('pj'),
			'sip'			=> $this->input->post('sip'),
			'alamat'		=> $this->input->post('alamat'),
			'kelurahan'		=> $this->input->post('kelurahan'),
			'kecamatan'		=> $this->input->post('kecamatan'),
			'telp'			=> $this->input->post('telp'),
			'logo'			=> $this->input->post('logo'),
			'status'		=> $this->input->post('status'),
			'created_at'	=> date('Y-m-d H:i:s'),
		);
		return $this->db->insert('tb_klinik', $data);
	}
	public function edit($kodeKlinik)
	{
		$data = array(
			'klinik'		=> $this->input->post('klinik'),
			'pj'			=> $this->input->post('pj'),
			'sip'			=> $this->input->post('sip'),
			'alamat'		=> $this->input->post('alamat'),
			'kelurahan'		=> $this->input->post('kelurahan'),
			'kecamatan'		=> $this->input->post('kecamatan'),
			'telp'			=> $this->input->post('telp'),
			'logo'			=> $this->input->post('logo'),
			'status'		=> $this->input->post('status'),
		);
		$this->db->where('kodeKlinik', $kodeKlinik);
		return $this->db->update('tb_klinik', $data);
	}
	public function ambil($kodeKlinik)
	{
		$this->db->where('kodeKlinik', $kodeKlinik);
		$q = $this->db->get('tb_klinik');
		if ($q->num_rows() > 0) {
			return $q->result_array()[0];
		}
	}
	public function nama($kode)
	{
		$this->db->where('klinik', $kode);
		$q = $this->db->get('tb_user');
		$ret = $q->row();
		return $ret->nama;
		// if ($q->num_rows() > 0) {
		// 	return $q->result_array();
		// }
	}

	public function dataKunjungan($klinik = null, $tahun = null)
	{
		$this->db->select('klinik,monthname(tanggalkunjungan) as bulan, year(tanggalkunjungan) as tahun, count(DISTINCT noCm) as jumlah');
		$this->db->where('klinik', $klinik);
		$this->db->where('year(tanggalkunjungan)', $tahun);
		$this->db->group_by('bulan');
		$query = $this->db->get('tb_kunjungan');
		$hasil = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$hasil = array_merge($hasil, array(strtolower($row['bulan']) => $row['jumlah']));
			}
		}
		return $hasil;
	}
	public function dataPasien($klinik = null, $tahun = null)
	{
		$this->db->select('klinik,noCm,monthname(created_at) as bulan, year(created_at) as tahun, count(noCm) as jumlah');
		$this->db->where('klinik', $klinik);
		$this->db->where('year(created_at)', $tahun);
		$this->db->group_by('bulan');
		$query = $this->db->get('tb_pasien');
		$hasil = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$hasil = array_merge($hasil, array(strtolower($row['bulan']) => $row['jumlah']));
			}
		}
		return $hasil;
	}
	public function all()
	{
		$this->db->select(array('klinik', 'nama'));
		$this->db->where('status', 1);
		$this->db->where('role', 'user');
		$this->db->order_by('nama', 'asc');
		$query = $this->db->get('tb_user');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$hasil[] = $row;
			}

			return $hasil;
		}
	}
}

/* End of file klinik_m.php */
/* Location: ./application/models/klinik_m.php */