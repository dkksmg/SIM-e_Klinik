<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bridge_bpjs {

	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}
	public function setting()
	{
		$this->CI->db->where('klinik', $this->session->userdata('klinik'));
		$query = $this->CI->db->get('setting_bpjs');
		if ($query->num_rows()>0)	
		{
			foreach ($query->result_array() as $row)
			{ $hasil[$row['setting']]=$row['value']; }
			return ($hasil);
		}
	}
	public function cek()
	{
		print_r($this->setting());
	}
	protected function signature($setting=null)
	{
		$consumerID 	= $setting['consumerID'];
		$consumerSecret	= $setting['consumerSecret'];

		date_default_timezone_set('UTC'); 
		$tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));

		$signature = hash_hmac('sha256', $consumerID . "&" . $tStamp, $consumerSecret, true);
		$encodedSignature = base64_encode($signature);
		return $encodedSignature;
	}
	protected function author($setting=null)
	{
		$username_pcare = $setting['username_pcare'];
		$password_pcare = $setting['password_pcare'];

		$kdAplikasi = '095';
		$author = base64_encode($username_pcare . ':' . $password_pcare . ':' . $kdAplikasi);
		$auth = 'Basic ' . $author;
		return $auth;
	}
	public function header($setting=null)
	{
		date_default_timezone_set('UTC'); 
		$tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));

		$headers = array('Content-Type: application/json',
						'X-cons-id: '.$setting['consumerID'],
						'X-Timestamp: '.$tStamp,
						'X-Signature: '.$this->signature($setting),
						'X-Authorization: '.$this->author($setting));
		return $headers;
	}
	public function parseData($url=null,$data=null,$method=null)
	{
		$setting = $this->setting();
		if ($setting['status']==0) {
			$response = array('response'=>array('field'=>'error','message'=>'BPJS DIMATIKAN'),'metaData'=>array('code'=>401));
			return json_encode($response);
		}
		$headers = $this->header($setting);
		//print_r($setting['url'].$url);
		//CURL MANUAL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $setting['url'].$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if ($method=='POST') {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		$response = curl_exec($ch); 	
		//print_r($response);
		curl_close($ch);
		return $response;
	}
}