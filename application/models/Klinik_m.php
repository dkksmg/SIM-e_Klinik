<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik_m extends CI_Model {

	public function tambah()
	{
		$data = array('kodeKlinik'		=> $this->input->post('kodeKlinik'),
						'klinik'		=> $this->input->post('klinik'),
						'pj'			=> $this->input->post('pj'),
						'sip'			=> $this->input->post('sip'),
						'alamat'		=> $this->input->post('alamat'),
						'kelurahan'		=> $this->input->post('kelurahan'),
						'kecamatan'		=> $this->input->post('kecamatan'),
						'telp'			=> $this->input->post('telp'),
						'logo'			=> $this->input->post('logo'),
						'status'		=> $this->input->post('status'),
						'created_at'	=> date('Y-m-d H:i:s'),
					);
		return $this->db->insert('tb_klinik', $data);
	}
	public function edit($kodeKlinik)
	{
		$data = array('klinik'		=> $this->input->post('klinik'),
						'pj'			=> $this->input->post('pj'),
						'sip'			=> $this->input->post('sip'),
						'alamat'		=> $this->input->post('alamat'),
						'kelurahan'		=> $this->input->post('kelurahan'),
						'kecamatan'		=> $this->input->post('kecamatan'),
						'telp'			=> $this->input->post('telp'),
						'logo'			=> $this->input->post('logo'),
						'status'		=> $this->input->post('status'),
					);
		$this->db->where('kodeKlinik', $kodeKlinik);
		return $this->db->update('tb_klinik', $data);
	}
	public function ambil($kodeKlinik)
	{
		$this->db->where('kodeKlinik', $kodeKlinik);
		$q = $this->db->get('tb_klinik');
		if ($q->num_rows()>0) {
			return $q->result_array()[0];
		}
	}

}

/* End of file klinik_m.php */
/* Location: ./application/models/klinik_m.php */