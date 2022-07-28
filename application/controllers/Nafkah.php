<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nafkah extends CI_Controller
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

    public function data_nafkah()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']     = "Data Nafkah";
        $data['kode']      = $this->M_pihak->kode();
        $data['data_nafkah']   = $this->M_pihak->get_data_nafkah();


        $mau_ke    = $this->uri->segment(3);
        $idu       = $this->uri->segment(4);

        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data Nafkah';
            $data['page']  = 'v_tambah_nafkah';
        } elseif ($mau_ke == "view") {
            $data['title'] = 'View Data Nafkah';
            $data['page']  = 'v_view_nafkah';
            $data['data_nafkah']    = $db2->query("SELECT * FROM tb_nafkah WHERE id_nafkah = '$idu'")->result_array();
        } elseif ($mau_ke == "edit") {
            $data['title'] = 'Edit Data Nafkah';
            $data['page']  = 'v_edit_nafkah';
            $data['data_lc']    = $db2->query("SELECT * FROM tb_nafkah WHERE id_nafkah = '$idu'")->result_array();
        } elseif ($mau_ke == "laporan") {
            if ((isset($_GET['periode']) && $_GET['periode'] != '')){
                $periode      = $_GET['periode'];
                $year			= date('Y', strtotime($periode));
                $bulan		= date('m', strtotime($periode));
            }else{
                $year		= date_create()->format("Y");
                $bulan		= date_create()->format("m");
            }
            $data['data_nafkah']   = $this->M_pihak->get_data_nafkah_laporan($year,$bulan);
            $data['page']  = 'v_laporan_nafkah';
        } else {
            $data['page']  = 'v_nafkah';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer2');
    }
    public function get_nomor()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :
            $nisn = $this->M_pihak->get_nopenggugat();
            if ($nisn->num_rows() > 0) :
                $this->result['status'] = true;
                foreach ($nisn->result() as $key => $value) :
                    $this->result['data'][$key]['nomor_perkara'] = $value->nomor_perkara;
                endforeach;
            endif;

            echo json_encode($this->result);
        endif;
    }
    public function get_perkawis()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :

            $no_perkara1   = $this->input->get('no_perkaraname');
            $siswa  = $this->M_pihak->get_penggugat($no_perkara1);
            if ($siswa->num_rows() > 0) :
                $this->result['status'] = true;
                $this->result['data']   = $siswa->row_array();
            endif;

            echo json_encode($this->result);
        endif;
    }
    public function get_perkawis2()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        else :

            $no_perkara1   = $this->input->get('no_perkaraname');
            $siswa  = $this->M_pihak->get_tergugat($no_perkara1);
            if ($siswa->num_rows() > 0) :
                $this->result['status'] = true;
                $this->result['data']   = $siswa->row_array();
            endif;

            echo json_encode($this->result);
        endif;
    }
    public function tambah_data()
    {
        $perkara = $this->M_pihak->get_datap($this->input->post('no_perkaraname'))->row_array();
        $perkara_id = $perkara['perkara_id'];
        if ($perkara_id != null) {
            $perkara_putus = $this->M_pihak->get_datap_putus($perkara_id)->row_array();
            if ($perkara_putus != null) {
                $no_perkara     = $this->input->post('no_perkaraname');
                $pihak_p        = $perkara['pihak1_text'];
                $pihak_t        = $perkara['pihak2_text'];
                $tgl_daftar     = $perkara['tanggal_pendaftaran'];
                $tgl_putus      = $perkara_putus['tanggal_putusan'];
                $amar           = $perkara_putus['amar_putusan'];
                $ket            = $this->input->post('ket');


                $data = array(
                    'no_perkara'    => $no_perkara,
                    'pihak_p'       => $pihak_p,
                    'pihak_t'       => $pihak_t,
                    'tgl_daftar'    => $tgl_daftar,
                    'tgl_putus'     => $tgl_putus,
                    'amar'          => $amar,
                    'ket'           => $ket
                );

                $db2 = $this->load->database('database_kedua', TRUE);
                $db2->insert('tb_nafkah', $data);

                $this->session->set_flashdata('pesan', 'Di Tambahkan');
                redirect('nafkah/data_nafkah');
            }
        }
    }

    public function update_data()
    {
        $db2 = $this->load->database('database_kedua', TRUE);

        $id_nafkah          = $this->input->post('id_nafkah');
        $ket          = $this->input->post('ket');

        $data = array(
            'ket' => $ket
        );

        $db2->where('id_nafkah', $id_nafkah);
        $db2->update('tb_nafkah', $data);

        $this->session->set_flashdata('pesan', 'Di Ubah');
        redirect('nafkah/data_nafkah');

    }
    public function hapus_data($id)
    {
        //load db kedua
        $db2 = $this->load->database('database_kedua', TRUE);
        # hapus file
        $row = $db2->where('id_nafkah', $id)->get('tb_nafkah')->row_array();

        $where = array('id_nafkah' => $id);
        $this->M_pihak->hapus_nafkah($where, 'tb_nafkah');

        $this->session->set_flashdata('pesan', 'DiHapus !!!');
        redirect('nafkah/data_nafkah');
    }
}
