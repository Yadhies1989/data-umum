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

    <!-- Main content -->
    <section class="content">
        <div class="nama-menu" data-namamenu="<?php echo $this->session->flashdata('nama_menu')  ?>"></div>
        <!-- batas atas -->
         <div class="card card-primary card-outline col-sm-6">
              <div class="card-body box-profile">
               <!-- <form method="post" action="<?php echo base_url('user/edit') ?>" enctype="multipart/form-data"> -->
                <?php echo form_open_multipart('user/edit');?>
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">E - Mail</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $user['email'];  ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $user['name'];  ?>">
                    <?= form_error('name', '<div class="text-danger mb-3">', '</div>')?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2"><strong>Picture</strong></div>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-3">
                        <img src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" name="image" class="custom-file-input" id="image">
                          <label class="custom-file-label" for="image">Pilih Gambar</label>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer justify-content-between">
                   <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan Perubahan</button>
                  
               </div>
                 
               </form>       
              </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
        <!-- batas bawah --> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</body>
</html>
