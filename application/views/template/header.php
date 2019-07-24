<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MA</b>IB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Maibro</b>.COM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Calendar -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar"></i>
                <span id="waktu" class="waktu"><?= tanggal_new() ?></span>
            </a>
          </li>

          <!-- Messages: style can be found in dropdown.less-->
          <!-- NOTIFIKASI -->
          <?php include 'notification.php' ?>
          <!-- END NOTIFIKASI -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('public').'/web/user-profile/'.$this->UserModels->getDetail($this->session->userdata('user_id'))->avatar; ?>" class="user-image" alt="User Image"/>
                <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('public').'/web/user-profile/'.$this->UserModels->getDetail($this->session->userdata('user_id'))->avatar; ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php
                    $namadepan = $this->session->userdata('first_name');
                    $namabelakang = $this->session->userdata('last_name');
                    echo $namadepan, ' ', $namabelakang
                    ?> 
                    <small>Last Login , <?php echo tgl_lengkap($this->session->userdata('old_last_login')); ?></small>
                  </p>
              </li>
              <!-- Menu Body -->
 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('auth/profile/' . $this->session->userdata('user_id')); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>


