<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Model {

	public function ambil($jenis)
	{
		$klinik = $this->session->userdata('klinik');
		$this->db->where('klinik', $klinik);
		$q = $this->db->get('ref_'.$jenis);
		if ($q->num_rows()>0) {
			return $q->result_array();
		}
	}
	public function umum($jenis)
	{
		$q = $this->db->get('bpjs_'.$jenis);
		if ($q->num_rows()>0) {
			return $q->result_array();
		}
	}

}

/* End of file referensi.php */
/* Location: ./application/models/referensi.php */