<html>
<?php $this->load->view('backend/layout/header'); ?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php $this->load->view('backend/layout/sidebar'); ?>
  <!-- Full Width Column -->
<?php $this->load->view($isi); ?>
  <!-- /.content-wrapper -->
<?php $this->load->view('backend/layout/footer'); ?>  
</div>
<!-- ./wrapper -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery 3 -->
<script src="<?=base_url('assets/adminlte')?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/adminlte')?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/adminlte')?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/adminlte')?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/adminlte')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/adminlte')?>/dist/js/demo.js"></script>
<!-- DATA TABELS -->
<script src="<?=base_url('assets/adminlte')?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/adminlte')?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


</body>
</html>
<script>
  $(function () {
    $('#table-full').DataTable({
    })
    
    <?php if($this->uri->segment(1)=="Reception" OR $this->uri->segment(1)=="Accomodation"){ ?>
     CKEDITOR.replace('editor1')
    <?php } ?>
  })
</script>
