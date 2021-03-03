<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'My Profile' ;
		
		// echo "Selamat Datang User " . $data['user']['name'];
		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Admin/v_dashboard', $data);
		$this->load->view('Template/footer');
	}

	public function edit()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profile' ;

		$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
		
		if ($this->form_validation->run() == false) {

			$this->load->view('Template/navbar', $data);
			$this->load->view('Template/sidebar', $data);
			$this->load->view('Admin/v_edit-profile', $data);
			$this->load->view('Template/footer');
		} else {

			$name  = $this->input->post('name');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['max_size']     	= '2048';
				$config['upload_path']     	= './assets/img/profile';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . "assets/img/profile/" . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					// echo $this->upload->display_errors();
					$this->session->set_flashdata('nama_menu', 'Tipe File Tidak Support Atau File Terlalu Besar !!!');
					redirect('user/edit');
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('tbl_user');

			$this->session->set_flashdata('pesan', 'Di Ubah !!!');
        	redirect('user');
		}
		
	}

	public function ubahPassword()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Change Password' ;

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
		

		if ($this->form_validation->run() == false) {

			$this->load->view('Template/navbar', $data);
			$this->load->view('Template/sidebar', $data);
			$this->load->view('Admin/v_ubah-password', $data);
			$this->load->view('Template/footer');
		} else {

			$current_password = $this->input->post('current_password');
			$new_password     = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('nama_menu', 'Salah Password Lama !!!');
					redirect('user/ubahPassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('nama_menu', 'Jangan Sama Password Lama !!!');
					redirect('user/ubahPassword');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tbl_user');

					$this->session->set_flashdata('pesan', 'Di Ubah Passwordnya !!!');
        			redirect('user');

				}
			}
		}	
	}

}
