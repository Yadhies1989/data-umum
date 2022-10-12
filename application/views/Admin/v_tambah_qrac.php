 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('qrac/tambah_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Ambil QR Akta Cerai--</h5>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Lanjut</button>
                                 <a href="<?php echo base_url('qrac/data_qrac') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="row col-6">
                                                     <label for="no_perkara" class="col-sm-5 col-form-label">No Perkara</label>
                                                     <div class="col-sm-4">
                                                         <input type="text" class="form-control" name="no_perkara" placeholder="Nomor" required onchange="show_dataperkara_qr(this.value);">
                                                     </div>
                                                     <div class="col-sm-3">
                                                         <select name="jenis_perkara" class="form-control" readonly>
                                                             <option value="">--PILIH--</option>
                                                             <option value="G" selected>G</option>
                                                             <option value="P">P</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                                 <div class="row col-6">
                                                     <label for="no_perkara"></label>
                                                     <div class="col-sm-6">
                                                         <select name="tahun" class="form-control" readonly>
                                                             <?php $tahun = date('Y');
                                                                for ($i = 2021; $i < $tahun + 1; $i++) {
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
                                             </div>

                                         </div>

                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="no_seri_akta_cerai">No Seri Akta Cerai</label>
                                                     <input type="text" id="no_seri_akta_cerai" class="form-control form-control-sm" name="no_seri_akta_cerai" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="nomor_perkara">Nomor Perkara</label>
                                                     <input type="text" id="nomor_perkara" class="form-control form-control-sm" name="nomor_perkara" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="nomor_akta_cerai">Nomor Akta Cerai</label>
                                                     <input type="text" id="nomor_akta_cerai" class="form-control form-control-sm" name="nomor_akta_cerai" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="tanggal_putusan">Tanggal Putusan</label>
                                                     <input type="text" id="tanggal_putusan" class="form-control form-control-sm" name="tanggal_putusan" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="pihak1_text">Penggugat/Pemohon</label>
                                                     <input type="text" id="pihak1_text" class="form-control form-control-sm" name="pihak1_text" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6 data-perkara">
                                                     <label for="pihak2_text">Tergugat/Termohon</label>
                                                     <input type="text" id="pihak2_text" class="form-control form-control-sm" name="pihak2_text" readonly>
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