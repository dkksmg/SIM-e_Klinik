<?php
defined('BASEPATH') or exit('No direct script access allowed');

function klinik($kode = '')
{
	$ci = &get_instance();
	$ci->db->where('kodeKlinik', $kode);
	$q = $ci->db->get('tb_klinik', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['klinik'];
	}
}
function diagnosa($icd = '')
{
	$ci = &get_instance();
	$ci->db->where('kdDiag', $icd);
	$q = $ci->db->get('bpjs_icd', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['nmDiag'];
	}
}
function pemeriksa($kode = null)
{
	$ci = &get_instance();
	$ci->db->where('klinik', $ci->session->userdata('klinik'));
	$ci->db->where('kdDokter', $kode);
	$q = $ci->db->get('ref_dokter', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['nmDokter'];
	}
}
function kelurahan($ID = '')
{
	$ci = &get_instance();
	$ci->db->where('ID', $ID);
	$q = $ci->db->get('master_kelurahan', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['kelurahan'];
	}
}
function kecamatan($ID = '')
{
	$ci = &get_instance();
	$ci->db->where('ID', $ID);
	$q = $ci->db->get('master_kecamatan', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['kecamatan'];
	}
}
function kota($ID = '')
{
	$ci = &get_instance();
	$ci->db->where('ID', $ID);
	$q = $ci->db->get('master_kota', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['kota'];
	}
}
function provinsi($ID = '')
{
	$ci = &get_instance();
	$ci->db->where('ID', $ID);
	$q = $ci->db->get('master_provinsi', 1);
	if ($q->num_rows() > 0) {
		return $q->result_array()[0]['provinsi'];
	}
}
function check_session()
{
	$ci = &get_instance();
	$session = $ci->session->userdata('status');
	if ($session == 'login') {
		redirect('dashboard', 'refresh');
	} else if ($session == null) {
		// $ci->session->set_flashdata(
		// 	'alert',
		// 	'["warning","Yuk Login dulu"]'
		// );
	} else {
		redirect('login');
	}
}
// function check_login()
// {
// 	$ci = &get_instance();
// 	$session = $ci->session->userdata('status');
// 	if ($session == 'login') {
// 		// redirect('dashboard', 'refresh');
// 		redirect('dashboard');
// 	}
// }
function check_level()
{
	$ci = &get_instance();
	$level = $ci->session->userdata('role');
	if ($level != 'admin') {
		show_404();
	}
}

function encrypt_url($string)
{
	$output = false;
	/*
     * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
     */
	$security       = parse_ini_file("security.ini");
	$secret_key     = $security["encryption_key"];
	$secret_iv      = $security["iv"];
	$encrypt_method = $security["encryption_mechanism"];
	// hash
	$key    = hash("sha256", $secret_key);
	// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	$iv     = substr(hash("sha256", $secret_iv), 0, 16);
	//do the encryption given text/string/number
	$result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	$output = base64_encode($result);
	return $output;
}
function decrypt_url($string)
{
	$output = false;
	/*
     * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
     */
	$security       = parse_ini_file("security.ini");
	$secret_key     = $security["encryption_key"];
	$secret_iv      = $security["iv"];
	$encrypt_method = $security["encryption_mechanism"];
	// hash
	$key    = hash("sha256", $secret_key);
	// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	$iv = substr(hash("sha256", $secret_iv), 0, 16);
	//do the decryption given text/string/number
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	return $output;
}
