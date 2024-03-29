<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Duplikat extends CI_Controller
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

    public function data_dup()
    {
        if ((isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $tahun      = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }

        $db3 = $this->load->database('database_ketiga', TRUE);
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']     = "Duplikat Akta Cerai";
        $data['kode_duplikat']      = $this->M_pihak->kode_duplikat();
        $data['data_dup']   = $this->M_pihak->get_data_dup($tahun);
        $data['tahun']   = $this->M_pihak->getTahunDuplikat();

        $mau_ke    = $this->uri->segment(3);
        $idu       = $this->uri->segment(4);

        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data Duplikat';
            $data['page']  = 'v_tambah_dup';
        } elseif ($mau_ke == "view") {
            $data['title'] = 'View Data Duplikat';
            $data['page']  = 'v_view_dup';
            $data['data_dup']    = $db3->query("SELECT * FROM tbl_duplikat WHERE id_dup = '$idu'")->result_array();
        } elseif ($mau_ke == "edit") {
            $data['title'] = 'Edit Data Duplikat';
            $data['page']  = 'v_edit_dup';
            $data['data_dup']    = $db3->query("SELECT * FROM tbl_duplikat WHERE id_dup = '$idu'")->result_array();
        } else {
            $data['page']  = 'v_duplikat';
        }

        $this->load->view('Temp/header', $data);
        $this->load->view('Admin/v_dashboard', $data);
        $this->load->view('Temp/footer2');
    }
    public function get_kecamatan()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $kec_selected = NULL;
        echo "<option value=''>Pilih Kecamatan</option>";
        $query =  $db2->query("SELECT * FROM tbl_kecamatan")->result_array();
        foreach($query as $row){
            echo '<option value="'.$row['id'].'" '.(($row['nama']==$kec_selected)?'selected="selected"':"").'>'.$row['nama'].'</option>';
        }
    }

    public function get_desa()
    {
        $db2 = $this->load->database('database_kedua', TRUE);
        $kecamatan = $_POST['kecamatan'];
        $query =  $db2->query("SELECT * FROM tbl_desa WHERE id_kecamatan=$kecamatan")->result_array();
        foreach($query as $row){
            echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
        }
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
        $db3 = $this->load->database('database_ketiga', TRUE);
        $reg_dup             = $this->input->post('reg_dup');
        // $reg_dup_no             = $this->input->post('reg_dup');
        // $reg_dup_tahun          = $this->input->post('reg_dup_tahun');
        // $reg_dup = $reg_dup_no.'/Dup/AC/'.$reg_dup_tahun.'/PA.Bjn';
       
        $tgl_dup                = $this->input->post('tgl_dup');
        $nama_pemohon           = $this->input->post('nama_pemohon');
        $umur_pemohon           = $this->input->post('umur_pemohon');
        $kerja_pemohon          = $this->input->post('kerja_pemohon');
        
        $alamat_pemohon = NULL;
        if($this->input->post('kota') == 'Bojonegoro'){
            $db2 = $this->load->database('database_kedua', TRUE);
            
            $kecamatan_input      = $this->input->post('kecamatan');
            $kecamatan            =  $db2->query("SELECT * FROM tbl_kecamatan WHERE id=$kecamatan_input")->row_array();
            $desa_input           = $this->input->post('desa');
            $desa                 =  $db2->query("SELECT * FROM tbl_desa WHERE id=$desa_input")->row_array();
            
            $dalam_kota     = $this->input->post('dalam_kota');
            $alamat_pemohon = $dalam_kota.', Desa '.$desa['nama'].', Kecamatan '.$kecamatan['nama'].', Kabupaten Bojonegoro, Provinsi Jawa Timur';
        }else if($this->input->post('kota') == 'Luar Kota'){
            $alamat_pemohon = $this->input->post('luar_kota');
        }

        $no_ac                  = $this->input->post('no_ac');
        $tgl_terbit_ac          = $this->input->post('tgl_terbit_ac');
        $jenis_ac               = $this->input->post('jenis_ac');
        $no_perkara             = $this->input->post('no_perkara');
        $tgl_putus_perkara      = $this->input->post('tgl_putus_perkara');
        $pemohon_perkara        = $this->input->post('pemohon_perkara');
        $termohon_perkara       = $this->input->post('termohon_perkara');
        
        $kondisi_ac = NULL;
        if($this->input->post('kondisi_ac') == 'Hilang' || $this->input->post('kondisi_ac') == 'Rusak'){
            $kondisi_ac    = $this->input->post('kondisi_ac');
        }else if($this->input->post('kondisi_ac') == 'Lainnya'){
            $kondisi_ac    = $this->input->post('kondisi_lain');
        }
        
        $alasan_kondisi         = $this->input->post('alasan_kondisi');

        $alamat_kondisi = NULL;
        if($this->input->post('alamat_kondisi') == 'Sama' && $alamat_pemohon != NULL){
            $alamat_kondisi     = $alamat_pemohon;
        }else if($this->input->post('alamat_kondisi') == 'Lainnya'){
            $alamat_kondisi    = $this->input->post('alamat_lain');
        }

        $surat_polisi           = $this->input->post('surat_polisi');
        $no_polisi              = $this->input->post('no_polisi');
        $tgl_polisi             = $this->input->post('tgl_polisi');
        $belum_kua              = $this->input->post('belum_kua');
        $no_belum_kua           = $this->input->post('no_belum_kua');
        $tgl_belum_kua          = $this->input->post('tgl_belum_kua');
        $kua                    = $this->input->post('kua');
        $alasan_dup             = $this->input->post('alasan_dup');
        $created_at             = date('Y-m-d H:i:s');


        $data = array(
            'reg_dup'           => $reg_dup,
            'tgl_dup'           => $tgl_dup,
            'nama_pemohon'      => $nama_pemohon,
            'umur_pemohon'      => $umur_pemohon,
            'kerja_pemohon'     => $kerja_pemohon,
            'alamat_pemohon'    => $alamat_pemohon,
            'no_ac'             => $no_ac,
            'tgl_terbit_ac'     => $tgl_terbit_ac,
            'jenis_ac'          => $jenis_ac,
            'no_perkara'        => $no_perkara,
            'tgl_putus_perkara' => $tgl_putus_perkara,
            'pemohon_perkara'   => $pemohon_perkara,
            'termohon_perkara'  => $termohon_perkara,
            'kondisi_ac'        => $kondisi_ac,
            'alasan_kondisi'    => $alasan_kondisi,
            'alamat_kondisi'    => $alamat_kondisi,
            'surat_polisi'      => $surat_polisi,
            'tgl_polisi'        => $tgl_polisi,
            'no_polisi'         => $no_polisi,
            'belum_kua'         => $belum_kua,
            'no_belum_kua'      => $no_belum_kua,
            'tgl_belum_kua'     => $tgl_belum_kua,
            'kua'               => 'KUA '.$kua,
            'alasan_dup'        => $alasan_dup,
            'created_at'        => $created_at,
            'kode'              => $this->autogenerate()


        );
        $db3 = $this->load->database('database_ketiga', TRUE);
        $db3->insert('tbl_duplikat', $data);

        $this->session->set_flashdata('pesan', 'Di Tambahkan');
        redirect('duplikat/data_dup');
    }

    public function update_data()
    {

        $id_dup                 = $this->input->post('id_dup');
        $reg_dup                = $this->input->post('reg_dup');       
        $tgl_dup                = $this->input->post('tgl_dup');
        $nama_pemohon           = $this->input->post('nama_pemohon');
        $umur_pemohon           = $this->input->post('umur_pemohon');
        $kerja_pemohon          = $this->input->post('kerja_pemohon');
        $alamat_pemohon         = $this->input->post('alamat_pemohon');
        $no_ac                  = $this->input->post('no_ac');
        $tgl_terbit_ac          = $this->input->post('tgl_terbit_ac');
        $jenis_ac               = $this->input->post('jenis_ac');
        $no_perkara             = $this->input->post('no_perkara');
        $tgl_putus_perkara      = $this->input->post('tgl_putus_perkara');
        $pemohon_perkara        = $this->input->post('pemohon_perkara');
        $termohon_perkara       = $this->input->post('termohon_perkara');
        $kondisi_ac             = $this->input->post('kondisi_ac');
        $alasan_kondisi         = $this->input->post('alasan_kondisi');
        $alamat_kondisi         = $this->input->post('alamat_kondisi');
        $surat_polisi           = $this->input->post('surat_polisi');
        $no_polisi              = $this->input->post('no_polisi');
        $tgl_polisi             = $this->input->post('tgl_polisi');
        $belum_kua              = $this->input->post('belum_kua');
        $no_belum_kua           = $this->input->post('no_belum_kua');
        $tgl_belum_kua          = $this->input->post('tgl_belum_kua');
        $kua                    = $this->input->post('kua');
        $alasan_dup             = $this->input->post('alasan_dup');
        $updated_at             = date('Y-m-d H:i:s');

        $db3 = $this->load->database('database_ketiga', TRUE);
        $data['user']      = $db3->get_where('tbl_duplikat', ['id_dup' => $id_dup])->row_array();

        $data = array(
            'reg_dup'           => $reg_dup,
            'tgl_dup'           => $tgl_dup,
            'nama_pemohon'      => $nama_pemohon,
            'umur_pemohon'      => $umur_pemohon,
            'kerja_pemohon'     => $kerja_pemohon,
            'alamat_pemohon'    => $alamat_pemohon,
            'no_ac'             => $no_ac,
            'tgl_terbit_ac'     => $tgl_terbit_ac,
            'jenis_ac'          => $jenis_ac,
            'no_perkara'        => $no_perkara,
            'tgl_putus_perkara' => $tgl_putus_perkara,
            'pemohon_perkara'   => $pemohon_perkara,
            'termohon_perkara'  => $termohon_perkara,
            'kondisi_ac'        => $kondisi_ac,
            'alasan_kondisi'    => $alasan_kondisi,
            'alamat_kondisi'    => $alamat_kondisi,
            'surat_polisi'      => $surat_polisi,
            'tgl_polisi'        => $tgl_polisi,
            'no_polisi'         => $no_polisi,
            'belum_kua'         => $belum_kua,
            'no_belum_kua'      => $no_belum_kua,
            'tgl_belum_kua'     => $tgl_belum_kua,
            'kua'               => $kua,
            'alasan_dup'        => $alasan_dup,
            'updated_at'        => $updated_at
        );

        $db3->where('id_dup', $id_dup);
        $db3->update('tbl_duplikat', $data);

        $this->session->set_flashdata('pesan', 'Di Ubah');
        redirect('duplikat/data_dup');
    }

    public function print_rtf()
    {
        // $db2        = $this->load->database('database_kedua', TRUE);
        $db3        = $this->load->database('database_ketiga', TRUE);
        $id_dup  = $this->uri->segment(3);

        $kode_rtf   = $db3->query("SELECT * FROM tbl_duplikat WHERE id_dup = '$id_dup'")->row_array();
        
        $tgl_dup            = tanggal_indonesia($kode_rtf['tgl_dup']);
        $kondisi_ac         = $kode_rtf['kondisi_ac'];
        $nama_pemohon       = $kode_rtf['nama_pemohon'];
        $umur_pemohon       = $kode_rtf['umur_pemohon'];
        $kerja_pemohon      = $kode_rtf['kerja_pemohon'];
        $alamat_pemohon     = $kode_rtf['alamat_pemohon'];
        $no_ac              = $kode_rtf['no_ac'];
        $tgl_terbit_ac      = tanggal_indonesia($kode_rtf['tgl_terbit_ac']);
        $no_perkara         = $kode_rtf['no_perkara'];
        $tgl_putus_perkara  = tanggal_indonesia($kode_rtf['tgl_putus_perkara']);
        $pemohon_perkara    = $kode_rtf['pemohon_perkara'];
        $termohon_perkara   = $kode_rtf['termohon_perkara'];
        $alasan_kondisi     = $kode_rtf['alasan_kondisi'];
        $surat_polisi       = $kode_rtf['surat_polisi'];
        $no_polisi          = $kode_rtf['no_polisi'];
        $tgl_polisi         = tanggal_indonesia($kode_rtf['tgl_polisi']);
        $belum_kua          = $kode_rtf['belum_kua'];
        $no_belum_kua       = $kode_rtf['no_belum_kua'];
        $tgl_belum_kua      = tanggal_indonesia($kode_rtf['tgl_belum_kua']);
        $kua                = $kode_rtf['kua'];
        $alasan_dup         = $kode_rtf['alasan_dup'];
        $jenis_ac           = $kode_rtf['jenis_ac'];



        $document = file_get_contents('./uploads/blanko_duplikat.rtf');

        $document = str_replace("#1#", $tgl_dup, $document);
        $document = str_replace("#2#", $kondisi_ac, $document);
        $document = str_replace("#3#", $nama_pemohon, $document); 
        $document = str_replace("#4#", $umur_pemohon, $document); 
        $document = str_replace("#5#", $kerja_pemohon, $document); 
        $document = str_replace("#6#", $alamat_pemohon, $document); 
        $document = str_replace("#7#", $nama_pemohon, $document);
        $document = str_replace("#8#", $no_ac, $document);
        $document = str_replace("#9#", $tgl_terbit_ac, $document);
        $document = str_replace("#10#", $no_perkara, $document);
        $document = str_replace("#11#", $tgl_putus_perkara, $document);
        $document = str_replace("#12#", $pemohon_perkara, $document);
        $document = str_replace("#13#", $termohon_perkara, $document);
        $document = str_replace("#14#", $kondisi_ac, $document);
        $document = str_replace("#15#", $alasan_kondisi, $document);
        $document = str_replace("#16#", $surat_polisi, $document);
        $document = str_replace("#17#", $no_polisi, $document);
        $document = str_replace("#18#", $tgl_polisi, $document);
        $document = str_replace("#19#", $belum_kua, $document); 
        $document = str_replace("#20#", $no_belum_kua, $document);
        $document = str_replace("#21#", $tgl_belum_kua, $document);
        $document = str_replace("#22#", $kua, $document); 
        $document = str_replace("#23#", $alasan_dup, $document); 
        $document = str_replace("#24#", $jenis_ac, $document);


        header("Content-type: application/rtf");
        header("Content-disposition: inline; filename=$nama_pemohon.rtf");
        header("Content-length: " . strlen($document));
        echo $document;
    }

    public function print_ba_rtf()
    {
        // $db2        = $this->load->database('database_kedua', TRUE);
        $db3        = $this->load->database('database_ketiga', TRUE);
        $id_dup  = $this->uri->segment(3);

        $kode_rtf   = $db3->query("SELECT * FROM tbl_duplikat WHERE id_dup = '$id_dup'")->row_array();
        
        $tgl_dup            = tanggal_indonesia($kode_rtf['tgl_dup']);
        $kondisi_ac         = $kode_rtf['kondisi_ac'];
        $nama_pemohon       = $kode_rtf['nama_pemohon'];
        $umur_pemohon       = $kode_rtf['umur_pemohon'];
        $kerja_pemohon      = $kode_rtf['kerja_pemohon'];
        $alamat_pemohon     = $kode_rtf['alamat_pemohon'];
        $no_ac              = $kode_rtf['no_ac'];
        $tgl_terbit_ac      = tanggal_indonesia($kode_rtf['tgl_terbit_ac']);
        $no_perkara         = $kode_rtf['no_perkara'];
        $tgl_putus_perkara  = tanggal_indonesia($kode_rtf['tgl_putus_perkara']);
        $pemohon_perkara    = $kode_rtf['pemohon_perkara'];
        $termohon_perkara   = $kode_rtf['termohon_perkara'];
        $alasan_kondisi     = $kode_rtf['alasan_kondisi'];
        $surat_polisi       = $kode_rtf['surat_polisi'];
        $no_polisi          = $kode_rtf['no_polisi'];
        $tgl_polisi         = tanggal_indonesia($kode_rtf['tgl_polisi']);
        $belum_kua          = $kode_rtf['belum_kua'];
        $no_belum_kua       = $kode_rtf['no_belum_kua'];
        $tgl_belum_kua      = tanggal_indonesia($kode_rtf['tgl_belum_kua']);
        $kua                = $kode_rtf['kua'];
        $alasan_dup         = $kode_rtf['alasan_dup'];
        $jenis_ac           = $kode_rtf['jenis_ac'];
        $hari_dup           = nama_hari($kode_rtf['tgl_dup']);
        $reg_dup           = $kode_rtf['reg_dup'];



        $document = file_get_contents('./uploads/blanko_berita_acara.rtf');

        $document = str_replace("#1#", $tgl_dup, $document);
        $document = str_replace("#2#", $kondisi_ac, $document);
        $document = str_replace("#3#", $nama_pemohon, $document); 
        $document = str_replace("#4#", $umur_pemohon, $document); 
        $document = str_replace("#5#", $kerja_pemohon, $document); 
        $document = str_replace("#6#", $alamat_pemohon, $document); 
        $document = str_replace("#7#", $nama_pemohon, $document);
        $document = str_replace("#8#", $no_ac, $document);
        $document = str_replace("#9#", $tgl_terbit_ac, $document);
        $document = str_replace("#10#", $no_perkara, $document);
        $document = str_replace("#11#", $tgl_putus_perkara, $document);
        $document = str_replace("#12#", $pemohon_perkara, $document);
        $document = str_replace("#13#", $termohon_perkara, $document);
        $document = str_replace("#14#", $kondisi_ac, $document);
        $document = str_replace("#15#", $alasan_kondisi, $document);
        $document = str_replace("#16#", $surat_polisi, $document);
        $document = str_replace("#17#", $no_polisi, $document);
        $document = str_replace("#18#", $tgl_polisi, $document);
        $document = str_replace("#19#", $belum_kua, $document); 
        $document = str_replace("#20#", $no_belum_kua, $document);
        $document = str_replace("#21#", $tgl_belum_kua, $document);
        $document = str_replace("#22#", $kua, $document); 
        $document = str_replace("#23#", $alasan_dup, $document); 
        $document = str_replace("#24#", $jenis_ac, $document);
        $document = str_replace("#25#", $hari_dup, $document);
        $document = str_replace("#26#", $reg_dup, $document);


        header("Content-type: application/rtf");
        header("Content-disposition: inline; filename=ba_$nama_pemohon.rtf");
        header("Content-length: " . strlen($document));
        echo $document;
    }
    private	function _fileToHex($id_dup) 
    {	  
        $f = fopen(base_url().$id_dup.'.png', "r");
        $string = fread($f, filesize(base_url().$id_dup.'.png'));
        fclose($f);
    
        $str = '';
        for ($i = 0; $i < strlen($string); $i ++) {
            $hex = dechex( ord($string{$i}));
        
            if (strlen($hex) == 1) {			  
                $hex = '0'.$hex;
            }
        
            $str .= $hex;	
        }
        
        return $str;
    }

    public function print_dup_rtf()
    {
        // $db2        = $this->load->database('database_kedua', TRUE);
        $db3        = $this->load->database('database_ketiga', TRUE);
        $id_dup  = $this->uri->segment(3);

        $kode_rtf   = $db3->query("SELECT * FROM tbl_duplikat WHERE id_dup = '$id_dup'")->row_array();
        
        $tgl_dup            = tanggal_indonesia($kode_rtf['tgl_dup']);
        $kondisi_ac         = $kode_rtf['kondisi_ac'];
        $nama_pemohon       = $kode_rtf['nama_pemohon'];
        $umur_pemohon       = $kode_rtf['umur_pemohon'];
        $kerja_pemohon      = $kode_rtf['kerja_pemohon'];
        $alamat_pemohon     = $kode_rtf['alamat_pemohon'];
        $no_ac              = $kode_rtf['no_ac'];
        $tgl_terbit_ac      = tanggal_indonesia($kode_rtf['tgl_terbit_ac']);
        $no_perkara         = $kode_rtf['no_perkara'];
        $tgl_putus_perkara  = tanggal_indonesia($kode_rtf['tgl_putus_perkara']);
        $pemohon_perkara    = $kode_rtf['pemohon_perkara'];
        $termohon_perkara   = $kode_rtf['termohon_perkara'];
        $alasan_kondisi     = $kode_rtf['alasan_kondisi'];
        $surat_polisi       = $kode_rtf['surat_polisi'];
        $no_polisi          = $kode_rtf['no_polisi'];
        $tgl_polisi         = tanggal_indonesia($kode_rtf['tgl_polisi']);
        $belum_kua          = $kode_rtf['belum_kua'];
        $no_belum_kua       = $kode_rtf['no_belum_kua'];
        $tgl_belum_kua      = tanggal_indonesia($kode_rtf['tgl_belum_kua']);
        $kua                = $kode_rtf['kua'];
        $alasan_dup         = $kode_rtf['alasan_dup'];
        $jenis_ac           = $kode_rtf['jenis_ac'];
        $hari_dup           = nama_hari($kode_rtf['tgl_dup']);
        $reg_dup            = $kode_rtf['reg_dup'];


        $document = file_get_contents('./uploads/blanko_dup_asli.rtf');

        $document = str_replace("#1#", $tgl_dup, $document);
        $document = str_replace("#2#", $kondisi_ac, $document);
        $document = str_replace("#3#", $nama_pemohon, $document); 
        $document = str_replace("#4#", $umur_pemohon, $document); 
        $document = str_replace("#5#", $kerja_pemohon, $document); 
        $document = str_replace("#6#", $alamat_pemohon, $document); 
        $document = str_replace("#7#", $nama_pemohon, $document);
        $document = str_replace("#8#", $no_ac, $document);
        $document = str_replace("#9#", $tgl_terbit_ac, $document);
        $document = str_replace("#10#", $no_perkara, $document);
        $document = str_replace("#11#", $tgl_putus_perkara, $document);
        $document = str_replace("#12#", $pemohon_perkara, $document);
        $document = str_replace("#13#", $termohon_perkara, $document);
        $document = str_replace("#14#", $kondisi_ac, $document);
        $document = str_replace("#15#", $alasan_kondisi, $document);
        $document = str_replace("#16#", $surat_polisi, $document);
        $document = str_replace("#17#", $no_polisi, $document);
        $document = str_replace("#18#", $tgl_polisi, $document);
        $document = str_replace("#19#", $belum_kua, $document); 
        $document = str_replace("#20#", $no_belum_kua, $document);
        $document = str_replace("#21#", $tgl_belum_kua, $document);
        $document = str_replace("#22#", $kua, $document); 
        $document = str_replace("#23#", $alasan_dup, $document); 
        $document = str_replace("#24#", $jenis_ac, $document);
        $document = str_replace("#25#", $hari_dup, $document);
        $document = str_replace("#26#", $reg_dup, $document);


        header("Content-type: application/rtf");
        header("Content-disposition: inline; filename=dup_$reg_dup.rtf");
        header("Content-length: " . strlen($document));
        echo $document;
    }

    public function excelLaporan()
    {
        $data['title']          = 'Laporan Duplikat Akta Cerai Pengadilan Agama Bojonegoro';
        $data['tanggal']        = date('Y-m-d');
        $data['user']      = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();

        if ((isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $tahun      = $_GET['tahun'];
        } else {
            $tahun = date('Y');
        }

        $db3 = $this->load->database('database_ketiga', TRUE);
        $data['duplikat'] = $db3->query("SELECT * FROM tbl_duplikat WHERE YEAR(tgl_dup) = '$tahun'")->result_array();
        
        include_once APPPATH.'/third_party/xlsxwriter.class.php';
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $filename = "report-tahun ".$tahun.".xlsx";
        header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $styles = array('widths'=>[3,20,30,40], 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
        $styles2 = array( ['font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'left', 'border'=>'left,right,top,bottom','fill'=>'#fff'],);

        $writer = new XLSXWriter();
        $writer->setAuthor('Manusia');
        
        $header_duplikat = array(
            'No'=>'integer',
            'No Reg Duplikat'=>'string',
            'Nama Pemohon'=>'string',
            'Tgl Permohonan'=>'string',
            'No AC'=>'string',
            'No Perkara'=>'string',
            'Kondisi AC'=>'string',
            'Mengetahui KUA'=>'string',
            'Alasan'=>'string',
        );
        $writer->writeSheetHeader('duplikat', $header_duplikat, $styles);
        $no = 1;
        foreach($data['duplikat'] as $row){
            $reg_dup[] = $row['reg_dup'];
            $nama_pemohon[] = $row['nama_pemohon'];
            $tgl_dup[] = $row['tgl_dup'];
            $no_ac[] = $row['no_ac'];
            $no_perkara[] = $row['no_perkara'];
            $kondisi_ac[] = $row['kondisi_ac'];
            $kua[] = $row['kua'];
            $alasan_dup[] = $row['alasan_dup'];
            

            $writer->writeSheetRow('duplikat', [
                $no, $row['reg_dup'], 
                $row['nama_pemohon'], 
                $row['tgl_dup'], 
                $row['no_ac'], 
                $row['no_perkara'], 
                $row['kondisi_ac'], 
                $row['kua'], 
                $row['alasan_dup']
            ], $styles2);
            $no++;
        }

        $writer->writeToStdOut();
    }

    public function hapus_data($id)
    {
        //load db kedua
        // $db2 = $this->load->database('database_kedua', TRUE);
        //load db ketiga
        $db3 = $this->load->database('database_ketiga', TRUE);
        # hapus file
        $row = $db3->where('id_dup', $id)->get('tbl_duplikat')->row_array();

        $where = array('id_dup' => $id);
        $this->M_pihak->hapus_dup($where, 'tbl_duplikat');

        $this->session->set_flashdata('pesan', 'DiHapus !!!');
        redirect('duplikat/data_dup');
    }
}
