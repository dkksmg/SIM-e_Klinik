<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CatatanMedik_m extends CI_Model
{

	private $table  = 'tb_cm';

	public function tambah()
	{
		$rujukan = '';
		if ($this->input->post('statusPulang') == '4') {
			$rujukan = $this->input->post('rujukan');
		}
		$data = array(
			'klinik'				=> $this->session->userdata('klinik'),
			'noCm'				=> $this->input->post('noCm'),
			'tanggalKunjungan'	=> date('Y-m-d', strtotime($this->input->post('tanggalKunjungan'))),
			'poli'				=> $this->input->post('poli'),
			'anamnesa'			=> $this->input->post('anamnesa'),
			'kesadaran'			=> $this->input->post('kesadaran'),
			'sistole'			=> $this->input->post('sistole'),
			'diastole'			=> $this->input->post('diastole'),
			'suhu'				=> $this->input->post('suhu'),
			'tinggiBadan'		=> $this->input->post('tinggiBadan'),
			'beratBadan'		=> $this->input->post('beratBadan'),
			'respRate'			=> $this->input->post('respRate'),
			'heartRate'			=> $this->input->post('heartRate'),
			'lingkarPerut'		=> $this->input->post('lingkarPerut'),
			'pemeriksaanFisik'	=> $this->input->post('pemeriksaanFisik'),
			'diag1'				=> strtoupper($this->input->post('diag1')),
			'diag2'				=> strtoupper($this->input->post('diag2')),
			'diag3'				=> strtoupper($this->input->post('diag3')),
			'statusPulang'		=> $this->input->post('statusPulang'),
			'rujukan'			=> $rujukan,
			'pemeriksa'			=> $this->input->post('pemeriksa'),
			'created_at'		=> date('Y-m-d H:i:s')
		);
		$this->db->insert($this->table, $data);
		$insert_id = $this->db->insert_id();
		if ($insert_id) {
			foreach ($this->input->post('tindakan') as $key => $tindakan) {
				if ($tindakan != '') {
					$this->tambahTindakan($insert_id, $tindakan);
				}
			}
			foreach ($this->input->post('obat') as $key => $obat) {
				$dosis = $this->input->post('dosis');
				$jumlah = $this->input->post('jumlah');
				if ($obat != '') {
					$this->tambahObat($insert_id, $obat, $dosis[$key], $jumlah[$key]);
				}
			}
		}
		return  $insert_id;
	}
	public function tambahTindakan($id, $tindakan)
	{
		$q = $this->db->insert('tb_cmTindakan', array('idCm' => $id, 'tindakan' => $tindakan, 'created_at' => date('Y-m-d H:i:s')));
		return $q;
	}
	public function deleteTindakan($id)
	{
		$this->db->where('idCm', $id);
		if ($this->db->get('tb_cmTindakan')) {
			$this->db->where('idCm', $id);
			return $this->db->delete('tb_cmTindakan');
		}
	}
	public function tambahObat($id, $obat, $dosis, $jumlah)
	{
		$data = array(
			'idCm'	=> $id,
			'obat'	=> $obat,
			'dosis'	=> $dosis,
			'jumlah' => $jumlah,
			'created_at' => date('Y-m-d H:i:s')
		);
		$q = $this->db->insert('tb_cmObat', $data);
		return $q;
	}
	public function deleteObat($id)
	{
		$this->db->where('idCm', $id);
		if ($this->db->get('tb_cmObat')) {
			$this->db->where('idCm', $id);
			return $this->db->delete('tb_cmObat');
		}
	}
	public function edit($id = '')
	{
		$rujukan = '';
		if ($this->input->post('statusPulang') == '4') {
			$rujukan = $this->input->post('rujukan');
		}
		$data = array(
			'klinik'				=> $this->session->userdata('klinik'),
			'noCm'				=> $this->input->post('noCm'),
			'tanggalKunjungan'	=> date('Y-m-d', strtotime($this->input->post('tanggalKunjungan'))),
			'poli'				=> $this->input->post('poli'),
			'anamnesa'			=> $this->input->post('anamnesa'),
			'kesadaran'			=> $this->input->post('kesadaran'),
			'sistole'			=> $this->input->post('sistole'),
			'diastole'			=> $this->input->post('diastole'),
			'suhu'				=> $this->input->post('suhu'),
			'tinggiBadan'		=> $this->input->post('tinggiBadan'),
			'beratBadan'		=> $this->input->post('beratBadan'),
			'respRate'			=> $this->input->post('respRate'),
			'heartRate'			=> $this->input->post('heartRate'),
			'lingkarPerut'		=> $this->input->post('lingkarPerut'),
			'pemeriksaanFisik'	=> $this->input->post('pemeriksaanFisik'),
			'diag1'				=> strtoupper($this->input->post('diag1')),
			'diag2'				=> strtoupper($this->input->post('diag2')),
			'diag3'				=> strtoupper($this->input->post('diag3')),
			'statusPulang'		=> $this->input->post('statusPulang'),
			'rujukan'			=> $rujukan,
			'pemeriksa'			=> $this->input->post('pemeriksa'),
		);
		$this->db->where('ID', $id);
		$q = $this->db->update($this->table, $data);
		if ($q) {
			$this->deleteTindakan($id);
			$this->deleteObat($id);
			foreach ($this->input->post('tindakan') as $key => $tindakan) {
				if ($tindakan != '') {
					$this->tambahTindakan($id, $tindakan);
				}
			}
			foreach ($this->input->post('obat') as $key => $obat) {
				$dosis = $this->input->post('dosis');
				$jumlah = $this->input->post('jumlah');
				if ($obat != '') {
					$this->tambahObat($id, $obat, $dosis[$key], $jumlah[$key]);
				}
			}
		}
		return $q;
	}
	public function ambilId($id = '')
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('ID', $id);
		$q = $this->db->get($this->table);
		if ($q->num_rows()) {
			return $q->result_array();
		}
	}
	public function ambilCm($cm = null, $tgl = null)
	{
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('noCm', $cm);
		if ($tgl != null) {
			$this->db->where('tanggalKunjungan', date('Y-m-d', strtotime($tgl)));
		}
		$q = $this->db->get($this->table);
		if ($q->num_rows()) {
			return $q->result_array();
		}
	}
}

/* End of file catatanMedik.php */
/* Location: ./application/models/catatanMedik.php */