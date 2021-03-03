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
               <h5>Role : <?php echo $role['role']; ?></h5>
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
                              <th scope="col">Akses</th>
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
                              <!--   <td><?php echo $hasil ['icon'] ; ?></td> -->
                                <td width="120px">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?php echo check_access($role['id_role'], $hasil['id']); ?> data-role= "<?php echo $role['id_role']; ?>" data-menu="<?php echo $hasil['id']; ?>">
                                    
                                  </div>
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

