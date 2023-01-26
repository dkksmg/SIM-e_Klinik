<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

	public function kunjungan($awal, $akhir)
	{
		$this->db->select('tanggal,count(*) as jml');
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('tanggalKunjungan >=', $awal);
		$this->db->where('tanggalKunjungan <=', $akhir);
		$this->db->group_by('tanggalKunjungan');
		$q = $this->db->get('tb_kunjungan');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
	}
	public function laporan_penyakit($kode_klinik, $awal, $akhir)
	{
		$sql = "SELECT t.diag1,icd.kdDiag,icd.nmDiag, count(*) as jumlah
		FROM (SELECT diag1
		FROM tb_cm where tb_cm.klinik='$kode_klinik' and (created_at BETWEEN '$awal' AND '$akhir')
		union all
		select diag2
		FROM tb_cm where tb_cm.klinik='$kode_klinik' and (created_at BETWEEN '$awal' AND '$akhir')
		union all
		select diag3
		FROM tb_cm where tb_cm.klinik='$kode_klinik' and (created_at BETWEEN '$awal' AND '$akhir')
		) t inner join bpjs_icd as icd on icd.kdDiag = t.diag1
		WHERE t.diag1 != '' 
		Group BY t.diag1;";
		$q = $this->db->query($sql);

		return $q->result();
	}
}

/* End of file laporan_m.php */
/* Location: ./application/models/laporan_m.php */