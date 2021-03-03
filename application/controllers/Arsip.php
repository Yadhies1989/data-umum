<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	public function index()
	{
		$data['title'] = 'Daftar Induk SK' ;
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sk'] = $this->db->get('tbl_sk')->result_array();

		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Arsip/v_data-sk', $data);
		$this->load->view('Template/footer');

	}
}