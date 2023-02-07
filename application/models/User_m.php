<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

	var $table = 'tb_user';
	public function cek()
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$q = $this->db->get($this->table);
		if ($q->num_rows() > 0) {
			return TRUE;
		}
	}
	public function tambah()
	{
		$data = array(
			'klinik'	=> $this->input->post('klinik') == null ? $this->input->post('kode') : $this->input->post('klinik'),
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'nama'		=> $this->input->post('nama'),
			'email'		=> $this->input->post('email'),
			'status'	=>  $this->input->post('status'),
			'role'		=>  $this->input->post('role')
		);

		$q = $this->db->insert($this->table, $data);
		if ($q) {
			return $data['klinik'];
		}
	}
	public function edit()
	{
		$data = array(
			// 'klinik'	=> $this->input->post('klinik') == null ? $this->input->post('kode') : $this->input->post('klinik'),
			'username'	=> $this->input->post('username'),
			'password'	=> $this->input->post('password') == null ?  $this->input->post('passwordHide') : md5($this->input->post('password')),
			'nama'		=> $this->input->post('nama'),
			'email'		=> $this->input->post('email'),
			'status'	=>  $this->input->post('status'),
			'role'		=>  $this->input->post('role')
		);
		$this->db->where('klinik', $this->input->post('kodeHide'));
		$q = $this->db->update($this->table, $data);
		if ($q) {
			return $this->input->post('kodeHide');
		}
	}
	public function reset($kode)
	{
		$data['password'] = md5($kode);
		$data['update_at'] = date("Y-m-d H:i:s");
		$this->db->where('klinik', $kode);
		$query = $this->db->update($this->table, $data);
		return $query;
	}
	public function aktifkan($kode)
	{
		$data['status'] = '1';
		$data['password'] = md5($kode);
		$data['update_at'] = date("Y-m-d H:i:s");
		$this->db->where('klinik', $kode);
		$query = $this->db->update($this->table, $data);
		return $query;
	}
	public function nonaktifkan($kode)
	{
		$data['status'] = '0';
		$data['password'] = md5($kode);
		$data['update_at'] = date("Y-m-d H:i:s");
		$this->db->where('klinik', $kode);
		$query = $this->db->update($this->table, $data);
		return $query;
	}
	public function hapus($kode)
	{
		$this->db->where('klinik', $kode);
		$query = $this->db->delete($this->table);
		return $query;
	}
	public function klinik($kode = null)
	{
		$this->db->where('klinik', $kode);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}
	public function klinik_all()
	{
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */