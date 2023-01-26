<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	
	protected $CI;
	protected $js = array();
	protected $jsplugins = array();
	protected $cssplugins = array();

	function __construct(){
		$this->CI = &get_instance();
	}
	public function _setJs($js='')
	{
		return $this->js[] = $js;
	}
	public function _setJsPlugins($js='')
	{
		return $this->jsplugins[] = $js;
	}
	public function _setCssPlugins($css='')
	{
		return $this->cssplugins[] = $css;
	}
	public function display($content,$isi=null)
	{
		$data['_header'] = $this->CI->load->view('template/header',$isi,true);
		$data['_sidebar'] = $this->CI->load->view('template/sidebar',$isi,true);
		$data['_content'] = $this->CI->load->view($content,$isi,true);
		$data['_footer'] = $this->CI->load->view('template/footer',$isi,true);
		$data['_js'] = $this->js;
		$data['_jsplugins'] = $this->jsplugins;
		$data['_cssplugins'] = $this->cssplugins;
		$this->CI->load->view('template/template',$data);
	}
	
}

/* End of file template.php */
/* Location: ./application/libraries/template.php */