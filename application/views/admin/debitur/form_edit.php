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
            <!-- BOX Debitur -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <form action="<?=base_url('');?>debitur/add" method="post" autocomplete="off" >
                        <div class="box-body">             
                            <div class="row">

                                <div class="col-md-6"><!-- Kolom 1 -->

                                    <!-- KTP -->
                                    <div class="form-group <?=form_error('KTP') ? 'has-error' : ''; ?>">
                                        <label>Nomor KTP</label>
                                        <input type="number" name="KTP" value="<?php echo set_value('KTP'); echo $KTP; ?>" class="form-control" placeholder="Masukan Nomor KTP" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('KTP'); ?></span>
                                    </div>

                                    <!-- Nama Debitur -->
                                    <div class="form-group <?=form_error('debitur') ? 'has-error' : ''; ?>">
                                        <label>Nama Debitur</label>
                                        <input type="text" name="debitur" value="<?php echo set_value('debitur'); echo $nama_debitur; ?>" class="form-control" placeholder="Masukan Debitur" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('debitur'); ?></span>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="form-group <?=form_error('email') ? 'has-error' : ''; ?>">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo set_value('email'); echo $email; ?>" class="form-control" placeholder="Masukan Email" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('email'); ?></span>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="form-group <?=form_error('tglLahir') ? 'has-error' : ''; ?>">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="tglLahir" value="<?php echo set_value('tglLahir'); echo $tglLahir;?>" class="form-control pull-right" id="tglLahir" placeholder="Pilih Tanggal" required>
                                        </div>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('tglLahir'); ?></span>
                                    </div>

                                    <!-- ALAMAT -->
                                    <div class="form-group <?=form_error('alamat') ? 'has-error' : ''; ?>">
                                        <label>Alamat</label>
                                        <textarea type="text" name="alamat" value="<?php echo set_value('alamat');?>" class="form-control" placeholder="Masukan Alamat" required><?=$alamat;?></textarea>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('alamat'); ?></span>
                                    </div>    
                                </div><!-- /.col1 -->
                            

                                <!-- Kolom 2 -->
                                <div class="col-md-6">
                                    <!-- Jenis Kelamin -->
                                    <div class="form-group <?=form_error('jk') ? 'has-error' : ''; ?>">
                                        <label>Jenis Kelamin</label>
                                        <select name ="jk" value="<?php echo set_value('jk');?>"  class="form-control select2" style="width: 100%;" required>
                                            <option value="1">-- Piih --</option>
                                            <option value="Pria" <?=($jk == "Pria") ? 'selected' : '';?>>Pria</option>
                                            <option value="Wanita"<?=($jk == "Wanita") ? 'selected' : '';?> >Wanita</option>                                            
                                        </select>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('jk'); ?></span>
                                    </div>

                                    <!-- Nama Debitur -->
                                    <div class="form-group <?=form_error('tmp_lahir') ? 'has-error' : ''; ?>">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tmp_lahir" value="<?php echo set_value('tmp_lahir'); echo $tmp_lahir; ?>" class="form-control" placeholder="Masukan Kota Kelahiran" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('tmp_lahir'); ?></span> 
                                    </div>
                                    
                                    <!-- NOMOR TELEPON  -->
                                    <div class="form-group <?=form_error('tlp') ? 'has-error' : ''; ?>">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="tlp" class="form-control" value="<?php echo set_value('tlp'); echo $tlp; ?>" placeholder="Masukan Nomor Telepon" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('tlp'); ?></span>
                                    </div>   

                                    <!-- UMUR  -->
                                    <div class="form-group <?=form_error('umur') ? 'has-error' : ''; ?>">
                                        <label>Umur</label>
                                        <input type="number" name="umur" class="form-control" value="<?php echo set_value('umur'); echo $umur;?>" placeholder="Masukan Umur" required>
                                        <!-- validasi eror -->
                                        <span class="help-block"><?php echo form_error('umur'); ?></span>
                                    </div>          

                                </div><!-- /.col 2 -->
                            </div><!-- /.row -->  
                        </div>
                    
                        <div class="box-footer">
                        <input type="hidden" name="id_debitur" value="<?php echo $id_debitur; ?>" /> 
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