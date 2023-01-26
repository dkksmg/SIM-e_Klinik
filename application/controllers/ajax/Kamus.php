<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamus extends CI_Controller {

	public function index()
	{
		echo "index";
	}

	public function diagnosa()
	{
		$icd = $this->input->get('icd');
		$this->db->where('kdDiag', $icd);
		$q = $this->db->get('bpjs_icd',1);
		if ($q->num_rows()>0) {
			$resp = array("status"=>true,"data"=>$q->result_array()[0]);
		}else{
			$resp = array("status"=>false,"data"=>null);
		}
		header("content-type:application/json");
		echo  json_encode($resp);
	}
	public function tindakan()
	{
		$klinik = $this->session->userdata('klinik');
		$kdTindakan = $this->input->get('tindakan');
		$this->db->where('kdTindakan', $kdTindakan);
		$q = $this->db->get('ref_tindakan',1);
		if ($q->num_rows()>0) {
			$resp = array("status"=>true,"data"=>$q->result_array()[0]);
		}else{
			$resp = array("status"=>false,"data"=>null);
		}
		header("content-type:application/json");
		echo  json_encode($resp);
	}
	public function obat()
	{
		$klinik = $this->session->userdata('klinik');
		$kdObat = $this->input->get('obat');
		$this->db->where('kdObat', $kdObat);
		$q = $this->db->get('ref_obat',1);
		if ($q->num_rows()>0) {
			$resp = array("status"=>true,"data"=>$q->result_array()[0]);
		}else{
			$resp = array("status"=>false,"data"=>null);
		}
		header("content-type:application/json");
		echo  json_encode($resp);
	}
}

/* End of file kamus.php */
/* Location: ./application/controllers/kamus.php */