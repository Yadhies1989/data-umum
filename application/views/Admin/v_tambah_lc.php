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
                             <a href="<?php echo base_url('langitcerah/data_lc') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <form method="POST" action="<?php echo base_url('user/tambah_data/') ?>" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-sm-12">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                 <div class="form-group col-md-12">
                                                     <label for="nomor_perkara">Nomor Perkara<span class="text-danger">*</span></label>
                                                     <input type="text" class="form-control" name="kode" id="auto_perkara">
                                                 </div>
                                             </div>
                                             <div class="form-row">
                                                 <div class="form-group col-md-12">
                                                     <label for="nomor_perkara">Nama penggugat<span class="text-danger">*</span></label>
                                                     <input type="text" class="form-control" name="nama_p" id="nama_p">
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
 </div>
 <!-- /.content -->