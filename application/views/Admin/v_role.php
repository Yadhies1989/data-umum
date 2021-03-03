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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">Tambah Role</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- batas atas -->
                  <div class="container table-responsive">
                    <table class="table table-bordered table-striped" id="example1">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Menu</th>
                              <!-- <th scope="col">Icon</th> -->
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                             $no =1;
                             foreach ($role as $hasil) :        
                            ?>
                              <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $hasil ['role'] ; ?></td>
                              <!--   <td><?php echo $hasil ['icon'] ; ?></td> -->
                                <td width="120px">
                                  <a href="<?php echo base_url('admin/roleaccess/') . $hasil['id_role']; ?>" class="btn btn-success btn-sm"><i class="fas fa-key"></i></a>
                                  <a data-toggle="modal" data-target="#update-data<?=$hasil['id_role'];?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                  <a data-toggle="modal" data-target="#hapus-data<?=$hasil['id_role'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
        <h5><i class="fas fa-plus-square"></i> Tambah Role</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('admin/tambah_role') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="role" class="col-form-label">ROLE:</label>
            <input type="text" class="form-control" name="role" placeholder="Nama Role">  
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
<?php foreach ($role as $hasil) : ?>
<div class="modal fade" id="update-data<?=$hasil['id_role'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5><i class="fas fa-edit"></i> Update Role</h5>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('admin/ubah_role/'.$hasil['id_role']); ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
         <input type="hidden" name="id_role"  readonly value="<?=$hasil['id_role'];?>">
         <div class="form-group">
            <label for="role" class="col-form-label">ROLE:</label>
            <input type="text" class="form-control" name="role" value="<?php echo $hasil ['role'] ; ?>">  
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

<?php foreach ($role as $hasil) : ?>
<div class="modal fade" id="hapus-data<?=$hasil['id_role'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5><i class="fas fa-trash"></i> Hapus Role</h5>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('admin/hapus_role/'.$hasil['id_role']); ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
      <p>Apakah Anda Ingin Menghapus Antrian <strong><?=$hasil['role'];?></strong> ?</p>
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

 
