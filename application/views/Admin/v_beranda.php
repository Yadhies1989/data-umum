  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Blank Page</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan Rekapitulasi E-Court </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Ecourt</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <!-- batas atas -->
              
              <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">No Register</th>
                      <th scope="col">Jenis Perkara</th>
                      <th scope="col">Status Pendaftaran</th>
                      <th scope="col">Jumlah Skum</th>
                      <th scope="col">No Perkara</th>
                      <th scope="col">Tgl Pendaftaran Perkara</th>
                      <th scope="col">Detail</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                  $no=1;
                  foreach ($courts as $hasil) : ?>
                    <tr>
                      <td><?php echo $no++  ?></td>
                      <td><?php echo $hasil->nomor_register?></td>
                      <td><?php echo $hasil->jenis_perkara_text?></td>
                      <td><?php echo $hasil->status_pendaftaran_text?></td>
                      <td><?php echo $hasil->jumlah_skum?></td>
                      <td><?php echo $hasil->nomor_perkara?></td>
                      <td><?php echo $hasil->tgl_pendaftaran_perkara?></td>
                      <td>
                        <button  data-toggle="modal" data-target="#detail-data<?=$hasil->perkara_id;?>" class="btn btn-primary btn-sm"><i class="fas fa-id-card"></i> Details</button>
                      </td>
                      
                    </tr>
                  <?php endforeach;  ?>
                  </tbody>
                  </table>   
              </div>
         <!-- batas bawah -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</body>
</html>
<!-- Modal Details-->
<?php foreach ($courts as $hasil) : ?>
<div class="modal fade bd-example-modal-lg" id="detail-data<?=$hasil->perkara_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5><i class="fas fa-id-card"></i> Details Data Perkara E-Court</h5>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i></button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">   
        <tbody>
          <tr>
            <td width="150px"><strong>No Register</strong></td>
            <td><?=$hasil->nomor_register;?></td>  
            <td width="150px"><strong>No Perkara</strong></td>
            <td><?=$hasil->nomor_perkara;?></td>  
          </tr>
          <tr>
            <td width="150px"><strong>Tgl Pendaftaran</strong></td>
            <td><?=$hasil->tanggal_pendaftaran;?></td>  
            <td width="150px"><strong>Jenis Perkara</strong></td>
            <td><?=$hasil->jenis_perkara_text;?></td>  
          </tr>
          <tr>
            <td width="150px"><strong>Pihak 1</strong></td>
            <td><?=$hasil->pihak1_text;?></td>  
            <td width="150px"><strong>Pihak 2</strong></td>
            <td><?=$hasil->pihak2_text;?></td>  
          </tr>
          <tr>
            <td width="150px"><strong>Pengacara 1</strong></td>
            <td><?=$hasil->pengacara_pihak1;?></td>  
            <td width="150px"><strong>Pengacara 2</strong></td>
            <td><?=$hasil->pengacara_pihak2;?></td>  
          </tr>
          <tr>
            <td width="150px"><strong>Para Pihak</strong></td>
            <td><?=$hasil->para_pihak;?></td>  
             
          </tr>
          <tr>
            <td width="150px"><strong>Tahapan</strong></td>
            <td><?=$hasil->tahapan_terakhir_text;?></td>  
            <td width="150px"><strong>Proses</strong></td>
            <td><?=$hasil->proses_terakhir_text;?></td>  
          </tr>
          <tr>
            <td width="150px"><strong>E-Mail Advocat</strong></td>
            <td><?=$hasil->diinput_oleh;?></td>  
            
          </tr>
        </tbody>
      </table> 
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
 <?php endforeach;  ?>
<!-- Modal -->
