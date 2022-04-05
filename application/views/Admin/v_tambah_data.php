 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Form Tambah Data--</h5>
                         <div class="card-tools">
                             <a href="<?php echo base_url('user/data_umum') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <form method="POST" action="<?php echo base_url('user/tambah_data/') ?>" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-sm-4">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <label for="jenis_pihak_id">Jenis Pihak<span class="text-danger">*</span></label>
                                                     <select class="form-control" name="jenis_pihak_id" required>
                                                         <option>--PILIH--</option>
                                                         <option value="3">Badan Hukum</option>
                                                         <option value="2">Pemerintah</option>
                                                         <option value="1" selected>Perorangan</option>
                                                     </select>
                                                     <input type="hidden" name="id" value="<?= $query_id['id_baru']; ?>">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                                     <select class="form-control" name="jenis_kelamin">
                                                         <option value="">--PILIH--</option>
                                                         <option value="L">Laki-Laki</option>
                                                         <option value="P">Perempuan</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="nama">Nama<span class="text-danger">*</span></label>
                                                     <input type="text" class="form-control" name="nama" placeholder="Nama Pihak ..." required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="nama_ayah">Bin/Binti</label>
                                                     <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                                     <input type="text" class="form-control" name="tempat_lahir" placeholder="Kota ..." required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                                     <input type="date" class="form-control" name="tanggal_lahir" id="tgl_lahir" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="pihak_umur">Umur<span class="text-danger">*</span></label>
                                                     <input type="text" class="form-control" name="pihak_umur" id="umur" placeholder="Umur" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="jenis_indentitas">Jenis ID</label>
                                                     <select name="jenis_indentitas" class="form-control">
                                                         <option value="">--Pilih--</option>
                                                         <?php foreach ($id as $ids) : ?>
                                                             <?php $selected = ($ids['nama'] == 'KTP') ? "selected" : "" ?>
                                                             <option <?= $selected; ?> value="<?php echo $ids['id']; ?>"><?php echo $ids['nama']; ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="nomor_indentitas">No. ID</label>
                                                     <input type="number" class="form-control" name="nomor_indentitas" placeholder="No Identitas ...">
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="inputAddress">Pekerjaan<span class="text-danger">*</span></label>
                                                     <select name="pekerjaan" class="form-control" id="pekerjaan" required>
                                                         <option value="">--Pilih--</option>
                                                         <option value="Pegawai BUMN/BUMD">Pegawai BUMN/BUMD</option>
                                                         <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                                         <option value="POLRI">POLRI</option>
                                                         <option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
                                                         <option value="Lain-Lain">Lain-Lain</option>
                                                     </select>
                                                     <input type="text" class="form-control mt-3" name="pekerjaan_lainnya" id="pekerjaan_lainnya" placeholder="Isikan Pekerjaan Lainnya">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="inputEmail4">Pendidikan<span class="text-danger">*</span></label>
                                                     <select name="pendidikan_id" class="form-control" required>
                                                         <option value="">--Pilih--</option>
                                                         <?php foreach ($pendidikan as $m) : ?>
                                                             <option value="<?php echo $m['id']; ?>"><?php echo $m['kode']; ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="agama_id">Agama<span class="text-danger">*</span></label>
                                                     <select name="agama_id" class="form-control" required>
                                                         <option value="">--Pilih--</option>
                                                         <?php foreach ($agama as $a) : ?>
                                                             <?php $selected = ($a['nama'] == 'Islam') ? "selected" : "" ?>
                                                             <option <?= $selected; ?> value="<?php echo $a['id']; ?>"><?php echo $a['nama']; ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-4">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="row">
                                                 <div class="form-group col-md-6">
                                                     <label for="status_kawin">Status Kawin<span class="text-danger">*</span></label>
                                                     <select class="form-control" name="status_kawin" required>
                                                         <option value="">--PILIH--</option>
                                                         <option value="1" selected>Kawin</option>
                                                         <option value="2">Belum Kawin</option>
                                                         <option value="3">Duda</option>
                                                         <option value="4">Janda</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="inputPassword4">Difabel</label>
                                                     <select class="form-control" name="difabel" required>
                                                         <option value="">--PILIH--</option>
                                                         <option value="Y">Ya</option>
                                                         <option value="T" selected>Tidak</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="alamat">Alamat</label>
                                                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="alamat" placeholder="Contoh: Dusun Prayungan / Jalan Ahmad Yani No. 12"></textarea>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="inputEmail4">RT</label>
                                                     <input type="text" class="form-control" placeholder="Contoh: 001" name="rt">
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="inputPassword4">RW</label>
                                                     <input type="text" class="form-control" placeholder="Contoh: 006" name="rw">
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="alamat">Kelurahan | Kecamatan | Kabupaten | Provinsi<span class="text-danger">*</span></label>
                                                     <textarea class="form-control" id="auto_kelurahan" rows="3" name="kelurahan" placeholder="Ketik Nama Desa ..." required></textarea>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="inputAddress">Golongan Darah</label>
                                                     <select class="form-control" name="golongan_darah">
                                                         <option value="">--PILIH--</option>
                                                         <option value="A">A</option>
                                                         <option value="AB">AB</option>
                                                         <option value="B">B</option>
                                                         <option value="O">O</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="inputAddress">Warga Negara<span class="text-danger">*</span></label>
                                                     <select name="warga_negara_id" class="form-control" required>
                                                         <option value="">--Pilih--</option>
                                                         <?php foreach ($negara as $ngr) : ?>
                                                             <?php $selected = ($ngr['nama'] == 'Indonesia') ? "selected" : "" ?>
                                                             <option <?= $selected; ?> value="<?php echo $ngr['id']; ?>"><?php echo $ngr['nama']; ?></option>
                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-sm-4">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="row">
                                                 <div class="form-group col-md-12">
                                                     <label for="telepon">Telpon</label>
                                                     <input type="number" class="form-control" name="telpon" placeholder="Telepon / HP ...">
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="fax">Fax</label>
                                                     <input type="number" class="form-control" placeholder="Fax ..." name="fax">
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="email">Email</label>
                                                     <input type="email" class="form-control" name="email" placeholder="Alamat E-Mail ...">
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="alamat">Keterangan</label>
                                                     <textarea class="form-control" id="keterangan" rows="2" name="keterangan" placeholder="Keterangan ..."></textarea>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="diinput_oleh">Diinput Oleh</label>
                                                     <input type="text" class="form-control" value="<?= $user['username']; ?>" name="diinput_oleh" readonly>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <label for="diinput_tanggal">Diinput Tanggal</label>
                                                     <input type="text" class="form-control" value="<?= $date; ?>" name="diinput_tanggal" readonly>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="card-footer d-flex justify-content-end">
                                             <button type="submit" class="btn btn-primary btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
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
 </div>
 <!-- /.content -->