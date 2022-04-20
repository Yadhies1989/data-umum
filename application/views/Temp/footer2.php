 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
     <div class="p-3">
         <h5>Title</h5>
         <p>Sidebar content</p>
     </div>
 </aside>
 <!-- /.control-sidebar -->

 <!-- Main Footer -->
 <footer class="main-footer">
     <!-- To the right -->
     <div class="float-right d-none d-sm-inline">
         Aplikasi Posbakum PA BJN
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; 2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> Load Time : {elapsed_time}, Memory Available : {memory_usage}
 </footer>
 </div>
 <!-- ./wrapper -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js" integrity="sha256-xH4q8N0pEzrZMaRmd7gQVcTZiFei+HfRTBPJ1OGXC0k=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 <!-- SweetAlert2 -->
 <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.js"></script>
 <!-- DataTables -->
 <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "autoWidth": false,
         });
         $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         });
     });
     const flashData = $('.flash-data').data('flashdata');
     //console.log(flashData);
     if (flashData) {
         Swal.fire({
             icon: 'success',
             title: 'Matoh',
             text: 'Permohonan Langit Cerah Berhasil ' + flashData,
         });
     }

     $(document).ready(function() {
         // Format Select2 pada id nisn
         $("#no_perkaraid").select2({
             allowClear: true,
             theme: "bootstrap",
             placeholder: "Cari Nomor Perkara",
         });

         show_noperkara(); // Memanggil fungsi untuk menampilkan NISN
     });

     // fungsi untuk menampilkan NISN
     function show_noperkara() {
         $.ajax({
             // diganti
             url: "<?php echo base_url('langitcerah/get_nomor'); ?>",
             type: "GET",
             dataType: "JSON",
             success: function(x) {
                 if (x.status == true) {
                     $('#no_perkaraid').html('<option value=""></option>');
                     $.each(x.data, function(k, v) {
                         $('#no_perkaraid').append(`<option value="${v.nomor_perkara}">${v.nomor_perkara}</option>`);
                     });
                 }
             }
         });
     }

     // fungsi untuk menampilkan data siswa berdasarkan NISN
     function show_dataperkara(x) {
         $.ajax({
             url: "<?php echo base_url('langitcerah/get_perkawis'); ?>",
             type: "GET",
             dataType: "JSON",
             data: {
                 no_perkaraname: x
                 // harus sama dengan variabel name di views
             },
             success: function(x) {
                 if (x.status == true) {
                     $('.data-perkara').show()
                     $('#nama_p').val(x.data.nama_p);
                     $('#umur_p').val(x.data.umur_p);
                     $('#agama_p').val(x.data.nama);
                     $('#pekerjaan_p').val(x.data.pekerjaan);
                     $('#pendidikan_p').val(x.data.kode);
                     $('#alamat_p').val(x.data.alamat);
                     $('#telpon_p').val(x.data.telepon);
                 }
             }
         });
     }

     function show_dataperkara2(x) {
         $.ajax({
             url: "<?php echo base_url('langitcerah/get_perkawis2'); ?>",
             type: "GET",
             dataType: "JSON",
             data: {
                 no_perkaraname: x
                 // harus sama dengan variabel name di views
             },
             success: function(x) {
                 if (x.status == true) {
                     $('.data-perkara').show()
                     $('#nama_t').val(x.data.nama_t);
                     $('#umur_t').val(x.data.umur_t);
                     $('#agama_t').val(x.data.nama);
                     $('#pekerjaan_t').val(x.data.pekerjaan);
                     $('#pendidikan_t').val(x.data.kode);
                     $('#alamat_t').val(x.data.alamat);
                     $('#telpon_t').val(x.data.telepon);
                 }
             }
         });
     }
 </script>

 </body>

 </html>