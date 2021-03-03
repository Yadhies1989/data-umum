<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {

	public function insert_data($tabel, $data)
	{
		$query = $this->db->insert($tabel, $data);
		return $query;
	}

	public function hapus_data($id)
	{
		$this->db->where($id);
		$this->db->delete('user_role');
	}
}
