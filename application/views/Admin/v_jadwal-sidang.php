 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <!-- batas atas -->
                 <div class="row">
                     <div class="col-12">
                         <div class="card card-info">
                             <div class="card-header">
                                 <h3 class="card-title"> Filter Jadwal Sidang Pengadilan Agama Bojonegoro</h3>
                             </div>
                             <div class="card-body">
                                 <form class="form-inline">
                                     <div class="form-group mb-2">
                                         <label for="dari_tanggal" class="col-form-label-sm">Tanggal Sidang : </label>
                                         <input type="date" class="form-control ml-3 mr-3 form-control-sm" name="dari_tanggal" value="<?= set_value('dari_tanggal') ?>">
                                     </div>
                                     <div class="form-group mb-2">
                                         <label for="ruang_sidang" class="col-form-label-sm">Ruang Sidang : </label>
                                         <select class="form-control ml-3 mr-3 form-control-sm" name="ruang_sidang">
                                             <option value="">--Pilih--</option>
                                             <?php foreach ($ruangan as $rng) : ?>
                                                 <option value="<?php echo $rng['nama']; ?>"><?php echo $rng['nama']; ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group mb-2">
                                         <label for="sampai_tanggal" class="col-form-label-sm">Hakim : </label>
                                         <select name="majelis" class="form-control ml-3 mr-3 form-control-sm" required>
                                             <option value="">--Pilih--</option>
                                             <?php foreach ($hakim as $hkm) : ?>
                                                 <option value="<?php echo $hkm['id']; ?>"><?php echo $hkm['nama_gelar']; ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <?php
                                        if ((isset($_GET['dari_tanggal']) && $_GET['dari_tanggal'] != '') && (isset($_GET['ruang_sidang']) && $_GET['ruang_sidang'] != '') && (isset($_GET['majelis']) && $_GET['majelis'] != '')) {
                                            $dari_tanggal    = $_GET['dari_tanggal'];
                                            $ruang_sidang    = $_GET['ruang_sidang'];
                                            $majelis         = $_GET['majelis'];
                                        } else {
                                            $dari_tanggal   = date('Y-m-d');
                                            $ruang_sidang   = '1';
                                            $majelis        = '22';
                                        }
                                        ?>
                                     <button type="submit" class="btn btn-primary mb-2 ml-auto btn-sm"><i class="fas fa-eye"></i> Tampilkan Data</button>
                                     <?php if (count($jadwal_sidang) > 0) { ?>
                                         <a href="<?php echo base_url('User/print_jadwal?dari_tanggal=' . $dari_tanggal), '&ruang_sidang=' . $ruang_sidang, '&majelis=' . $majelis  ?>" class="btn btn-warning mb-2 ml-2 btn-sm"><i class="fas fa-print"></i> Cetak Data</a>
                                         <a href="<?php echo base_url('User/export_excel?dari_tanggal=' . $dari_tanggal), '&ruang_sidang=' . $ruang_sidang, '&majelis=' . $majelis  ?>" class="btn btn-success mb-2 ml-2 btn-sm"><i class="fas fa-table"></i> Export Excel</a>
                                     <?php } else { ?>
                                     <?php } ?>
                                 </form>
                             </div>
                         </div>
                         <?php
                            if ((isset($_GET['dari_tanggal']) && $_GET['dari_tanggal'] != '') && (isset($_GET['ruang_sidang']) && $_GET['ruang_sidang'] != '') && (isset($_GET['majelis']) && $_GET['majelis'] != '')) {
                                $dari_tanggal    = $_GET['dari_tanggal'];
                                $ruang_sidang    = $_GET['ruang_sidang'];
                                $majelis         = $_GET['majelis'];
                            } else {
                                $dari_tanggal   = date('Y-m-d');
                                $ruang_sidang   = '1';
                                $majelis        = '22';
                            }
                            ?>
                         <div class="card card-info">
                             <div class="card-header">
                                 <h3 class="card-title">Menampilkan Tanggal Sidang: <span class="font-weight-bold"><?php echo tanggal_indonesia($dari_tanggal) ?></span> Ruang Sidang: <span class="font-weight-bold"><?php echo $ruang_sidang ?></span> Hakim: <span class="font-weight-bold"><?php echo $hakim_nama ?></span></h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <?php
                                    $jumlah_data = count($jadwal_sidang);
                                    if ($jumlah_data > 0) { ?>
                                     <div class="table-responsive">
                                         <table class="table table-bordered table-striped table-sm">
                                             <thead>
                                                 <tr>
                                                     <th rowspan="2" class="text-center">No</th>
                                                     <th rowspan="2" style="text-align:center;">No Perkara</th>
                                                     <th rowspan="2" class="text-center">Penggugat/Pemohon</th>
                                                     <th rowspan="2" class="text-center">Tergugat/Termohon</th>
                                                     <th rowspan="2" class="text-center">Sidang Ke</th>
                                                     <th colspan="2" class="text-center">Tanggal Sidang</th>
                                                     <th rowspan="2" class="text-center">Agenda</th>
                                                     <th rowspan="2" class="text-center">Alasan Tunda</th>
                                                 </tr>
                                                 <tr>
                                                     <th style="text-align:center;">Sebelumnya</th>
                                                     <th style="text-align:center;">Berikutnya</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php
                                                    $no = 1;
                                                    foreach ($jadwal_sidang as $hasil) :
                                                    ?>
                                                     <tr>
                                                         <td style="text-align:center;"><?php echo $no++; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['nomor_perkara']; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['Penggugat']; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['Tergugat']; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['urutan']; ?></td>
                                                         <?php if ($hasil['urutan'] != 1) : ?>
                                                             <td style="text-align:center;"><?php echo tanggal_indonesia_medium($hasil['tgl_sebelum']); ?></td>
                                                         <?php else : ?>
                                                             <td style="text-align:center;"><span class="badge badge-success">Sidang Pertama</span></td>
                                                         <?php endif; ?>

                                                         <?php if ($hasil['tanggal_putusan'] == null && $hasil['tgl_sesudah'] == null) : ?>
                                                             <td style="text-align:center;"><span class="badge badge-danger">Data Belum Diisi</span></td>
                                                         <?php elseif ($hasil['tanggal_putusan'] != null && $hasil['tgl_sesudah'] == null) : ?>
                                                             <td style="text-align:center;"><span class="badge badge-primary">Perkara Putus</span></td>
                                                         <?php else : ?>
                                                             <td style="text-align:center;"><?php echo tanggal_indonesia_medium($hasil['tgl_sesudah']); ?></td>
                                                         <?php endif; ?>
                                                         <td style="text-align:center;"><?php echo $hasil['agenda']; ?></td>
                                                         <?php if ($hasil['tanggal_putusan'] == null && $hasil['tgl_sesudah'] == null) : ?>
                                                             <td style="text-align:center;"><span class="badge badge-danger">Data Belum Diisi</span></td>
                                                         <?php elseif ($hasil['tanggal_putusan'] != null && $hasil['tgl_sesudah'] == null) : ?>
                                                             <td style="text-align:center;"><span class="badge badge-primary">Perkara Putus</span></td>
                                                         <?php else : ?>
                                                             <td style="text-align:center;"><?php echo $hasil['alasan_ditunda']; ?></td>
                                                         <?php endif; ?>
                                                     </tr>
                                                 <?php endforeach; ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 <?php } else { ?>
                                     <!-- <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih Kosong Gays</span> -->
                                     <div class="alert alert-ligth">
                                         <h2 align="center">Tidak Ada Data Ditampilkan !!!</h2>
                                     </div>
                                 <?php } ?>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <!-- /.col -->
                 </div>
                 <!-- batas bawah -->
             </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->