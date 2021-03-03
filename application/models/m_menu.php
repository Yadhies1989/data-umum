<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_menu extends CI_Model {

	public function insert_data($tabel, $data)
	{
		$query = $this->db->insert($tabel, $data);
		return $query;
	}

	public function hapus_data($id)
	{
		$this->db->where($id);
		$this->db->delete('user_menu');
	}

	public function getSubMenu ()
	{
		 $this->db->select('user_sub_menu.id, user_sub_menu.menu_id, user_sub_menu.title, 
		 user_sub_menu.url, user_sub_menu.icon, user_sub_menu.is_active, user_menu.menu ');
		 $this->db->from('user_sub_menu');
		 $this->db->join('user_menu','user_menu.id=user_sub_menu.menu_id');

		 $query = $this->db->get();
		 return $query->result_array();
	}

	public function hapus_dataSubmenu($id)
	{
		$this->db->where($id);
		$this->db->delete('user_sub_menu');
	}

}