<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('klinik')=='') {
			redirect('Login','refresh');
		}
		$this->load->model(['pasien_m','kunjungan_m']);
	}
	public function index()
	{
		$data['totalPasien'] = $this->pasien_m->totalPasien();
		$data['totalKunjungan'] = $this->kunjungan_m->totalKunjungan(date('Y'),date('m'));
		$data['pasienBaru'] = $this->pasien_m->totalPasien(date('Y'),date('m'));
		$data['kunjunganPasien'] = $this->kunjungan_m->kunjunganPasien(date('Y'),date('m'));
		
		$this->template->display('dashboard',$data);
	}

}

/* End of file dasboard.php */
/* Location: ./application/controllers/dasboard.php */