<?php
$str_km = "readonly";
if (!empty($this->uri->segment(4))) {
  $str_km = "required";
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
      <div class="box box-default">
        <div class="box-header with-border">
          <center>
            <h2 class="box-title">FORMULIR PEMINJAMAN KENDARAAN OPERASIONAL</h2>
          </center>
          <div class="box-tools pull-right">
            <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <form id="form_pk" method="POST" action="<?= base_url('index.php/Loan/save_edit/' . $this->uri->segment(3)) ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">


                <label>
                  <h3>I. IDENTITAS PEMINJAM</h3>
                </label>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Pemohon/User</label>
                  <select name="USER" id="USER"  class="form-control" onchange="userChange()">
                    <option value="">CHOOSE</option>
                    <?php foreach($karyawan as $kar){ ?>
                    <option <?php if($data->NAMA_PK==$kar->NAMA_USER){echo "selected";} ?> value="<?=$kar->NAMA_USER?>"><?=$kar->NAMA_USER?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>JABATAN</label>
                  <input type="text" name="JABATAN" id="JABATAN" class="form-control" value="<?= $data->JABATAN_PK ?>">
                </div>
                <div class="form-group">
                  <label>NIPP</label>
                  <input type="text" name="NIPP" id="NIPP" class="form-control" value="<?= $data->NIPP_PK ?>">
                </div>
                <div class="form-group">
                  <label>TELEPON</label>
                  <input type="text" name="TELEPON" id="TELEPON" class="form-control" value="<?= $data->TELEPON_PK ?>">
                </div>
                <div class="form-group">
                  <label>UNIT KERJA</label>
                  <input type="text" name="UNITKERJA" id="UNITKERJA" class="form-control" value="<?= $data->UNIT_KERJA_PK ?>">
                </div>

                <label>
                  <h3>II. ISI</h3>
                </label>
                <!-- <div class="form-group">
                <label>PINJAM KENDARAAN OPERASIONAL</label>
                <input type="text" name="PINJAM_KENDARAAN" id="PINJAM_KENDARAAN" class="form-control" value="<?= $data->PINJAM_KENDARAAN ?>">
              </div> -->
                <div class="form-group">
                  <label>PADA HARI/TANGGAL</label>
                  <input type="DATE" name="TANGGAL" id="TANGGAL" class="form-control" value="<?= $data->DATE_PK ?>">
                </div>
                
                <div class="form-group">
                  <label>TUJUAN/KEPERLUAN</label>
                  <textarea name="TUJUAN" id="TUJUAN" class="form-control"><?= $data->TUJUAN_PK ?></textarea>
                </div>
                <div class="form-group">
                  <label>KEPERLUAN ACARA</label>
                  <textarea name="KEPERLUAN" id="KEPERLUAN" class="form-control"><?= $data->KEPERLUAN ?></textarea>
                </div>
                <label>
                  <h3>III. PINJAM KENDARAAN OPERASIONAL</h3>
                </label>
                <div class="form-group">
                  <label>JENIS KENDARAAN</label>
                  <select class="form-control" name="PINJAM_KENDARAAN" id="PINJAM_KENDARAAN">
                    <option value="">Choose</option>
                    <?php foreach ($jenis_kendaraan as $jk) { ?>
                      <option <?php if ($jk->NAMA_JK == $data->JENIS_KENDARAAN) {
                                echo "selected";
                              } ?>><?= $jk->NAMA_JK ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Jam</label>
                  <div class="row">
                    <div class="col-md-5"><input type="datetime-local" name="WAKTU" id="WAKTU" class="form-control" value="<?= $data->TIME_PK_AWAL ?>"></div>
                    <div class="col-md-2">Sampai dengan</div>
                    <div class="col-md-5"><input type="datetime-local" name="WAKTU2" id="WAKTU2" class="form-control" value="<?= $data->TIME_PK_AKHIR ?>"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label>NAMA PENGEMUDI</label>
                  <input type="text" name="PENGEMUDI" id="PENGEMUDI" class="form-control" value="<?= $data->PENGEMUDI ?>">
                </div>
                <div class="form-group">
                  <label>KM AWAL</label>
                  <input type="NUMBER" name="SPEEDO_AWAL" id="SPEEDO_AWAL" class="form-control" value="<?= $data->SPEEDO_AWAL ?>">
                </div>
                <div class="form-group">
                  <label>KM AKHIR</label>
                  <input type="NUMBER" name="SPEEDO_AKHIR" id="SPEEDO_AKHIR" class="form-control" value="<?= $data->SPEEDO_AKHIR ?>" <?= $str_km ?>>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-4">

                <!-- /.form-group -->
                <div class="form-group">
                  <label>ATTACHMENT</label>
                  <input type="text" name="LINK" id="LINK" class="form-control" placeholder="link" value="<?= $data->LINK ?>">
                  <input type="file" name="FILE" id="FILE">
                </div>

                <label>
                  <h3>ACTION</h3>
                </label>
                <div class="form-group">
                  <label>STATUS KIRIM</label>
                  <select class="form-control" name="ACTION" id="ACTION">
                    <?php if (!empty($this->uri->segment(4))) { ?>
                      <option value="FINISH">KEMBALIAKAN/FINISH</option>
                    <?PHP } else {  ?>
                      <option value="DRAFT">Simpan Draft</option>
                      <option value="KIRIM">KIRIM</option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>KOMENTAR</label>
                  <textarea name="KOMENTAR" id="KOMENTAR" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="button" onclick="check()">SUBMIT</button>
                  <!-- <button class="btn bg-aqua">PREVIEW PDF</button> -->
                </div>
                <label>
                  <h3>HISTORY</h3>
                </label>
                <table id="table_w3s" style="font-size: 10;">
                  <thead>
                    <th width="20%">DATETIME</th>
                    <th>NIPP</th>
                    <th>KET</th>
                    <th width="20%">STATUS</th>
                    </tr>
                    <?php foreach ($hist as $h) { ?>
                      <tr>
                        <td><?= $h->DATE_TIME ?></td>
                        <td><?= $h->NIPP ?></td>
                        <td><?= $h->KOMENTAR ?></td>
                        <td><?php if ($h->STATUS == "PASS") {
                              echo "APPROVED";
                            } else {
                              echo $h->STATUS;
                            }  ?></td>
                      </tr>
                    <?php } ?>
                </table>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </form>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.container -->
</div>
<script>
  function check(){
    $.post("<?= base_url('index.php/Loan/validasi_tanggal') ?>",
  {
      WAKTU : $('#WAKTU').val(),
      WAKTU2: $('#WAKTU2').val(),
      MOBIL : $('#PINJAM_KENDARAAN').val(),
      ID : "<?=$this->uri->segment(3)?>"
  },
  function(data, status){
    if(data.trim()=="SUCCESS"){
        $('#form_pk').submit();
    }else{
      alert('KENDARAAN DI TANGGAL DAN JAM TERSEBUT SUDAH DI PESAN');
    }
  });
  }
  $(document).ready(function() {
    $("#PINJAM_KENDARAAN").val('<?= $data->PINJAM_KENDARAAN ?>')
  });
  function userChange(){
    const nama = $('#USER').val()
    $.post("<?= base_url('index.php/Karyawan/search_karyawan') ?>",{NAMA:nama},
    function(res, status){
      const data=JSON.parse(res)
      $("#JABATAN").val(data.JABATAN_USER)
      $("#NIPP").val(data.NIPP_USER)
      $("#TELEPON").val(data.TELPON_USER)
      $('#UNITKERJA').val(data.UNIT_KERJA)
    }
    );
  }
</script>