<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klinik extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('klinik') == '') {
      redirect('Login', 'refresh');
    } else if ($this->session->userdata('role') == 'user') {
      show_404();
    }
    $this->load->model(['user_m']);
    //$this->output->enable_profiler(TRUE);
  }
  public function index()
  {
    redirect('admin/klinik/users', 'refresh');
  }
  public function tambah()
  {
    $this->form('tambah');
  }
  public function users()
  {
    $this->template->_setJs("users_klinik.js");
    $this->template->_setJsPlugins("datatables/jquery.dataTables.js");
    $this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
    $this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
    $this->template->display('klinik/users/list');
  }
  public function reset()
  {
    $kode = $this->input->get('kode');
    if ($this->user_m->reset($kode)) {
      $this->session->set_flashdata('alert', '["success","Reset Klinik Berhasil"]');
      redirect('admin/klinik/users', 'refresh');
    } else {
      $this->session->set_flashdata('alert', '["warning","Reset Klinik Gagal"]');
    }
  }
  public function hapus()
  {
    $kode = $this->input->get('kode');
    if ($this->user_m->hapus($kode)) {
      $this->session->set_flashdata('alert', '["success","Klinik berhasil dihapus"]');
      redirect('admin/klinik/users', 'refresh');
    } else {
      $this->session->set_flashdata('alert', '["warning","Klinik gagal dihapus"]');
    }
  }
  public function aktifkan()
  {
    $kode = $this->input->get('kode');
    if ($this->user_m->aktifkan($kode)) {
      $this->session->set_flashdata('alert', '["success","Klinik berhasil diaktifkan"]');
      redirect('admin/klinik/users', 'refresh');
    } else {
      $this->session->set_flashdata('alert', '["warning","Klinik gagal diaktifkan"]');
    }
  }
  public function nonaktifkan()
  {
    $kode = $this->input->get('kode');
    if ($this->user_m->nonaktifkan($kode)) {
      $this->session->set_flashdata('alert', '["success","Klinik berhasil dinonaktifkan"]');
      redirect('admin/klinik/users', 'refresh');
    } else {
      $this->session->set_flashdata('alert', '["warning","Klinik gagal dinonaktifkan"]');
    }
  }
  public function edit()
  {
    $kode = $this->input->get('kode');
    $this->form('edit', $kode);
  }
  public function form($jenis, $kode = null)
  {

    // $data['provinsi'] = $this->wilayah_m->listWilayah('provinsi');
    // $data['kota'] = $this->wilayah_m->listWilayah('kota', 'provinsi', 33);
    $data = null;
    if ($jenis == 'edit') {
      $data['klinik'] = $this->user_m->klinik($kode)[0];
    }
    if ($this->input->post()) {
      if ($this->validate($jenis)) {
        if ($jenis != 'edit') {
          $tambah = $this->user_m->tambah();
          if ($tambah) {
            $this->session->set_flashdata('alert', '["success","Tambah Pasien Berhasil"]');
            redirect('admin/klinik/users', 'refresh');
          } else {
            $this->session->set_flashdata('alert', '["warning","Tambah Pasien Gagal"]');
          }
        } else {
          $edit = $this->user_m->edit();
          if ($edit) {
            $this->session->set_flashdata('alert', '["success","Edit Pasien berhasil"]');
            redirect('dmin/klinik/users' . $edit, 'refresh');
          } else {
            $this->session->set_flashdata('alert', '["warning","Edit Pasien Gagal"]');
          }
        }
      }
      $data['klinik'] = $this->input->post();
    }
    $this->template->_setJs("klinik_form.js");
    $this->template->_setJsPlugins("inputmask/jquery.inputmask.bundle.js");
    $this->template->_setJsPlugins("inputmask/inputmask/inputmask.date.extensions.js");
    $this->template->display('klinik/users/klinik_form', $data);
  }
  private function validate($jenis)
  {
    $this->load->library('form_validation');

    $data = $this->input->post();
    if ($jenis == 'edit') {
      $except = ['email', 'password',];
    } else {
      $except = ['email'];
    }

    foreach ($data as $key => $value) {
      if (!in_array($key, $except)) {
        $config[] = array(
          'field'  => $key,
          'label'    => $key,
          'rules'    => 'required'
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