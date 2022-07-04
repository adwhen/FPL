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
            <h2 class="box-title">PT. PELABUHAN INDONESIA (PERSERO)<br>FORMULIR JAMUAN REGIONAL 2 BENGKULU</h2>
          </center>
          <div class="box-tools pull-right">
            <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <form method="POST" action="<?= base_url('index.php/Reception/save_edit/' . $data->IDX_J) ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
                <label>Note : untuk pemohon jamuan tamu dinas agar melampirkan bukti persetujuan dari General Manager berupa Screenshoot (jpg/jpeg/png) di lampirkan</label>
                <label>
                  <h3>I. IDENTITAS</h3>
                </label>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Pemohon/User</label>
                  <input type="text" name="USER" id="USER" class="form-control" value="<?= $data->NAMA_J ?>">
                </div>
                <div class="form-group">
                  <label>JABATAN</label>
                  <input type="text" name="JABATAN" id="JABATAN" class="form-control" value="<?= $data->JABATAN_J ?>">
                </div>
                <div class="form-group">
                  <label>NIPP</label>
                  <input type="text" name="NIPP" id="NIPP" class="form-control" value="<?= $data->NIPP_J ?>">
                </div>
                <div class="form-group">
                  <label>TELEPON</label>
                  <input type="text" name="TELEPON" id="TELEPON" class="form-control" value="<?= $data->TELEPON_J ?>">
                </div>
                <div class="form-group">
                  <label>UNIT KERJA</label>
                  <input type="text" name="UNITKERJA" id="UNITKERJA" class="form-control" value="<?= $data->UNIT_KERJA_J ?>">
                </div>

                <label>
                  <h3>II. ISI</h3>
                </label>
                <div class="form-group">
                  <label>TANGGAL TTD</label>
                  <input type="date" name="DATE_TTD" id="DATE_TTD" class="form-control" value="<?= $data->DATE_TTD ?>">
                </div>
                <div class="form-group">
                  <label>ACARA</label>
                  <input type="text" name="ACARA" id="ACARA" class="form-control" value="<?= $data->ACARA_J ?>">
                </div>
                <div class="form-group">
                  <label>JUMLAH ORANG</label>
                  <input type="text" name="JUMLAH_J" id="JUMLAH_J" class="form-control" value="<?= $data->JUMLAH_J ?>" onkeyup="typingJumlah()">
                </div>
                <div class="form-group">
                  <label>RINCIAN PESANAN</label>
                  <textarea name="RINCIAN_PESANAN" id="RINCIAN_PESANAN" cols="30" rows="5" class="form-control"><?= $data->RINCIAN_PESANAN ?></textarea>
                </div>
                <div class="form-group">
                  <label>WAKTU</label>
                  <div class="row">
                    <div class="col-md-5"><input type="TIME" name="WAKTU_AWAL" id="WAKTU_AWAL" class="form-control" value="<?= $data->WAKTU_M ?>"></div>
                    <div class="col-md-1"><B>Sampai</B></div>

                    <div class="col-md-5"><input type="TIME" name="WAKTU_AKHIR" id="WAKTU_AKHIR" class="form-control" value="<?= $data->WAKTU_A ?>"></div>
                  </div>

                </div>
                <div class="form-group">
                  <label>TEMPAT PESANAN</label>
                  <textarea name="TEMPAT_J" id="TEMPAT_J" cols="30" rows="1" class="form-control"><?= $data->TEMPAT_J ?></textarea>
                </div>
                <div class="form-group">
                  <label>TANGGAL KEGIATAN</label>
                  <input type="DATE" name="TANGGAL" id="TANGGAL" class="form-control" value="<?= $data->DATE_J ?>">
                </div>
                <div class="form-group">
                  <label>VENDOR</label>
                  <input type="text" name="VENDOR" id="VENDOR" class="form-control" value="<?= $data->VENDOR ?>">
                </div>
                <div class="form-group">
                  <label>Jenis Jamuan</label>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="TAMU DINAS" name="JENIS_JAMUAN[]" <?php if (count($tamu_dinas) > 0) {
                                                                                        echo "checked";
                                                                                      } ?>>
                      TAMU DINAS
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="LEMBUR" name="JENIS_JAMUAN[]" <?php if (count($lembur) > 0) {
                                                                                    echo "checked";
                                                                                  } ?>>
                      LEMBUR
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="BANTUAN KONSUMSI" name="JENIS_JAMUAN[]" <?php if (count($bantuan_konsumsi) > 0) {
                                                                                              echo "checked";
                                                                                            } ?>>
                      BANTUAN KONSUMSI
                    </label>
                  </div>
                </div>

                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">

                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">
                    <textarea id="editor1" name="ISI" rows="10" cols="80">
                                                 <?= $data->ISI_J ?>
                          </textarea>

                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <?php if ($data->PROCESS != "APPROVE") { ?>
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
                      <option value="DRAFT">Simpan Draft</option>
                      <option value="KIRIM">KIRIM</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>KOMENTAR</label>
                    <textarea name="KOMENTAR" id="KOMENTAR" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                    <!-- <button class="btn bg-aqua">PREVIEW PDF</button> -->
                  </div>
                <?PHP } ?>
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

<script src="<?= base_url('assets/adminlte') ?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  function typingJumlah() {
    console.log('onpress')
  }
</script>