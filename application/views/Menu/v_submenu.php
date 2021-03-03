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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">Tambah Sub Menu</a>
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
                              <th scope="col">Judul Submenu</th>
                              <th scope="col">URL</th>
                              <th scope="col">Icon</th>
                              <th scope="col">Is Active</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                             $no =1;
                             foreach ($submenu as $hasil) :        
                            ?>
                              <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $hasil ['menu'] ; ?></td>
                                <td><?php echo $hasil ['title'] ; ?></td>
                                <td><?php echo $hasil ['url'] ; ?></td>
                                <td><?php echo $hasil ['icon'] ; ?></td>
                                <td><?php
                                      if ($hasil['is_active'] == 1) {
                                        echo "<span class='badge badge-success'>Aktif</span>";
                                      }else {
                                        echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                                      }
                                 ?></td>
                                <td width="120px">
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
        <h5><i class="fas fa-plus-square"></i> Tambah Sub Menu</h5>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('menu/tambah_submenu') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title" class="col-form-label">Sub Menu:</label>
            <input type="text" class="form-control" name="title" placeholder="Nama SubMenu">  
          </div>
          <div class="form-group">
            <label for="menu_id" class="col-form-label">Menu:</label>
            <select name="menu_id" class="form-control">
              <option value="">--Pilih--</option>
              <?php foreach($menu as $m) : ?>
              <option value="<?php echo $m ['id'] ; ?>"><?php echo $m ['menu'] ; ?></option>
              <?php endforeach ?>
            </select>  
          </div>
          <div class="form-group">
            <label for="url" class="col-form-label">URL:</label>
            <input type="text" class="form-control" name="url" placeholder="Nama URL (Contoh : welcome/testing) ">  
          </div>
          <div class="form-group">
            <label for="icon" class="col-form-label">Icon:</label>
            <input type="text" class="form-control" name="icon" placeholder="Icon Font Awesome : Contoh nav-icon fas fa-users ">  
            <small>Contoh : nav-icon fas fa-users</small>
          </div>
          <div class="form-group">
            <label for="is_active" class="col-form-label">Is Active:</label>
            <select name="is_active" class="form-control">
              <option value="1">Aktif</option>
              <option value="2">Tidak Aktif</option>
            </select>
          
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
<?php foreach ($submenu as $hasil) : ?>
<div class="modal fade" id="update-data<?=$hasil['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5><i class="fas fa-edit"></i> Update SubMenu</h5>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('menu/ubah_submenu/'.$hasil['id']); ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
         <input type="hidden" name="id"  readonly value="<?=$hasil['id'];?>">
          <div class="form-group">
            <label for="title" class="col-form-label">Sub Menu:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $hasil ['title'] ; ?>">  
          </div>
          <div class="form-group">
            <label for="menu_id" class="col-form-label">Menu:</label>
            <select name="menu_id" class="form-control">
              <option value="<?php echo $hasil ['menu_id'] ; ?>"><?php echo $hasil ['menu'] ; ?></option>
              <?php foreach($menu as $m) : ?>
              <option value="<?php echo $m ['id'] ; ?>"><?php echo $m ['menu'] ; ?></option>
              <?php endforeach ?>
            </select>  
          </div>
          <div class="form-group">
            <label for="url" class="col-form-label">URL:</label>
            <input type="text" class="form-control" name="url" value="<?php echo $hasil ['url'] ; ?>">  
          </div>
          <div class="form-group">
            <label for="icon" class="col-form-label">Icon:</label>
            <input type="text" class="form-control" name="icon" value="<?php echo $hasil ['icon'] ; ?>">  
            <small>Contoh : nav-icon fas fa-users</small>
          </div>
          <div class="form-group">
            <label for="is_active" class="col-form-label">Is Active:</label>
            <select name="is_active" class="form-control">
              <option <?php if($hasil ['is_active'] == 1) {echo "selected='selected'";}
                        echo $hasil['is_active']; ?> value="1" >
                        Aktif
              </option>
              <option <?php if($hasil ['is_active'] == 2) {echo "selected='selected'";}
                        echo $hasil['is_active']; ?> value="2" >
                        Tidak Aktif
              </option>
            </select>
            
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
<?php foreach ($submenu as $hasil) : ?>
<div class="modal fade" id="hapus-data<?=$hasil['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5><i class="fas fa-trash"></i> Hapus Sub Menu</h5>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('menu/hapus_submenu/'.$hasil['id']); ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
      <p>Apakah Anda Ingin Menghapus Data <strong><?=$hasil['title'];?></strong> ?</p>
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

