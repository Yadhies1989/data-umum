<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermohonanAC extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											 Anda Belum Login !!!
											</div>');
            redirect('welcome');
        }
    }

    public function data_pac()
    {       
        $db2 = $this->load->database('database_kedua', TRUE);
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']     = "Permohonan AC Tabayun";
        // $data['kode']      = $this->M_pihak->kode();
        $data['data_pac']   = $this->M_pihak->get_data_pac();


        $mau_ke    = $this->uri->segment(3);
        $idu       = $this->uri->segment(4);

        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data Permohonan AC';
            $data['page']  = 'v_tambah_permohonan-ac';
        } elseif ($mau_ke == "view") {
            $data['title'] = 'View Data Permohonan AC';
            $data['page']  = 'v_view_permohonan-ac';
            $data['data_pac']    = $db2->query("SELECT * FROM tb_datapac WHERE id_pac = '$idu'")->result_array();
        } else {
            $data['page']  = 'v_permohonan-ac';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer2');
    }
    public function tambah_data()
    {
        $tgl                = date('Y-m-d');
        $no_surat           = $this->input->post('nomor_surat');
        $pa_asal            = $this->input->post('pa_asal');
        $no_pkr             = $this->input->post('no_pkr');
        $no_hp              = $this->input->post('telepon_cp');
        $tgl_wesel          = $this->input->post('tgl_wesel');
        $no_wesel           = $this->input->post('no_wesel');
        $created            = date('Y-m-d H:i:s');
        $updated            = date('Y-m-d H:i:s');


        $data = array(
            'tgl'               => $tgl,
            'no_surat'          => $no_surat,
            'pa_asal'           => $pa_asal,
            'no_pkr'            => $no_pkr,
            'no_hp'             => $no_hp,
            'tgl_wesel'         => $tgl_wesel,
            'no_wesel'          => $no_wesel,
            'created'           => $created,
            'updated'           => $updated,
        );

        // var_dump($data);
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->insert('tb_datapac', $data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('permohonanac/data_pac');

    }
    
    public function hapus_data($id)
    {
        //load db kedua
        $db2 = $this->load->database('database_kedua', TRUE);
        # hapus file
        $row = $db2->where('id_pac', $id)->get('tb_datapac')->row_array();

        $where = array('id_pac' => $id);
        $this->M_pihak->hapus_pac($where, 'tb_datapac');

        $this->session->set_flashdata('pesan', 'DiHapus !!!');
        redirect('permohonanac/data_pac');
    }
}
