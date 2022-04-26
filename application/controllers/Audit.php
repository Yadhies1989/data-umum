<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Audit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											 Anda Belum Login !!!
											</div>');
            redirect('welcome');
        }
    }

    public function verstek()
    {
        $data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Menu Audit Verstek';
        $data['date']  = date('Y-m-d H:i:s');
        $data['page']  = 'v_audit-verstek';
        $data['tahun_baru']  = $this->M_pihak->get_tahun();

        if ((isset($_GET['tahun']) != '')) {
            $tahun    = $_GET['tahun'];
        } else {
            $tahun   = date('Y');
        }

        $ket = 'Data Putusan Tahun ' . $tahun;
        $data['ket'] = $ket;

        $data['data_verstek']  = $this->db->query("SELECT b.nomor_perkara, b.jenis_perkara_text, 
        DATE_FORMAT(a.tanggal_putusan,'%d-%m-%Y') AS tgl_putusan, a.putusan_verstek,a.amar_putusan
		FROM perkara_putusan a LEFT JOIN perkara b
		ON a.perkara_id=b.perkara_id
		WHERE YEAR(a.tanggal_putusan)='$tahun' AND a.putusan_verstek='Y' 
        AND a.amar_putusan NOT LIKE '%verstek%' order by a.perkara_id")->result_array();


        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer');
    }
    public function verstek_tidak()
    {
        $data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Menu Audit Verstek';
        $data['date']  = date('Y-m-d H:i:s');
        $data['page']  = 'v_tidak-verstek';
        $data['tahun_baru']  = $this->M_pihak->get_tahun();

        if ((isset($_GET['tahun']) != '')) {
            $tahun    = $_GET['tahun'];
        } else {
            $tahun   = date('Y');
        }

        $ket = 'Data Putusan Tahun ' . $tahun;
        $data['ket'] = $ket;

        $data['data_verstek']  = $this->db->query("SELECT b.nomor_perkara, b.jenis_perkara_text, DATE_FORMAT(a.tanggal_putusan,'%d-%m-%Y') AS tgl_putusan, 
		a.putusan_verstek,a.amar_putusan
		FROM perkara_putusan a
		LEFT JOIN perkara b
		ON a.perkara_id=b.perkara_id
		WHERE YEAR(a.tanggal_putusan)='$tahun' AND a.putusan_verstek='T' AND a.amar_putusan LIKE '%verstek%' order by a.perkara_id")->result_array();


        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer');
    }
}
