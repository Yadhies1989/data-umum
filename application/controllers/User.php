<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends CI_Controller
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
		if ($this->session->userdata['username'] === 'admin') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											 Anda Tidak Boleh Akses  !!!
											</div>');
			redirect('welcome/blocked');
		}
	}
	public function data_umum()
	{
		$data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Data Umum';
		// $data['page']  = 'v_beranda';
		$data['date']  = date('Y-m-d H:i:s');
		$data['data_umum'] = $this->M_pihak->get_data();
		$data['pendidikan'] = $this->M_pihak->get_data_pendidikan();
		$data['agama'] = $this->M_pihak->get_data_agama();
		$data['agama'] = $this->M_pihak->get_data_agama();
		$data['id']    = $this->M_pihak->get_data_id();
		$data['negara'] = $this->M_pihak->get_data_negara();
		//$data['jurusita'] = $this->M_pihak->get_data_jurusita();
		$data['query_id']  = $this->M_pihak->get_query_id();



		$mau_ke	= $this->uri->segment(3);
		$idu = $this->uri->segment(4);

		if ($mau_ke == "view") {
			$data['title']      = 'View Data';
			$data['page']       = 'v_view_data';
			$data['data_umum']	= $this->db->query("SELECT * FROM pihak WHERE id = '$idu'")->result_array();
		} elseif ($mau_ke == "add") {
			$data['title'] = 'Tambah Data';
			$data['page']  = 'v_tambah_data';
		} elseif ($mau_ke == "edit") {
			$data['title'] = 'Edit Data';
			$data['page']  = 'v_edit_data';
			$data['data_umum']	= $this->db->query("SELECT * FROM pihak WHERE id = '$idu'")->result_array();
		} else {
			$data['page']  = 'v_beranda';
		}


		$this->load->view('Temp/header', $data);
		$this->load->view('Admin/v_dashboard', $data);
		$this->load->view('Temp/footer');
	}
	public function get_wilayah()
	{
		$db2    = $this->load->database('database_kedua', TRUE);
		$kode   = $this->input->post('kode', TRUE);

		$data	= $db2->query("SELECT kel, kec, REPLACE(kabkota, 'Kab.', 'Kabupaten') AS kabkota, prop_name FROM tb_kelurahan_komdanas WHERE kel LIKE '%$kode%'
		ORDER BY FIELD(satker_code,401307) DESC LIMIT 50")->result();

		$klasifikasi = array();
		foreach ($data as $d) {
			$json_array             = array();
			$json_array['value']    = $d->kel . ", Kecamatan " . $d->kec . ", " . $d->kabkota . ", Provinsi " . $d->prop_name;
			$json_array['kel ']     = $d->kel;
			$klasifikasi[]          = $json_array;
		}

		echo json_encode($klasifikasi);
	}
	public function tambah_data()
	{
		$id             = $this->input->post('id');
		$jenis_pihak    = $this->input->post('jenis_pihak_id');
		$jenis_kelamin  = $this->input->post('jenis_kelamin');
		$nama		    = ucwords($this->input->post('nama'));
		$nama_ayah		= ucwords($this->input->post('nama_ayah'));
		if ($jenis_kelamin == 'L') { {
				$bin_binti = " bin ";
			}
		} else { {
				$bin_binti = " binti ";
			}
		}
		if (empty($nama_ayah)) { {
				$ayah = "";
			}
		} else { {
				$ayah = $bin_binti . $nama_ayah;
			}
		}

		$nama_bin		   = $nama . $ayah;
		$tempat_lahir      = ucwords($this->input->post('tempat_lahir'));
		$tanggal_lahir     = $this->input->post('tanggal_lahir');
		$jenis_indentitas  = $this->input->post('jenis_indentitas');
		$nomor_indentitas  = $this->input->post('nomor_indentitas');
		$pekerjaan  = $this->input->post('pekerjaan');
		$pekerjaan_lainnya  = ucwords($this->input->post('pekerjaan_lainnya'));
		if ($pekerjaan == 'Lain-Lain') { {
				$pekerja = $pekerjaan_lainnya;
			}
		} else { {
				$pekerja = $pekerjaan;
			}
		}
		$pekerja_asli = $pekerja;
		$pendidikan_id  = $this->input->post('pendidikan_id');
		$agama_id  = $this->input->post('agama_id');
		$status_kawin  = $this->input->post('status_kawin');
		$difabel  = $this->input->post('difabel');
		$vjalan         = ucwords($this->input->post('alamat'));
		if ($vjalan == '') {
			$jalan = '';
		} else {
			$jalan = $vjalan . ', ';
		}
		$vrt            = $this->input->post('rt');
		if ($vrt == '') {
			$rt = '';
		} else {
			$rt = 'RT ' . $vrt . ', ';
		}
		$vrw            = $this->input->post('rw');
		if ($vrw == '') {
			$rw = '';
		} else {
			$rw = 'RW ' . $vrw . ', ';
		}
		$kelurahan     = $this->input->post('kelurahan');
		$alamat = $jalan .  $rt . $rw . $kelurahan;


		$golongan_darah     = $this->input->post('golongan_darah');
		$warga_negara_id    = $this->input->post('warga_negara_id');
		$telpon   = $this->input->post('telpon');
		$fax      = $this->input->post('fax');
		$email    = $this->input->post('email');
		$keterangan         = ucwords($this->input->post('keterangan'));
		$diinput_oleh       = $this->input->post('diinput_oleh');
		$diinput_tanggal    = $this->input->post('diinput_tanggal');

		$data = array(
			'id'				=> $id,
			'jenis_pihak_id'	=> $jenis_pihak,
			'jenis_indentitas'	=> $jenis_indentitas,
			'nomor_indentitas'	=> $nomor_indentitas,
			'nama'		    	=> $nama_bin,
			'tempat_lahir'		=> $tempat_lahir,
			'tanggal_lahir'    	=> $tanggal_lahir,
			'jenis_kelamin'		=> $jenis_kelamin,
			'golongan_darah'   	=> $golongan_darah,
			'alamat'		    => $alamat,
			'telepon'		    => $telpon,
			'fax'		        => $fax,
			'email'		        => $email,
			'agama_id'		    => $agama_id,
			'status_kawin'		=> $status_kawin,
			'pekerjaan'		    => $pekerja_asli,
			'pendidikan_id'	    => $pendidikan_id,
			'warga_negara_id'	=> $warga_negara_id,
			'difabel'			=> $difabel,
			'keterangan'		=> $keterangan,
			'diinput_oleh'  	=> $diinput_oleh,
			'diinput_tanggal'  	=> $diinput_tanggal
		);

		$this->M_pihak->insert_data('pihak', $data);

		$this->session->set_flashdata('pesan', 'Di Tambahkan');
		redirect('user/data_umum');

		// var_dump($data);
		// die;
	}
	public function update_data()
	{
		$id             = $this->input->post('id');
		$jenis_pihak    = $this->input->post('jenis_pihak_id');
		$jenis_kelamin  = $this->input->post('jenis_kelamin');
		$nama		    = $this->input->post('nama');
		$jenis_indentitas  = $this->input->post('jenis_indentitas');
		$nomor_indentitas  = $this->input->post('nomor_indentitas');
		$tempat_lahir      = ucwords($this->input->post('tempat_lahir'));
		$tanggal_lahir     = $this->input->post('tanggal_lahir');
		$golongan_darah    = $this->input->post('golongan_darah');
		$warga_negara_id   = $this->input->post('warga_negara_id');
		$alamat    		   = $this->input->post('alamat');
		$agama_id  = $this->input->post('agama_id');
		$status_kawin  = $this->input->post('status_kawin');
		$difabel  = $this->input->post('difabel');
		$pendidikan_id  = $this->input->post('pendidikan_id');
		$telpon   = $this->input->post('telpon');
		$fax      = $this->input->post('fax');
		$email    = $this->input->post('email');
		$keterangan    = $this->input->post('keterangan');
		$diinput_oleh       = $this->input->post('diinput_oleh');
		$diinput_tanggal    = $this->input->post('diinput_tanggal');
		$pekerjaan  = $this->input->post('pekerjaan');
		$pekerjaan_lainnya  = ucwords($this->input->post('pekerjaan_lainnya'));
		if ($pekerjaan == 'Lain-Lain') { {
				$pekerja = $pekerjaan_lainnya;
			}
		} else { {
				$pekerja = $pekerjaan;
			}
		}
		$pekerja_asli = $pekerja;

		$data = array(
			'id'				=> $id,
			'jenis_pihak_id'	=> $jenis_pihak,
			'jenis_indentitas'	=> $jenis_indentitas,
			'nomor_indentitas'	=> $nomor_indentitas,
			'nama'		    	=> $nama,
			'tempat_lahir'		=> $tempat_lahir,
			'tanggal_lahir'    	=> $tanggal_lahir,
			'jenis_kelamin'		=> $jenis_kelamin,
			'golongan_darah'   	=> $golongan_darah,
			'alamat'		    => $alamat,
			'telepon'		    => $telpon,
			'fax'		        => $fax,
			'email'		        => $email,
			'agama_id'		    => $agama_id,
			'status_kawin'		=> $status_kawin,
			'pekerjaan'		    => $pekerja_asli,
			'pendidikan_id'	    => $pendidikan_id,
			'warga_negara_id'	=> $warga_negara_id,
			'difabel'			=> $difabel,
			'keterangan'		=> $keterangan,
			'diinput_oleh'  	=> $diinput_oleh,
			'diinput_tanggal'  	=> $diinput_tanggal
		);

		// var_dump($data);
		// die;

		$this->db->where('id', $id);
		$this->db->update('pihak', $data);
		$this->session->set_flashdata('pesan', 'Di Ubah !!!');

		$data_user = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
		$usernames = $data_user['username'];

		if ($usernames == 'admin') {
			redirect('user/admin');
		} else {
			redirect('user/data_umum');
		}
	}
	public function hapus_data($id)
	{
		$where = array('id' => $id);
		$this->M_pihak->hapus_data($where, 'pihak');
		$this->session->set_flashdata('pesan', 'DiHapus !!!');
		redirect('user/admin');
	}
	public function jadwal_sidang()
	{
		$data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "Jadwal Sidang";
		$data['hakim'] = $this->M_pihak->get_data_hakim();
		$data['page']  = 'v_jadwal-sidang';


		if ((isset($_GET['dari_tanggal']) && $_GET['dari_tanggal'] != '') && (isset($_GET['ruang_sidang']) && $_GET['ruang_sidang'] != '') && (isset($_GET['majelis']) && $_GET['majelis'] != '')) {
			$dari_tanggal    = $_GET['dari_tanggal'];
			$ruang_sidang    = $_GET['ruang_sidang'];
			$majelis         = $_GET['majelis'];
		} else {
			$dari_tanggal   = date('Y-m-d');
			$ruang_sidang   = '1';
			$majelis        = '22';
		}

		$hakim = $majelis;
		$list_hakim = $this->db->get_where('hakim_pn', array('id' => $hakim))->row_array();
		$data['hakim_nama'] = $list_hakim['nama_gelar'];

		$data['jadwal_sidang']  = $this->db->query("SELECT a.`nomor_perkara`, b.`tanggal_sidang`, c.nama AS Penggugat, d.`nama` AS Tergugat, b.`alasan_ditunda`,
		e.`hakim_nama`, e.`hakim_id`, b.`urutan`, b.`agenda`, a.`perkara_id`, m.tanggal_sidang AS tgl_sebelum, 
		n.tanggal_sidang AS tgl_sesudah, f.`tanggal_putusan`
		FROM perkara AS a
		LEFT JOIN perkara_jadwal_sidang AS b
		ON a.`perkara_id` = b.`perkara_id`
		LEFT JOIN perkara_pihak1 AS c
		ON a.`perkara_id` = c.`perkara_id`
		LEFT JOIN perkara_pihak2 AS d
		ON a.`perkara_id` = d.`perkara_id`
		LEFT JOIN perkara_hakim_pn AS e
		ON a.`perkara_id` = e.`perkara_id`
		LEFT JOIN
		(SELECT a.* FROM perkara_jadwal_sidang a LEFT JOIN 
		(SELECT *, urutan - 1 AS jml FROM perkara_jadwal_sidang WHERE tanggal_sidang = '$dari_tanggal' GROUP BY perkara_id) b 
		ON a.`perkara_id`=b.perkara_id WHERE a.urutan= b.jml) m
		ON b.perkara_id=m.perkara_id
		LEFT JOIN
		(SELECT a.* FROM perkara_jadwal_sidang a LEFT JOIN 
		(SELECT *, urutan + 1 AS jml FROM perkara_jadwal_sidang WHERE tanggal_sidang = '$dari_tanggal' GROUP BY perkara_id) b 
		ON a.`perkara_id`=b.perkara_id WHERE a.urutan= b.jml) n
		ON b.perkara_id=n.perkara_id
		LEFT JOIN perkara_putusan AS f
		ON a.`perkara_id`=f.`perkara_id`
		WHERE DATE(b.`tanggal_sidang`) = '$dari_tanggal'
		AND b.`ruangan` = '$ruang_sidang'
		AND e.`hakim_id` = '$majelis'
		GROUP BY a.`nomor_perkara` ORDER BY a.`perkara_id` ASC")->result_array();

		$this->load->view('Temp/header', $data);
		$this->load->view('Admin/v_dashboard', $data);
		$this->load->view('Temp/footer');
	}
	public function print_jadwal()
	{
		$data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "Jadwal Sidang";
		$data['hakim'] = $this->M_pihak->get_data_hakim();
		$data['page']  = 'v_jadwal-sidang';


		if ((isset($_GET['dari_tanggal']) && $_GET['dari_tanggal'] != '') && (isset($_GET['ruang_sidang']) && $_GET['ruang_sidang'] != '') && (isset($_GET['majelis']) && $_GET['majelis'] != '')) {
			$dari_tanggal    = $_GET['dari_tanggal'];
			$ruang_sidang    = $_GET['ruang_sidang'];
			$majelis         = $_GET['majelis'];
		} else {
			$dari_tanggal   = date('Y-m-d');
			$ruang_sidang   = '1';
			$majelis        = '22';
		}

		$data['tanggal'] = $dari_tanggal;
		$data['ruang']   = $ruang_sidang;

		$hakim = $majelis;
		$list_hakim = $this->db->get_where('hakim_pn', array('id' => $hakim))->row_array();
		$data['hakim_nama'] = $list_hakim['nama_gelar'];

		$list_majelis = $this->db->query("SELECT a.`nomor_perkara`, b.`hakim_nama`, 
		b.`jabatan_hakim_nama`, b.`hakim_id`,
		c.`tanggal_sidang`, d.`panitera_nama`
		FROM perkara_hakim_pn AS b
		LEFT JOIN perkara AS a
		ON a.`perkara_id`=b.`perkara_id`
		LEFT JOIN perkara_jadwal_sidang AS c
		ON c.`perkara_id` = a.`perkara_id`
		LEFT JOIN perkara_panitera_pn AS d
		ON d.`perkara_id`=a.`perkara_id`
		WHERE hakim_id = '$majelis'
		AND tanggal_sidang = '$dari_tanggal'
		ORDER BY a.`perkara_id` DESC")->row_array();

		// $data['hakim_majelis'] = $list_majelis['majelis'];
		$data['panitera'] = $list_majelis['panitera_nama'];

		$data['jadwal_sidang']  = $this->db->query("SELECT a.`nomor_perkara`, b.`tanggal_sidang`, c.nama AS Penggugat, d.`nama` AS Tergugat, b.`alasan_ditunda`,
		e.`hakim_nama`, e.`hakim_id`, b.`urutan`, b.`agenda`, a.`perkara_id`, m.tanggal_sidang AS tgl_sebelum, 
		n.tanggal_sidang AS tgl_sesudah, f.`tanggal_putusan`, g.`majelis_hakim_text`
		FROM perkara AS a
		LEFT JOIN perkara_jadwal_sidang AS b
		ON a.`perkara_id` = b.`perkara_id`
		LEFT JOIN perkara_pihak1 AS c
		ON a.`perkara_id` = c.`perkara_id`
		LEFT JOIN perkara_pihak2 AS d
		ON a.`perkara_id` = d.`perkara_id`
		LEFT JOIN perkara_hakim_pn AS e
		ON a.`perkara_id` = e.`perkara_id`
		LEFT JOIN
		(SELECT a.* FROM perkara_jadwal_sidang a LEFT JOIN 
		(SELECT *, urutan - 1 AS jml FROM perkara_jadwal_sidang WHERE tanggal_sidang = '$dari_tanggal' GROUP BY perkara_id) b 
		ON a.`perkara_id`=b.perkara_id WHERE a.urutan= b.jml) m
		ON b.perkara_id=m.perkara_id
		LEFT JOIN
		(SELECT a.* FROM perkara_jadwal_sidang a LEFT JOIN 
		(SELECT *, urutan + 1 AS jml FROM perkara_jadwal_sidang WHERE tanggal_sidang = '$dari_tanggal' GROUP BY perkara_id) b 
		ON a.`perkara_id`=b.perkara_id WHERE a.urutan= b.jml) n
		ON b.perkara_id=n.perkara_id
		LEFT JOIN perkara_putusan AS f
		ON a.`perkara_id`=f.`perkara_id`
		LEFT JOIN perkara_penetapan AS g
		ON a.`perkara_id` = g.`perkara_id`
		WHERE DATE(b.`tanggal_sidang`) = '$dari_tanggal'
		AND b.`ruangan` = '$ruang_sidang'
		AND e.`hakim_id` = '$majelis'
		GROUP BY a.`nomor_perkara` ORDER BY a.`perkara_id` ASC")->result_array();

		$this->load->view('Admin/v_print-jadwal', $data);
	}
	public function export_excel()
	{
		$data['user']  = $this->db->get_where('sys_users', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "Jadwal Sidang";
		$data['hakim'] = $this->M_pihak->get_data_hakim();
		$data['page']  = 'v_jadwal-sidang';


		if ((isset($_GET['dari_tanggal']) && $_GET['dari_tanggal'] != '') && (isset($_GET['ruang_sidang']) && $_GET['ruang_sidang'] != '') && (isset($_GET['majelis']) && $_GET['majelis'] != '')) {
			$dari_tanggal    = $_GET['dari_tanggal'];
			$ruang_sidang    = $_GET['ruang_sidang'];
			$majelis         = $_GET['majelis'];
		} else {
			$dari_tanggal   = date('Y-m-d');
			$ruang_sidang   = '1';
			$majelis        = '22';
		}

		$tanggal = tanggal_indonesia_lengkap($dari_tanggal);


		$hakim = $majelis;
		$list_hakim = $this->db->get_where('hakim_pn', array('id' => $hakim))->row_array();
		$hakim_nama = $list_hakim['nama_gelar'];

		// $list_majelis = $this->db->query("SELECT *, REPLACE(majelis_hakim_text, '</br>',' / ') AS majelis, REPLACE(panitera_pengganti_text, 'Panitera Pengganti: ', '') AS pp FROM perkara_penetapan AS a
		// LEFT JOIN perkara_jadwal_sidang AS b
		// ON a.`perkara_id` = b.`perkara_id`
		// WHERE majelis_hakim_id = $majelis
		// AND b.`tanggal_sidang` = '$dari_tanggal'
		// GROUP BY majelis_hakim_id")->row_array();
		$list_majelis = $this->db->query("SELECT a.`nomor_perkara`, b.`hakim_nama`, 
		b.`jabatan_hakim_nama`, b.`hakim_id`,
		c.`tanggal_sidang`, d.`panitera_nama`
		FROM perkara_hakim_pn AS b
		LEFT JOIN perkara AS a
		ON a.`perkara_id`=b.`perkara_id`
		LEFT JOIN perkara_jadwal_sidang AS c
		ON c.`perkara_id` = a.`perkara_id`
		LEFT JOIN perkara_panitera_pn AS d
		ON d.`perkara_id`=a.`perkara_id`
		WHERE hakim_id = '$majelis'
		AND tanggal_sidang = '$dari_tanggal'
		ORDER BY a.`perkara_id` DESC")->row_array();

		// $hakim_majelis = $list_majelis['majelis'];
		$panitera = $list_majelis['panitera_nama'];

		$jadwal_sidang = $this->db->query("SELECT a.`nomor_perkara`, b.`tanggal_sidang`, c.nama AS Penggugat, d.`nama` AS Tergugat, b.`alasan_ditunda`,
		e.`hakim_nama`, e.`hakim_id`, b.`urutan`, b.`agenda`, a.`perkara_id`, convert_tanggal_indonesia(m.tanggal_sidang) AS tgl_sebelum, 
		convert_tanggal_indonesia(n.tanggal_sidang) AS tgl_sesudah, f.`tanggal_putusan`, g.`majelis_hakim_text`, e.`hakim_nama`
		FROM perkara AS a
		LEFT JOIN perkara_jadwal_sidang AS b
		ON a.`perkara_id` = b.`perkara_id`
		LEFT JOIN perkara_pihak1 AS c
		ON a.`perkara_id` = c.`perkara_id`
		LEFT JOIN perkara_pihak2 AS d
		ON a.`perkara_id` = d.`perkara_id`
		LEFT JOIN perkara_hakim_pn AS e
		ON a.`perkara_id` = e.`perkara_id`
		LEFT JOIN
		(SELECT a.* FROM perkara_jadwal_sidang a LEFT JOIN 
		(SELECT *, urutan - 1 AS jml FROM perkara_jadwal_sidang WHERE tanggal_sidang = '$dari_tanggal' GROUP BY perkara_id) b 
		ON a.`perkara_id`=b.perkara_id WHERE a.urutan= b.jml) m
		ON b.perkara_id=m.perkara_id
		LEFT JOIN
		(SELECT a.* FROM perkara_jadwal_sidang a LEFT JOIN 
		(SELECT *, urutan + 1 AS jml FROM perkara_jadwal_sidang WHERE tanggal_sidang = '$dari_tanggal' GROUP BY perkara_id) b 
		ON a.`perkara_id`=b.perkara_id WHERE a.urutan= b.jml) n
		ON b.perkara_id=n.perkara_id
		LEFT JOIN perkara_putusan AS f
		ON a.`perkara_id`=f.`perkara_id`
		LEFT JOIN perkara_penetapan AS g
		ON a.`perkara_id` = g.`perkara_id`
		WHERE DATE(b.`tanggal_sidang`) = '$dari_tanggal'
		AND b.`ruangan` = '$ruang_sidang'
		AND e.`hakim_id` = '$majelis'
		GROUP BY a.`nomor_perkara` ORDER BY a.`perkara_id` ASC")->result_array();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = [
			'font' => ['bold' => true], // Set font nya jadi bold
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = [
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			],
			'borders' => [
				'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
				'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
				'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
				'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
			]
		];

		$style_baru = [
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			]
		];

		$sheet->setCellValue('A1', "JADWAL SIDANG PA BOJONEGORO"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$sheet->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
		$sheet->getStyle('A1')->applyFromArray($style_baru);

		$sheet->setCellValue('B3', "Hari, Tanggal :");
		$sheet->getStyle('B3')->getFont()->setBold(true);
		$sheet->setCellValue('B4', "Ruang :");
		$sheet->getStyle('B4')->getFont()->setBold(true);
		$sheet->setCellValue('D3', "Majelis Hakim :");
		$sheet->getStyle('D3')->getFont()->setBold(true);
		$sheet->setCellValue('D4', "Panitera Pengganti :");
		$sheet->getStyle('D4')->getFont()->setBold(true);

		$sheet->setCellValue('E3', $hakim_nama);
		$sheet->setCellValue('E4', $panitera);

		$sheet->setCellValue('C3', $tanggal);
		$sheet->getStyle('C3')->applyFromArray($style_baru);
		$sheet->setCellValue('C4', $ruang_sidang);
		$sheet->getStyle('C4')->applyFromArray($style_baru);


		// Buat header tabel nya pada baris ke 3
		$sheet->setCellValue('A6', "NO"); // Set kolom A6 dengan tulisan "NO"
		$sheet->setCellValue('B6', "NOMOR PERKARA"); // Set kolom B6 dengan tulisan "NIS"
		$sheet->setCellValue('C6', "PENGGUGAT/PEMOHON"); // Set kolom C6 dengan tulisan "NAMA"
		$sheet->setCellValue('D6', "TERGUGAT/TERMOHON"); // Set kolom D6 dengan tulisan "JENIS KELAMIN"
		$sheet->setCellValue('E6', "SIDANG KE"); // Set kolom E3 dengan tulisan "ALAMAT"
		$sheet->setCellValue('F6', "TGL SIDANG SEBELUMNYA");
		$sheet->setCellValue('G6', "TGL SIDANG SELANJUTNYA");
		$sheet->setCellValue('H6', "AGENDA");
		$sheet->setCellValue('I6', "ALASAN TUNDA");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$sheet->getStyle('A6')->applyFromArray($style_col);
		$sheet->getStyle('B6')->applyFromArray($style_col);
		$sheet->getStyle('C6')->applyFromArray($style_col);
		$sheet->getStyle('D6')->applyFromArray($style_col);
		$sheet->getStyle('E6')->applyFromArray($style_col);
		$sheet->getStyle('F6')->applyFromArray($style_col);
		$sheet->getStyle('G6')->applyFromArray($style_col);
		$sheet->getStyle('H6')->applyFromArray($style_col);
		$sheet->getStyle('I6')->applyFromArray($style_col);


		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		// $siswa = $jadwal_sidang;

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($jadwal_sidang as $data) { // Lakukan looping pada variabel siswa
			$sheet->setCellValue('A' . $numrow, $no);
			$sheet->setCellValue('B' . $numrow, $data['nomor_perkara']);
			$sheet->setCellValue('C' . $numrow, $data['Penggugat']);
			$sheet->setCellValue('D' . $numrow, $data['Tergugat']);
			$sheet->setCellValue('E' . $numrow, $data['urutan']);

			//Kolom F
			if ($data['urutan'] != 1) {
				$sheet->setCellValue('F' . $numrow, $data['tgl_sebelum']);
			} else {
				$sheet->setCellValue('F' . $numrow, 'Sidang Pertama');
			}

			//Kolom G
			if ($data['tanggal_putusan'] == null && $data['tgl_sesudah'] == null) {
				$sheet->setCellValue('G' . $numrow, 'Data Belum Diisi');
			} else if ($data['tanggal_putusan'] != null && $data['tgl_sesudah'] == null) {
				$sheet->setCellValue('G' . $numrow, 'Perkara Putus');
			} else {
				$sheet->setCellValue('G' . $numrow, $data['tgl_sesudah']);
			}

			$sheet->setCellValue('H' . $numrow, $data['agenda']);

			//Kolom I
			if ($data['tanggal_putusan'] == null && $data['tgl_sesudah'] == null) {
				$sheet->setCellValue('I' . $numrow, 'Data Belum Diisi');
			} else if ($data['tanggal_putusan'] != null && $data['tgl_sesudah'] == null) {
				$sheet->setCellValue('I' . $numrow, 'Perkara Putus');
			} else {
				$sheet->setCellValue('I' . $numrow, $data['alasan_ditunda']);
			}


			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
			$sheet->getStyle('I' . $numrow)->applyFromArray($style_row);


			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$sheet->getColumnDimension('A')->setWidth(4);
		$sheet->getColumnDimension('B')->setWidth(21);
		$sheet->getColumnDimension('C')->setWidth(35);
		$sheet->getColumnDimension('D')->setWidth(35);
		$sheet->getColumnDimension('E')->setWidth(25);
		$sheet->getColumnDimension('F')->setWidth(25);
		$sheet->getColumnDimension('G')->setWidth(25);
		$sheet->getColumnDimension('H')->setWidth(30);
		$sheet->getColumnDimension('I')->setWidth(30);

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$sheet->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$sheet->setTitle("Laporan Jadwal Sidang");

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Jadwal Sidang.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}
}
