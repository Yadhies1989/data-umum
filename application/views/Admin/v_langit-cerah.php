 <!-- Main content -->
 <div class="content">
     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"> </div>
     <div class="nama-menu" data-namamenu="<?php echo $this->session->flashdata('nama_menu')  ?>"></div>

     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="row">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title"> Tabel Pemohon Langit Cerah</h3>
                                 <div class="d-flex justify-content-end">
                                     <a href="<?php echo base_url('langitcerah/data_lc/add') ?>" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i> Tambah Data</a>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <table class="table table-bordered table-sm" id="example1">
                                     <thead>
                                         <tr>
                                             <th scope="col">No</th>
                                             <th scope="col">No Reg</th>
                                             <th scope="col">No Perkara</th>
                                             <th scope="col">No AC</th>
                                             <th scope="col">Tgl Daftar</th>
                                             <th scope="col">Tgl Kirim</th>
                                             <th scope="col">Nama P</th>
                                             <th scope="col">Input Resi</th>
                                             <th scope="col">Unduhan</th>
                                             <th scope="col">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $no = 1;
                                            foreach ($data_lc as $hasil) :
                                            ?>
                                             <tr>
                                                 <td width="20px"><?php echo $no++ ?></td>
                                                 <td><?php echo $hasil['nomor_lc']; ?></td>
                                                 <td><?php echo $hasil['no_perkara']; ?></td>
                                                 <td><?php echo $hasil['nomor_ac']; ?></td>
                                                 <td><?php echo tanggal_indonesia($hasil['tgl_permohonan']); ?></td>
                                                 <td><?php echo tanggal_indonesia($hasil['tgl_kirim_ac']); ?></td>
                                                 <td><?php echo $hasil['nama_p']; ?></td>
                                                 <td><?php echo $hasil['input_resi']; ?></td>
                                                 <td width="150px">
                                                     <a href="<?php echo base_url('langitcerah/print_rtf/' . $hasil['id_datalc']) ?>" class="btn btn-danger btn-sm" title="Print Permohonan LC"><i class="fas fa-print"></i></a>
                                                     <a data-toggle="modal" data-target="#update-data<?= $hasil['id_datalc']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-download"></i></a>
                                                     <a data-toggle="modal" data-target="#kwitansi-data<?= $hasil['id_datalc']; ?>" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>
                                                 </td>
                                                 <td width="150px">
                                                     <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id_datalc']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                     <a href="<?php echo base_url('langitcerah/data_lc/edit/' . $hasil['id_datalc']) ?>" class="btn btn-success btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                     <a href="<?php echo base_url('langitcerah/data_lc/view/' . $hasil['id_datalc']) ?>" class="btn btn-primary btn-sm" title="View Data"><i class="fas fa-eye"></i></a>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>

                         <!-- /.card -->
                     </div>
                     <!-- /.col -->
                 </div>
                 <!-- batas bawah -->
             </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->
 <?php foreach ($data_lc as $hasil) : ?>
     <div class="modal fade" id="hapus-data<?= $hasil['id_datalc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-danger">
                     <h6><i class="fas fa-trash"></i> Hapus Data Pihak</h6>
                 </div>
                 <form class="form-horizontal" action="<?php echo site_url('langitcerah/hapus_data/' . $hasil['id_datalc']); ?>" method="post" enctype="multipart/form-data" role="form">
                     <div class="modal-body">
                         <p>Apakah Anda Ingin Menghapus Data <strong><?= $hasil['nomor_lc']; ?></strong> ?</p>
                     </div>
                     <div class="modal-footer justify-content-between">
                         <button class="btn btn-danger btn-lg" type="submit"><i class="fas fa-trash"></i></button>
                         <button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach;  ?>
 <!-- Modal Update-->
 <?php foreach ($data_lc as $hasil) : ?>
     <div class="modal fade" id="update-data<?= $hasil['id_datalc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-body">
                     <div class="d-flex justify-content-center">
                         <embed type="application/pdf" src="<?php echo base_url('uploads/') . $hasil['file_upload']; ?>" width="450" height="400"></embed>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 <?php endforeach;  ?>
 <!-- Modal -->
 <!-- Modal Update-->
 <?php foreach ($data_lc as $hasil) : ?>
     <div class="modal fade" id="kwitansi-data<?= $hasil['id_datalc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-body">
                     <div class="d-flex justify-content-center">
                         <embed type="application/pdf" src="<?php echo base_url('uploads/') . $hasil['file_kwitansi']; ?>" width="450" height="400"></embed>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 <?php endforeach;  ?>
 <!-- Modal -->