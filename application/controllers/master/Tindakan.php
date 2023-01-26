<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Tindakan extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('klinik')=='') {
            redirect('Login','refresh');
        }
        $this->load->library('bridge_bpjs');
        //$this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $this->tindakan();
    }

    public function tindakan_cek()
    {
        $this->load->library('bridge_bpjs');
        $url = "tindakan/0/10";
        header('Content-Type: application/json');
        echo($this->bridge_bpjs->parseData($url,null,'GET'));
    }
    public function tindakan()
    {
        $data['ref'] = $this->get_db_tindakan();
        $data['tipe']  = "tindakan";
        if ($this->input->post()) {
            $kode = $this->input->post('kdTindakan');
            $nama = $this->input->post('nmTindakan');
            $tarif = $this->input->post('tarif');
            $jenis = $this->input->post('jenis');
            if ($jenis=='tambah') {
                $this->add_db_tindakan($kode,$nama,$tarif);
            }else{
                $this->edit_db_tindakan($kode,$nama,$tarif);
            }
            redirect('master/tindakan','refresh');
        }
        $this->template->_setJs('master_tindakan.js');
        $this->template->display('master/tindakan',$data);
    }
    public function sync_tindakan()
    {
        $start=0;$limit=100;
        $res = $this->get_tindakan($start,$limit);
        $list = ($res->response->list);
        //print_r($res);
        $max = $res->response->count;
        $this->db->truncate('ref_tindakan');
        foreach ($list as $key => $value) {
            $this->add_db_tindakan($value->kdtindakan,$value->nmtindakan);
        }
        if ($max>$limit) {
            for ($i=$limit; $i < ($max+$limit); $i+=$limit) { 
                $res = $this->get_tindakan($i,$limit);
                //print_r('ulang');
                if($res){
                    $list = $res->response->list;
                    //print_r($list);
                    foreach ($list as $key => $value) {
                        $this->add_db_tindakan($value->kdtindakan,$value->nmtindakan);
                    }
                }
            }
        }
        redirect('bpjs/tindakan');
    }
    public function get_tindakan($start=null,$limit=null)
    {
        $url = "tindakan/".$start."/".$limit;
        return json_decode($this->bridge_bpjs->parseData($url,null,'GET'));
    }
    public function get_db_tindakan()
    {
        $this->db->where('klinik', $this->session->userdata('klinik'));
        $query = $this->db->get('ref_tindakan');
        if ($query->num_rows()>0)   
        {
            foreach ($query->result_array() as $row)
            { $hasil[]=$row ; }
            return $hasil;
        }
    }
    public function add_db_tindakan($kode,$tindakan,$tarif)
    {
        $data=array('klinik'=>$this->session->userdata('klinik'),
                    'kdtindakan'=>$kode,
                    'nmtindakan'=>$tindakan,
                    'tarif' =>$tarif);
        return $this->db->insert('ref_tindakan',$data);
    }

    public function edit_db_tindakan($kode,$tindakan,$tarif)
    {
        $this->db->where('klinik',$this->session->userdata('klinik'));
        $this->db->where('kdtindakan',$kode);
        $data=array('nmtindakan'=>$tindakan,
                    'tarif' =>$tarif);
        return $this->db->update('ref_tindakan',$data);
    }
}