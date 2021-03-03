<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Court extends CI_Controller {

	public function index()
	{
		
		$this->load->view('Template/navbar');
		$this->load->view('Template/sidebar');
		$this->load->view('Admin/v_beranda', $data);
		$this->load->view('Template/footer');
	}

	public function dashboard()
	{
		
		$this->load->view('Template/navbar');
		$this->load->view('Template/sidebar');
		$this->load->view('Admin/v_dashboard', $data);
		$this->load->view('Template/footer');
	}

	public function landing()
	{
		$this->load->view('v_testing');
	}
}
