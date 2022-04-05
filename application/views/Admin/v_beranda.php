 <!-- Main content -->
 <div class="content">
     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"> </div>
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title">--Data Umum--</h5>
                         <?php if ($user['username'] === 'admin') : ?>
                         <?php else : ?>
                             <div class="d-flex justify-content-end">
                                 <a href="<?php echo base_url('user/data_umum/add') ?>" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i> Tambah Data</a>
                             </div>
                         <?php endif; ?>
                     </div>
                     <div class="card-body">
                         <table class="table table-bordered" id="example1">
                             <thead>
                                 <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">ID</th>
                                     <th scope="col">Nama</th>
                                     <th scope="col" width="20%">TTL</th>
                                     <th scope="col">Pekerjaan</th>
                                     <th scope="col">Alamat</th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    foreach ($data_umum as $hasil) :
                                    ?>
                                     <tr>
                                         <td width="20px"><?php echo $no++ ?></td>
                                         <td><?php echo $hasil['id']; ?></td>
                                         <td><?php echo $hasil['nama']; ?></td>
                                         <td>
                                             <?php echo $hasil['tempat_lahir']; ?>,
                                             <?php echo tanggal_indonesia($hasil['tanggal_lahir']); ?>
                                         </td>
                                         <td><?php echo $hasil['pekerjaan']; ?></td>
                                         <td><?php echo $hasil['alamat']; ?></td>
                                         <td width="150px">
                                             <?php if ($user['username'] === 'admin') : ?>
                                                 <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                 <a href="<?php echo base_url('admin/admin/edit/' . $hasil['id']) ?>" class="btn btn-success btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                 <a href="<?php echo base_url('admin/admin/view/' . $hasil['id']) ?>" class="btn btn-primary btn-sm" title="View Data"><i class="fas fa-eye"></i></a>
                                             <?php else : ?>
                                                 <a href="<?php echo base_url('user/data_umum/view/' . $hasil['id']) ?>" class="btn btn-primary btn-sm" title="View Data"><i class="fas fa-eye"></i></a>
                                                 <a href="<?php echo base_url('user/data_umum/edit/' . $hasil['id']) ?>" class="btn btn-success btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                             <?php endif; ?>
                                         </td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <!-- batas bawah -->
             </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->
 <?php foreach ($data_umum as $hasil) : ?>
     <div class="modal fade" id="hapus-data<?= $hasil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-danger">
                     <h5><i class="fas fa-trash"></i> Hapus Data Pihak</h5>
                 </div>
                 <form class="form-horizontal" action="<?php echo site_url('user/hapus_data/' . $hasil['id']); ?>" method="post" enctype="multipart/form-data" role="form">
                     <div class="modal-body">
                         <p>Apakah Anda Ingin Menghapus Data <strong><?= $hasil['nama']; ?></strong> ?</p>
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