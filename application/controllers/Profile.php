<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('klinik') == '') {
      redirect('Login', 'refresh');
    }
    $this->load->model(['user_m']);
  }
  public function index($data = null)
  {
    $data['user'] = $this->user_m->user($this->session->userdata('klinik'));
    if ($this->input->post()) {
      if ($this->validate()) {
        // $id = (decrypt_url($this->input->post('kode')));
        $edit = $this->user_m->editProfile($this->session->userdata('klinik'), $data['user']['password']);
        if ($edit) {
          $this->session->set_flashdata('alert', '["success","Ubah Profile berhasil"]');
          redirect('profile', 'refresh');
        } else {
          $this->session->set_flashdata('alert', '["warning","Ubah Profile Gagal"]');
        }
      }
      $data['pasien'] = $this->input->post();
    }
    $this->template->display('profile/profile', $data);
  }
  private function validate()
  {
    $this->load->library('form_validation');

    $data = $this->input->post();
    $except = ['password'];
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
  public function ubah()
  {
    $config['upload_path']   = './asset/img/profile/';
    $waktu = date('dmYHis');
    $fileName = $this->session->userdata('username') . '_' . $waktu . '_' . uniqid();
    $fileName = str_replace(' ', '_', $fileName);
    $config['file_name'] = $fileName;
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['max_size']      = 1024;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image')) {
      $data['error']  = array('error' => $this->upload->display_errors());
    } else {
      $uploadedImage = $this->upload->data();
      $this->resizeImage($uploadedImage['file_name']);
      $this->user_m->editProfile($uploadedImage['file_name'], $this->session->userdata('klinik'));
    }
  }
  public function resizeImage($filename)
  {
    $source_path = $_SERVER['DOCUMENT_ROOT'] . '/sim-klinik/asset/img/profile/' . $filename;
    $target_path = $_SERVER['DOCUMENT_ROOT'] . '/sim-klinik/asset/img/profile/res';
    $config_manip = array(
      'image_library' => 'gd2',
      'source_image' => $source_path,
      'new_image' => $target_path,
      'maintain_ratio' => TRUE,
      'create_thumb' => TRUE,
      'thumb_marker' => '_thumb',
      'width' => 150,
      'height' => 150,
      'quality' => '70%'
    );

    $this->load->library('image_lib', $config_manip);
    if (!$this->image_lib->resize()) {
      $data['error'] = $this->image_lib->display_errors();
    }

    $this->image_lib->clear();
  }
}
