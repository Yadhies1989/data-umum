<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logo.png">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- JqueryUI CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <style>
        .data-perkara {
            display: none;
        }

        #col-kecamatan {
            display: none;
        }

        #col-desa {
            display: none;
        }

        #col-dalam {
            display: none;
        }

        #col-luar {
            display: none;
        }

        #col-kondisi {
            display: none;
        }

        #col-alamat {
            display: none;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container-fluid">
                <a href="<?php echo base_url('user/dashboard') ?>" class="navbar-brand">
                    <img src="<?php echo base_url() ?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Posbakum V1</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if ($user['username'] === 'admin') : ?>
                                <a href="<?php echo base_url('admin/admin') ?>" class="nav-link active"><i class="fas fa-home"></i> Beranda</a>
                            <?php else : ?>
                                <a href="<?php echo base_url('user/data_umum') ?>" class="nav-link active"><i class="fas fa-home"></i> Beranda</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('user/jadwal_sidang') ?>" class="nav-link active"><i class="fas fa-calendar"></i> Jadwal Sidang</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link active dropdown-toggle"><i class="fas fa-user-secret"></i> Audit SIPP</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?php echo base_url('audit/verstek') ?>" class="dropdown-item">Verstek Ya</a></li>
                                <li><a href="<?php echo base_url('audit/verstek_tidak') ?>" class="dropdown-item">Verstek Tidak</a></li>
                                <li><a href="<?php echo 'http://192.168.1.4/new_dev/arsip.php?tahun=' . date("Y") ?>" class="dropdown-item">Monitoring Alih Media</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link active dropdown-toggle"><i class="fas fa-calendar"></i> Langit Cerah</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?php echo base_url('langitcerah/data_lc') ?>" class="dropdown-item">Data Langit Cerah</a></li>
                                <li><a href="<?php echo base_url('#') ?>" class="dropdown-item">Laporan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link active dropdown-toggle"><i class="fas fa-book"></i> Tabayun AC</a>
                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                <li><a href="<?php echo base_url('permohonanac/data_pac') ?>" class="dropdown-item">Data Permohonan AC</a></li>
                                <li><a href="<?php echo base_url('pengirimanac/data_kac') ?>" class="dropdown-item">Data Pengiriman AC</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo 'http://192.168.1.2/adel' ?>" class="nav-link active" target="_blank"><i class="fas fa-biking"></i> ADEL</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo 'http://192.168.1.2/info_bht' ?>" class="nav-link active" target="_blank"><i class="fas fa-bullhorn"></i> SIBERKAT</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo 'http://192.168.1.2/tantowi' ?>" class="nav-link active" target="_blank"><i class="fas fa-chart-line"></i> Statisik</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link active dropdown-toggle"><i class="fas fa-dollar"></i> Nafkah</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?php echo base_url('nafkah/data_nafkah') ?>" class="dropdown-item">Data Nafkah</a></li>
                                <li><a href="<?php echo base_url('nafkah/data_nafkah/laporan') ?>" class="dropdown-item">Laporan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link active dropdown-toggle"><i class="fas fa-book"></i> Duplikat</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?php echo base_url('duplikat/data_dup') ?>" class="dropdown-item">Data Duplikat Akta Cerai</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link active dropdown-toggle"><i class="fas fa-book"></i> QR Akta Cerai</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li><a href="<?php echo base_url('qrac/data_qrac') ?>" class="dropdown-item">Ambil QR Akta Cerai</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <a href="<?php echo base_url() . 'welcome/logout/' ?>" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->