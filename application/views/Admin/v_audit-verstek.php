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
                                 <h3 class="card-title"> Filter Putusan Verstek Ya Tapi Di Amar Tidak Ada Kata Verstek </h3>
                             </div>
                             <div class="card-body">
                                 <form>
                                     <div class="input-group">
                                         <label for="ruang_sidang" class="col-form-label mr-3">Tahun : </label>
                                         <select class="form-control col-sm-2" name="tahun">
                                             <?php foreach ($tahun_baru as $hasil) { ?>
                                                 <option value="<?php echo $hasil['tahun_baru']; ?>"><?php echo $hasil['tahun_baru']; ?> </option>
                                             <?php } ?>
                                         </select>
                                         <span class="input-group-append">
                                             <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-eye"></i> Tampilkan Data</button>
                                         </span>
                                     </div>
                                 </form>
                             </div>
                         </div>

                         <div class="card card-info">
                             <div class="card-header">
                                 <h3 class="card-title">Putusan Verstek Ya Tapi Di Amar Tidak Ada Kata Verstek <strong><?php echo $ket; ?></strong></h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <?php
                                    $jumlah_data = count($data_verstek);
                                    if ($jumlah_data > 0) { ?>
                                     <div class="table-responsive">
                                         <table class="table table-bordered table-striped" id="example1">
                                             <thead>
                                                 <th scope="col">No</th>
                                                 <th scope="col">No Perkara</th>
                                                 <th scope="col">Jenis Perkara</th>
                                                 <th scope="col">Tanggal Putusan</th>
                                                 <th scope="col">Putusan Verstek</th>
                                                 <th scope="col">Amar Putusan</th>
                                             </thead>
                                             <tbody>
                                                 <?php
                                                    $no = 1;
                                                    foreach ($data_verstek as $hasil) :
                                                    ?>
                                                     <tr>
                                                         <td style="text-align:center;"><?php echo $no++; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['nomor_perkara']; ?></td>
                                                         <td><?php echo $hasil['jenis_perkara_text']; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['tgl_putusan']; ?></td>
                                                         <td style="text-align:center;"><?php echo $hasil['putusan_verstek']; ?></td>
                                                         <td><?php echo $hasil['amar_putusan']; ?></td>
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