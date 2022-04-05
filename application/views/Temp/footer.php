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

 <!-- REQUIRED SCRIPTS -->

 <!-- jQuery -->
 <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
 <!-- AdminLTE Jquey UI -->
 <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- SweetAlert2 -->
 <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.js"></script>
 <!-- DataTables -->
 <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- page script -->
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
     $(function() {
         $("#kode_surat").autocomplete({
             source: function(request, response) {
                 $.ajax({
                     url: "<?php echo site_url('referensi/get_klasifikasi'); ?>",
                     data: {
                         kode: $("#kode_surat").val()

                     },
                     dataType: "json",
                     type: "POST",
                     success: function(data) {
                         response(data);
                     }
                 });
             },
         });
     });
     $(document).ready(function() {
         $('#pekerjaan_lainnya').hide();
         $('#pekerjaan').change(function() {
             if ($(this).val() == 'Lain-Lain') {
                 $('#pekerjaan_lainnya').show();
             } else {
                 $('#pekerjaan_lainnya').hide();
             }
         });
     });
     $(document).ready(function() {
         $("#provinsi").change(function() {
             $("#provinsi").trigger('change');
             var url = "<?php echo site_url('user/add_ajax_kab'); ?>/" + $(this).val();
             $('#kabupaten').load(url);
             return false;
         })

         $("#kabupaten").change(function() {
             var url = "<?php echo site_url('user/add_ajax_kec'); ?>/" + $(this).val();
             $('#kecamatan').load(url);
             return false;
         })

         $("#kecamatan").change(function() {
             var url = "<?php echo site_url('user/add_ajax_des'); ?>/" + $(this).val();
             $('#desa').load(url);
             return false;
         })
     });
     const flashData = $('.flash-data').data('flashdata');
     //console.log(flashData);
     if (flashData) {
         Swal.fire({
             icon: 'success',
             title: 'Matoh',
             text: 'Surat Masuk Berhasil ' + flashData,
         });
     }
     window.onload = function() {

         $('#tgl_lahir').on('change', function() {

             var dob = new Date(this.value);

             var today = new Date();

             var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));

             $('#umur').val(age);

         });
         $(function() {
             $("#auto_kelurahan").autocomplete({
                 source: function(request, response) {
                     $.ajax({
                         url: "<?php echo site_url('user/get_wilayah'); ?>",
                         data: {
                             kode: $("#auto_kelurahan").val()

                         },
                         dataType: "json",
                         type: "POST",
                         success: function(data) {
                             response(data);
                         }
                     });
                 },
             });
         });
         $(function() {
             $("#auto_perkara").autocomplete({
                 source: function(request, response) {
                     $.ajax({
                         url: "<?php echo site_url('langitcerah/get_perkara'); ?>",
                         data: {
                             kode: $("#auto_perkara").val()

                         },
                         dataType: "json",
                         type: "POST",
                         success: function(data) {
                             response(data);
                         }
                     });
                 },
             });
         });
     }
 </script>
 </body>

 </html>