<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('user/data_umum');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'PaBjn | Login Page';
			$this->load->view('v_login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username   = $this->input->post('username');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('sys_users', ['username' => $username])->row_array();

		if ($user) {

			if ($user['block'] == 0) {
				if (md5($password, $user['password'])) {

					$data = [
						'username'   => $user['username'],
						'fullname'   => $user['fullname'],
					];
					$this->session->set_userdata($data);
					if ($user['username'] == 'admin') {
						redirect('admin/admin');
					} else {
						redirect('user/data_umum');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
											  Salah Password!
											</div>');
				}
				redirect('welcome');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
											  User Tidak Aktif!
											</div>');

				redirect('welcome');
			}
		} else {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
											  User Tidak Terdaftar!
											</div>');

			redirect('welcome');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('block');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											  Logout Berhasil
											</div>');

		redirect('welcome');
	}
	public function blocked()
	{
		$data['title'] = 'Blocked Area';
		$data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('v_blocked', $data);
	}
}
