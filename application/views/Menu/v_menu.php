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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">Tambah Menu</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- batas atas -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example1">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Menu</th>
                              <th scope="col">Icon</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                             $no =1;
                             foreach ($menu as $hasil) :        
                            ?>
                              <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $hasil ['menu'] ; ?></td>
                                <td><?php echo $hasil ['icon'] ; ?></td>
                                <td width="150px">
                                  <a  data-toggle="modal" data-target="#update-data<?=$hasil['id'];?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                  <a  data-toggle="modal" data-target="#hapus-data<?=$hasil['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5><i class="fas fa-plus-square"></i> Tambah Menu</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('menu/tambah_data') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama" class="col-form-label">MENU:</label>
            <input type="text" class="form-control" name="menu" placeholder="Masukan Menu Baru">  
          </div>
          <div class="form-group">
            <label for="nama" class="col-form-label">ICON:</label>
            <input type="text" class="form-control" name="icon" placeholder="Icon Font Awesome : Contoh nav-icon fas fa-users">  
            <small>Contoh : nav-icon fas fa-users</small>
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
<!-- Modal Update-->
<?php foreach ($menu as $hasil) : ?>
<div class="modal fade" id="update-data<?=$hasil['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5><i class="fas fa-edit"></i> Update Menu</h5>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('menu/ubah_data/'.$hasil['id']); ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
         <input type="hidden" name="id"  readonly value="<?=$hasil['id'];?>">
         <div class="form-group">
            <label for="nama" class="col-form-label">MENU:</label>
            <input type="text" class="form-control" name="menu" value="<?php echo $hasil ['menu'] ; ?>">  
          </div>
          <div class="form-group">
            <label for="nama" class="col-form-label">ICON:</label>
            <input type="text" class="form-control" name="icon" value="<?php echo $hasil ['icon'] ; ?>">
            <small>Contoh : nav-icon fas fa-users</small>  
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
 <?php endforeach;  ?>
<!-- Modal -->
<!-- Modal Hapus-->
<?php foreach ($menu as $hasil) : ?>
<div class="modal fade" id="hapus-data<?=$hasil['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5><i class="fas fa-trash"></i> Hapus Menu</h5>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('menu/hapus_data/'.$hasil['id']); ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
      <p>Apakah Anda Ingin Menghapus Data <strong><?=$hasil['menu'];?></strong> ?</p>
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
<!-- Modal -->

