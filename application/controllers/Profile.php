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
  }
  public function index($data = null)
  {
    // $this->template->_setJs("kunjungan_form.js");
    // $this->template->_setJsPlugins("datatables/jquery.dataTables.js");
    // $this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
    // $this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
    // $this->template->display('penggunaan/penggunaan', $data);
    echo "Halaman ini sedang dikembangkan";
    $this->output->set_header('refresh:3; url=' . base_url());
  }
}
