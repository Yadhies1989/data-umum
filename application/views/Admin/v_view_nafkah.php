 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Detail Laporan Perceraian dengan Nafkah--</h5>
                         <?php foreach ($data_nafkah as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <a href="<?php echo base_url('nafkah/data_nafkah') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-12">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Nomor Perkara</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_perkara']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Pihak P</th>
                                             <th>:</th>
                                             <td><?= $hasil['pihak_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Pihak T</th>
                                             <th>:</th>
                                             <td><?= $hasil['pihak_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tgl Daftar</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_daftar']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tgl Putus</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_putus']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Amar Putusan</th>
                                             <th>:</th>
                                             <td><?= $hasil['amar']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Keterangan</th>
                                             <th>:</th>
                                             <td><?= $hasil['ket']; ?></td>
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