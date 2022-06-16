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

      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
