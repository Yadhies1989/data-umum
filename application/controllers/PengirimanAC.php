<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanAC extends CI_Controller
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

    public function data_kac()
    {       
        $db2 = $this->load->database('database_kedua', TRUE);
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']     = "Pengiriman AC";
        $data['data_kac']   = $this->M_pihak->get_data_kac();


        $mau_ke    = $this->uri->segment(3);
        $idu       = $this->uri->segment(4);

        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data Pengiriman AC';
            $data['page']  = 'v_tambah_pengiriman-ac';
        } elseif ($mau_ke == "view") {
            $data['title'] = 'View Data Pengiriman AC';
            $data['page']  = 'v_view_pengiriman-ac';
            $data['data_kac']    = $db2->query("SELECT * FROM tb_datakac WHERE id_kac = '$idu'")->result_array();
        } else {
            $data['page']  = 'v_pengiriman-ac';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer2');
    }
    public function tambah_data()
    {
        $tgl_kirim          = $this->input->post('tgl_kirim');
        $no_surat           = $this->input->post('no_surat');
        $no_ac              = $this->input->post('no_ac');
        $tgl_resi           = $this->input->post('tgl_resi');
        $no_resi            = $this->input->post('no_resi');
        $created            = date('Y-m-d H:i:s');
        $updated            = date('Y-m-d H:i:s');


        $data = array(
            'tgl_kirim'       => $tgl_kirim,
            'no_surat'        => $no_surat,
            'no_ac'           => $no_ac,
            'tgl_resi'        => $tgl_resi,
            'no_resi'         => $no_resi,
            'created'         => $created,
            'updated'         => $updated,
        );

        // var_dump($data);
        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->insert('tb_datakac', $data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('pengirimanac/data_kac');

    }
    
    public function hapus_data($id)
    {
        //load db kedua
        $db2 = $this->load->database('database_kedua', TRUE);
        # hapus file
        $row = $db2->where('id_kac', $id)->get('tb_datakac')->row_array();

        $where = array('id_kac' => $id);
        $this->M_pihak->hapus_kac($where, 'tb_datakac');

        $this->session->set_flashdata('pesan', 'DiHapus !!!');
        redirect('pengirimanac/data_kac');
    }
}
