<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {

	public function index()
	{
		echo "ajax/confirm";
	}
	public function kunjunganBatal()
	{
		$this->load->model('kunjungan_m');
		$noCm = $this->input->get('noCm');
		$tanggalKunjungan = $this->input->get('tanggalKunjungan');
		if($this->kunjungan_m->delete($noCm,$tanggalKunjungan)){
			$resp = array('status'=>TRUE,'message'=>'berhasil batalkan kunjungan');
		}else{
			$resp = array('status'=>FALSE,'message'=>'gagal batalkan kunjungan');
		}
		header("Content-type:application/json");
		echo json_encode($resp);
	}
	public function obatHapus()
	{
		$id = $this->input->get('id');
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('ID', $id);
		if($this->db->delete('ref_obat')){
			$resp = array('status'=>TRUE,'message'=>'berhasil hapus obat');
		}else{
			$resp = array('status'=>FALSE,'message'=>'gagal hapus obat');
		}
		header("Content-type:application/json");
		echo json_encode($resp);
	}

	public function tindakanHapus()
	{
		$id = $this->input->get('id');
		$this->db->where('klinik', $this->session->userdata('klinik'));
		$this->db->where('ID', $id);
		if($this->db->delete('ref_tindakan')){
			$resp = array('status'=>TRUE,'message'=>'berhasil hapus tindakan');
		}else{
			$resp = array('status'=>FALSE,'message'=>'gagal hapus tindakan');
		}
		header("Content-type:application/json");
		echo json_encode($resp);
	}
}

/* End of file confirm.php */
/* Location: ./application/controllers/confirm.php */