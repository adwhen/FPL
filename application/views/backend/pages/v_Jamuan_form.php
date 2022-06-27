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
        <form method="POST" action="<?= base_url('index.php/Reception/save') ?>" enctype="multipart/form-data">
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
                  <input type="text" name="USER" id="USER" class="form-control" value="<?= $this->session->userdata('username') ?>">
                </div>
                <div class="form-group">
                  <label>JABATAN</label>
                  <input type="text" name="JABATAN" id="JABATAN" class="form-control" value="<?= $this->session->userdata('jabatan') ?>">
                </div>
                <div class="form-group">
                  <label>NIPP</label>
                  <input type="text" name="NIPP" id="NIPP" class="form-control" value="<?= $this->session->userdata('nipp') ?>">
                </div>
                <div class="form-group">
                  <label>TELEPON</label>
                  <input type="text" name="TELEPON" id="TELEPON" class="form-control" value="<?= $this->session->userdata('telpon_user') ?>">
                </div>
                <div class="form-group">
                  <label>UNIT KERJA</label>
                  <input type="text" name="UNITKERJA" id="UNITKERJA" class="form-control" value="<?= $this->session->userdata('unit_kerja') ?>">
                </div>

                <label>
                  <h3>II. ISI</h3>
                </label>
                <div class="form-group">
                  <label>TANGGAL TTD</label>
                  <input type="DATE" name="DATE_TTD" id="DATE_TTD" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="form-group">
                  <label>ACARA</label>
                  <input type="text" name="ACARA" id="ACARA" class="form-control">
                </div>
                <div class="form-group">
                  <label>RINCIAN PESANAN</label>
                  <textarea name="RINCIAN_PESANAN" id="RINCIAN_PESANAN" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>TANGGAL KEGIATAN</label>
                  <input type="DATE" name="TANGGAL" id="TANGGAL" class="form-control">
                </div>
                <div class="form-group">
                  <label>VENDOR</label>
                  <input type="text" name="VENDOR" id="VENDOR" class="form-control" value="Ketua Koperasi Konsumen Suaka Bahari Pelabuhan">
                </div>
                <div class="form-group">
                  <label>Jenis Jamuan</label>
                  <div class="row container">
                    <div class="col-md-2">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="TAMU DINAS" name="JENIS_JAMUAN[]">
                          TAMU DINAS
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="LEMBUR" name="JENIS_JAMUAN[]">
                          LEMBUR
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="BANTUAN KONSUMSI" name="JENIS_JAMUAN[]">
                          BANTUAN KONSUMSI
                        </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="RAPAT INTERNAL" name="JENIS_JAMUAN[]">
                          RAPAT INTERNAL
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="RAPAT EKSTERNAL" name="JENIS_JAMUAN[]">
                          RAPAT EKSTERNAL
                        </label>
                      </div>
                    </div>
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
                    <form>
                      <textarea id="editor1" name="ISI" rows="10" cols="80">
                                                 <table border="1" cellpadding="1" cellspacing="1" style="width:600px">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col" align="center" style="width:20%">WAKTU</th>
                                                        <th scope="col" align="center" style="width:20%">JUMLAH ORANG</th>
                                                        <th scope="col" align="center" style="width:50%">JAMUAN</th>
                                                        <th scope="col" align="center" style="width:20%">TEMPAT</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td style="width:20%">
                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>
                                                        </td>
                                                        <td style="width:20%">
                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>
                                                        </td>
                                                        <td style="width:50%">
                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                                        </td>
                                                        <td style="width:20%">
                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                          </textarea>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-4">

                <!-- /.form-group -->
                <div class="form-group">
                  <label>ATTACHMENT</label>
                  <input type="text" name="LINK" id="LINK" class="form-control" placeholder="link">
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