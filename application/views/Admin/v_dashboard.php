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
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"> </div>
      <div class="nama-menu" data-namamenu="<?php echo $this->session->flashdata('nama_menu')  ?>"></div>
        <!-- batas atas -->
         <!-- Profile Image -->
            <div class="card card-primary card-outline col-sm-6">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url('assets/img/profile/'). $user['image'];?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $user['name']; ?></h3>

                <p class="text-muted text-center"><?php echo $user['email']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Role ID</b> <a class="float-right"><?php echo $user['role_id']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Is Active</b> <a class="float-right"><?php echo $user['is_active']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Member Sejak</b> <a class="float-right"><?php echo $user['date_created']; ?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
