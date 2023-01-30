<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan_m extends CI_Model
{

	private $table = "tb_kunjungan";
	private function pasien()
	{
		return "(SELECT * FROM tb_pasien WHERE klinik=" . $this->session->userdata('klinik') . ") pasien";
	}
	public function ambil($id = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('ID', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}
	public function tanggalKunjungan($tanggalKunjungan = null, $statusAntrian = null)
	{
		$this->db->where($this->table . '.klinik', $this->session->userdata('klinik'));
		$this->db->where('tanggalKunjungan', date("Y-m-d", strtotime($tanggalKunjungan)));
		if ($statusAntrian != null) {
			$this->db->where('statusAntrian', $statusAntrian);
		}
		$this->db->join($this->pasien(), 'pasien.noCm = ' . $this->table . '.noCm', 'left');
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}
	public function cm($noCm = null, $tanggalKunjungan = null)
	{
		$this->db->where($this->table . '.klinik', $this->session->userdata('klinik'));
		$this->db->where($this->table . '.noCm', $noCm);
		if ($tanggalKunjungan != null) {
			$this->db->where('tanggalKunjungan', date("Y-m-d", strtotime($tanggalKunjungan)));
		}
		$this->db->join($this->pasien(), 'pasien.noCm = ' . $this->table . '.noCm', 'left');
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}
	public function terakhir($noCm = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('noCm', $noCm);
		$this->db->order_by('ID', 'desc');
		$query = $this->db->get($this->table, 1);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}
	public function antrianAkhir($tanggalKunjungan = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('tanggalKunjungan', $tanggalKunjungan);
		$this->db->order_by('antrian', 'desc');
		$query = $this->db->get($this->table, 1);
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['antrian'];
		}
	}

	// MODIF ROW
	public function tambah()
	{
		foreach ($this->input->post() as $key => $value) {
			$data[$key] = strtoupper($value);
		}
		if (!$this->cm($data['noCm'], $data['tanggalKunjungan'])) {
			$data['klinik'] = $this->session->userdata('klinik');
			$data['tanggalKunjungan'] = date("Y-m-d", strtotime($data['tanggalKunjungan']));
			$data['antrian'] = ($this->antrianAkhir($data['tanggalKunjungan'])) + 1;
			$data['created_at'] = date("Y-m-d H:i:s");
			$query = $this->db->insert($this->table, $data);
			if ($query) {
				return $data['noCm'];
			}
		}
	}
	public function dilayani($noCm = null, $tanggalKunjungan = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('noCm', $noCm);
		$this->db->where('tanggalKunjungan', date("Y-m-d", strtotime($tanggalKunjungan)));
		$q = $this->db->update($this->table, array('statusAntrian' => "Selesai"));
		return $q;
	}
	public function delete($noCm = null, $tanggalKunjungan = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('noCm', $noCm);
		$this->db->where('tanggalKunjungan', date("Y-m-d", strtotime($tanggalKunjungan)));
		$q = $this->db->delete($this->table);
		return $q;
	}


	// LAPORAN
	public function totalKunjungan($tahun = null, $bulan = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		if ($tahun != null) {
			$this->db->where('YEAR(tanggalKunjungan)', $tahun);
		}
		if ($bulan != null) {
			$this->db->where('MONTH(tanggalKunjungan)', $bulan);
		}
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	public function kunjunganPasien($tahun = null, $bulan = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		if ($tahun != null) {
			$this->db->where('YEAR(tanggalKunjungan)', $tahun);
		}
		if ($bulan != null) {
			$this->db->where('MONTH(tanggalKunjungan)', $bulan);
		}
		$this->db->group_by('noCm');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
}

/* End of file kunjungan_m.php */
/* Location: ./application/models/kunjungan_m.php */