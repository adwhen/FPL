<div id="form_add" style="display: none;">
<div class="content-wrapper">
  <div class="container">
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <center>
            <h2 class="box-title">PT. PELABUHAN INDONESIA (PERSERO)<br>Data Karyawan</h2>
          </center>
          <div class="box-tools pull-right">
            <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <form method="POST" action="<?= base_url('index.php/Master/save_employee') ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Karyawan*</label>
                  <input type="text" name="NAMA" id="NAMA" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>JABATAN*</label>
                  <input type="text" name="JABATAN" id="JABATAN" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>NIPP*</label>
                  <input type="text" name="NIPP" id="NIPP" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>TELEPON*</label>
                  <input type="text" name="TELEPON" id="TELEPON" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>UNIT KERJA*</label>
                  <select name="UNIT_KERJA" id="UNIT_KERJA" class="form-control">
                    <option>CHOOSE</option>
                    <?php foreach($unit_kerja as $uk){ ?>
                    <option><?= $uk->NAMA_UK ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- <div class="form-group">
                  <label>USERNAME*</label>
                  <input type="text" name="USERNAME" id="USERNAME" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>PASSWORD</label>
                  <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" value="">
                </div>
                 -->
            
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </form>
        <!-- /.box-body -->
        <div class="box-footer">
        <div class="form-group">
                  <button class="btn btn-primary" type="submit">SUBMIT</button>
                  <!-- <button class="btn bg-aqua">PREVIEW PDF</button> -->
                </div>
        </div>  
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.container -->
</div>

<script src="<?= base_url('assets/adminlte') ?>/bower_components/ckeditor/ckeditor.js"></script>
</div>