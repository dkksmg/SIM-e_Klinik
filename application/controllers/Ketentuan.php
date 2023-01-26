<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketentuan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('klinik') == '') {
      redirect('Login', 'refresh');
    }
  }
  public function index($data = null)
  {
    // if ($this->input->get()) {
    //   $kode_klinik = $this->session->klinik;
    //   $awal = date('Y-m-d', strtotime($this->input->get('tgl_awal')));
    //   $akhir = date('Y-m-d', strtotime($this->input->get('tgl_sampai')));

    //   $data['icd'] = $this->laporan_m->laporan_penyakit($kode_klinik, $awal, $akhir);
    //   $data['tgl_awal'] = $this->input->get('tgl_awal');
    //   $data['tgl_akhir'] = $this->input->get('tgl_sampai');
    // }

    $this->template->_setJs("kunjungan_form.js");
    $this->template->_setJsPlugins("datatables/jquery.dataTables.js");
    $this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
    $this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
    $this->template->display('ketentuan/ketentuan', $data);
  }
}