<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QrAC extends CI_Controller
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

    public function data_qrac()
    {
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']     = "QR Akta Cerai";
        $data['data_qrac']   = $this->M_pihak->get_data_qrac();


        $mau_ke    = $this->uri->segment(3);

        if ($mau_ke == "add") {
            $data['title'] = 'Ambil QR AC';
            $data['page']  = 'v_tambah_qrac';
        } else {
            $data['page']  = 'v_qrac';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer2');
    }
    
    public function get_perkara_qrac()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :

            $no_perkara1   = $this->input->get('no_perkaraname');
            $tahun = date('Y');
            $no_perkaraname = $no_perkara1."/Pdt.G/".$tahun."/"."PA.Bjn";
            $siswa  = $this->M_pihak->get_for_qrac($no_perkaraname);
            if ($siswa->num_rows() > 0) :
                $this->result['status'] = true;
                $this->result['data']   = $siswa->row_array();
            endif;

            echo json_encode($this->result);
        endif;
    }

    function autogenerate() {
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        );
    
        shuffle($chars);
    
        $num_chars = 10;
        $token = '';
    
        for ($i = 0; $i < $num_chars; $i++){ // <-- $num_chars instead of $len
            $token .= $chars[mt_rand(0, $num_chars)];
        }
    
        return $token;
    }

    public function tambah_data()
    {
        $no_seri_akta_cerai = $this->input->post('no_seri_akta_cerai');
        $nomor_perkara      = $this->input->post('nomor_perkara');
        $nomor_akta_cerai   = $this->input->post('nomor_akta_cerai');
        $tanggal_putusan    = $this->input->post('tanggal_putusan');
        $pihak1_text        = $this->input->post('pihak1_text');
        $pihak2_text        = $this->input->post('pihak2_text');
        $kode               = $this->autogenerate();
        $created_at         = date('Y-m-d H:i:s');


        $data = array(
            'nomor_seri'    => $no_seri_akta_cerai,
            'nomor_perkara' => $nomor_perkara,
            'nomor_ac'      => $nomor_akta_cerai,
            'tgl_putus'     => $tanggal_putusan,
            'pihak1'        => $pihak1_text,
            'pihak2'        => $pihak2_text,
            'kode'          => $kode,
            'created_at'    => $created_at
        );

        $db2 = $this->load->database('database_ketiga', TRUE);
        $db2->insert('tbl_qrac', $data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('qrac/data_qrac');


    }
    
    public function hapus_data($id)
    {
        $where = array('id' => $id);
        $this->M_pihak->hapus_qrac($where, 'tbl_qrac');

        $this->session->set_flashdata('pesan', 'DiHapus !!!');
        redirect('qrac/data_qrac');
    }
    
}
