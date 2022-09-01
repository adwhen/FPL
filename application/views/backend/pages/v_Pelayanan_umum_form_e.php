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
            <h2 class="box-title">FORMULIR PERMOHONAN PELAYANAN UMUM REGIONAL 2 BENGKULU</h2>
          </center>
          <div class="box-tools pull-right">
            <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <form method="POST" action="<?= base_url('index.php/Pelayanan_umum/save_edit/' . $this->uri->segment(3)) ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">

                <div class="form-group">
                  <label>Nomor</label>
                  <input readonly type="text" name="NOMOR" id="NOMOR" class="form-control" value="<?= $data->NOMOR_UMUM ?>">
                </div>
                <label>
                  <h3>I. IDENTITAS PEMOHON</h3>
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
                  <input type="text" name="JABATAN" id="JABATAN" class="form-control" value="<?= $data->JABATAN ?>">
                </div>
                <div class="form-group">
                  <label>NIPP</label>
                  <input type="text" name="NIPP" id="NIPP" class="form-control" value="<?= $data->NIPP ?>">
                </div>
                <div class="form-group">
                  <label>TELEPON</label>
                  <input type="text" name="TELEPON" id="TELEPON" class="form-control" value=" <?= $data->TELEPON_UMUM ?>">
                </div>
                <div class="form-group">
                  <label>UNIT KERJA</label>
                  <input type="text" name="UNITKERJA" id="UNITKERJA" class="form-control" value="<?= $data->UNIT_KERJA ?>">
                </div>

                <label>
                  <h3>II. ISI</h3>
                </label>
                <div class="form-group">
                  <label>PERMOHONAN PELAYANAN UMUM</label>
                  <input type="text" name="PERMOHONAN" id="PERMOHONAN" class="form-control" value="<?= $data->PERMOHONAN_UMUM ?>">
                </div>
                <div class="form-group">
                  <label>PADA HARI/TANGGAL</label>
                  <input type="DATE" name="TANGGAL" id="TANGGAL" class="form-control" value="<?= $data->DATE_UMUM ?>">
                </div>
                <div class="form-group">
                  <label>JAM</label>
                  <input type="time" name="WAKTU" id="WAKTU" class="form-control" value="<?= $data->TIME_UMUM ?>">
                </div>
                <div class="form-group">
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
                  <!-- <input type="text" name="BENTUKPERMOHONAN" id="BENTUKPERMOHONAN" class="form-control" value="<?= $data->BENTUK_UMUM ?>"> -->
                </div>
                <div class="form-group">
                  <label>TUJUAN/KEPERLUAN</label>
                  <textarea name="TUJUAN" id="TUJUAN" class="form-control"><?= $data->TUJUAN_UMUM ?></textarea>
                </div>
                <div class="form-group">
                  <label>RINCIAN PESANAN</label>
                  <textarea name="RINCIAN" id="RINCIAN" class="form-control"><?= $data->RINCIAN_PESANAN ?></textarea>
                </div>
                <div class="form-group">
                  <label>VENDOR</label>
                  <input type="text" name="VENDOR" id="VENDOR" class="form-control" value="<?= $data->VENDOR ?>">
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
<script>
  $(document).ready(function() {
    $("#BENTUKPERMOHONAN").val('<?= $data->BENTUK_UMUM ?>')
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