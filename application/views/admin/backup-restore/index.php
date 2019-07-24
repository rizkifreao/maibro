<section class="content-header">
  <h1>
     Sistem Backup dan Restore
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
    <li><a href="<?=site_url('');?>Utilitas"> Backup & Restore </a></li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                <!-- BACUP TABEL -->
                <h3 class="box-title">Backup Tabel</h3>
                </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                <form action="<?php echo base_url();?>utilitas/backupTable" method="post">
                    <div class="box-body">
                    <div class="form-group">
                    <label>Pilih Tabel</label>
                    <select class="form-control" name="tabel">
                        <?php
                            foreach ($tabel as $baris) {  ?>
                                <option value="<?php echo $baris->Tables_in_maibro; ?>"><?php echo $baris->Tables_in_maibro; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Backup Tabel</button>
                        <a href="<?php echo base_url();?>utilitas/backupDB" class="btn btn-success">Backup semua tabel</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Restore Database</h3>
                </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                <?php //echo form_open_multipart('utilitas/restore');?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Pilih File Restore</label>
                            <input type="file" id="datafile" name="datafile">

                            <p class="help-block">File harus dalam format .sql</p>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" id="restore" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing Order">Restore Database</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  $(document).ready(function(){
 
    // progressbar 1
    $( "#progressbar" ).progressbar({
      value: 37
    });
 
    // progressbar 2
    function backupSistem()
    {

    }
 
    
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + 2 );
 
      if ( val < 99 ) {
        setTimeout( progress, 80 );
      }
    }
 
    setTimeout( progress, 2000 );
 
    // progressbar 3
    var progressTimer,
    progressbar = $( "#progressbar3" ),
    progressLabel = $( ".progress-label" ),
    dialogButtons = [{
      text: "Cancel Download",
      click: closeDownload
    }],
    dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      closeOnEscape: false,
      resizable: false,
      buttons: dialogButtons,
      open: function() {
        progressTimer = setTimeout( progress, 2000 );
      },
      beforeClose: function() {
        downloadButton.button( "option", {
          disabled: false,
          label: "Start Download"
        });
      }
    }),
    downloadButton = $( "#downloadButton" )
    .button()
    .on( "click", function() {
      $( this ).button( "option", {
        disabled: true,
        label: "Downloading..."
      });
      dialog.dialog( "open" );
    });
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( "Current Progress: " + progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Complete!" );
        dialog.dialog( "option", "buttons", [{
          text: "Close",
          click: closeDownload
        }]);
        $(".ui-dialog button").last().focus();
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + Math.floor( Math.random() * 3 ) );
 
      if ( val <= 99 ) {
        progressTimer = setTimeout( progress, 50 );
      }
    }
 
    function closeDownload() {
      clearTimeout( progressTimer );
      dialog
      .dialog( "option", "buttons", dialogButtons )
      .dialog( "close" );
      progressbar.progressbar( "value", false );
      progressLabel
      .text( "Starting download..." );
      downloadButton.focus();
    }
  });
</script>