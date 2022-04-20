 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Detail Data Permohonan LC--</h5>
                         <?php foreach ($data_lc as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <a href="<?php echo base_url('langitcerah/data_lc') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col">Nomor Langit Cerah</th>
                                             <th>:</th>
                                             <td><?= $hasil['nomor_lc']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tgl Permohonan / Tgl Kirim AC</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_permohonan']); ?> / <?= tanggal_indonesia($hasil['tgl_kirim_ac']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nama P</th>
                                             <th>:</th>
                                             <td><?= $hasil['nama_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Umur P</th>
                                             <th>:</th>
                                             <td><?= $hasil['umur_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Agama P</th>
                                             <th>:</th>
                                             <td><?= $hasil['agama_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pekerjaan P</th>
                                             <th>:</th>
                                             <td><?= $hasil['pekerjaan_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pendidikan P</th>
                                             <th>:</th>
                                             <td><?= $hasil['pendidikan_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat P</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Telepon P</th>
                                             <th>:</th>
                                             <td><?= $hasil['telepon_p']; ?></td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-sm-6">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col">Nomor Perkara</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_perkara']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal AC</th>
                                             <th>:</th>
                                             <td><?= $hasil['tgl_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nama T</th>
                                             <th>:</th>
                                             <td><?= $hasil['nama_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Umur T</th>
                                             <th>:</th>
                                             <td><?= $hasil['umur_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Agama T</th>
                                             <th>:</th>
                                             <td><?= $hasil['agama_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pekerjaan T</th>
                                             <th>:</th>
                                             <td><?= $hasil['pekerjaan_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pendidikan T</th>
                                             <th>:</th>
                                             <td><?= $hasil['pendidikan_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat T</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Telepon T</th>
                                             <th>:</th>
                                             <td><?= $hasil['telepon_t']; ?></td>
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