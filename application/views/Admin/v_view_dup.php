 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title m-0">--Detail Data Permohonan Duplikat Akta Cerai--</h5>
                         <?php foreach ($data_dup as $hasil) : ?>

                         <?php endforeach;  ?>
                         <div class="card-tools">
                             <a href="<?php echo base_url('duplikat/data_dup') ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true"><i class="fas fa-backward"></i> Kembali</a>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Nomor Register Duplikat</th>
                                             <th>:</th>
                                             <td><?= $hasil['reg_dup']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal Permintaan Duplikat</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia_lengkap($hasil['tgl_dup']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nama Pemohon Duplikat</th>
                                             <th>:</th>
                                             <td><?= $hasil['nama_pemohon']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Umur Pemohon Duplikat</th>
                                             <th>:</th>
                                             <td><?= $hasil['umur_pemohon']; ?> tahun</td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pekerjaan Pemohon Duplikat</th>
                                             <th>:</th>
                                             <td><?= $hasil['kerja_pemohon']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat Pemohon Duplikat</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat_pemohon']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nomor Akta Cerai</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal Terbit Akta Cerai</th>
                                             <th>:</th>
                                             <td><?= $hasil['tgl_terbit_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Jenis Akta Cerai</th>
                                             <th>:</th>
                                             <td><?= $hasil['jenis_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nomor Perkara</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_perkara']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal Putusan</th>
                                             <th>:</th>
                                             <td><?= $hasil['tgl_putus_perkara']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Pemohon</th>
                                             <th>:</th>
                                             <td><?= $hasil['pemohon_perkara']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Termohon</th>
                                             <th>:</th>
                                             <td><?= $hasil['termohon_perkara']; ?></td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                             <div class="col-sm-6">
                                 <table class="table table-bordered table-sm">
                                     <tbody>
                                         <tr>
                                             <th scope="col" style="width: 30%;">Kondisi Akta Cerai</th>
                                             <th>:</th>
                                             <td><?= $hasil['kondisi_ac']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alasan terjadinya</th>
                                             <th>:</th>
                                             <td><?= $hasil['alasan_kondisi']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alamat terjadinya</th>
                                             <th>:</th>
                                             <td><?= $hasil['alamat_kondisi']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Surat Laporan Kehilangan Dari</th>
                                             <th>:</th>
                                             <td><?= $hasil['surat_polisi']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nomor Surat Laporan Kehilangan</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_polisi']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal Surat Laporan Kehilangan</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_polisi']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Surat Keterangan Belum Menikah Lagi Dari</th>
                                             <th>:</th>
                                             <td><?= $hasil['belum_kua']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Nomor Surat Keterangan Belum Menikah Lagi Dari</th>
                                             <th>:</th>
                                             <td><?= $hasil['no_belum_kua']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Tanggal Surat Keterangan Belum Menikah Lagi Dari</th>
                                             <th>:</th>
                                             <td><?= tanggal_indonesia($hasil['tgl_belum_kua']); ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Mengetahui KUA</th>
                                             <th>:</th>
                                             <td><?= $hasil['kua']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Alasan Permohonan Duplikat</th>
                                             <th>:</th>
                                             <td><?= $hasil['alasan_dup']; ?></td>
                                         </tr>
                                         <tr>
                                             <th scope="col">Created At</th>
                                             <th>:</th>
                                             <td><?= $hasil['created_at']; ?></td>
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