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
        <form method="POST" action="<?= base_url('index.php/Loan/save') ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">


                <label>
                  <h3>I. IDENTITAS PEMINJAM</h3>
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
                <!-- <div class="form-group">
                <label>PINJAM KENDARAAN OPERASIONAL</label>
                <select class="form-control" name="PINJAM_KENDARAAN" id="PINJAM_KENDARAAN">
                    <?php foreach ($jenis_kendaraan as $jk) { ?>
                            <option><?= $jk->NAMA_JK ?></option>
                    <?php } ?>
                </select>
              </div> -->
                <div class="form-group">
                  <label>PADA HARI/TANGGAL</label>
                  <input type="DATE" name="TANGGAL" id="TANGGAL" class="form-control">
                </div>
                <div class="form-group">
                  <label>JAM</label>
                  <div class="row">
                    <div class="col-md-5"><input type="time" name="WAKTU" id="WAKTU" class="form-control"></div>
                    <div class="col-md-2">Sampai dengan</div>
                    <div class="col-md-5"><input type="time" name="WAKTU2" id="WAKTU2" class="form-control"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label>TEMPAT TUJUAN</label>
                  <textarea name="TUJUAN" id="TUJUAN" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>KEPERLUAN ACARA</label>
                  <textarea name="KEPERLUAN" id="KEPERLUAN" class="form-control"></textarea>
                </div>
                <label>
                  <h3>III. PINJAM KENDARAAN OPERASIONAL</h3>
                </label>
                <div class="form-group">
                  <label>JENIS KENDARAAN</label>
                  <!-- <input type="text" name="JENIS_KENDARAAN" id="JENIS_KENDARAAN" class="form-control"> -->
                  <select class="form-control" name="PINJAM_KENDARAAN" id="PINJAM_KENDARAAN">
                    <option value="">Choose</option>
                    <?php foreach ($jenis_kendaraan as $jk) { ?>
                      <option><?= $jk->NAMA_JK ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>NAMA PENGEMUDI</label>
                  <input type="text" name="PENGEMUDI" id="PENGEMUDI" class="form-control">
                </div>
                <div class="form-group">
                  <label>KM AWAL</label>
                  <input type="NUMBER" name="SPEEDO_AWAL" id="SPEEDO_AWAL" class="form-control">
                </div>
                <div class="form-group">
                  <label>KM AKHIR</label>
                  <input type="NUMBER" name="SPEEDO_AKHIR" id="SPEEDO_AKHIR" class="form-control" placeholder="Diisi Setelah Pengambalian" readonly>
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
                  <!-- <button type="button" class="btn bg-aqua" onclick="preview()">PREVIEW PDF</button> -->
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
<script type="text/javascript">
  function preview() {
    var USER = $('#USER').val()
    var JABATAN = $('#JABATAN').val()
    var NIPP = $('#NIPP').val()
    var TELEPON = $('#TELEPON').val()
    var UNITKERJA = $('#UNITKERJA').val()
    var PINJAM_KENDARAAN = $('#PINJAM_KENDARAAN').val()
    var TANGGAL = $('#TANGGAL').val()
    var WAKTU = $('#WAKTU').val()
    var WAKTU2 = $('#WAKTU2').val()
    var TUJUAN = $('#TUJUAN').val()
    var JENIS_KENDARAAN = $('#JENIS_KENDARAAN').val()
    var PENGEMUDI = $('#PENGEMUDI').val()
    var SPEEDO_AWAL = $('#SPEEDO_AWAL').val()
    var SPEEDO_AKHIR = $('#SPEEDO_AKHIR').val()
    alert(SPEEDO_AWAL)

  }
</script>