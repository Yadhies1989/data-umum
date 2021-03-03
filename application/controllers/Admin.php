<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard' ;
		
		// echo "Selamat Datang User " . $data['user']['name'];
		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Admin/v_dashadmin', $data);
		$this->load->view('Template/footer');
	}

	public function role()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Role Management' ;
		$data['role'] = $this->db->get('user_role')->result_array();
		
		
		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Admin/v_role', $data);
		$this->load->view('Template/footer');
	}

	public function roleaccess($role_id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Role Access Management' ;
		$data['role'] = $this->db->get_where('user_role', ['id_role' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		
		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Admin/v_role-access', $data);
		$this->load->view('Template/footer');
	}

	public function changeaccess()
	{
		$menu_id =$this->input->post('menuId');
		$role_id =$this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('pesan', 'Di Ubah');
	}

	public function tambah_role()
	{
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('nama_menu', 'Nama Role Wajib Diisi !!!');

			redirect('admin/role');

		} else {

			$role		= $this->input->post('role');
			
			$data = array(
				'role'				=> $role
				
			);

			$this->m_admin->insert_data('user_role', $data);

			$this->session->set_flashdata('pesan', 'Di Tambahkan');
			redirect('admin/role');
		}	
	}

	public function ubah_role()
	{
		$this->form_validation->set_rules('role', 'Role', 'required');
		

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('nama_menu', 'Nama Role Wajib Diisi !!!');
			redirect('admin/role');
		}else{

			$id         = $this->input->post('id_role');
			$role		= $this->input->post('role');
			
			$data = array(
				'role'				=> $role
				
			);

		$this->db->where('id_role', $id);
        $this->db->update('user_role',$data);
        $this->session->set_flashdata('pesan', 'Di Ubah !!!');
        redirect('admin/role');

		}
	}

	public function hapus_role($id)
	{
		$where = array('id_role' => $id);
		$this->m_admin->hapus_data($where, 'user_role');
		$this->session->set_flashdata('pesan', 'Di Hapus !!!');
		redirect('admin/role');

	}

}
