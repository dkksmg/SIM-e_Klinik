<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

	public function index()
	{
		echo "index";
	}
	public function tampil($ke=null)
	{
		$this->load->view('popup/diagnosa',array('ke'=>$ke));
	}
	public function datatable($ke=null)
	{
        $list = $this->get_datatables();
        $data = array();
        $no = $_GET['start'];
        foreach ($list as $icd) {
            $row = array();
            $row[] = "<a href=\"javascript:void(0)\" class='btn btn-sm btn-default' onclick=\"input('".$icd->kdDiag."','".$icd->nmDiag."')\">".$icd->kdDiag."</a>";
            $row[] = $icd->nmDiag;
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_GET['draw'],
                        "recordsTotal" => $this->count_all(),
                        "recordsFiltered" => $this->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	//datatable
	private function _get_datatables_query()
    {         
    	$column_order = array('kdDiag','nmDiag');
    	$column_search = array('kdDiag','nmDiag');
    	$order = array('bpjs_bpjs_icd.id_icd' => 'desc');

        $this->db->from('bpjs_icd');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_GET['search']['value']) {
                if($i===0) // first loop
                {
                    $this->db->group_start();
                    $this->db->like($item, $_GET['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_GET['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }         
        if(isset($_GET['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    private function get_datatables()
    {
        $this->_get_datatables_query();       
        if($_GET['length'] != -1)
        $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }
    private function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function count_all()
    {
        $this->db->from('bpjs_icd');
        return $this->db->count_all_results();
    }
}

/* End of file diagnosa.php */
/* Location: ./application/controllers/diagnosa.php */