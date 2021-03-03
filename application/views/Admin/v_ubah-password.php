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
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"> </div>
      <div class="nama-menu" data-namamenu="<?php echo $this->session->flashdata('nama_menu')  ?>"></div>
    <!-- Main content -->
    <section class="content">
        <!-- batas atas -->
          <div class="card card-primary card-outline col-sm-6">
              <div class="card-body box-profile">
               <!-- <form method="post" action="<?php echo base_url('user/edit') ?>" enctype="multipart/form-data"> -->
                <?php echo form_open_multipart('user/ubahPassword');?>
                <div class="form-group row">
                  <label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="current_password" id="current_password">
                    <?php echo form_error('current_password') ;?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="new_password1" class="col-sm-4 col-form-label">New Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="new_password1" id="new_password1">
                    <?php echo form_error('new_password1') ;?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="new_password2" class="col-sm-4 col-form-label">Repeat Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="new_password2" id="new_password2">
                    <?php echo form_error('new_password2') ;?>
                  </div>
                </div>
                
                <div class="card-footer d-flex justify-content-start col-sm-12">
                   <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan Perubahan</button>   
               </div>
                 
               </form>       
              </div>
              <!-- /.card-body -->
         </div>

        <!-- batas bawah --> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</body>
</html>
