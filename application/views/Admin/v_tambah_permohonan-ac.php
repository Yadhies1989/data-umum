 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('permohonanac/tambah_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Tambah Data Permohonan AC Tabayun--</h5>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                 <a href="<?php echo base_url('permohonanac/data_pac') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <label for="nomor_surat">No Surat</label>
                                                     <input type="text" name="nomor_surat" class="form-control form-control-sm" placeholder="Nomor Surat" required>
                                                 </div> 
                                                 <div class="form-group col-md-6">
                                                     <label for="pa_asal">Pengadilan Agama Asal</label>
                                                     <input type="text" name="pa_asal" class="form-control form-control-sm" placeholder="Pengadilan Agama Asal" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="no_pkr">No Perkara</label>
                                                     <input type="text" name="no_pkr" class="form-control form-control-sm" placeholder="Nomor Perkara" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="telepon_cp">No HP CP</label>
                                                     <input type="text" id="telepon_cp" class="form-control form-control-sm" name="telepon_cp" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_wesel">Tgl Wesel</label>
                                                     <input type="date" name="tgl_wesel" class="form-control form-control-sm" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="no_wesel">No Wesel</label>
                                                     <input type="text" name="no_wesel" class="form-control form-control-sm" placeholder="Nomor Wesel" required>
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