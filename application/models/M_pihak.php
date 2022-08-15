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
        // $date = date('Y-m-d');

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
    public function hapus_lc($id)
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->where($id);
        $db2->delete('tb_datalc');
    }
    public function hapus_pac($id)
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->where($id);
        $db2->delete('tb_datapac');
    }
    public function hapus_kac($id)
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->where($id);
        $db2->delete('tb_datakac');
    }
    public function get_tahun()
    {
        $query = $this->db->query('SELECT YEAR(tanggal_putusan) AS tahun_baru FROM perkara_putusan GROUP BY tahun_baru ORDER BY tahun_baru DESC');
        return $query->result_array();
    }

    public function get_perkara()
    {
        $query  = $this->db->query("SELECT
                                  nomor_perkara
                                FROM
                                  {$this->table_perkara} limit 100");
        return $query;
    }
    public function get_datap($no_perkara)
    {
        $query  = $this->db->query("SELECT * FROM {$this->table_perkara} WHERE nomor_perkara = '{$no_perkara}'");
        return $query;
    }
    public function get_datap_putus($perkara_id)
    {
        $query  = $this->db->query("SELECT * FROM perkara_putusan WHERE perkara_id = '{$perkara_id}'");
        return $query;
    }
    public function get_penggugat($no_perkara)
    {
        $query  = $this->db->query("SELECT 
                a.`perkara_id`, a.`nomor_perkara`, z.`tanggal_putusan`,
                b.`nama` AS nama_p,
                d.`alamat`, d.`tanggal_lahir`, d.`agama_id`, agm.`nama`, d.`pekerjaan`, d.`pendidikan_id`, t.`kode` , d.`telepon`, 
                TIMESTAMPDIFF(YEAR, d.`tanggal_lahir`, CURDATE()) AS umur_p
                FROM perkara AS a
                LEFT JOIN perkara_pihak1 AS b
                ON b.`perkara_id` = a.`perkara_id`
                LEFT JOIN perkara_putusan AS z
                ON b.`perkara_id` = z.`perkara_id`
                LEFT JOIN pihak AS d
                ON b.`pihak_id` = d.`id`
                LEFT JOIN agama AS agm
                ON d.`agama_id` = agm.`id`
                LEFT JOIN tingkat_pendidikan AS t
                ON d.`pendidikan_id` = t.`id`
                WHERE a.`jenis_perkara_text` IN ('Cerai Gugat', 'Cerai Talak') and nomor_perkara = '{$no_perkara}'");
        return $query;
    }
    public function get_tergugat($no_perkara)
    {
        $query  = $this->db->query("SELECT 
                a.`perkara_id`, a.`nomor_perkara`,
                b.`nama` AS nama_t,
                d.`alamat`, d.`tanggal_lahir`, d.`agama_id`, agm.`nama`, d.`pekerjaan`, d.`pendidikan_id`, t.`kode` , d.`telepon`, 
                TIMESTAMPDIFF(YEAR, d.`tanggal_lahir`, CURDATE()) AS umur_t
                FROM perkara AS a
                LEFT JOIN perkara_pihak2 AS b
                ON b.`perkara_id` = a.`perkara_id`
                LEFT JOIN pihak AS d
                ON b.`pihak_id` = d.`id`
                LEFT JOIN agama AS agm
                ON d.`agama_id` = agm.`id`
                LEFT JOIN tingkat_pendidikan AS t
                ON d.`pendidikan_id` = t.`id`
                WHERE a.`jenis_perkara_text` IN ('Cerai Gugat', 'Cerai Talak') and nomor_perkara = '{$no_perkara}'");
        return $query;
    }
    public function get_nopenggugat()
    {
        $query  = $this->db->query("SELECT a.`nomor_perkara`
                FROM perkara AS a
                LEFT JOIN perkara_putusan AS b
                ON a.`perkara_id` = b.`perkara_id`
                WHERE a.`jenis_perkara_text` IN ('Cerai Gugat', 'Cerai Talak') 
                AND YEAR(b.`tanggal_putusan`) = YEAR(CURDATE())
                ORDER BY a.`perkara_id` DESC");
        return $query;
    }
    public function kode()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->select('RIGHT(tb_datalc.nomor_lc,5) as kode_barang', FALSE);
        $db2->order_by('kode_barang', 'DESC');
        $db2->limit(1);

        $query = $db2->get('tb_datalc');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tahun = date('Y');
        $bulan = date('m');
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "LC" . "/" . $bulan . "/" . $tahun . "/" . $batas;  //format kode
        return $kodetampil;
    }
    public function get_data_lc()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->select('*');
        $db2->from('tb_datalc');

        $query = $db2->get();
        return $query->result_array();
    }
    public function get_data_pac()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->select('*');
        $db2->from('tb_datapac');

        $query = $db2->get();
        return $query->result_array();
    }
    public function get_data_kac()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->select('*');
        $db2->from('tb_datakac');

        $query = $db2->get();
        return $query->result_array();
    }

    public function get_data_nafkah()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->select('*');
        $db2->from('tb_nafkah');

        $query = $db2->get();
        return $query->result_array();
    }
    public function get_data_nafkah_laporan($year, $bulan)
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $query  = $db2->query("SELECT * FROM tb_nafkah WHERE YEAR(tgl_putus) = '$year' AND MONTH(tgl_putus) = '$bulan'");
        return $query->result_array();
    }
    public function hapus_nafkah($id)
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->where($id);
        $db2->delete('tb_nafkah');
    }
    public function get_data_dup()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->select('*');
        $db2->from('tbl_duplikat');

        $query = $db2->get();
        return $query->result_array();
    }
    
}
