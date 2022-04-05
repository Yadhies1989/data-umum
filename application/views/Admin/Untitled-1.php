$prov = $this->input->post('prov');
$prov_nama = $db2->get_where('wilayah_provinsi', array('id' => $prov))->row_array();
$provinsi = $prov_nama['nama'];