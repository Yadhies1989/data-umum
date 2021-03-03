<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	public function index()
	{
		$data['title'] = 'Menu Management' ;
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Menu/v_menu', $data);
		$this->load->view('Template/footer');

	}

	public function tambah_data()
	{
		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('nama_menu', 'Menu & Icon Wajib Diisi !!!');

			redirect('menu');

		} else {

			$menu		= $this->input->post('menu');
			$icon		= $this->input->post('icon');

			$data = array(
				'menu'				=> $menu,
				'icon'		        => $icon
			);

			$this->m_menu->insert_data('user_menu', $data);

			$this->session->set_flashdata('pesan', 'Di Tambahkan');
			redirect('menu');
		}	
	}

	public function ubah_data()
	{
		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('nama_menu', 'Menu & Icon Wajib Diisi !!!');
			redirect('menu');
		}else{
			$id         = $this->input->post('id');
			$menu		= $this->input->post('menu');
			$icon		= $this->input->post('icon');

			$data = array(
				'menu'				=> $menu,
				'icon'		        => $icon
			);

		$this->db->where('id', $id);
        $this->db->update('user_menu',$data);
        $this->session->set_flashdata('pesan', 'Di Ubah !!!');
        redirect('menu');

		}
	}

	public function hapus_data($id)
	{
		$where = array('id' => $id);
		$this->m_menu->hapus_data($where, 'user_menu');
		$this->session->set_flashdata('pesan', 'DiHapus !!!');
		redirect('menu');

	}

	public function submenu()
	{
		$data['title'] = 'Submenu Management' ;
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['submenu'] = $this->m_menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();


		$this->load->view('Template/navbar', $data);
		$this->load->view('Template/sidebar', $data);
		$this->load->view('Menu/v_submenu', $data);
		$this->load->view('Template/footer');

	}

	public function tambah_submenu()
	{
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('is_active', 'Is Active', 'required');


		if ($this->form_validation->run() == false) {

			$this->session->set_flashdata('nama_menu', 'Ada Form Yang Ga Di Isi !!!');

			redirect('menu/submenu');

		} else {

			$menu_id		= $this->input->post('menu_id');
			$title			= $this->input->post('title');
			$url			= $this->input->post('url');
			$icon			= $this->input->post('icon');
			$is_active		= $this->input->post('is_active');

			$data = array(
				'menu_id'		=> $menu_id,
				'title'			=> $title,
				'url'			=> $url,
				'icon'		    => $icon,
				'is_active'		=> $is_active
			);

			$this->m_menu->insert_data('user_sub_menu', $data);

			$this->session->set_flashdata('pesan', 'Di Tambahkan');
			redirect('menu/submenu');
		}	
	}

	public function ubah_submenu()
	{
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('is_active', 'Is Active', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('nama_menu', 'Ada Form Yang Ga Di Isi !!!');
			redirect('menu/submenu');
		}else{
			$id             = $this->input->post('id');
			$menu_id		= $this->input->post('menu_id');
			$title			= $this->input->post('title');
			$url			= $this->input->post('url');
			$icon			= $this->input->post('icon');
			$is_active		= $this->input->post('is_active');

			$data = array(
				'menu_id'		=> $menu_id,
				'title'			=> $title,
				'url'			=> $url,
				'icon'		    => $icon,
				'is_active'		=> $is_active
			);

		$this->db->where('id', $id);
        $this->db->update('user_sub_menu',$data);
        $this->session->set_flashdata('pesan', 'Di Ubah !!!');
        redirect('menu/submenu');

		}
	}

	public function hapus_submenu($id)
	{
		$where = array('id' => $id);
		$this->m_menu->hapus_dataSubmenu($where, 'user_sub_menu');
		$this->session->set_flashdata('pesan', 'Di Hapus !!!');
		redirect('menu/submenu');

	}

}
