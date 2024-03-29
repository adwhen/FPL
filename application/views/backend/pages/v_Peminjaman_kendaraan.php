<?php 
$strTH = "";
if($this->session->userdata('status')=='1'){
  $strTH = "<th>Tanggal Input</th>";
} 
?>
<style type="text/css">
  td {
    height: 120px;
  }
</style>

<div class="content-wrapper">
  <div class="container">
    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <center>
            <h3 class="box-title">Pelayanan Peminjaman Kendaraan</h3>
          </center>
        </div>
        <hr>
        <div class="box-header">
          <a class="btn btn-success" href="<?= base_url('index.php/Loan/form') ?>">Ajukan Peminjaman</a>

          <?php if ($this->session->userdata('status') == 1) { ?> <a class="btn btn-warning" href="<?= base_url('index.php/Loan/report') ?>">Laporan</a><?php } ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="table-full" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <?=$strTH?>
                <th>Kendaraan</th>
                <th>Tujuan</th>
                <th>Tanggal - Waktu</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($data->result() as $dt) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <?php if($this->session->userdata('status')=='1'){echo "<td>".$dt->DATE_IN."</td>";} ?>
                  <td>
                    <?php if ($dt->PROCESS == "KIRIM") {
                      echo " <button class='btn-default'>WAITING ACCEPTED</button> - ";
                    } elseif ($dt->PROCESS == "APPROVE") {
                      echo " <button class='btn-default'>APPROVED</button> - ";
                    } elseif ($dt->PROCESS == "DRAFT") {
                      echo " <button class='btn-default'>DRAFT</button> - ";
                    } elseif ($dt->PROCESS == "FINISH") {
                      echo " <button class='btn-success'>FINISH</button> - ";
                    } else {
                      echo " <button class='btn-danger'>REJECTED</button> - ";
                    } ?>
                    <?= $dt->PINJAM_KENDARAAN ?></td>
                  <td><?= $dt->TUJUAN_PK ?></td>
                  <td><?= $dt->TIME_PK_AWAL ?> S/D <?= $dt->TIME_PK_AKHIR ?></td>
                  <td>
                    <?php if ($this->session->userdata('status') == 0) { ?>
                      <?php if ($dt->PROCESS == "APPROVE") { ?>
                        <a href="<?= base_url('index.php/Loan/return_car/' . $dt->IDX_PK . '/return') ?>" class="btn btn-danger"><i class="fa fa-caret-left"> Kembalian</i></a>
                      <?php } ?>
                      <a href="<?= base_url('index.php/Loan/form/' . $dt->IDX_PK) ?>" class="btn btn-warning"><i class="fa fa-edit"> Edit</i></a>
                      <a target="_BLANK" href="<?= base_url('index.php/Loan/REC/' . $dt->IDX_PK) ?>" class="btn btn-primary"><i class="fa fa-file-pdf-o"> PDF</i></a>
                    <?php } else { ?>
                      <?php if ($dt->PROCESS == "KIRIM") { ?>
                        <a href="#" onclick="pop_up('<?= $dt->IDX_PK ?>','<?= $dt->TIME_PK_AWAL ?>','<?= $dt->TIME_PK_AKHIR?>','<?= $dt->PINJAM_KENDARAAN ?>')" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-check"></i></a>
                      <?php } else { ?>
                        <a target="_BLANK" href="<?= base_url('index.php/Loan/REC/' . $dt->IDX_PK) ?>" class="btn btn-success"><i class="fa fa-file-pdf-o"> PDF</i></a>
                      <?php } ?>
                    <?php } ?>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Permohonan</th>
                <th>Tujuan</th>
                <th>Tanggal - Waktu</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Persetujuan</h4>
      </div>
      <div class="modal-body col-md-12">
        <div class="col-md-8" id="frame_popup">

        </div>
        <div class="col-md-4">
          <label>
            <h3>ACTION</h3>
          </label>
          <div class="form-group">
            <label>STATUS KIRIM</label>
            <input type="hidden" name="IDX" id="IDX">
            <input type="hidden" name="WAKTU" id="WAKTU">
            <input type="hidden" name="WAKTU2" id="WAKTU2">
            <input type="hidden" name="MOBIL" id="MOBIL">
            <select class="form-control" name="ACTION" id="ACTION">
              <option value="HOLD">Kembalikan</option>
              <option value="PASS">Setujui</option>
            </select>
          </div>
          <div class="form-group">
            <label>KOMENTAR</label>
            <textarea name="KOMENTAR" id="KOMENTAR" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="button" onclick="check(IDX.value)">SUBMIT</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">

function pop_up(IDX,WAKTU1,WAKTU2,MOBIL) {
    var url = '<?= base_url('index.php/Loan/REC_Approve/') ?>'
    $("#frame_popup").html('<iframe style="height:700px;width: 100%;" src="' + url + '/' + IDX + '"></iframe>')
    $("#IDX").val(IDX)
    $("#WAKTU").val(WAKTU1)
    $("#WAKTU2").val(WAKTU2)
    $("#MOBIL").val(MOBIL)
    // alert(IDX+WAKTU1+WAKTU2+MOBIL)
  }
  function check(idx){
    $.post("<?= base_url('index.php/Loan/validasi_tanggal') ?>",
    {
        WAKTU : $('#WAKTU').val(),
        WAKTU2: $('#WAKTU2').val(),
        MOBIL : $('#MOBIL').val(),
        ID : idx
    },
    function(data, status){
      if(data.trim()!="SUCCESS"){
        alert('KENDARAAN DI TANGGAL DAN JAM TERSEBUT SUDAH DI PESAN SILAHKAN DICHECK KEMBALI');  
      }else{
        save_pel(idx)
      }
    });
  }
  

  function save_pel(idx) {
    var status = $("#ACTION").val()
    var komentar = $("#KOMENTAR").val()
    $.post('<?= base_url('index.php/Loan/approval/') ?>', {
        IDX: idx,
        KOMENTAR: komentar,
        STATUS: status
      },
      function(data) {
        if (data.trim() == "OK") {
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil di Proses',
            showConfirmButton: false,
            timer: 1500
          })
          window.open('<?= base_url() ?>index.php/Loan', '_self');

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Terjadi Kesalahan, silahkan coba kembali',
            footer: 'atau hubungi Administrator'
          })
        }
      })

  }
</script>