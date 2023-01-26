<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function index()
	{
		$level = $this->input->get('cari');
		$parent = $this->input->get('parent');
		$parentId = $this->input->get('parentId');
		$this->cari($level,$parent,$parentId);
	}
	public function cari($level,$parent=null,$parentId=null)
	{
		if ($parent!=null) {
			$this->db->where($parent.'_id', $parentId);
		}
		$query = $this->db->get('master_'.$level);
		$data['data'] = $query->result_array();
		$data['status'] = TRUE;
		header('Content-Type:application/json');
		echo json_encode($data);
	}
}

/* End of file wilayah.php */
/* Location: ./application/controllers/wilayah.php */