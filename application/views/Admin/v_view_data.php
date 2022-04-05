 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Detail Data Umum--</h5>
                         <?php foreach ($data_umum as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <?php if ($user['username'] === 'admin') : ?>
                                 <a href="<?php echo base_url('admin/admin') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             <?php else : ?>
                                 <a href="<?php echo base_url('user/data_umum') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                             <?php endif; ?>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <table class="table table-bordered">
                                     <tbody>
                                         <tr>
                                             <th scope="col" width="30%">Jenis Pihak</th>
                                             <th>:</th>
                                             <?php if ($hasil['jenis_pihak_id'] === '1') : ?>
                                                 <td>Perorangan</td>
                                             <?php elseif ($hasil['jenis_pihak_id'] === '2') : ?>
                                                 <td>Pemerintahan</td>
                                             <?php elseif ($hasil['jenis_pihak_id'] === '3') : ?>
                                                 <td>Badan Hukum</td>
                                             <?php endif; ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Jenis Kelamin</th>
                                             <th>:</th>
                                             <?php if ($hasil['jenis_kelamin'] === 'L') : ?>
                                                 <td> Laki-Laki </td>
                                             <?php elseif ($hasil['jenis_kelamin'] === 'P') : ?>
                                                 <td>Perempuan</td>
                                             <?php endif; ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nama</th>
                                             <th>:</th>
                                             <td><?= $hasil['nama']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tempat Lahir</th>
                                             <th>:</th>
                                             <td><?= $hasil['tempat_lahir']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal Lahir</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tanggal_lahir']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Jenis Indentitas</th>
                                             <th>:</th>
                                             <?php foreach ($id as $ids) : ?>
                                                 <?php if ($hasil['jenis_indentitas'] === $ids['id']) : ?>
                                                     <td><?= $ids['nama']; ?></td>
                                                 <?php elseif ($hasil['jenis_indentitas'] === '') : ?>

                                                 <?php endif; ?>
                                             <?php endforeach ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nomor Indentitas</th>
                                             <th>:</th>
                                             <td><?= $hasil['nomor_indentitas']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pekerjaan</th>
                                             <th>:</th>
                                             <td><?= $hasil['pekerjaan']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pendidikan</th>
                                             <th>:</th>
                                             <?php foreach ($pendidikan as $p) : ?>
                                                 <?php if ($hasil['pendidikan_id'] === $p['id']) : ?>
                                                     <td><?= $p['kode']; ?></td>
                                                 <?php elseif ($hasil['pendidikan_id'] === '') : ?>

                                                 <?php endif; ?>
                                             <?php endforeach ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Agama</th>
                                             <th>:</th>
                                             <?php foreach ($agama as $a) : ?>
                                                 <?php if ($hasil['agama_id'] === $a['id']) : ?>
                                                     <td><?= $a['nama']; ?></td>
                                                 <?php elseif ($hasil['agama_id'] === '') : ?>

                                                 <?php endif; ?>
                                             <?php endforeach ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Status Kawin</th>
                                             <th>:</th>
                                             <?php if ($hasil['status_kawin'] === '1') : ?>
                                                 <td>Kawin</td>
                                             <?php elseif ($hasil['status_kawin'] === '2') : ?>
                                                 <td>Belum Kawin</td>
                                             <?php elseif ($hasil['status_kawin'] === '3') : ?>
                                                 <td>Duda</td>
                                             <?php elseif ($hasil['status_kawin'] === '4') : ?>
                                                 <td>Janda</td>
                                             <?php endif; ?>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-sm-6">
                                 <table class="table table-bordered">
                                     <tbody>
                                         <tr>
                                             <th scope="col" width="30%">Difabel</th>
                                             <th>:</th>
                                             <?php if ($hasil['difabel'] === 'Y') : ?>
                                                 <td>Ya</td>
                                             <?php elseif ($hasil['difabel'] === 'T') : ?>
                                                 <td>Tidak</td>
                                             <?php endif; ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Golongan Darah</th>
                                             <th>:</th>
                                             <td><?= $hasil['golongan_darah']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Warga Negara</th>
                                             <th>:</th>
                                             <?php foreach ($negara as $ngr) : ?>
                                                 <?php if ($hasil['warga_negara_id'] === $ngr['id']) : ?>
                                                     <td><?= $ngr['nama']; ?></td>
                                                 <?php elseif ($hasil['warga_negara_id'] === '') : ?>

                                                 <?php endif; ?>
                                             <?php endforeach ?>
                                         </tr>
                                         <tr>
                                             <th scope="col">Telepon</th>
                                             <th>:</th>
                                             <td><?= $hasil['telepon']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Faks</th>
                                             <th>:</th>
                                             <td><?= $hasil['fax']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">E-Mail</th>
                                             <th>:</th>
                                             <td><?= $hasil['email']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Keterangan</th>
                                             <th>:</th>
                                             <td><?= $hasil['keterangan']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Diinput Oleh</th>
                                             <th>:</th>
                                             <td><?= $hasil['diinput_oleh']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Diinput Tanggal</th>
                                             <th>:</th>
                                             <td><?= $hasil['diinput_tanggal']; ?></td>
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