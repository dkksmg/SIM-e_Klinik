<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

	public function index()
	{
		echo "index";
	}
	public function rekap()
	{
		$mulai = $this->input->get('mulai') ?? date('1-m-Y');
		$akhir = $this->input->get('akhir') ?? date('d-m-Y');
		
		$this->load->model('laporan_m');
		$kunjungan = $this->laporan_m->kunjungan($mulai,$akhir);

		$data = array('mulai' => $mulai, 'akhir' => $akhir, 'kunjungan' => $kunjungan );
		$this->template->display('laporan/kunjungan',$data);
	}
}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */