 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('pengirimanac/tambah_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Tambah Data Pengiriman AC--</h5>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                 <a href="<?php echo base_url('pengirimanac/data_kac') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_kirim">Tgl Kirim</label>
                                                     <input type="date" name="tgl_kirim" class="form-control form-control-sm" required>
                                                 </div> 
                                                 <div class="form-group col-md-6">
                                                     <label for="no_surat">Nomor Surat</label>
                                                     <input type="text" name="no_surat" class="form-control form-control-sm" placeholder="Nomor Surat" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="no_ac">No AC</label>
                                                     <input type="text" name="no_ac" class="form-control form-control-sm" placeholder="Nomor AC" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="tgl_resi">Tgl Resi</label>
                                                     <input type="date" name="tgl_resi" class="form-control form-control-sm" required>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="no_resi">No Resi</label>
                                                     <input type="text" name="no_resi" class="form-control form-control-sm" placeholder="Nomor Resi" required>
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