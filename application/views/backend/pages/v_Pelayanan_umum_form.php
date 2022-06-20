<link rel="stylesheet" href="<?= base_url() ?>assets/projecta/style.css">
<div class="content-wrapper">
  <div class="container">
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <center>
            <h2 class="box-title">FORMULIR PERMOHONAN PELAYANAN UMUM REGIONAL 2 BENGKULU</h2>
          </center>
          <div class="box-tools pull-right">
            <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <form id="form" method="POST" action="<?= base_url('index.php/pelayanan_umum/save') ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">

                <div class="form-group">
                  <label>Nomor</label>
                  <input type="text" name="NOMOR" id="NOMOR" class="form-control" readonly value="XX.XX/XX/XX/XX/X.XXX-XX">
                </div>
                <label>
                  <h3>I. IDENTITAS PEMOHON</h3>
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
                  <label>PERMOHONAN PELAYANAN UMUM</label>
                  <input type="text" name="PERMOHONAN" id="PERMOHONAN" class="form-control">
                </div>
                <div class="form-group">
                  <label>PADA HARI/TANGGAL</label>
                  <input type="DATE" name="TANGGAL" id="TANGGAL" class="form-control">
                </div>
                <div class="form-group">
                  <label>JAM</label>
                  <input type="time" name="WAKTU" id="WAKTU" class="form-control">
                </div>
                <div class="autocomplete form-group ">
                  <label>BENTUK PERMOHONAN</label>
                  <select class="form-control" name="BENTUKPERMOHONAN" id="BENTUKPERMOHONAN" required>
                    <option value="0">--Choose--</option>
                    <option>Karangan Bunga</option>
                    <option>Pembelian Barang</option>
                    <option>Pembelian Souvenir</option>
                    <option>Pemberian Bantuan Proposal Kegiatan</option>
                    <option>Tagihan Toko Stok Per Bagian Regional</option>
                    <option>Penggantian BBM</option>
                    <option>Lain-lain</option>
                  </select>
                  <!-- <input type="text" name="BENTUKPERMOHONAN" id="BENTUKPERMOHONAN" class="form-control"> -->
                </div>
                <div class="form-group">
                  <label>TUJUAN/KEPERLUAN</label>
                  <textarea name="TUJUAN" id="TUJUAN" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>RINCIAN PESANAN</label>
                  <textarea name="RINCIAN" id="RINCIAN" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>VENDOR</label>
                  <input type="text" name="VENDOR" id="VENDOR" class="form-control" value="Ketua Koperasi Konsumen Suaka Bahari Pelabuhan">
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
                  <button class="btn btn-primary" type="button" onclick="SAVE()">SUBMIT</button>
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

<script type="text/javascript">
  function SAVE() {
    var nomor = $("#NOMOR").val()
    var user = $("#USER").val()
    var jabatan = $("#JABATAN").val()
    var nipp = $("#NIPP").val()
    var telepon = $("#TELEPON").val()
    var unitkerja = $("#UNITKERJA").val()
    var pemohonan = $("#PERMOHONAN").val()
    var tanggal = $("#TANGGAL").val()
    var waktu = $("#WAKTU").val()
    var bentukpermohonan = $("#BENTUKPERMOHONAN").val()
    var tujuan = $("#TUJUAN").val()
    if (bentukpermohonan == 0) {
      $("#BENTUKPERMOHONAN").focus()
    } else {
      $("#form").submit()
    }
  }
</script>
<script src="<?= base_url() ?>assets/projecta/autocomplete.js"></script>
<!-- <script>
  var data = ["Karangan Bunga", "Pembelian Barang", "Pembelian Souvenir", "Pemberian Bantuan Proposal Kegiatan", "Tagihan Toko per Bagian Regional", "Pergantian BBM", "Lain-lain"];

  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("BENTUKPERMOHONAN"), data);
</script> -->