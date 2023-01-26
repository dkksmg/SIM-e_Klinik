<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simklinik extends CI_Controller {

	public function index()
	{
		$this->load->model('simklinik_model');
		if ($this->input->post()) {
			if ($this->simklinik_model->pendaftaran()) {
				echo "<script>alert('Data berhasil ditambahkan')
				location.replace('".site_url('simklinik/')."')</script>";
			}else {
				echo "<script>alert('Data Gagal ditambahkan')</script>";				
			}
		}
		$this->load->view('template/sidebar.php');
		$this->load->view('OLD/pendaftaran.php');
		$this->load->view('template/footer.php');
			
	}
	
	public function pendaftaran()
	{
		
		$this->load->model('simklinik_model');
		if ($this->input->post()) {
			if ($this->simklinik_model->pendaftaran()) {
				echo "<script>alert('Data berhasil ditambahkan')
				location.replace('".site_url('simklinik/')."')</script>";
			}else {
				echo "<script>alert('Data Gagal ditambahkan')</script>";				
			}
		}
		$this->load->view('sidebar.php');
		$this->load->view('pendaftaran.php');
		$this->load->view('foter.php');
			
	}

	public function pencarian_pasien()
	{
		$data =[];
		$this->load->model('simklinik_model');

		if ($this->input->post()) {

			$nama = $this->input->post('nama');
			$data['pasien'] = $this->simklinik_model->cari_pasien($nama);

		}
		$this->load->view('sidebar.php');
		$this->load->view('pencarian_pasien.php',$data);
		$this->load->view('foter.php');
	}		
	
	public function kunjungan()
	{
		$this->load->model('simklinik_model');
		
		$id_pasien = $this->input->get('id_pasien');
		$no_reg = $this->input->get('no_reg');
		$data['pasien'] = $this->simklinik_model->cari_pasien_kunjungan($id_pasien);


		if ($this->input->post()) {
			if ($this->simklinik_model->kunjungan()) {
				echo "<script>alert('Data berhasil ditambahkan')
				location.replace('".site_url('simklinik/antrian')."')</script>";
			}else 
			{
				echo "<script>alert('Data Gagal ditambahkan')</script>";				
			}
		}
		$this->load->view('sidebar.php');
		$this->load->view('kunjungan.php',$data);
		$this->load->view('foter.php');
			
	}

	public function stok_obat()
	{
		$this->load->model('simklinik_model');
		$data['obat'] = $this->simklinik_model->stok_obat();
		

		$this->load->view('sidebar.php');
		$this->load->view('stok_obat.php',$data);
		$this->load->view('foter.php');		
	}
	public function penamaan_obat()
	{
		$this->load->model('simklinik_model');
		if ($this->input->post()) {
			if ($this->simklinik_model->penamaan_obat()) {
				echo "<script>Penamaan Obat Berhasil</script>";
				redirect ('simklinik/');
			}
			
		}
		$this->load->view('sidebar.php');
		$this->load->view('penamaan_obat.php');
		$this->load->view('foter.php');
			
	}
	
	public function penerimaan_obat()
	{
		$this->load->model('simklinik_model');
		if ($this->input->post()) {
			if ($this->simklinik_model->penerimaan_obat()) {
				echo "<script>Penerimaan Obat Berhasil</script>";
				redirect('simklinik/');
			}
		}
		$this->load->view('sidebar.php');
		$this->load->view('penerimaan_obat.php');
		$this->load->view('foter.php');
			
	}

	public function pengeluaran()
	{
		$this->load->model('simklinik_model');
		if ($this->input->post()) {
			if ($this->simklinik_model->pengeluaran()) {
				echo "<script>pengeluaran Obat Berhasil</script>";
				redirect('simklinik/');
			}
		}
		$this->load->view('sidebar.php');
		$this->load->view('pengeluaran.php');
		$this->load->view('foter.php');
			
	}


public function antrian()
	{
		
		$this->load->model('simklinik_model');
		$status_blm="antri";
		$status_sdh="selesai";
		$data['antrian_blm'] =$this->simklinik_model->antrian($status_blm);
		$data['antrian_sdh'] =$this->simklinik_model->antrian($status_sdh);


		$this->load->view('sidebar.php');
		$this->load->view('antrian.php',$data);
		$this->load->view('foter.php');
	}		
	
	public function catatanmedik()
	{
		$this->load->model('simklinik_model');

		$id_pasien = $this->input->get('id_pasien');
		$no_reg = $this->input->get('no_reg');
		$data['pasien'] = $this->simklinik_model->cari_pasien_catatanmedik($no_reg);
		if ($this->input->post()) {
			if ($this->simklinik_model->catatanmedik()) {
				echo "<script>Catatan Medik Berhasil </script>";
				redirect ('simklinik/antrian');
			}
			
		}
		$this->load->view('sidebar.php');
		$this->load->view('catatanmedik.php',$data);
		$this->load->view('foter.php');
			
	}
	public function daftar_pasien()
	{
		
		$this->load->model('simklinik_model');
		$data['nama'] = $this->simklinik_model->daftar_pasien();
	
		$this->load->view('sidebar.php');
		$this->load->view('daftar_pasien.php',$data);
		$this->load->view('foter.php');
	}	


	public function lihat_cm()
	{
		$this->load->model('simklinik_model');

		//$id_pasien = $this->input->get('id_pasien');
		$no_reg = $this->input->get('no_reg');
		$kunjungan_id = $this->input->get('kunjungan_id');
		$data['pasien'] = $this->simklinik_model->cari_pasien_catatanmedik($no_reg);
		$data['pasiencm'] = $this->simklinik_model->lihat_cm($kunjungan_id);
		if ($this->input->post()) {
			if ($this->simklinik_model->catatanmedik()) {
				echo "<script>Catatan Medik Berhasil </script>";
				redirect ('simklinik/');
			}
			
		}
		$this->load->view('sidebar.php');
		$this->load->view('lihat_cm.php',$data);
		$this->load->view('foter.php');
			
	}	
}
