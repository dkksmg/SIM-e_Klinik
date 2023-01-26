<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_m extends CI_Model {

	public function listWilayah($jenis='provinsi',$parent=null,$parentId=null)
	{
		if ($parent!=null) {
			$this->db->where($parent.'_id', $parentId);
		}
		$query = $this->db->get('master_'.$jenis);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}
	}
	public function detailDesa($id=null)
	{
		$this->db->where('ID', $id);
		$this->db->join('master_provinsi pro', 'pro.ID = kota.provinsi_id', 'left');
		$this->db->join('master_kota kot', 'kot.ID = kec.kota_id', 'left');
		$this->db->join('master_kecamatan kec', 'kec.ID = des.kecamatan_id', 'left');
		$query = $this->db->get('master_desa des');
		if ($query->num_rows()>0) {
			return $query->result_array();
		}
	}

}

/* End of file wilayah_m.php */
/* Location: ./application/models/wilayah_m.php */