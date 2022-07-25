 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Detail Data Pengiriman AC--</h5>
                         <?php foreach ($data_kac as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <a href="<?php echo base_url('pengirimanac/data_kac') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Tanggal Kirim</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_kirim']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">No Surat</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_surat']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">No AC</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tgl Resi</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_resi']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">No Resi</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_resi']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Created at</th>
                                             <th>:</th>
                                             <td><?= $hasil['created']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Updated at</th>
                                             <th>:</th>
                                             <td><?= $hasil['updated']; ?></td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- batas bawah -->
             </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->