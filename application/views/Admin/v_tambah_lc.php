 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('langitcerah/tambah_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Tambah Data Permohonan Layanan Langit Cerah--</h5>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                 <a href="<?php echo base_url('langitcerah/data_lc') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <label for="no_lc">No Reg Langit Cerah</label>
                                                     <input type="text" name="nomor_lc" class="form-control form-control-sm" value="<?= $kode; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_daftar">Tgl Daftar</label>
                                                     <input type="date" name="tgl_daftar" class="form-control form-control-sm" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="nomor_ac">No Akta Cerai</label>
                                                     <input type="text" name="nomor_ac" class="form-control form-control-sm" placeholder="Nomor Akta Cerai">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_ac">Tanggal Akta Cerai</label>
                                                     <input type="date" name="tgl_ac" class="form-control form-control-sm" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_kirim_ac">Tanggal Kirim Akta Cerai</label>
                                                     <input type="date" name="tgl_kirim_ac" class="form-control form-control-sm" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="no_perkara">Nomor Perkara</label>
                                                     <select name="no_perkaraname" id="no_perkaraid" class="form-control select2" onchange="show_dataperkara(this.value); show_dataperkara2(this.value);" required>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="input_resi">Input Resi</label>
                                                     <input type="text" name="input_resi" class="form-control form-control-sm" placeholder="Input No Resi">
                                                 </div>
                                                 <!-- <div class="form-group col-md-6">
                                                     <label for="file_upload">File Upload</label>
                                                     <div class="custom-file">
                                                         <input type="file" name="file_upload" class="custom-file-input form-control-sm" id="file_upload">
                                                         <label class="custom-file-label col-form-label-sm" for="image">File Upload</label>
                                                     </div>
                                                 </div> -->
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="nama_p">Nama Penggugat / Pemohon</label>
                                                     <input type="text" id="nama_p" class="form-control form-control-sm" name="nama_p" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="nama_t">Nama Tergugat / Termohon</label>
                                                     <input type="text" id="nama_t" class="form-control form-control-sm" name="nama_t" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="umur_p">Umur Penggugat / Pemohon </label>
                                                     <input type="text" id="umur_p" class="form-control form-control-sm" name="umur_p" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="umur_t">Umur Tergugat / Termohon</label>
                                                     <input type="text" id="umur_t" class="form-control form-control-sm" name="umur_t" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="agama_p">Agama Penggugat / Pemohon</label>
                                                     <input type="text" id="agama_p" class="form-control form-control-sm" name="agama_p" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="agama_t">Agama Tergugat / Termohon</label>
                                                     <input type="text" id="agama_t" class="form-control form-control-sm" name="agama_t" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="pekerjaan_p">Pekerjaan Penggugat / Pemohon</label>
                                                     <input type="text" id="pekerjaan_p" class="form-control form-control-sm" name="pekerjaan_p" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="pekerjaan_t">Pekerjaan Tergugat / Termohon</label>
                                                     <input type="text" id="pekerjaan_t" class="form-control form-control-sm" name="pekerjaan_t" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="pendidikan_p">Pendidikan Penggugat / Pemohon</label>
                                                     <input type="text" id="pendidikan_p" class="form-control form-control-sm" name="pendidikan_p" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="pendidikan_t">Pendidikan Tergugat / Termohon</label>
                                                     <input type="text" id="pendidikan_t" class="form-control form-control-sm" name="pendidikan_t" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="alamat_p">Alamat Penggugat / Pemohon</label>
                                                     <textarea class="form-control form-control-sm" rows="4" readonly id="alamat_p" name="alamat_p"></textarea>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="alamat_t">Alamat Tergugat / Termohon</label>
                                                     <textarea class="form-control form-control-sm" rows="4" readonly id="alamat_t" name="alamat_t"></textarea>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="telpon_p">No HP Penggugat / Pemohon</label>
                                                     <input type="text" id="telpon_p" class="form-control form-control-sm" name="telepon_p">
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="telpon_t">No HP Tergugat / Termohon</label>
                                                     <input type="text" id="telpon_t" class="form-control form-control-sm" name="telepon_t">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
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