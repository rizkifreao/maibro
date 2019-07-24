<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->config->item("SITENAME")?></title>
  <link rel="icon" type="image/png" href="<?=base_url('public/web/img');?>/logo.png">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets');?>/adminLte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- <link rel="stylesheet" href="<?=base_url('assets');?>/datatables/datatables.min.css"> -->
  <!-- SweeAlert -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/sweetalert/dist/sweetalert.css">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" type="text/html" href="<?=base_url('assets');?>/font-awesome/css/font-awesome.min.css"> -->
  <link rel="stylesheet"  href="<?=base_url('assets');?>/adminLte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/dist/css//AdminLTE.min.css">
  <!-- /AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/dist/css/skins/_all-skins.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/plugins/iCheck/all.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Bootstrap Datepicker -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/plugins/iCheck/all.css">
  <!-- DataTables Checkboxes -->
  <link rel="stylesheet" type="application/javascript" href="<?=base_url('assets');?>dist/js/dataTables.checkboxes.min.js">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/dist/css//AdminLTE.min.css">
<!-- Uploader Dropzone -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/uploader/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/uploader/basic.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
@import url("<?= base_url('assets');?>/adminLte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");
 td.details-control {
    background: url('<?= base_url('assets');?>/adminLte/bower_components/datatables.net-bs/css/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('<?= base_url('assets');?>/adminLte/bower_components/datatables.net-bs/css/details_close.png') no-repeat center center;
    cursor: pointer;
}
</style>
     
  <!-- jQuery 3 -->
  <script src="<?=base_url('assets');?>/adminLte/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?=base_url('assets');?>/adminLte/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Uploader Dropdone js -->
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/uploader/dropzone.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/dist/css/font.googleapis.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo $_header; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $_sidebar; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
      
        echo $_content;
      
    ?>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- <script src="<?=base_url('assets');?>/font-awesome/js/all.js"></script> -->

<!-- <script src="<?=base_url('assets');?>/datatables/datatables.min.js"></script> -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sweetallert -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/sweetalert/dist/sweetalert.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url('assets');?>/adminLte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url('assets');?>/adminLte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url('assets');?>/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('assets');?>/adminLte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/fastclick/lib/fastclick.js"></script>

<!-- DataTables Checkboxes -->
<!-- <script src="<?=base_url('assets');?>dist/js/dataTables.checkboxes.min.js"></script> -->
<!-- InputMask -->
<script src="<?=base_url('assets');?>/adminLte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url('assets');?>/adminLte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url('assets');?>/adminLte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- /AdminLTE App -->
<script src="<?=base_url('assets');?>/adminLte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets');?>/adminLte/dist/js/demo.js"></script>

<?php if ($this->session->flashdata('failed')){ ?>
    <script>
    // Dialog Eror ketika edit tapi tidak ada datanya
    jQuery(document).ready(function($){
        swal({
            title: "Error !!!",
            text: "<?php echo $this->session->flashdata('failed'); ?>",
            html: true,
            // timer: 1500,
            showCancelButton: false,
            type: 'error'
        });
    });
    </script>
<?php } else if ($this->session->flashdata('sucsess')) { ?>
    <script>
    // Dialog Eror ketika edit tapi tidak ada datanya
    jQuery(document).ready(function($){
        swal({
            title: "Berhasil !!!",
            text: "<?php echo $this->session->flashdata('sucsess'); ?>",
            html: true,
            // timer: 1500,
            showCancelButton: false,
            type: 'success'
        });
    });
    </script>
<?php } else if ($this->session->flashdata('info')) { ?>
    <script>
    // Dialog Eror ketika edit tapi tidak ada datanya
    jQuery(document).ready(function($){
        swal({
            title: "Informasi !!!",
            text: "<?php echo $this->session->flashdata('info'); ?>",
            html: true,
            // timer: 1500,
            showCancelButton: false,
            type: 'info'
        });
    });
    </script>
<?php } ?>

  <script>
    function restore() {
      alert("Berhasil");
    }
    
    $(document).ready(function(){

      $('#restore').on('click', function() {
        var $this = $(this);
        var loadingText = '<i class="fa fa-spinner fa-spin"></i> loading...';
        if ($(this).html() !== loadingText) {
          $this.data('original-text', $(this).html());
          $this.html(loadingText);
        }
        setTimeout(function() {
          $this.html($this.data('original-text'));
          location.reload();
          alert("Berhasil restore database");
        }, 8000);
      });
    }); 
  </script>

</body>
</html>
