 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas file upload-->
                 <div class="card">
                     <form id="form-file" method="POST" action="<?php echo base_url('langitcerah/update_file_upload/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Upload File--</h5>
                             <?php foreach ($data_lc as $hasil) : ?>

                             <?php endforeach;  ?>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                 <a href="<?php echo base_url('langitcerah/data_lc') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <strong> File : </strong>
                                                     <?php if ($hasil['file_upload'] === '') : ?>
                                                         Tidak Ada File
                                                     <?php else : ?>
                                                         <a href="<?php echo base_url() . 'uploads/' . $hasil['file_upload']; ?>" target="_blank">
                                                             Lihat File
                                                         </a>
                                                     <?php endif; ?>
                                                     <br>
                                                     <label for="image">File Upload</label>
                                                     <div class="custom-file">
                                                         <input type="file" name="image" id="image" onchange="hideformkwitansi(this.value);">
                                                         <input type="hidden" name="id_datalc" value="<?= $hasil['id_datalc']; ?>">
                                                         <input type="hidden" name="nomor_lc" value="<?= $hasil['nomor_lc']; ?>">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
                 <!-- batas bawah file upload -->
                 <!-- batas atas file kwitansi-->
                 <!-- <div class="card"> -->
                     <!-- <form id="form-kwitansi" method="POST" action="<?php echo base_url('langitcerah/update_file_kwitansi/') ?>" enctype="multipart/form-data"> -->
                         <!-- <div class="card-header">
                             <h5 class="card-title m-0">--Form Upload Kwitansi--</h5>
                             <?php foreach ($data_lc as $hasil) : ?>

                             <?php endforeach;  ?>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                 <a href="<?php echo base_url('langitcerah/data_lc') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a> -->
                             </div>
                         </div>
                         <!-- <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <strong> File : </strong>
                                                     <?php if ($hasil['file_kwitansi'] === '') : ?>
                                                         Tidak Ada File
                                                     <?php else : ?>
                                                         <a href="<?php echo base_url() . 'uploads/' . $hasil['file_kwitansi']; ?>" target="_blank">
                                                             Lihat File
                                                         </a>
                                                     <?php endif; ?>
                                                     <br>
                                                     <label for="image_kw">File Kwitansi</label>
                                                     <div class="custom-file">
                                                         <input type="file" name="image_kw" id="image_kw" onchange="hideformfile(this.value);">
                                                         <input type="hidden" name="id_datalc" value="<?= $hasil['id_datalc']; ?>">
                                                         <input type="hidden" name="nomor_lc" value="<?= $hasil['nomor_lc']; ?>">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div> -->
                     <!-- </form> -->
                 <!-- </div> -->
                 <!-- batas bawah file kwitansi -->
                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('langitcerah/update_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Edit Data Permohonan Layanan Langit Cerah--</h5>
                             <?php foreach ($data_lc as $hasil) : ?>

                             <?php endforeach;  ?>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>

                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <label for="no_lc">Nomor Langit Cerah</label>
                                                     <input type="text" name="nomor_lc" class="form-control form-control-sm" value="<?= $hasil['nomor_lc']; ?>" readonly>
                                                     <input type="hidden" name="id_datalc" value="<?= $hasil['id_datalc']; ?>">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_permohonan">Tgl Daftar</label>
                                                     <input type="date" name="tgl_permohonan" class="form-control form-control-sm" value="<?= $hasil['tgl_permohonan']; ?>" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="nomor_ac">No Akta Cerai</label>
                                                     <input type="text" name="nomor_ac" class="form-control form-control-sm" value="<?= $hasil['nomor_ac']; ?>" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_ac">Tanggal Akta Cerai</label>
                                                     <input type="date" name="tgl_ac" class="form-control form-control-sm" value="<?= $hasil['tgl_ac']; ?>" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_kirim_ac">Tanggal Kirim Akta Cerai</label>
                                                     <input type="date" name="tgl_kirim_ac" class="form-control form-control-sm" value="<?= $hasil['tgl_kirim_ac']; ?>" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="no_perkara">Nomor Perkara</label>
                                                     <input type="text" name="no_perkaraname" class="form-control form-control-sm" value="<?= $hasil['no_perkara']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="input_resi">Input Resi</label>
                                                     <input type="text" name="input_resi" class="form-control form-control-sm" value="<?= $hasil['input_resi']; ?>" required>
                                                 </div>
                                                 <div class="form-group col-md-6">

                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="nama_p">Nama Penggugat / Pemohon</label>
                                                     <input type="text" id="nama_p" class="form-control form-control-sm" name="nama_p" value="<?= $hasil['nama_p']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="nama_t">Nama Tergugat / Termohon</label>
                                                     <input type="text" id="nama_t" class="form-control form-control-sm" name="nama_t" value="<?= $hasil['nama_t']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="umur_p">Umur Penggugat / Pemohon </label>
                                                     <input type="text" id="umur_p" class="form-control form-control-sm" name="umur_p" value="<?= $hasil['umur_p']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="umur_t">Umur Tergugat / Termohon</label>
                                                     <input type="text" id="umur_t" class="form-control form-control-sm" name="umur_t" value="<?= $hasil['umur_t']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="agama_p">Agama Penggugat / Pemohon</label>
                                                     <input type="text" id="agama_p" class="form-control form-control-sm" name="agama_p" value="<?= $hasil['agama_p']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="agama_t">Agama Tergugat / Termohon</label>
                                                     <input type="text" id="agama_t" class="form-control form-control-sm" name="agama_t" value="<?= $hasil['agama_t']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="pekerjaan_p">Pekerjaan Penggugat / Pemohon</label>
                                                     <input type="text" id="pekerjaan_p" class="form-control form-control-sm" name="pekerjaan_p" value="<?= $hasil['pekerjaan_p']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="pekerjaan_t">Pekerjaan Tergugat / Termohon</label>
                                                     <input type="text" id="pekerjaan_t" class="form-control form-control-sm" name="pekerjaan_t" value="<?= $hasil['pekerjaan_t']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="pendidikan_p">Pendidikan Penggugat / Pemohon</label>
                                                     <input type="text" id="pendidikan_p" class="form-control form-control-sm" name="pendidikan_p" value="<?= $hasil['pendidikan_p']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="pendidikan_t">Pendidikan Tergugat / Termohon</label>
                                                     <input type="text" id="pendidikan_t" class="form-control form-control-sm" name="pendidikan_t" value="<?= $hasil['pendidikan_t']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="alamat_p">Alamat Penggugat / Pemohon</label>
                                                     <textarea class="form-control form-control-sm" rows="4" readonly id="alamat_p" name="alamat_p"><?= $hasil['alamat_p']; ?></textarea>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="alamat_t">Alamat Tergugat / Termohon</label>
                                                     <textarea class="form-control form-control-sm" rows="4" readonly id="alamat_t" name="alamat_t"><?= $hasil['alamat_t']; ?></textarea>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="telpon_p">No HP Penggugat / Pemohon</label>
                                                     <input type="text" id="telpon_p" class="form-control form-control-sm" name="telepon_p" value="<?= $hasil['telepon_p']; ?>">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="telpon_t">No HP Tergugat / Termohon</label>
                                                     <input type="text" id="telpon_t" class="form-control form-control-sm" name="telepon_t" value="<?= $hasil['telepon_t']; ?>">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
                 <!-- batas bawah -->
             </div>
         </div>
     </div>
     <!-- /.row -->
 </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->