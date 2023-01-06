<style type="text/css">
  td {
    
  }
</style>

<div class="content-wrapper" id="data_form">
  <div class="container">
    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <center>
            <h3 class="box-title">Master Karyawan</h3>
          </center>
        </div>
        <hr>
        <div class="box-header">
          <button  class="btn btn-success" onclick="form_add()"><i class="fa fa-plus"> Tambah Karyawan</i></button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="table-full" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIPP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php 
             $x=1;
             foreach($data as $dt){ ?>
             <tr>
                <td><?=$x++;?></td>
                <td><?=$dt['NIPP_USER']?></td>
                <td><?=$dt['NAMA_USER']?></td>
                <td><?=$dt['JABATAN_USER']?></td>
                <td><?=$dt['UNIT_KERJA']?></td>
                <td>
                  <?php $str = "'".$dt['IDX']."','".$dt['NIPP_USER']."','".$dt['NAMA_USER']."','".$dt['JABATAN_USER']."','".$dt['UNIT_KERJA']."','".$dt['TELPON_USER']."'" ?>
                <button class="btn btn-warning" onclick="form_edit(<?=$str ?>)"><i class="fa fa-edit"> Edit</i></button> 
                <a onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS DATA <?=$dt['NAMA_USER']?>?')" href="<?= base_url('index.php/master/employee_hapus/'.$dt['IDX'])?>" class="btn btn-danger"><i class="fa fa-cancel">Hapus</i></a>
                </td>
             </tr>
             
            <?php } ?> 
            </tbody>
          
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.container -->
</div>

<script type="text/javascript">

function form_add(){
  $('#form_E').trigger("reset")
    $("#form_add").show()
    $("#data_form").hide()
}
function form_edit(idx,nipp,nama,jabatan,uk,telpon){
  $('#IDX').val(idx)
  $('#NAMA').val(nama)
  $('#JABATAN').val(jabatan)
  $('#NIPP').val(nipp)
  $('#TELEPON').val(telpon)
  $('#UNIT_KERJA').val(uk)

   $("#form_add").show()
    $("#data_form").hide()
}

</script>
<?php $this->load->view('backend/pages/v_Employee_form') ?>