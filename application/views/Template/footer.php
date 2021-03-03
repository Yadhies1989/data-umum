<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.js"></script>
<script>
  $(function () {
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
</script>
<script type="text/javascript">
  const flashData = $('.flash-data').data('flashdata');
  //console.log(flashData);
if (flashData) {
   Swal.fire({
        icon: 'success',
        title: 'Good Job',
        text: 'Data Berhasil ' + flashData,
      });
}

</script>
<script>
const namaMenu = $('.nama-menu').data('namamenu');
// console.log(namaLengkap);

if (namaMenu) {
  Swal.fire({
    icon: 'warning',
    title: 'Cek Kembali',
    text: namaMenu,
  });
}

</script>
<script type="text/javascript">
  $('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop(); 
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  $('.form-check-input').on('click', function(){
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({

      url: "<?php echo base_url('admin/changeaccess'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId

      },

      success: function() {

        document.location.href = "<?php echo base_url('admin/roleaccess/'); ?>" + roleId;
      }

    });

  });
</script>

