<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('klinik')=='') {
			redirect('Login','refresh');
		}
		$this->load->model(['pasien_m','kunjungan_m']);
		//$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$noCm = $this->input->get('noCm');
		$this->daftar($noCm);
	}
	public function daftar()
	{
		$tanggal = $this->input->get('tanggal');
		if ($tanggal=='') {
			redirect('kunjungan/daftar?tanggal='.date('d-m-Y'),'refresh');
		}
		$data['kunjungan'] = $this->kunjungan_m->tanggalKunjungan($tanggal,'Antri');

		$this->template->_setJs("kunjungan_daftar.js");
		$this->template->_setJsPlugins("datatables/jquery.dataTables.js");
		$this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
		$this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
		$this->template->display('kunjungan/kunjungan_daftar',$data);
	}
	public function cari($data=null)
	{
		if($this->input->get()){
			$data['pasien'] = $this->pasien_m->cari();
		}
		$this->template->_setJs("kunjungan_form.js");
		$this->template->_setJsPlugins("datatables/jquery.dataTables.js");
		$this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
		$this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
		$this->template->display('kunjungan/kunjungan_cari',$data);
	}
	public function catat()
	{
		$noCm = $this->input->get('noCm');
		$data['pasien'] = $this->pasien_m->cm($noCm)[0];
		$data['terakhir'] = $this->kunjungan_m->terakhir($noCm)[0];
		if ($this->input->post()) {
			if ($this->validate()) {
				if ($this->kunjungan_m->tambah()) {
					$this->session->set_flashdata('alert', '["success","Tambah Kunjungan Pasien Berhasil"]');	
						redirect('kunjungan?noCm='.$noCm,'refresh');
				}else{
					$this->session->set_flashdata('alert', '["warning","Tambah Kunjungan Pasien Gagal"]');	
				}
			}
			$data['kunjungan'] = $this->input->post();
		}

		$this->template->_setJs("kunjungan_form.js");
		$this->template->_setJsPlugins("inputmask/jquery.inputmask.bundle.js");
		$this->template->_setJsPlugins("inputmask/inputmask/inputmask.date.extensions.js");
		$this->template->display('kunjungan/kunjungan_form',$data);
	}
	private function validate()
	{
		$this->load->library('form_validation');

		$data = $this->input->post();
		foreach ($data as $key => $value) {
			$config[] = array('field'	=>$key,
							'label'		=>$key,
							'rules'		=>'required');
		}
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required', '{field} dibutuhkan, tidak boleh kosong
			');
		//return false;
		$valid = $this->form_validation->run();
		if(!$valid){
			$error = explode('<p>', validation_errors());
			$title[]='error';
	        for ($i=1; $i < count($error); $i++) { 
	        	$title[] = trim(strip_tags($error[$i]));
	        }
	        $this->session->set_flashdata('toast', json_encode($title));
		}
		return $valid;
		//return TRUE;
	}
}

/* End of file kunjungan.php */
/* Location: ./application/controllers/kunjungan.php */