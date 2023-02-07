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
    $this->load->model(['user_m', 'klinik_m']);
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
  public function keaktifan()
  {
    // $this->load->helper(array('form', 'url'));
    $data['klinik'] = $this->klinik_m->all();
    // print_r($data);
    // die();
    // $this->form_validation->set_rules('kode', 'Kode Klinik', 'required');
    // $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    if ($this->input->get()) {
      $this->form_validation->set_rules('kode', 'Kode Klinik', 'required');
      $this->form_validation->set_rules('tahun', 'Tahun', 'required');
      $kode = $this->input->get('kode');
      $tahun = $this->input->get('tahun');
      if ($kode == 'all') {
        foreach ($data['klinik'] as $kl) {
          $data['kunjungan'][] = $this->klinik_m->dataKunjungan($kl['klinik'], $tahun);
          $data['pasien'][] = $this->klinik_m->dataPasien($kl['klinik'], $tahun);
        }
        $data['all'] = array();
        foreach ($data['klinik'] as $k => $v) {
          $data['all'][$k] = array_merge($data['klinik'][$k], array('kunjungan' => $data['kunjungan'][$k], 'pasien' => $data['pasien'][$k]));
        }
      } else {
        $data['kunjungan'] = $this->klinik_m->dataKunjungan($kode, $tahun);
        $data['pasien'] = $this->klinik_m->dataPasien($kode, $tahun);
        $data['nama'] = $this->klinik_m->nama($kode);
        $data['klinik_dt'] = $this->klinik_m->klinik_detail($kode);
      }
      $data['kode'] = $kode;
      $data['tahun'] = $tahun;

      // print_r($data);
      // die();
    }
    // $data['kode'] = 'all';

    // print_r($data);
    $this->template->_setJs("keaktifan.js");
    // $this->template->_setJsPlugins("datatables/jquery.dataTables.js");
    // $this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
    // $this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
    // print_r($data);
    // die();
    $this->template->display('admin/keaktifan', $data);
  }
  public function excel()
  {
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    $tahun = $this->input->get('tahun');
    $kode = $this->input->get('kode');
    $excel = new PHPExcel();
    $excel->getProperties()->setCreator('Ardian FM')
      ->setLastModifiedBy('Ardian FM')
      ->setTitle("Keaktifan Klinik di SIM-e Klinik")
      ->setSubject("SIM-e Klinik")
      ->setDescription("Keaktifan Klinik di SIM-e Klinik tiap tahun");

    $style_col = array(
      'font' => array('bold' => true),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KEAKTIFKAN KLINIK TAHUN " . $tahun);
    // $excel->setActiveSheetIndex(0)->setCellValue('H1', "RINCIAN SERVICE BENGKEL TAHUN " . $tahun);
    $excel->getActiveSheet()->mergeCells('A1:S1');
    // $excel->getActiveSheet()->mergeCells('H1:BP1');
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    // $excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(TRUE);
    // $excel->getActiveSheet()->getStyle('H1')->getFont()->setSize(15);
    // $excel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    // $excel->getActiveSheet()->freezePane('H5');

    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
    $excel->getActiveSheet()->mergeCells('A3:A4');
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA KLINIK");
    $excel->getActiveSheet()->mergeCells('B3:B4');
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "KODE KLINIK");
    $excel->getActiveSheet()->mergeCells('C3:C4');
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "ALAMAT");
    $excel->getActiveSheet()->mergeCells('D3:D4');
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "PJ");
    $excel->getActiveSheet()->mergeCells('E3:E4');
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "NO TELP");
    $excel->getActiveSheet()->mergeCells('F3:F4');
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "JENIS LAPORAN");
    $excel->getActiveSheet()->mergeCells('G3:G4');
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "BULAN");
    $excel->getActiveSheet()->mergeCells('H3:S3');
    $excel->setActiveSheetIndex(0)->setCellValue('H4', "JANUARI");
    $excel->setActiveSheetIndex(0)->setCellValue('I4', "FEBRUARI");
    $excel->setActiveSheetIndex(0)->setCellValue('J4', "MARET");
    $excel->setActiveSheetIndex(0)->setCellValue('K4', "APRIL");
    $excel->setActiveSheetIndex(0)->setCellValue('L4', "MEI");
    $excel->setActiveSheetIndex(0)->setCellValue('M4', "JUNI");
    $excel->setActiveSheetIndex(0)->setCellValue('N4', "JULI");
    $excel->setActiveSheetIndex(0)->setCellValue('O4', "AGUSTUS");
    $excel->setActiveSheetIndex(0)->setCellValue('P4', "SEPTEMBER");
    $excel->setActiveSheetIndex(0)->setCellValue('Q4', "OKTOBER");
    $excel->setActiveSheetIndex(0)->setCellValue('R4', "NOVEMBER");
    $excel->setActiveSheetIndex(0)->setCellValue('S4', "DESEMBER");

    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3:B4')->getAlignment()->setWrapText(true);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);


    $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S4')->applyFromArray($style_col);


    $excel->getActiveSheet()->getStyle('A3:A1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('B3:B1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('C3:C1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('D3:D1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('E3:E1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('F3:F4')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('F5:F1000')->getAlignment()->setHorizontal('left');
    $excel->getActiveSheet()->getStyle('G3:G1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('H3:H1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('I3:I1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('J3:J1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('K3:K1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('L3:L1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('M3:M1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('N3:N1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('O3:O1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('P3:P1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('Q3:Q1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('R3:R1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('S3:S1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('T3:T1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('U3:U1000')->getAlignment()->setHorizontal('center');

    // $excel->getActiveSheet()->mergeCells('A5:A6');
    // $excel->getActiveSheet()->mergeCells('A7:A8');


    $data['klinik'] = $this->klinik_m->all();
    foreach ($data['klinik'] as $kl) {
      $data['kunjungan'][] = $this->klinik_m->dataKunjungan($kl['klinik'], $tahun);
      $data['pasien'][] = $this->klinik_m->dataPasien($kl['klinik'], $tahun);
    }
    $data['all'] = array();
    foreach ($data['klinik'] as $k => $v) {
      $data['all'][$k] = array_merge($data['klinik'][$k], array('kunjungan' => $data['kunjungan'][$k], 'pasien' => $data['pasien'][$k]));
    }

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 5; //
    foreach ($data['all'] as $klinik) {
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->mergeCells("A" . ($numrow) . ":A" . ($numrow + 1));
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow + 1, ($klinik['nama']));
      // $excel->getActiveSheet()->mergeCells('B' . $numrow . ': B' . $numrow);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow + 1, ($klinik['klinik']));
      // $excel->getActiveSheet()->mergeCells('C' . $numrow . ': C' . $numrow);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow + 1, ($klinik['alamat']));
      // $excel->getActiveSheet()->mergeCells('D' . $numrow . ': D' . $numrow);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow + 1, ($klinik['pj']));
      // $excel->getActiveSheet()->mergeCells('E' . $numrow . ': E' . $numrow);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow + 1, ($klinik['telp']));
      // $excel->getActiveSheet()->mergeCells('F' . $numrow . ': F' . $numrow);




      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T' . $numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }



    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $excel->getActiveSheet(0)->setTitle("TA " . $tahun);
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Keaktifan Klinik di SIM-e Klinik ' . $tahun . '.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    exit();
  }
}
