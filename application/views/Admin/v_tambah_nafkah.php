 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('nafkah/tambah_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Tambah Laporan Perceraian dan Nafkah--</h5>
                             <div class="card-tools">
                                 <button type="submit" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fas fa-save"></i> Simpan</button>
                                 <a href="<?php echo base_url('nafkah/data_nafkah') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             </div>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-6">
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-row">
                                                <div class="form-group col-md-6">
                                                     <label for="no_perkara">Nomor Perkara</label>
                                                     <select name="no_perkaraname" id="no_perkaraid" class="form-control select2" onchange="show_dataperkara_nafkah(this.value);" required>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="ket">Keterangan</label>
                                                     <textarea name="ket" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
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
                                                     <label for="amar">Amar Putusan</label>
                                                     <div id="amar"></div>
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