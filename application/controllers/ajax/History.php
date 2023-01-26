<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function index()
	{
		echo "index";
	}
	public function Obat()
	{
		$status=false; $data=null;
		$noCm 	= $this->input->get('noCm');
		$id 	= $this->input->get('id');
		$this->db->where('ID', $id);
		$this->db->where('noCm', $noCm);
		$q = $this->db->get('tb_cm');
		if ($q) {
			$this->db->where('idCm', $id);
			$q = $this->db->get('tb_cmObat');
			if ($q->num_rows()>0) {
				$status=true;
				$data=$q->result_array();
			}
		}
		header('content-type:application/json');
		echo json_encode(array('status'=>$status,'data'=>$data));
	}
	public function Tindakan()
	{
		$status=false; $data=null;
		$noCm 	= $this->input->get('noCm');
		$id 	= $this->input->get('id');
		$this->db->where('ID', $id);
		$this->db->where('noCm', $noCm);
		$q = $this->db->get('tb_cm');
		if ($q) {
			$this->db->where('idCm', $id);
			$q = $this->db->get('tb_cmTindakan');
			if ($q->num_rows()>0) {
				$status=true;
				$data=$q->result_array();
			}
		}
		header('content-type:application/json');
		echo json_encode(array('status'=>$status,'data'=>$data));
	}

}

/* End of file history.php */
/* Location: ./application/controllers/history.php */