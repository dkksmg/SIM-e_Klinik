<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('klinik') == '') {
            redirect('Login', 'refresh');
        }
        $this->load->library('bridge_bpjs');
        //$this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $this->dokter();
    }

    public function dokter_cek()
    {
        $this->load->library('bridge_bpjs');
        $url = "dokter/0/10";
        header('Content-Type: application/json');
        echo ($this->bridge_bpjs->parseData($url, null, 'GET'));
    }
    public function dokter()
    {
        $data['ref'] = $this->get_db_dokter();
        $data['tipe']  = "dokter";
        if ($this->input->post()) {
            $kode = $this->input->post('kdDokter');
            $nama = $this->input->post('nmDokter');
            $jenis = $this->input->post('jenis');
            if ($jenis == 'tambah') {
                $this->add_db_dokter($kode, $nama);
            } else {
                $this->edit_db_dokter($kode, $nama);
            }
            redirect('master/dokter', 'refresh');
        }
        $this->template->_setJs('master_dokter.js');
        $this->template->display('master/dokter', $data);
    }
    public function sync_dokter()
    {
        $start = 0;
        $limit = 100;
        $res = $this->get_dokter($start, $limit);
        $list = ($res->response->list);
        //print_r($res);
        $max = $res->response->count;
        $this->db->truncate('ref_dokter');
        foreach ($list as $key => $value) {
            $this->add_db_dokter($value->kdDokter, $value->nmDokter);
        }
        if ($max > $limit) {
            for ($i = $limit; $i < ($max + $limit); $i += $limit) {
                $res = $this->get_dokter($i, $limit);
                //print_r('ulang');
                if ($res) {
                    $list = $res->response->list;
                    //print_r($list);
                    foreach ($list as $key => $value) {
                        $this->add_db_dokter($value->kdDokter, $value->nmDokter);
                    }
                }
            }
        }
        redirect('bpjs/dokter');
    }
    public function get_dokter($start = null, $limit = null)
    {
        $url = "dokter/" . $start . "/" . $limit;
        return json_decode($this->bridge_bpjs->parseData($url, null, 'GET'));
    }
    public function get_db_dokter()
    {
        $this->db->where('klinik', $this->session->userdata('klinik'));
        $query = $this->db->get('ref_dokter');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
    public function add_db_dokter($kode, $dokter)
    {
        $data = array(
            'klinik' => $this->session->userdata('klinik'),
            'kdDokter' => $kode,
            'nmDokter' => $dokter
        );
        return $this->db->insert('ref_dokter', $data);
    }

    public function edit_db_dokter($kode, $dokter)
    {
        $data = array('nmDokter' => $dokter);
        $this->db->where('klinik', $this->session->userdata('klinik'));
        $this->db->where('kdDokter', $kode);
        return $this->db->update('ref_dokter', $data);
    }
}