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
        $db2 = $this->load->database('database_kedua', TRUE);
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']     = "Langit Cerah";
        $data['kode']      = $this->M_pihak->kode();
        $data['data_lc']   = $this->M_pihak->get_data_lc();


        $mau_ke    = $this->uri->segment(3);
        $idu       = $this->uri->segment(4);

        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data LC';
            $data['page']  = 'v_tambah_lc';
        } elseif ($mau_ke == "view") {
            $data['title'] = 'View Data LC';
            $data['page']  = 'v_view_lc';
            $data['data_lc']    = $db2->query("SELECT * FROM tb_datalc WHERE id_datalc = '$idu'")->result_array();
        } elseif ($mau_ke == "edit") {
            $data['title'] = 'Edit Data LC';
            $data['page']  = 'v_edit_lc';
            $data['data_lc']    = $db2->query("SELECT * FROM tb_datalc WHERE id_datalc = '$idu'")->result_array();
        } else {
            $data['page']  = 'v_langit-cerah';
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
        $tgl_kirim_ac       = $this->input->post('tgl_kirim_ac');
        $nomor_lc           = $this->input->post('nomor_lc');
        $tgl_permohonan     = $this->input->post('tgl_daftar');
        $tgl_ac             = $this->input->post('tgl_ac');
        $no_perkara         = $this->input->post('no_perkaraname');
        $no_ac              = $this->input->post('nomor_ac');
        $nama_p             = $this->input->post('nama_p');
        $umur_p             = $this->input->post('umur_p');
        $agama_p            = $this->input->post('agama_p');
        $pekerjaan_p        = $this->input->post('pekerjaan_p');
        $pendidikan_p       = $this->input->post('pendidikan_p');
        $alamat_p           = $this->input->post('alamat_p');
        $telepon_p          = $this->input->post('telepon_p');
        $nama_t             = $this->input->post('nama_t');
        $umur_t             = $this->input->post('umur_t');
        $agama_t            = $this->input->post('agama_t');
        $pekerjaan_t        = $this->input->post('pekerjaan_t');
        $pendidikan_t       = $this->input->post('pendidikan_t');
        $alamat_t           = $this->input->post('alamat_t');
        $telepon_t          = $this->input->post('telepon_t');
        $input_resi         = $this->input->post('input_resi') != NULL ? $this->input->post('input_resi') : 0;
        $file_upload        = 'default.pdf';
        $created            = date('Y-m-d H:i:s');


        $data = array(
            'tgl_kirim_ac'   => $tgl_kirim_ac,
            'nomor_lc'       => $nomor_lc,
            'tgl_permohonan' => $tgl_permohonan,
            'tgl_ac'         => $tgl_ac,
            'no_perkara'     => $no_perkara,
            'nomor_ac'       => $no_ac,
            'nama_p'         => $nama_p,
            'umur_p'         => $umur_p,
            'agama_p'        => $agama_p,
            'pekerjaan_p'    => $pekerjaan_p,
            'pendidikan_p'   => $pendidikan_p,
            'alamat_p'       => $alamat_p,
            'telepon_p'      => $telepon_p,
            'nama_t'         => $nama_t,
            'umur_t'         => $umur_t,
            'agama_t'        => $agama_t,
            'pekerjaan_t'    => $pekerjaan_t,
            'pendidikan_t'   => $pendidikan_t,
            'alamat_t'       => $alamat_t,
            'telepon_t'      => $telepon_t,
            'input_resi'     => $input_resi,
            'file_upload'    => $file_upload,
            'created'        => $created


        );

        $db2 = $this->load->database('database_kedua', TRUE);
        $db2->insert('tb_datalc', $data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('langitcerah/data_lc');

        // var_dump($data);
        // die;

    }
    public function update_data()
    {

        $id_datalc          = $this->input->post('id_datalc');
        $tgl_kirim_ac       = $this->input->post('tgl_kirim_ac');
        $nomor_lc           = $this->input->post('nomor_lc');
        $tgl_permohonan     = $this->input->post('tgl_permohonan');
        $tgl_ac             = $this->input->post('tgl_ac');
        $no_perkara         = $this->input->post('no_perkaraname');
        $input_resi         = $this->input->post('input_resi');
        $nama_p             = $this->input->post('nama_p');
        $umur_p             = $this->input->post('umur_p');
        $agama_p            = $this->input->post('agama_p');
        $pekerjaan_p        = $this->input->post('pekerjaan_p');
        $pendidikan_p       = $this->input->post('pendidikan_p');
        $alamat_p           = $this->input->post('alamat_p');
        $telepon_p          = $this->input->post('telepon_p');
        $nama_t             = $this->input->post('nama_t');
        $umur_t             = $this->input->post('umur_t');
        $agama_t            = $this->input->post('agama_t');
        $pekerjaan_t        = $this->input->post('pekerjaan_t');
        $pendidikan_t       = $this->input->post('pendidikan_t');
        $alamat_t           = $this->input->post('alamat_t');
        $telepon_t          = $this->input->post('telepon_t');
        $created            = date('Y-m-d H:i:s');

        $db2 = $this->load->database('database_kedua', TRUE);
        $data['user']      = $db2->get_where('tb_datalc', ['id_datalc' => $id_datalc])->row_array();

        //cek jika ada gambar yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './uploads';
            $filename                   = str_replace('/', '_', $nomor_lc . '_lampiran');
            $config['file_name']        = $filename;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['file_upload'];
                if ($old_image != 'default.pdf') {
                    unlink(FCPATH . "uploads/" . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $db2->set('file_upload', $new_image);
            } else {
                // echo $this->upload->display_errors();
                $this->session->set_flashdata('nama_menu', 'Tipe File Tidak Support Atau File Terlalu Besar !!!');
                redirect('langitcerah/data_lc');
            }
        }

        //cek jika ada gambar yang akan di upload
        $upload_image_kw = $_FILES['image_kw']['name'];

        if ($upload_image_kw) {
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './uploads';
            $filename                   = str_replace('/', '_', $nomor_lc . '_lampiran');
            $config['file_name']        = $filename;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_kw')) {
                $old_image = $data['user']['file_kwitansi'];
                if ($old_image != 'default.pdf') {
                    unlink(FCPATH . "uploads/" . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $db2->set('file_kwitansi', $new_image);
            } else {
                // echo $this->upload->display_errors();
                $this->session->set_flashdata('nama_menu', 'Tipe File Tidak Support Atau File Terlalu Besar !!!');
                redirect('langitcerah/data_lc');
            }
        }


        $data = array(
            'id_datalc'      => $id_datalc,
            'tgl_kirim_ac'   => $tgl_kirim_ac,
            'nomor_lc'       => $nomor_lc,
            'tgl_permohonan' => $tgl_permohonan,
            'tgl_ac'         => $tgl_ac,
            'no_perkara'     => $no_perkara,
            'input_resi'     => $input_resi,
            'nama_p'         => $nama_p,
            'umur_p'         => $umur_p,
            'agama_p'        => $agama_p,
            'pekerjaan_p'    => $pekerjaan_p,
            'pendidikan_p'   => $pendidikan_p,
            'alamat_p'       => $alamat_p,
            'telepon_p'      => $telepon_p,
            'nama_t'         => $nama_t,
            'umur_t'         => $umur_t,
            'agama_t'        => $agama_t,
            'pekerjaan_t'    => $pekerjaan_t,
            'pendidikan_t'   => $pendidikan_t,
            'alamat_t'       => $alamat_t,
            'telepon_t'      => $telepon_t,
            'created'        => $created
        );



        $db2->where('id_datalc', $id_datalc);
        $db2->update('tb_datalc', $data);

        $this->session->set_flashdata('pesan', 'Di Ubah');
        redirect('langitcerah/data_lc');

        // var_dump($data);
        // die;

    }
    public function hapus_data($id)
    {
        //load db kedua
        $db2 = $this->load->database('database_kedua', TRUE);
        # hapus file
        $row = $db2->where('id_datalc', $id)->get('tb_datalc')->row_array();
        $old_image = $row['file_upload'];

        unlink(FCPATH . "uploads/" . $old_image);

        $where = array('id_datalc' => $id);
        $this->M_pihak->hapus_lc($where, 'tb_datalc');

        $this->session->set_flashdata('pesan', 'DiHapus !!!');
        redirect('langitcerah/data_lc');
    }
    public function print_rtf()
    {
        $db2        = $this->load->database('database_kedua', TRUE);
        $id_datalc  = $this->uri->segment(3);

        $kode_rtf   = $db2->query("SELECT * FROM tb_datalc WHERE id_datalc = '$id_datalc'")->row_array();

        // $tgl_kirim_ac     = $kode_rtf['tgl_kirim_ac'];
        $tgl_permohonan   = tanggal_indonesia($kode_rtf['tgl_permohonan']);
        // $tgl_ac           = $kode_rtf['tgl_ac'];
        $no_perkara       = $kode_rtf['no_perkara'];
        // $nomor_lc         = $kode_rtf['nomor_lc'];
        $nama_p           = $kode_rtf['nama_p'];
        $umur_p           = $kode_rtf['umur_p'];
        $agama_p          = $kode_rtf['agama_p'];
        $pekerjaan_p      = $kode_rtf['pekerjaan_p'];
        $pendidikan_p     = $kode_rtf['pendidikan_p'];
        $alamat_p         = $kode_rtf['alamat_p'];
        $telpon_p         = $kode_rtf['telepon_p'];

        $nama_t           = $kode_rtf['nama_t'];
        $umur_t           = $kode_rtf['umur_t'];
        $agama_t          = $kode_rtf['agama_t'];
        $pekerjaan_t      = $kode_rtf['pekerjaan_t'];
        $pendidikan_t     = $kode_rtf['pendidikan_t'];
        $alamat_t         = $kode_rtf['alamat_t'];
        $telpon_t         = $kode_rtf['telepon_t'];


        $document = file_get_contents('./uploads/blanko.rtf');

        $document = str_replace("#NOPERKARA#", $no_perkara, $document);
        $document = str_replace("#TGLP#", $tgl_permohonan, $document);
        $document = str_replace("#NAMAP#", $nama_p, $document);
        $document = str_replace("#UMURP#", $umur_p, $document);
        $document = str_replace("#AGAMAP#", $agama_p, $document);
        $document = str_replace("#PEKERJAANP#", $pekerjaan_p, $document);
        $document = str_replace("#PENDIDIKANP#", $pendidikan_p, $document);
        $document = str_replace("#ALAMATP#", $alamat_p, $document);
        $document = str_replace("#TELPONP#", $telpon_p, $document);


        $document = str_replace("#NAMAT#", $nama_t, $document);
        $document = str_replace("#UMURT#", $umur_t, $document);
        $document = str_replace("#AGAMAT#", $agama_t, $document);
        $document = str_replace("#PEKERJAANT#", $pekerjaan_t, $document);
        $document = str_replace("#PENDIDIKANT#", $pendidikan_t, $document);
        $document = str_replace("#ALAMATT#", $alamat_t, $document);
        $document = str_replace("#TELPONT#", $telpon_t, $document);


        header("Content-type: application/rtf");
        header("Content-disposition: inline; filename=$no_perkara.rtf");
        header("Content-length: " . strlen($document));
        echo $document;
    }
}
