 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Form Update Data--</h5>
                         <?php foreach ($data_umum as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <?php if ($user['username'] === 'admin') : ?>
                                 <a href="<?php echo base_url('admin/admin') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             <?php else : ?>
                                 <a href="<?php echo base_url('user/data_umum') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             <?php endif; ?>
                         </div>
                     </div>
                     <div class="card-body">
                         <?php if ($user['username'] === 'admin') : ?>
                             <form method="POST" action="<?php echo base_url('admin/update_data/') ?>" enctype="multipart/form-data">
                             <?php else : ?>
                                 <form method="POST" action="<?php echo base_url('user/update_data/') ?>" enctype="multipart/form-data">
                                 <?php endif; ?>
                                 <div class="row">
                                     <div class="col-sm-4">
                                         <div class="card">
                                             <div class="card-body">
                                                 <div class="form-row">
                                                     <div class="form-group col-md-6">
                                                         <label for="jenis_pihak_id">Jenis Pihak<span class="text-danger">*</span></label>
                                                         <select class="form-control" name="jenis_pihak_id" required>
                                                             <option>--PILIH--</option>
                                                             <option <?php if ($hasil['jenis_pihak_id'] == 1) {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['jenis_pihak_id']; ?> value="1">
                                                                 Perorangan
                                                             </option>
                                                             <option <?php if ($hasil['jenis_pihak_id'] == 2) {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['jenis_pihak_id']; ?> value="2">
                                                                 Pemerintah
                                                             </option>
                                                             <option <?php if ($hasil['jenis_pihak_id'] == 3) {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['jenis_pihak_id']; ?> value="3">
                                                                 Badan Hukum
                                                             </option>
                                                         </select>
                                                         <input type="hidden" name="id" value="<?= $hasil['id']; ?>">
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <label for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                                         <select class="form-control" name="jenis_kelamin" required>
                                                             <option <?php if ($hasil['jenis_kelamin'] == 'L') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['jenis_kelamin']; ?> value="L">
                                                                 Laki-Laki
                                                             </option>
                                                             <option <?php if ($hasil['jenis_kelamin'] == 'P') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['jenis_kelamin']; ?> value="P">
                                                                 Perempuan
                                                             </option>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="nama">Nama<span class="text-danger">*</span></label>
                                                         <input type="text" class="form-control" name="nama" value="<?= $hasil['nama']; ?>" required>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                                         <input type="text" class="form-control" name="tempat_lahir" value="<?= $hasil['tempat_lahir']; ?>" required>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                                         <input type="date" class="form-control" name="tanggal_lahir" id="tgl_lahir" value="<?= $hasil['tanggal_lahir']; ?>" required>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="jenis_indentitas">Jenis ID</label>
                                                         <select name="jenis_indentitas" class="form-control">
                                                             <option value="">--Pilih--</option>
                                                             <?php foreach ($id as $ids) : ?>
                                                                 <?php $selected = ($ids['id'] == $hasil['jenis_indentitas']) ? "selected" : "" ?>
                                                                 <option <?= $selected; ?> value="<?php echo $ids['id']; ?>"><?php echo $ids['nama']; ?></option>
                                                             <?php endforeach ?>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="nomor_indentitas">No. ID</label>
                                                         <input type="number" class="form-control" name="nomor_indentitas" value="<?php echo $hasil['nomor_indentitas']; ?>">
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="pekerjaan">Pekerjaan<span class="text-danger">*</span></label>
                                                         <?php if (($hasil['pekerjaan'] === 'Pegawai BUMN/BUMD') || ($hasil['pekerjaan'] === 'Pegawai Negeri Sipil') || ($hasil['pekerjaan'] === 'POLRI') || ($hasil['pekerjaan'] === 'Tentara Nasional Indonesia')) : ?>
                                                             <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                                                                 <option <?php if ($hasil['pekerjaan'] == 'Pegawai BUMN/BUMD') {
                                                                                echo "selected='selected'";
                                                                            }
                                                                            echo $hasil['pekerjaan']; ?> value="Pegawai BUMN/BUMD">
                                                                     Pegawai BUMN/BUMD
                                                                 </option>
                                                                 <option <?php if ($hasil['pekerjaan'] == 'Pegawai Negeri Sipil') {
                                                                                echo "selected='selected'";
                                                                            }
                                                                            echo $hasil['pekerjaan']; ?> value="Pegawai Negeri Sipil">
                                                                     Pegawai Negeri Sipil
                                                                 </option>
                                                                 <option <?php if ($hasil['pekerjaan'] == 'POLRI') {
                                                                                echo "selected='selected'";
                                                                            }
                                                                            echo $hasil['pekerjaan']; ?> value="POLRI">
                                                                     POLRI
                                                                 </option>
                                                                 <option <?php if ($hasil['pekerjaan'] == 'Tentara Nasional Indonesia') {
                                                                                echo "selected='selected'";
                                                                            }
                                                                            echo $hasil['pekerjaan']; ?> value="Tentara Nasional Indonesia">
                                                                     Tentara Nasional Indonesia
                                                                 </option>
                                                                 <option <?php if ($hasil['pekerjaan'] == 'Lain-Lain') {
                                                                                echo "selected='selected'";
                                                                            }
                                                                            echo $hasil['pekerjaan']; ?> value="Lain-Lain">
                                                                     Lain-Lain
                                                                 </option>
                                                             </select>
                                                         <?php else : ?>
                                                             <input type="text" class="form-control" name="pekerjaan" value="<?php echo $hasil['pekerjaan']; ?>">
                                                         <?php endif; ?>
                                                         <input type="text" class="form-control mt-3" name="pekerjaan_lainnya" id="pekerjaan_lainnya">
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
                                                         <label for="inputEmail4">Pendidikan<span class="text-danger">*</span></label>
                                                         <select name="pendidikan_id" class="form-control" required>
                                                             <option value="">--Pilih--</option>
                                                             <?php foreach ($pendidikan as $m) : ?>
                                                                 <?php $selected = ($m['id'] == $hasil['pendidikan_id']) ? "selected" : "" ?>
                                                                 <option <?= $selected; ?> value="<?php echo $m['id']; ?>"><?php echo $m['kode']; ?></option>
                                                             <?php endforeach ?>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <label for="agama_id">Agama<span class="text-danger">*</span></label>
                                                         <select name="agama_id" class="form-control" required>
                                                             <option value="">--Pilih--</option>
                                                             <?php foreach ($agama as $a) : ?>
                                                                 <?php $selected = ($a['id'] == $hasil['agama_id']) ? "selected" : "" ?>
                                                                 <option <?= $selected; ?> value="<?php echo $a['id']; ?>"><?php echo $a['nama']; ?></option>
                                                             <?php endforeach ?>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <label for="status_kawin">Status Kawin<span class="text-danger">*</span></label>
                                                         <select class="form-control" name="status_kawin" required>
                                                             <option <?php if ($hasil['status_kawin'] == '1') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['status_kawin']; ?> value="1">
                                                                 Kawin
                                                             </option>
                                                             <option <?php if ($hasil['status_kawin'] == '2') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['status_kawin']; ?> value="2">
                                                                 Belum Kawin
                                                             </option>
                                                             <option <?php if ($hasil['status_kawin'] == '3') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['status_kawin']; ?> value="3">
                                                                 Duda
                                                             </option>
                                                             <option <?php if ($hasil['status_kawin'] == '4') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['status_kawin']; ?> value="4">
                                                                 Janda
                                                             </option>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <label for="inputPassword4">Difabel</label>
                                                         <select class="form-control" name="difabel" required>
                                                             <option <?php if ($hasil['difabel'] == 'Y') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['difabel']; ?> value="Y">
                                                                 Ya
                                                             </option>
                                                             <option <?php if ($hasil['difabel'] == 'T') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['difabel']; ?> value="T">
                                                                 Tidak
                                                             </option>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="alamat" required><?= $hasil['alamat']; ?></textarea>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="inputAddress">Golongan Darah</label>
                                                         <select class="form-control" name="golongan_darah">
                                                             <option <?php if ($hasil['golongan_darah'] == '') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['golongan_darah']; ?> value="">
                                                                 --PILIH--
                                                             </option>
                                                             <option <?php if ($hasil['golongan_darah'] == 'A') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['golongan_darah']; ?> value="A">
                                                                 A
                                                             </option>
                                                             <option <?php if ($hasil['golongan_darah'] == 'AB') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['golongan_darah']; ?> value="AB">
                                                                 AB
                                                             </option>
                                                             <option <?php if ($hasil['golongan_darah'] == 'B') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['golongan_darah']; ?> value="B">
                                                                 B
                                                             </option>
                                                             <option <?php if ($hasil['golongan_darah'] == 'O') {
                                                                            echo "selected='selected'";
                                                                        }
                                                                        echo $hasil['golongan_darah']; ?> value="O">
                                                                 O
                                                             </option>
                                                         </select>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="inputAddress">Warga Negara Id (98=Indonesia)<span class="text-danger">*</span></label>
                                                         <select name="warga_negara_id" class="form-control" required>
                                                             <option value="">--Pilih--</option>
                                                             <?php foreach ($negara as $ngr) : ?>
                                                                 <?php $selected = ($ngr['id'] == $hasil['warga_negara_id']) ? "selected" : "" ?>
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
                                                         <input type="number" class="form-control" name="telpon" value="<?= $hasil['telepon']; ?>">
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="fax">Fax</label>
                                                         <input type="number" class="form-control" value="<?= $hasil['fax']; ?>" name="fax">
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="email">Email</label>
                                                         <input type="email" class="form-control" name="email" value="<?= $hasil['email']; ?>">
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="alamat">Keterangan</label>
                                                         <textarea class="form-control" id="keterangan" rows="2" name="keterangan" placeholder="Keterangan"><?= $hasil['keterangan']; ?></textarea>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="diinput_oleh">Diinput Oleh</label>
                                                         <input type="text" class="form-control" value="<?= $hasil['diinput_oleh']; ?>" name="diinput_oleh" readonly>
                                                     </div>
                                                     <div class="form-group col-md-12">
                                                         <label for="diinput_tanggal">Diinput Tanggal</label>
                                                         <input type="text" class="form-control" value="<?= $hasil['diinput_tanggal']; ?>" name="diinput_tanggal" readonly>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="card-footer">
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