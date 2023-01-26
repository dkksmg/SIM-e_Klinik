<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CatatanMedik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('klinik') == '') {
			redirect('Login', 'refresh');
		}
		$this->load->model(['kunjungan_m', 'catatanMedik_m', 'referensi']);
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->antrian();
	}
	public function antrian()
	{
		$tanggal = $this->input->get('tanggal');
		if ($tanggal == '') {
			redirect('catatanMedik/antrian?tanggal=' . date('d-m-Y'), 'refresh');
		}
		$data['antrian'] = $this->kunjungan_m->tanggalKunjungan($tanggal, 'Antri');
		$data['dilayani'] = $this->kunjungan_m->tanggalKunjungan($tanggal, 'Selesai');
		$this->template->_setJs("kunjungan_form.js");

		$this->template->_setJsPlugins("bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js");
		$this->template->_setCssPlugins("bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css");
		$this->template->_setJsPlugins("datatables/jquery.dataTables.js");
		$this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
		$this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");

		$this->template->display('catatan/catatan_antrian', $data);
	}
	public function isi()
	{
		$noCm = $this->input->get('noCm');
		$tanggal = $this->input->get('tanggal');
		$data['pasien'] = $this->kunjungan_m->cm($noCm, $tanggal)[0];
		$data['dokter'] = $this->referensi->ambil('dokter');
		$data['statusPulang'] = $this->referensi->umum('statusPulang');
		$data['kesadaran'] = $this->referensi->umum('kesadaran');
		if (!$data['pasien']) {
			redirect('catatanMedik/antrian?tanggal=' . date('d-m-Y'), 'refresh');
		}
		if ($this->input->post()) {
			if ($this->validasi()) {
				if ($this->catatanMedik_m->tambah()) {
					$noCm = $this->input->post('noCm');
					$tanggalKunjungan = $this->input->post('tanggalKunjungan');
					$this->kunjungan_m->dilayani($noCm, $tanggalKunjungan);
					$this->session->set_flashdata('alert', '["success","Tambah Hasil Pemeriksaan Berhasil"]');
					redirect('catatanMedik/antrian?tanggal=' . $tanggalKunjungan);
				} else {
					$this->session->set_flashdata('alert', '["warning","Tambah Hasil Pemeriksaan Gagal"]');
				}
			}
			$data['cm'] = $this->input->post();
		}
		$this->template->_setJs("catatan_medik.js");
		$this->template->_setJsPlugins("datatables/jquery.dataTables.js");
		$this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
		$this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");

		$this->template->display('catatan/catatan_medik', $data);
	}
	public function edit()
	{
		$noCm = $this->input->get('noCm');
		$tanggalKunjungan = $this->input->get('tanggalKunjungan');
		$data['cm'] = $this->catatanMedik_m->ambilCm($noCm, $tanggalKunjungan)[0];
		$data['pasien'] = $this->kunjungan_m->cm($noCm)[0];
		$data['dokter'] = $this->referensi->ambil('dokter');
		$data['statusPulang'] = $this->referensi->umum('statusPulang');
		$data['kesadaran'] = $this->referensi->umum('kesadaran');
		if (!$data['pasien']) {
			redirect('catatanMedik/antrian?tanggal=' . date('d-m-Y'), 'refresh');
		}
		if ($this->input->post()) {
			if ($this->validasi()) {
				if ($this->catatanMedik_m->edit($this->input->post('idCm'))) {
					$this->session->set_flashdata('alert', '["success","Edit Hasil Pemeriksaan Berhasil"]');
					redirect('catatanMedik/antrian?tanggal=' . $tanggalKunjungan);
				} else {
					$this->session->set_flashdata('alert', '["warning","Edit Hasil Pemeriksaan Gagal"]');
				}
			}
			$data['cm'] = $this->input->post();
		}
		$this->template->_setJs("catatan_medik.js");
		$this->template->_setJsPlugins("datatables/jquery.dataTables.js");
		$this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
		$this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");

		$this->template->display('catatan/catatan_medik', $data);
	}
	public function riwayat()
	{
		$this->load->model(array('pasien_m', 'catatanMedik_m'));
		$data = [];
		$noCm = $this->input->get('noCm');
		if ($noCm != '') {
			$data['pasien'] = $this->pasien_m->cm($noCm)[0];
			$data['riwayat'] = $this->catatanMedik_m->ambilCm($noCm);
		}
		$this->template->display('catatan/catatan_riwayat', $data);
	}
	public function validasi()
	{
		$this->load->library('form_validation');
		$data = $this->input->post();
		$exclude = ['obat', 'jumlah', 'dosis', 'tindakan', 'diag3', 'diag2', 'pemeriksaanFisik'];
		foreach ($data as $key => $value) {
			if (!in_array($key, $exclude)) {
				if ($key == 'diag1') {
					$label = "diagnosa";
				} else {
					$label = $key;
				}
				$config[] = array(
					'field'	=> $key,
					'label'		=> $label,
					'rules'		=> 'required'
				);
			}
		}
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required', '{field} dibutuhkan, tidak boleh kosong
			');
		//return false;
		$valid = $this->form_validation->run();
		if (!$valid) {
			$error = explode('<p>', validation_errors());
			$title[] = 'error';
			for ($i = 1; $i < count($error); $i++) {
				$title[] = trim(strip_tags($error[$i]));
			}
			$this->session->set_flashdata('toast', json_encode($title));
		}
		return $valid;
		//return TRUE;
	}
}

/* End of file catatanMedik.php */
/* Location: ./application/controllers/catatanMedik.php */