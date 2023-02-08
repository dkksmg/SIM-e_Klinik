<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('klinik') == '') {
			redirect('Login', 'refresh');
		}
		$this->load->model(['wilayah_m', 'pasien_m']);
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->template->_setJs("pasien_daftar.js");
		$this->template->_setJsPlugins("datatables/jquery.dataTables.js");
		$this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
		$this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
		$this->template->display('pasien/pasien_daftar');
	}
	public function tambah()
	{
		$this->form('tambah');
	}
	public function edit()
	{
		$noCm = $this->input->get('noCm');
		$this->form('edit', $noCm);
	}
	public function form($jenis, $noCm = null)
	{
		$data['provinsi'] = $this->wilayah_m->listWilayah('provinsi');
		$data['kota'] = $this->wilayah_m->listWilayah('kota', 'provinsi', 33);
		if ($jenis == 'edit') {
			$data['pasien'] = $this->pasien_m->cm($noCm)[0];
		}
		if ($this->input->post()) {
			if ($this->validate()) {
				if ($jenis != 'edit') {
					$tambah = $this->pasien_m->tambah();
					if ($tambah) {
						$this->session->set_flashdata('alert', '["success","Tambah Pasien Berhasil"]');
						redirect('kunjungan/catat?noCm=' . $tambah, 'refresh');
					} else {
						$this->session->set_flashdata('alert', '["warning","Tambah Pasien Gagal"]');
					}
				} else {
					$edit = $this->pasien_m->edit();
					if ($edit) {
						$this->session->set_flashdata('alert', '["success","Edit Pasien berhasil"]');
						redirect('pasien/edit?noCm=' . $edit, 'refresh');
					} else {
						$this->session->set_flashdata('alert', '["warning","Edit Pasien Gagal"]');
					}
				}
			}
			$data['pasien'] = $this->input->post();
		}
		$this->template->_setJs("pasien_form.js");
		$this->template->_setJsPlugins("inputmask/jquery.inputmask.bundle.js");
		$this->template->_setJsPlugins("inputmask/inputmask/inputmask.date.extensions.js");
		$this->template->display('pasien/pasien_form', $data);
	}

	private function validate()
	{
		$this->load->library('form_validation');

		$data = $this->input->post();
		$except = ['asuransi', 'noAsuransi'];
		foreach ($data as $key => $value) {
			if (!in_array($key, $except)) {
				$config[] = array(
					'field'	=> $key,
					'label'		=> $key,
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

/* End of file pasien.php */
/* Location: ./application/controllers/pasien.php */