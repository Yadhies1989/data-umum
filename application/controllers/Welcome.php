<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'PaBjn | Login Page' ;
			$this->load->view('v_login', $data);
		}else {
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('tbl_user', ['email' => $email ])->row_array();

		if ($user) {

			if($user['is_active'] == 1){
				if(password_verify($password, $user['password'])) {

					$data = [
						'email'   => $user['email'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					}else {
						redirect('user');
					}
					
				}else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
											  Salah Password!
											</div>');
				}
				redirect('welcome');
			}else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
											  Email Tidak Aktif!
											</div>');

			redirect('welcome');
			}
		} else {
			
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
											  Email Tidak Terdaftar!
											</div>');

			redirect('welcome');
		}
	}

	public function registrasi()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false){

			$data['title'] = 'PaBjn | Registration Page' ;
			$this->load->view('v_registrasi', $data);
		}else {

			$data = [

					'name' 		=> htmlspecialchars($this->input->post('name', true)),
					'email' 	=> htmlspecialchars($this->input->post('email', true)),
					'image'		=> 'default.jpg',
					'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id'	=> 2,
					'is_active' => 1

			];

			$this->db->insert('tbl_user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											  Berhasil! Silakan Login
											</div>');

			redirect('welcome');
		}

		
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											  Logout Berhasil
											</div>');

			redirect('welcome');
	}

	public function blocked()
	{
		$data['title'] = 'Blocked Area' ;

		$this->load->view('v_blocked', $data);
	}
}
