  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>SIM</b>SDM</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if ($this->uri->segment(1) == "Dashboard") {
                  echo 'class="active"';
                } ?>><a href="<?= base_url('index.php/Dashboard') ?>">Dashboard <span class="sr-only">(current)</span></a></li>
            <li <?php if ($this->uri->segment(1) == "Pelayanan_umum") {
                  echo 'class="active"';
                } ?>><a href="<?= base_url('index.php/Pelayanan_umum') ?>">Pel. Umum</a></li>
            <li <?php if ($this->uri->segment(1) == "Loan") {
                  echo 'class="active"';
                } ?>><a href="<?= base_url('index.php/Loan') ?>">Peminjaman</a></li>
            <li <?php if ($this->uri->segment(1) == "Reception") {
                  echo 'class="active"';
                } ?>><a href="<?= base_url('index.php/Reception') ?>">Jamuan</a></li>
            <li <?php if ($this->uri->segment(1) == "Accomodation") {
                  echo 'class="active"';
                } ?>><a href="<?= base_url('index.php/Accomodation') ?>">Akomodasi</a></li>
            <li <?php if ($this->uri->segment(1) == "Report") {
                  echo 'class="active"';
                } ?>>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('index.php/master/employee')?>">Pegawai</a></li>
                <!-- <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li> -->
              </ul>
            </li>
          </ul>
          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form> -->
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">


            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('assets/') ?>logo.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= $this->session->userdata('nipp') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?= base_url('assets/') ?>logo.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->session->userdata('username') ?> - <?= $this->session->userdata('jabatan') ?>
                    <small><?= $this->session->userdata('telpon_user') ?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <a href="#"><?= $this->session->userdata('unit_kerja') ?></a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="<?= base_url('index.php/welcome/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>