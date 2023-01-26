<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('klinik') == '') {
      redirect('Login', 'refresh');
    }
    //$this->output->enable_profiler(TRUE);
  }
  public function logout()
  {
    // $this->session->sess_destroy();
    // redirect('login');
    $user_data = $this->session->all_userdata();
    foreach ($user_data as $key => $value) {
      if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
        $this->session->unset_userdata($key);
      }
    }
    $this->session->sess_destroy();
    redirect('login');
  }
}