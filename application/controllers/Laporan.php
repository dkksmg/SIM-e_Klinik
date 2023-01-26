<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('klinik') == '') {
      redirect('Login', 'refresh');
    }
    $this->load->model(['laporan_m',]);
    //$this->output->enable_profiler(TRUE);
  }
  public function laporan_penyakit($data = null)
  {
    if ($this->input->get()) {
      $kode_klinik = $this->session->klinik;
      $awal = date('Y-m-d', strtotime($this->input->get('tgl_awal')));
      $akhir = date('Y-m-d', strtotime($this->input->get('tgl_sampai')));

      $data['icd'] = $this->laporan_m->laporan_penyakit($kode_klinik, $awal, $akhir);
      $data['tgl_awal'] = $this->input->get('tgl_awal');
      $data['tgl_akhir'] = $this->input->get('tgl_sampai');
    }

    $this->template->_setJs("kunjungan_form.js");
    $this->template->_setJsPlugins("datatables/jquery.dataTables.js");
    $this->template->_setJsPlugins("datatables-bs4/js/dataTables.bootstrap4.min.js");
    $this->template->_setCssPlugins("datatables-bs4/css/dataTables.bootstrap4.min.css");
    $this->template->display('laporan/penyakit', $data);
  }
  public function excel_penyakit()
  {
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    $kode_klinik = $this->session->klinik;
    $awal = date('Y-m-d', strtotime($this->input->get('tgl_awal')));
    $akhir = date('Y-m-d', strtotime($this->input->get('tgl_sampai')));

    $excel = new PHPExcel();
    $excel->getProperties()->setCreator('Dinas Kesehatan Kota Semarang')
      ->setLastModifiedBy('Dinas Kesehatan Kota Semarang')
      ->setTitle("Laporan Penyakit di " . $this->session->userdata('nama_klinik'))
      ->setSubject("SIM e-Klinik")
      ->setDescription("Laporan Penyakit di " . $this->session->userdata('nama_klinik'));
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN PENYAKIT DI " . strtoupper($this->session->userdata('nama_klinik')));
    $excel->setActiveSheetIndex(0)->setCellValue('A2', " PERIODE TANGGAL " . $this->input->get('tgl_awal') . " HINGGA " . $this->input->get('tgl_sampai'));
    $excel->getActiveSheet()->mergeCells('A1:D1');
    $excel->getActiveSheet()->mergeCells('A2:D2');
    $excel->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setWrapText(true);
    $excel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setWrapText(true);
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "KODE ICD");
    $excel->setActiveSheetIndex(0)->setCellValue('C5', "DIAGNOSA");
    $excel->setActiveSheetIndex(0)->setCellValue('D5', "JUMLAH");

    $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(12);
    $excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->getStyle('B5')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('B5')->getFont()->setSize(12);
    $excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $excel->getActiveSheet()->getStyle('C5')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('C5')->getFont()->setSize(12);
    $excel->getActiveSheet()->getStyle('D5')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('D5')->getFont()->setSize(12);
    $excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


    $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);


    $excel->getActiveSheet()->getStyle('A6:A1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('B6:B1000')->getAlignment()->setHorizontal('center');
    $excel->getActiveSheet()->getStyle('D6:D1000')->getAlignment()->setHorizontal('center');

    $icd = $this->laporan_m->laporan_penyakit($kode_klinik, $awal, $akhir);
    $no = 1;
    $numrow = 6;
    foreach ($icd as $val) {
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $val->kdDiag);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $val->nmDiag);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $val->jumlah);


      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $no++;
      $numrow++;
    }

    $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D

    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $excel->getActiveSheet(0)->setTitle("Data Penyakit");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Penyakit di ' . $this->session->userdata('nama_klinik') . ' Periode ' . $this->input->get('tgl_awal') . ' s/d ' . $this->input->get('tgl_sampai') . '.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    exit();
  }
  public function kesakitan_umum()
  {
    echo 'Mohon maaf halaman ini sedang dalam pengembangan';

    $this->output->set_header('refresh:8;url=' . base_url('dashboard') . '');
  }
  public function kunjungan()
  {
    echo 'kunjungan';
  }
}