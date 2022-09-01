  <div class="content-wrapper">
    <div class="container ">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Version 0.0.1</small>
        </h1>
      </section>

      <!-- Main content -->
      <div class="row box">
        <section class="content">
          <div class="col-lg-3 col-xs-6 ">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h4><B>INNOVA</B></h4>

                <p><?php if(!empty($kendaraan[0]['PEMINJAM'])){echo 'Not Ready';}else{echo "Ready";}?></p>
              </div>
              <div class="icon" style="padding-top:10px">
                <i class="fa fa-car"></i>
              </div>
              <a href="#" class="small-box-footer"> <?php if(!empty($kendaraan[0]['PEMINJAM'])){echo $kendaraan[0]['PEMINJAM'];}else{echo "-";}?> </a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6 ">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h4><B>AVANZA</B></h4>
                <p><?php if(!empty($kendaraan[1]['PEMINJAM'])){echo 'Not Ready';}else{echo "Ready";}?></p>
              </div>
              <div class="icon" style="padding-top:10px">
                <i class="fa fa-car"></i>
              </div>
              <a href="#" class="small-box-footer"> <?php if(!empty($kendaraan[1]['PEMINJAM'])){echo $kendaraan[0]['PEMINJAM'];}else{echo "-";}?> </a>
            </div>
          </div>
        </section>
      </div>
      <div class="row box">
        <div class="box-body">
          <table class="table table-bordered table-striped">
          <thead>
            <th>No</th>
            <th>Peminjam</th>
            <th>Kendaraan</th>
            <th>Tanggal - Waktu</th>
          </thead>
          <tbody>
            <?php $x=1; foreach($peminjam as $dt){ ?>
            <tr>
              <td><?=$x++?></td>
              <td><?=$dt['NAMA_PK']?></td>
              <td><?=$dt['PINJAM_KENDARAAN']?></td>
              <td><?=$dt['TIME_PK_AWAL']?>-<?=$dt['TIME_PK_AKHIR']?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table></div>
        
      </div>

      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
