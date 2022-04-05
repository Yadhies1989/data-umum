<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Langitcerah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function data_lc()
    {
        $data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Langit Cerah";


        $mau_ke    = $this->uri->segment(3);
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data LC';
            $data['page']  = 'v_tambah_lc';
        } else {
            $data['page']  = 'v_langit-cerah';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer');
    }
    public function get_perkara()
    {
        $kode   = $this->input->post('kode', TRUE);

        $data    = $this->db->query("SELECT nomor_perkara FROM perkara WHERE nomor_perkara LIKE '%$kode%'
		LIMIT 10")->result();

        $nomer_perkara = array();
        foreach ($data as $d) {
            $json_array             = array();
            $json_array['value']    = $d->nomor_perkara;
            $nomer_perkara[]          = $json_array;
        }

        echo json_encode($nomer_perkara);
    }
    public function get_siswa()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :
            $nisn   = $this->input->get('kode');
            $siswa  = $this->M_pihak->get_siswa($nisn);
            if ($siswa->num_rows() > 0) :
                $this->result['status'] = true;
                $this->result['data']   = $siswa->row_array();
            endif;

            echo json_encode($this->result);
        endif;
    }
}
