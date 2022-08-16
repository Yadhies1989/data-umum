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
                                 <h3 class="card-title"> Tabel Permohonan AC Tabayun</h3>
                                 <div class="d-flex justify-content-end">
                                     <a href="<?php echo base_url('permohonanac/data_pac/add') ?>" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i> Tambah Data</a>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <table class="table table-bordered table-sm" id="example1">
                                     <thead>
                                         <tr>
                                             <th scope="col">No</th>
                                             <th scope="col">Tanggal</th>
                                             <th scope="col">No Surat</th>
                                             <th scope="col">PA Tujuan</th>
                                             <th scope="col">No Perkara</th>
                                             <th scope="col">No HP CP</th>
                                             <th scope="col">Tgl Wesel</th>
                                             <th scope="col">No Wesel</th>
                                             <th scope="col">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $no = 1;
                                            foreach ($data_pac as $hasil) :
                                            ?>
                                             <tr>
                                                 <td width="20px"><?php echo $no++ ?></td>
                                                 <td><?php echo tanggal_indonesia($hasil['tgl']); ?></td>
                                                 <td><?php echo $hasil['no_surat']; ?></td>
                                                 <td><?php echo $hasil['pa_asal']; ?></td>
                                                 <td><?php echo $hasil['no_pkr']; ?></td>
                                                 <td><?php echo $hasil['no_hp']; ?></td>
                                                 <td><?php echo tanggal_indonesia($hasil['tgl_wesel']); ?></td>
                                                 <td><?php echo $hasil['no_wesel']; ?></td>
                                                 <td width="150px">
                                                     <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id_pac']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                     <a href="<?php echo base_url('permohonanac/data_pac/view/' . $hasil['id_pac']) ?>" class="btn btn-primary btn-sm" title="View Data"><i class="fas fa-eye"></i></a>
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
 <!-- Modal Delete -->
 <?php foreach ($data_pac as $hasil) : ?>
     <div class="modal fade" id="hapus-data<?= $hasil['id_pac']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-danger">
                     <h6><i class="fas fa-trash"></i> Hapus Data Pihak</h6>
                 </div>
                 <form class="form-horizontal" action="<?php echo site_url('permohonanac/hapus_data/' . $hasil['id_pac']); ?>" method="post" enctype="multipart/form-data" role="form">
                     <div class="modal-body">
                         <p>Apakah Anda Ingin Menghapus Data <strong><?= $hasil['no_surat']; ?></strong> ?</p>
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
 <!-- Modal Delete End -->
 