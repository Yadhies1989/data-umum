<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- batas atas -->
                <div class="card">
                    <form id="form-siswa" method="POST" action="<?php echo base_url('duplikat/tambah_data/') ?>" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5 class="card-title m-0">--Form Tambah Data Permohonan Duplikat Akta Cerai--</h5>
                            <div class="card-tools">
                                <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                <a href="<?php echo base_url('duplikat/data_dup') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="no_lc">Register Duplikat</label>
                                                    <input type="text" name="reg_dup" class="form-control form-control-sm" value="<?= $kode_duplikat; ?>" readonly>
                                                </div>
                                                <!-- <div class="form-group row">
                                                    <div class="row col-6">
                                                        <label for="reg_dup" class="col-sm-5 col-form-label">Register Duplikat</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="reg_dup" placeholder="Nomor" >
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" name="dup" value="Dup" readonly>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" name="ac" value="AC" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row col-6">
                                                        <div class="col-sm-6">
                                                            <select name="reg_dup_tahun" class="form-control">
                                                                <?php $tahun = date('Y');
                                                                for ($i = 2021; $i < $tahun + 3; $i++) {
                                                                ?>
                                                                    <option value="<?php echo $i ?>" <?php if ($i == $tahun) {
                                                                                                        echo "selected";
                                                                                                    } ?> <?php ?>><?php echo $i ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">PA.</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Kode PA" name="kode_pa" value="Bjn" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="form-group col-md-12">
                                                    <label for="tgl_dup">Tanggal Permohonan</label>
                                                    <input type="date" name="tgl_dup" class="form-control form-control-sm" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nama_pemohon">Nama Pemohon</label>
                                                    <input type="text" name="nama_pemohon" class="form-control form-control-sm" placeholder="Nama Pemohon" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="umur_pemohon">Umur Pemohon</label>
                                                    <input type="number" name="umur_pemohon" class="form-control form-control-sm" placeholder="Umur Pemohon" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="kerja_pemohon">Pekerjaan Pemohon</label>
                                                    <input type="text" name="kerja_pemohon" class="form-control form-control-sm" placeholder="Pekerjaan Pemohon" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="kota">Alamat Pemohon</label>
                                                    <select name="kota" class="form-control" onchange="showDiv('col-kecamatan','col-desa','col-dalam', 'col-luar', this)" required>
                                                        <option value=''>--Pilih Alamat--</option>
                                                        <option value='Bojonegoro'>Bojonegoro</option>
                                                        <option value='Luar Kota'>Luar Kota</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" id="col-kecamatan">
                                                    <label for="kecamatan">Kecamatan</label>
                                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" id="col-desa">
                                                    <label for="desa">Desa</label>
                                                    <select id="desa" name="desa" class="form-control">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6" id="col-dalam">
                                                    <label for="dalam_kota">Detail Alamat</label>
                                                    <textarea name="dalam_kota" class="form-control form-control-sm" placeholder="Masukkan Nama Jalan dan Nomor Rumah dengan jelas"></textarea>
                                                </div>
                                                <div class="form-group col-md-6" id="col-luar">
                                                    <label for="luar_kota">Detail Alamat Luar Kota</label>
                                                    <textarea name="luar_kota" class="form-control form-control-sm" placeholder="Masukkan Nama Jalan dan Nomor Rumah, Kelurahan, Kecamatan dan Provinsi dengan jelas"></textarea>
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                                <script type="text/javascript">
                                                    function showDiv(divKec, divDesa, divDalam, divLuar, element) {
                                                        document.getElementById(divKec).style.display = element.value == 'Bojonegoro' ? 'block' : 'none';
                                                        document.getElementById(divDesa).style.display = element.value == 'Bojonegoro' ? 'block' : 'none';
                                                        document.getElementById(divDalam).style.display = element.value == 'Bojonegoro' ? 'block' : 'none';
                                                        document.getElementById(divLuar).style.display = element.value == 'Luar Kota' ? 'block' : 'none';
                                                    }
                                                    function showDivKondisi(divKondisi, element) {
                                                        document.getElementById(divKondisi).style.display = element.value == 'Lainnya' ? 'block' : 'none';
                                                    }
                                                    function showDivAlamat(divAlamat, element) {
                                                        document.getElementById(divAlamat).style.display = element.value == 'Lainnya' ? 'block' : 'none';
                                                    }
                                                    $(document).ready(function() {
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: '<?php echo base_url('duplikat/get_kecamatan') ?>',
                                                            cache: false,
                                                            success: function(msg) {
                                                                $("#kecamatan").html(msg);
                                                            }
                                                        });
                                                        $("#kecamatan").change(function(data) {
                                                            var kecamatan = $("#kecamatan").val();
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '<?php echo base_url('duplikat/get_desa') ?>',
                                                                data: {
                                                                    kecamatan: kecamatan
                                                                },
                                                                cache: false,
                                                                success: function(msg) {
                                                                    $("#desa").html(msg);
                                                                }
                                                            });
                                                        });
                                                    });
                                                </script>
                                                <div class="form-group col-md-12">
                                                <hr/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_ac">No Akta Cerai</label>
                                                    <input type="text" name="no_ac" class="form-control form-control-sm" placeholder="Nomor Akta Cerai" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_terbit_ac">Tanggal Akta Cerai</label>
                                                    <input type="date" name="tgl_terbit_ac" class="form-control form-control-sm" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="jenis_ac">Jenis Akta Cerai</label>
                                                    <select name="jenis_ac" class="form-control" required>
                                                        <option value=''>--Pilih Jenis--</option>
                                                        <option value='Talak'>Talak</option>
                                                        <option value='Gugat'>Gugat</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_perkara">Nomor Perkara</label>
                                                    <input type="text" class="form-control form-control-sm" name="no_perkara" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="pemohon_perkara">Nama Penggugat / Pemohon</label>
                                                    <input type="text" class="form-control form-control-sm" name="pemohon_perkara" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="termohon_perkara">Nama Tergugat / Termohon</label>
                                                    <input type="text" class="form-control form-control-sm" name="termohon_perkara" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_putus_perkara">Tanggal Putusan</label>
                                                    <input type="date" class="form-control form-control-sm" name="tgl_putus_perkara" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                            <div class="form-group row">
                                            <div class="form-group col-md-6">
                                                    <label for="kondisi_ac">Kondisi Akta Cerai</label>
                                                    <select name="kondisi_ac" class="form-control" required onchange="showDivKondisi('col-kondisi', this)">
                                                        <option value=''>--Pilih Kondisi--</option>
                                                        <option value='Hilang'>Hilang</option>
                                                        <option value='Rusak'>Rusak</option>
                                                        <option value='Lainnya'>Lainnya</option>
                                                    </select>
                                                    <input id="col-kondisi" type="text" name="kondisi_lain" class="form-control form-control-sm" placeholder="Sebutkan">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alasan_kondisi">Alasan</label>
                                                    <textarea name="alasan_kondisi" class="form-control form-control-sm" placeholder="Alasan" required></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alamat_kondisi">Alamat Kejadian</label>
                                                    <select name="alamat_kondisi" class="form-control" required onchange="showDivAlamat('col-alamat', this)">
                                                        <option value=''>--Pilih Alamat--</option>
                                                        <option value='Sama'>Sama Dengan Alamat Pemohon Register</option>
                                                        <option value='Lainnya'>Lainnya</option>
                                                    </select>
                                                    <textarea id="col-alamat" name="alamat_lain" class="form-control form-control-sm" placeholder="Masukkan Nama Jalan dan Nomor Rumah, Kelurahan, Kecamatan dan Provinsi dengan jelas"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="surat_polisi">Surat Laporan Kehilangan Dari</label>
                                                    <input type="text" class="form-control form-control-sm" name="surat_polisi" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_polisi">Nomor Surat</label>
                                                    <input type="text" class="form-control form-control-sm" name="no_polisi" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_polisi">Tanggal Surat</label>
                                                    <input type="date" class="form-control form-control-sm" name="tgl_polisi" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="belum_kua">Surat Keterangan Belum Menikah Lagi Dari</label>
                                                    <input type="text" class="form-control form-control-sm" name="belum_kua" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="no_belum_kua">Nomor Surat</label>
                                                    <input type="text" class="form-control form-control-sm" name="no_belum_kua" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tgl_belum_kua">Tanggal Surat</label>
                                                    <input type="date" class="form-control form-control-sm" name="tgl_belum_kua" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="kua">Mengetahui KUA</label>
                                                    <input type="text" class="form-control form-control-sm" name="kua" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="alasan_dup">Alasan Permohonan Duplikat</label>
                                                    <textarea name="alasan_dup" class="form-control form-control-sm" placeholder="Alasan Permohonan Duplikat" required></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- batas bawah -->
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
<!-- /.content -->