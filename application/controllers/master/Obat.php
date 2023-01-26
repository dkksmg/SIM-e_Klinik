<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('klinik') == '') {
            redirect('Login', 'refresh');
        }
        $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $this->obat();
    }
    public function obat()
    {
        $data['ref'] = $this->get_db_obat();
        $data['tipe']  = "obat";
        if ($this->input->post()) {
            $kode = $this->input->post('kdObat');
            $nama = $this->input->post('nmObat');
            $tarif = $this->input->post('tarif');
            $jenis = $this->input->post('jenis');
            if ($jenis == 'tambah') {
                $this->add_db_obat($kode, $nama, $tarif);
            } else {
                $this->edit_db_obat($kode, $nama, $tarif);
            }
            redirect('master/obat', 'refresh');
        }
        $this->template->_setJs('master_obat.js');
        $this->template->display('master/obat', $data);
    }
    public function get_db_obat()
    {
        $this->db->where('klinik', $this->session->userdata('klinik'));
        $query = $this->db->get('ref_obat');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
    public function add_db_obat($kode, $obat, $tarif)
    {
        $data = array(
            'klinik' => $this->session->userdata('klinik'),
            'kdObat' => $kode,
            'nmObat' => $obat,
            'tarif' => $tarif,
            'created_at' => date("Y-m-d H:i:s")
        );
        return $this->db->insert('ref_obat', $data);
    }

    public function edit_db_obat($kode, $obat, $tarif)
    {
        $this->db->where('klinik', $this->session->userdata('klinik'));
        $this->db->where('kdObat', $kode);
        $data = array(
            'nmObat' => $obat,
            'tarif' => $tarif
        );
        return $this->db->update('ref_obat', $data);
    }
}