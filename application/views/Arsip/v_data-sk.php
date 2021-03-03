  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><?php echo $title ?></h4><!-- <h1>Blank Page</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- <?php echo validation_errors(); ?> -->
   <!--  <?php echo $this->session->flashdata('pesan') ?> -->
    <!-- Main content -->
    <section class="content">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"> </div>
      <div class="nama-menu" data-namamenu="<?php echo $this->session->flashdata('nama_menu')  ?>"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#addMenu"><i class="fas fa-plus-square"></i> Tambah Data SK</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- batas atas -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example1">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nomor SK</th>
                              <th scope="col">Judul SK</th>
                              <th scope="col">Bagian</th>
                              <th scope="col">Tanggal SK</th>
                              <th scope="col">File SK</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                             $no =1;
                             foreach ($sk as $hasil) :        
                            ?>
                              <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $hasil ['nomor_sk'] ; ?></td>
                                <td><?php echo $hasil ['judul_sk'] ; ?></td>
                                <td><?php echo $hasil ['bagian'] ; ?></td>
                                <td><?php echo $hasil ['tgl_sk'] ; ?></td>
                                <td><?php echo $hasil ['file_sk'] ; ?></td>
                                
                                <td width="150px">
                                  <a  data-toggle="modal" data-target="#update-data<?=$hasil['id_sk'];?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                  <a  data-toggle="modal" data-target="#hapus-data<?=$hasil['id_sk'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                            
                          </tbody>
                    </table>
                  </div>
                <!-- batas bawah --> 
              </div>
            </div>
          </div>
        </div>
      </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</body>
</html>
<!-- Modal Tambah Data-->
<div class="modal fade bd-example-modal-lg" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5><i class="fas fa-plus-square"></i> Tambah Menu</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('menu/tambah_data') ?>" enctype="multipart/form-data">
          <div class="form-group row">
              <label for="nama_pegawai" class="col-form-label" >Nama Pegawai</label>
              <div class="col-sm-8">
                <input type="text" name="nama_pegawai" placeholder="Masukan Nama Pegawai" class="form-control" id="nama_pegawai" value="<?php echo $this->session->userdata('nama_ppnpn');?>">
              </div> 
              <!-- <label for="nip" class="col-sm-2 col-form-label col-form-label-sm" >N I P</label>
              <div class="col-sm-4">
                <input type="text" name="nip" placeholder="Masukan NIP Pegawai" class="form-control form-control-sm" id="nip" value="<?php echo $this->session->userdata('nip');?>">
              </div>   --> 
          </div>
      </div>
      <div class="modal-footer justify-content-between">
         <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-save"></i></button>
         <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
     </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Tambah Data -->

