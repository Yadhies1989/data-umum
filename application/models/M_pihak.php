<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pihak extends CI_Model
{
    private $table_perkara = "perkara";

    public function get_data()
    {
        $session_id = $this->session->userdata('username');
        $date = date('Y-m-d');

        $this->db->select('id, nama, tanggal_lahir, tempat_lahir, pekerjaan, alamat');
        $this->db->from('pihak');
        $this->db->where('diinput_oleh', $session_id);
        $this->db->where('date(diinput_tanggal)', $date);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_admin()
    {
        $date = date('Y-m-d');

        $this->db->select('id, nama, tanggal_lahir, tempat_lahir, pekerjaan, alamat');
        $this->db->from('pihak');
        // $this->db->where('date(diinput_tanggal)', $date);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(50);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_pendidikan()
    {
        $this->db->select('id, kode, nama');
        $this->db->from('tingkat_pendidikan');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_agama()
    {
        $this->db->select('id, nama');
        $this->db->from('agama');
        $this->db->where('aktif', 'Y');
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_negara()
    {
        $this->db->select('id, nama');
        $this->db->from('negara');
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_jurusita()
    {
        $this->db->select('id, nama_gelar');
        $this->db->from('jurusita');
        $this->db->order_by('nama_gelar', 'ASC');
    }
    public function get_data_id()
    {
        $this->db->select('id, nama');
        $this->db->from('jenis_identitas');
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data_hakim()
    {
        $this->db->select('id, nama, nama_gelar');
        $this->db->from('hakim_pn');
        $this->db->where('aktif', 'Y');
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function insert_data($tabel, $data)
    {
        $query = $this->db->insert($tabel, $data);
        return $query;
    }
    public function get_query_id()
    {
        $this->db->select('MAX(id)+1 as id_baru');
        $this->db->from('pihak');

        $query = $this->db->get();
        return $query->row_array();
    }
    public function hapus_data($id)
    {
        $this->db->where($id);
        $this->db->delete('pihak');
    }
    public function get_tahun()
    {
        $query = $this->db->query('SELECT YEAR(tanggal_putusan) AS tahun_baru FROM perkara_putusan GROUP BY tahun_baru ORDER BY tahun_baru DESC');
        return $query->result_array();
    }

    public function get_noperkara()
    {
        $query  = $this->db->query("SELECT
                                  nomor_perkara
                                FROM
                                  {$this->table_perkara}");
        return $query;
    }
    public function get_siswa($nisn)
    {
        $query  = $this->db->query("SELECT
                                  *
                                FROM
                                  {$this->table_perkara}
                                WHERE
                                  nomor_perkara = '{$nisn}'");
        return $query;
    }
}
