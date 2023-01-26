<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivasi extends CI_Controller
{

	public function index($data = null)
	{
		if ($this->input->post()) {
			if ($this->input->post('ambil')) {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$kode = $this->input->post('klinik');
				//print_r($kode);
				if ($username == 'dinkes' && $password == '18a27a546e4cfb27ff5c815238e778bd') {
					$ambil = $this->ambil($kode);
					//print_r($ambil);
					if ($ambil['status']) {
						$data['klinik'] = $ambil['data'];
					} else {
						$this->session->set_flashdata('alert', '["warning","Kode klinik tidak diketahui"]');
					}
				} else {
					$this->session->set_flashdata('alert', '["warning","username atau password salah"]');
				}
			} elseif ($this->input->post('simpan')) {
				$this->load->model('klinik_m');
				if ($this->klinik_m->tambah()) {
					$this->session->set_flashdata('alert', '["success","Simpan data klinik berhasil"]');
					$this->session->set_userdata('kodeKlinik', $this->input->post('kodeKlinik'));

					redirect('admin/user', 'refresh');
				}
			}
		}
		$this->load->view('admin/aktivasi', $data);
	}
	public function ambil($kode)
	{
		$klinik = json_decode(file_get_contents('http://119.2.50.170:9095/klinik/api/klinik/detail?kode=' . $kode . "&fun=Login SimKlinik"));
		if ($klinik->status) {
			$data['klinik'] = $klinik->data->nama;
			$data['kodeKlinik'] = $klinik->data->kode_klinik;
			$data['pj'] = $klinik->data->pj;
			$data['sip'] = $klinik->data->sip;
			$data['alamat'] = $klinik->data->alamat;
			$data['kelurahan'] = $klinik->data->kelurahan;
			$data['kecamatan'] = $klinik->data->kecamatan;
			$data['telp'] = $klinik->data->telp;
			$data['logo'] = '';
			$data['status'] = 1;

			$resp = array('status' => TRUE, 'data' => $data);
		} else {
			$resp = array('status' => FALSE, 'data' => null);
		}
		return $resp;
	}
}

/* End of file aktivasi.php */
/* Location: ./application/controllers/aktivasi.php */