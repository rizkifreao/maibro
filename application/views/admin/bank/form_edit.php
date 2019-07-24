<section class="content-header">
  <h1>
     Bank
     <small>Form edit informasi bank</small>  
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="<?=site_url('bank');?>"><i class="fa fa-dashboard"></i> Bank</a></li>
    <li><a href=""> Edit Form </a></li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- BOX Debitur -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form action="<?=base_url('');?>Bank/add" method="post" autocomplete="off" >
                        <div class="box-body">             
                            <div class="row">

                                <div class="col-md-6"><!-- Kolom 1 -->

                                    <!-- Nama Bank -->
                                    <div class="form-group <?=form_error('nama_bank') ? 'has-error' : ''; ?>">
                                        <label>Nama Bank</label>
                                        <input type="text" name="nama_bank" value="<?php echo set_value('nama_bank'); echo $nama_bank; ?>" class="form-control" placeholder="Masukan Nama Bank" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('nama_bank'); ?></span>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="form-group <?=form_error('email') ? 'has-error' : ''; ?>">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo set_value('email'); echo $email; ?>" class="form-control" placeholder="Masukan Email" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('email'); ?></span>
                                    </div>

                                <!-- Kolom 2 -->
                                <div class="col-md-6">
                                </div><!-- /.col 2 -->
                            </div><!-- /.row -->  
                        </div>
                    
                        <div class="box-footer">
                        <input type="hidden" name="id_bank" value="<?php echo $id_bank; ?>" /> 
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button> 
                        <a href="<?php echo site_url('debitur') ?>" class="btn btn-default">Batal</a>
                        </div>
                    </form>
                </div>
            </div> <!-- end box -->
        </div>
    </div>
</section>

<script>
$(function () {

    $('#tglLahir').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })

    $('#tglAkad').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })

    $('#tglRegis').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })

})
</script>