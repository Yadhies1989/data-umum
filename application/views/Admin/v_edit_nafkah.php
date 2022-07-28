 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">

                 <!-- batas atas -->
                 <div class="card">
                     <form id="form-siswa" method="POST" action="<?php echo base_url('nafkah/update_data/') ?>" enctype="multipart/form-data">
                         <div class="card-header">
                             <h5 class="card-title m-0">--Form Edit Data Perceraian dengan Nafkah--</h5>
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
                                                     <label for="no_perkara">Nomor Perkara</label>
                                                     <input type="text" name="no_perkaraname" class="form-control form-control-sm" value="<?= $hasil['no_perkara']; ?>" readonly>
                                                 </div>
                                                 <div class="form-group col-md-6">
                                                     <label for="ket">Keterangan</label>
                                                     <textarea name="ket" class="form-control form-control-sm" value="<?= $hasil['ket']; ?>" required><?= $hasil['ket'];?></textarea>
                                                     <input type="hidden" name="id_nafkah" class="form-control form-control-sm" value="<?= $hasil['id_nafkah']; ?>" required>
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