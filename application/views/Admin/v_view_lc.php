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
                                             <th scope="col">Tgl Daftar</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_kirim_ac']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tgl Kirim AC</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_kirim_ac']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nomor Resi</th>
                                             <th>:</th>
                                             <td><?= $hasil['input_resi']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nama Penggugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['nama_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Umur Penggugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['umur_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Agama Penggugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['agama_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pekerjaan Penggugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['pekerjaan_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pendidikan Penggugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['pendidikan_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat Penggugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat_p']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Telepon Penggugat</th>
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
                                             <th scope="col">Nomor AC</th>
                                             <th>:</th>
                                             <td><?= $hasil['nomor_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal AC</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_ac']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">File Upload</th>
                                             <th>:</th>
                                             <td>
                                                 <a href="<?php echo base_url() . 'uploads/' . $hasil['file_upload']; ?>" target="_blank">
                                                     <?= $hasil['file_upload']; ?>
                                                 </a>
                                             </td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nama Tergugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['nama_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Umur Tergugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['umur_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Agama Tergugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['agama_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pekerjaan Tergugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['pekerjaan_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pendidikan Tergugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['pendidikan_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat Tergugat</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat_t']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Telepon Tergugat</th>
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