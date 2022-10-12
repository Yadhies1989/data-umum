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
                                 <h3 class="card-title"> Tabel AC ber-QR</h3>
                                 <div class="d-flex justify-content-end">
                                     <a href="<?php echo base_url('qrac/data_qrac/add') ?>" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i> Buat QR baru</a>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <table class="table table-bordered table-sm" id="example1">
                                     <thead>
                                         <tr>
                                             <th scope="col">No</th>
                                             <th scope="col">Nomor Seri</th>
                                             <th scope="col">Nomor Perkara</th>
                                             <th scope="col">Nomor AC</th>
                                             <th scope="col">Tanggal Putusan</th>
                                             <th scope="col">Pemohon/Penggugat</th>
                                             <th scope="col">Termohon/Tergugat</th>
                                             <th scope="col">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $no = 1;
                                            foreach ($data_qrac as $hasil) :
                                            ?>
                                            <?php
                                                if($hasil['kode'] != NULL){
                                                    $file_name = str_replace('/','_',$hasil['nomor_perkara']);
                                                    $file_name = str_replace('.','',$file_name);

                                                    $params['data'] = 'https://datacenter.pa-bojonegoro.go.id:8089/keaslian/akta/asli/'.$hasil['kode'];
                                                    $params['level'] = 'H';
                                                    $params['size'] = 10;
                                                    $params['savename'] = FCPATH.$file_name.'.png';
                                                    $this->ciqrcode->generate($params);
                                                } 
                                                ?>
                                             <tr>
                                                 <td width="20px"><?php echo $no++ ?></td>
                                                 <td><?php echo $hasil['nomor_seri']; ?></td>
                                                 <td><?php echo $hasil['nomor_perkara']; ?></td>
                                                 <td><?php echo $hasil['nomor_ac']; ?></td>
                                                 <td><?php echo tanggal_indonesia($hasil['tgl_putus']); ?></td>
                                                 <td><?php echo $hasil['pihak1']; ?></td>
                                                 <td><?php echo $hasil['pihak2']; ?></td>
                                                 <td width="150px">
                                                     <?php if ($hasil['kode'] != NULL) {?>
                                                     <a href="<?php echo base_url().$file_name.'.png' ?>" class="btn btn-danger btn-sm" title="Print QR" download="<?php echo $file_name; ?>"><i class="fas fa-print"></i></a>
                                                    <?php }?>
                                                 </td>
                                                 <td width="150px">
                                                     <a data-toggle="modal" data-target="#hapus-data<?= $hasil['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                     <!-- <a href="<?php echo base_url('qrac/data_qrac/edit/' . $hasil['id']) ?>" class="btn btn-success btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                     <a href="<?php echo base_url('qrac/data_qrac/view/' . $hasil['id']) ?>" class="btn btn-primary btn-sm" title="View Data"><i class="fas fa-eye"></i></a> -->
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
 <?php foreach ($data_qrac as $hasil) : ?>
     <div class="modal fade" id="hapus-data<?= $hasil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-danger">
                     <h6><i class="fas fa-trash"></i> Hapus Data</h6>
                 </div>
                 <form class="form-horizontal" action="<?php echo site_url('qrac/hapus_data/' . $hasil['id']); ?>" method="post" enctype="multipart/form-data" role="form">
                     <div class="modal-body">
                         <p>Apakah Anda Ingin Menghapus Data <strong><?= $hasil['nomor_perkara']; ?></strong> ?</p>
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
