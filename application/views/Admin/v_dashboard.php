<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> Selamat Datang <span class="text-danger font-weight-bold"><?php echo $user['fullname']; ?></span></h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if ($user['username'] === 'admin') : ?>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admin') ?>">Home</a></li>
                        <?php else : ?>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('user/data_umum') ?>">Home</a></li>
                        <?php endif; ?>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php $this->load->view('Admin/' . $page); ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->