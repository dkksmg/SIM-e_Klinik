<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		check_session();
		// check_login();
	}
	public function index()
	{
		if ($this->input->post()) {
			$this->cekLogin();
		}
		$this->load->view('login');
	}
	public function cekKlinik()
	{
		$klinik = $this->input->get('klinik');
		$data = null;
		$klinik = json_decode(file_get_contents('http://119.2.50.170:9095/klinik/api/klinik/detail?kode=' . $klinik . "&fun=Login SimKlinik"));
		//print_r($klinik);
		if ($klinik->status) {
			$data['klinik'] = $klinik->data->nama;
			$data['kodeKlinik'] = $klinik->data->kode_klinik;
			$data['pj'] = $klinik->data->pj;
			$data['sip'] = $klinik->data->sip;
			$data['alamat'] = $klinik->data->alamat;
			$data['kelurahan'] = $klinik->data->kelurahan;
			$data['kecamatan'] = $klinik->data->kecamatan;
			$data['telp'] = $klinik->data->telp;

			$resp = array('status' => TRUE, 'data' => $data);
		} else {
			$resp = array('status' => FALSE, 'data' => null);
		}
		header("Content-Type:application/json");
		echo json_encode($resp);
	}
	public function cekLogin()
	{
		$klinik = $this->input->post('klinik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->where('klinik', $klinik);
		$this->db->where('username', $username);
		$query = $this->db->get('tb_user', 1);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $key => $value) {
				if ($value['password'] === md5($password)) {
					if ($value['status'] == 1) {
						$data_session = array(
							'klinik'	=> $value['klinik'],
							'nama_klinik'	=> $value['nama'],
							'username'	=> $value['username'],
							'role'	 	=> $value['role'],
							'status' 	=> "login"
						);
						$this->session->set_userdata($data_session);
						redirect('dashboard', 'refresh');
					} else {
						$this->session->set_flashdata('alert', '["warning","Klinik anda tidak aktif"]');
					}
				} else {
					$this->session->set_flashdata('alert', '["warning","Password yang anda masukan salah"]');
				}
			}
		} else {
			$this->session->set_flashdata('alert', '["warning","Username yang anda masukan salah"]');
		}
	}
}