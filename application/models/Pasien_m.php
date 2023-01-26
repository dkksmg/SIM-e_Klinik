<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_m extends CI_Model {

	private $table = "tb_pasien";
	public function ambil($id=null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('ID', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}
	}
	public function cari()
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->like($this->input->get());
		$query = $this->db->get($this->table);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}
	}
	public function tambah()
	{
		foreach ($this->input->post() as $key => $value) {
			$data[$key] = strtoupper($value);
		}
		if (!$this->cm($data['noCm'])) {
			$data['klinik'] = $this->session->userdata('klinik');
			$data['tglLahir'] = date("Y-m-d",strtotime($data['tglLahir']));
			$data['created_at'] = date("Y-m-d H:i:s");
			$query = $this->db->insert($this->table, $data);
			if ($query) {
				return $data['noCm'];
			}
		}
	}
	public function edit()
	{
		foreach ($this->input->post() as $key => $value) {
			$data[$key] = strtoupper($value);
		}
		$data['tglLahir'] = date("Y-m-d",strtotime($data['tglLahir']));
		$data['created_at'] = date("Y-m-d H:i:s");
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('noCm', $data['noCm']);
		$query = $this->db->update($this->table, $data);
		if ($query) {
			return $data['noCm'];
		}
	}
	public function cm($noCm=null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('noCm', $noCm);
		$query = $this->db->get($this->table);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}
	}
	public function totalPasien($tahun=null,$bulan=null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		if ($tahun!=null) {
			$this->db->where('YEAR(created_at)', $tahun);
		}
		if ($bulan!=null) {
			$this->db->where('MONTH(created_at)', $bulan);
		}
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
}

/* End of file pasien_m.php */
/* Location: ./application/models/pasien_m.php */