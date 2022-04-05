<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        if ($this->session->userdata['username'] != 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											 Anda Tidak Boleh Akses  !!!
											</div>');
            redirect('welcome/blocked');
        }
    }

    public function admin()
    {
        $data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Menu Admin';
        $data['date']  = date('Y-m-d H:i:s');

        $data['data_umum']  = $this->M_pihak->get_data_admin();
        $data['pendidikan'] = $this->M_pihak->get_data_pendidikan();
        $data['agama']      = $this->M_pihak->get_data_agama();
        $data['agama']      = $this->M_pihak->get_data_agama();
        $data['id']         = $this->M_pihak->get_data_id();
        $data['negara']     = $this->M_pihak->get_data_negara();
        $data['query_id']   = $this->M_pihak->get_query_id();

        $mau_ke = $this->uri->segment(3);
        $idu    = $this->uri->segment(4);

        if ($mau_ke == "view") {
            $data['title']      = 'View Data Admin';
            $data['page']       = 'v_view_data';
            $data['data_umum']  = $this->db->query("SELECT * FROM pihak WHERE id = '$idu'")->result_array();
        } elseif ($mau_ke == "edit") {
            $data['title'] = 'Edit Data Admin';
            $data['page']  = 'v_edit_data';
            $data['data_umum']    = $this->db->query("SELECT * FROM pihak WHERE id = '$idu'")->result_array();
        } else {
            $data['page']  = 'v_beranda';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer');
    }
    public function update_data()
    {
        $id                = $this->input->post('id');
        $jenis_pihak       = $this->input->post('jenis_pihak_id');
        $jenis_kelamin     = $this->input->post('jenis_kelamin');
        $nama              = $this->input->post('nama');
        $jenis_indentitas  = $this->input->post('jenis_indentitas');
        $nomor_indentitas  = $this->input->post('nomor_indentitas');
        $tempat_lahir      = ucwords($this->input->post('tempat_lahir'));
        $tanggal_lahir     = $this->input->post('tanggal_lahir');
        $golongan_darah    = $this->input->post('golongan_darah');
        $warga_negara_id   = $this->input->post('warga_negara_id');
        $alamat            = $this->input->post('alamat');
        $agama_id          = $this->input->post('agama_id');
        $status_kawin      = $this->input->post('status_kawin');
        $difabel           = $this->input->post('difabel');
        $pendidikan_id     = $this->input->post('pendidikan_id');
        $telpon            = $this->input->post('telpon');
        $fax               = $this->input->post('fax');
        $email             = $this->input->post('email');
        $keterangan        = $this->input->post('keterangan');
        $diinput_oleh      = $this->input->post('diinput_oleh');
        $diinput_tanggal   = $this->input->post('diinput_tanggal');
        $pekerjaan         = $this->input->post('pekerjaan');
        $pekerjaan_lainnya = ucwords($this->input->post('pekerjaan_lainnya'));
        if ($pekerjaan == 'Lain-Lain') { {
                $pekerja = $pekerjaan_lainnya;
            }
        } else { {
                $pekerja = $pekerjaan;
            }
        }
        $pekerja_asli = $pekerja;

        $data = array(
            'id'                => $id,
            'jenis_pihak_id'    => $jenis_pihak,
            'jenis_indentitas'  => $jenis_indentitas,
            'nomor_indentitas'  => $nomor_indentitas,
            'nama'              => $nama,
            'tempat_lahir'      => $tempat_lahir,
            'tanggal_lahir'     => $tanggal_lahir,
            'jenis_kelamin'     => $jenis_kelamin,
            'golongan_darah'    => $golongan_darah,
            'alamat'            => $alamat,
            'telepon'           => $telpon,
            'fax'               => $fax,
            'email'             => $email,
            'agama_id'          => $agama_id,
            'status_kawin'      => $status_kawin,
            'pekerjaan'         => $pekerja_asli,
            'pendidikan_id'     => $pendidikan_id,
            'warga_negara_id'   => $warga_negara_id,
            'difabel'           => $difabel,
            'keterangan'        => $keterangan,
            'diinput_oleh'      => $diinput_oleh,
            'diinput_tanggal'   => $diinput_tanggal
        );

        // var_dump($data);
        // die;

        $this->db->where('id', $id);
        $this->db->update('pihak', $data);
        $this->session->set_flashdata('pesan', 'Di Ubah !!!');

        $data_user = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $usernames = $data_user['username'];

        if ($usernames == 'admin') {
            redirect('admin/admin');
        } else {
            redirect('user/data_umum');
        }
    }
}
