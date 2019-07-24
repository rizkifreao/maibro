<section class="content-header">
  <h1>
     Debitur
     <small>Form Debitur</small>  
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="<?=site_url('debitur');?>"><i class="fa fa-dashboard"></i> Debitur</a></li>
    <li><a href=""> Buat Baru </a></li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <form action="<?=base_url('');?>debitur/add" method="post" autocomplete="off" >
                <!-- BOX Debitur -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> Form data satuan</h3>

                        <div class="box-tools pull-right">
                        <button name="simpan" href="" class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                                        
                        <div class="row">
                            <div class="col-md-6"><!-- Kolom 1 -->

                                <!-- Tanggal Registrasi -->
                                <div class="form-group">
                                    <label>Tanggal Registrasi</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tglRegis" value="<?php echo set_value('tglRegis'); ?>" class="form-control pull-right" id="tglRegis" placeholder="Pilih Tanggal" required>
                                    </div>

                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('tglRegis', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>

                                <!-- Nomor Kredit -->
                                <div class="form-group">
                                    <label>Nomor Kredit</label>
                                    <input type="number" name="nomorKredit" value="<?php echo set_value('nomorKredit');?>" class="form-control" placeholder="Masukan Nomor Kredit"required>
                                        <!-- validasi eror -->
                                        <div class="allert alert-danger">
                                            <ul class="list-unstyled">
                                                <li><?php echo form_error('nomorKredit', '<div class="error">', '</div>'); ?> </li>
                                            </ul>
                                        </div> 
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tglLahir" value="<?php echo set_value('tglLahir'); ?>" class="form-control pull-right" id="tglLahir" placeholder="Pilih Tanggal" required>
                                    </div>
                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('tglLahir', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>

                                <!-- Masa Kredit -->
                                <div class="form-group">
                                    <label>Masa Kredit</label>
                                    <input type="number" name="masaKredit" value="<?php echo set_value('masaKredit'); ?>" class="form-control" placeholder="Masukan masa kredit" required>
                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('masaKredit', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>           
                            </div><!-- /.col1 -->
                        

                            <!-- Kolom 2 -->
                            <div class="col-md-6">
                                <!-- Jenis Asuransi -->
                                <div class="form-group">
                                    <label>Jenis Asuransi</label>
                                    <select name ="jenis_asuransi" value="<?php echo set_value('jenis_asuransi'); ?>"  class="form-control select2" style="width: 100%;" required>
                                        <option value="1">-- Piih --</option>
                                        <option value="INDEMNITY">INDEMNITY</option>
                                        <option value="UP TETAP">UP TETAP</option>
                                        <option value="INDEMNITY + PHK">INDEMNITY + PHK</option>
                                        <option value="UP TETAP + PHK">UP TETAP + PHK</option>
                                        <option value="KREDIT MULTIGUNA">KREDIT MULTIGUNA</option>
                                        
                                    </select>
                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('jenis_asuransi', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>

                                <!-- Nama Debitur -->
                                <div class="form-group">
                                    <label>Debitur</label>
                                    <input type="text" name="debitur" value="<?php echo set_value('debitur'); ?>" class="form-control" placeholder="Masukan Debitur" required>
                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('debitur', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>
                                
                                <!-- Tanggal Akad Kredit -->
                                <div class="form-group">
                                    <label>Tanggal Akad Kredit</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                            <input type="text" name="tglAkad" value="<?php echo set_value('tglAkad'); ?>" class="form-control pull-right" id="tglAkad" placeholder="Pilih Tanggal" required>
                                    </div>
                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('tglAkad', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>

                                <!-- Masa Kredit -->
                                <div class="form-group">
                                    <label>Plafon</label>
                                    <input type="number" name="plafon" class="form-control" value="<?php echo set_value('plafon'); ?>" placeholder="Masukan plafon pinjaman" required>
                                    <!-- validasi eror -->
                                    <div class="allert alert-danger">
                                        <ul class="list-unstyled">
                                            <li><?php echo form_error('plafon', '<div class="error">', '</div>'); ?> </li>
                                        </ul>
                                    </div> 
                                </div>          

                            </div><!-- /.col 2 -->
                        </div><!-- /.row -->  
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                    </div>
                </div> <!-- end box -->
            </form>
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