 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Detail Data Permohonan AC Tabayun--</h5>
                         <?php foreach ($data_pac as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <a href="<?php echo base_url('permohonanac/data_pac') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Tanggal</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pengadilan Agama Tujuan</th>
                                             <th>:</th>
                                             <td><?= $hasil['pa_asal']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">No Perkara</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_pkr']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">No HP CP</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_hp']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tgl Wesel</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_wesel']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">No Wesel</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_wesel']; ?></td>
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