<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index($data = null)
	{
		$this->load->model(array('klinik_m', 'user_m'));

		$kodeKlinik = $this->session->userdata('klinik');
		$data['klinik'] = $this->klinik_m->ambil($kodeKlinik);
		if (!$data['klinik']) {
			redirect('admin/aktivasi', 'refresh');
		}
		if ($this->input->post()) {
			if ($this->user_m->tambah()) {
				$this->session->set_flashdata('alert', '["success","User klinik berhasil"]');

				redirect('login', 'refresh');
			}
		}
		$this->load->view('admin/user', $data);
	}
}

/* End of file aktivasi.php */
/* Location: ./application/controllers/aktivasi.php */