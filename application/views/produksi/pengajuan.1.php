<?php
$Debiturs = $this->DebiturModels->getAll();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     Pegajuan Klaim
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?=site_url('');?>"> Asuransi Jiwa </a></li>
    <li><a href=""> Pengajuan Klaim </a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">


    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="pull-right">
            <!-- <a href="<?=site_url("Cetak/workorder/$data->workorderid")?>" class="btn btn-success"><i class="fa fa-print"></i></a> -->
          </div>
        </div>
        <div class="box-header">
          <?php if($this->session->flashdata("warning")): ?>
            <div class="col-md-12">
              <div class="alert alert-warning" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <?=$this->session->flashdata("warning")?>
              </div>
            </div>
          <?php endif; ?>

          <?php // if(!$data->status): ?>
            <div class="col-md-12">
              <div class="text-center">
                <a href="<?php //= site_url('Workorder/batal/').$data->workorderid;?>" class="btn btn-danger">BATAL</a>
                <a href="<?php //=site_url('Workorder/save/').$data->workorderid;?>" class="btn btn-success">SIMPAN</a>
                <a href="<?php //=site_url('Workorder/kirim/').$data->workorderid;?>" class="btn btn-success">KIRIM KE BROKER</a>
                <!-- <a href="" data-toggle="modal" data-target="#modalEnd"  class="btn btn-success">SELESAI</a> -->
              </div>
            </div>
          <?php // endif; ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row form-horizontal">
              <div class="col-md-6">
              <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Nomor KTP</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="KTP" name="KTP" value="<?=$debitur->KTP?>" disabled="">
                  </div>
                </div>            
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Nama Debitur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_debitur" name="nama_debitur" value="<?=$debitur->nama_debitur?>" disabled="">
                  </div>
                </div>        
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Email Debitur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_debitur" name="nomor_kredit" value="<?=$debitur->email_debitur?>" disabled="" >
                  </div>
                </div>   
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Jenis Kredit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jenis_kelamin" name="nomor_kredit" value="<?=$debitur->jenis_kelamin?>" disabled="" >
                  </div>
                </div>    
              </div> 
            <!-- KOLOM 2 -->
              <div class="col-md-6"> 
                <div class="form-group">
                  <label for="tmp_lahir" class="col-sm-4 control-label">Tempat Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?=$debitur->tmp_lahir?>" disabled="">
                  </div>
                </div>          
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=date('d F Y',strtotime($debitur->tgl_lahir))?>" disabled="" >
                  </div>
                </div>        
                <div class="form-group">
                  <label for="umur" class="col-sm-4 control-label">Umur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?=$debitur->umur?>" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="alamat" name="alamat" value="" disabled=""><?=$debitur->alamat?></textarea>
                  </div>
                </div>    
              </div>        
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <!-- ============== FORM PENGAJUAN ====================== -->
    
    <div class="col-xs-12">
      <form action="<?=base_url('');?>klaimjiwa/add" method="post" autocomplete="off" >
        
        <!-- BOX Debitur -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-text"></i> Form pengajuan klaim</h3>
                <input type="hidden" name="id_debitur" class="form-control" value="<?php echo set_value('id_debitur'); echo $debitur->id_debitur; ?>">
                <div class="box-tools pull-right">
                <!-- <button name="simpan" href="" class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button> -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                                
                <div class="row">
                    <div class="col-md-6"><!-- Kolom 1 -->

                        <!-- Nomor Kredit -->
                        <div class="form-group <?=form_error('nokredit') ? 'has-error' : ''; ?>">
                            <label>Nomor Kredit</label>
                            <input type="number" name="nokredit" class="form-control" value="<?php echo set_value('nokredit'); echo $nokredit; ?>" placeholder="Masukan Nomor Kredit" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('nokredit'); ?></span>
                        </div>   

                        <!-- MASA KREDIT -->
                        <div class="form-group <?=form_error('tenor') ? 'has-error' : ''; ?>">
                            <label>Masa Kredit</label>
                            <input type="number" name="tenor" class="form-control" value="<?php echo set_value('tenor'); echo $tenor; ?>" placeholder="Masukan Masa Kredit" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tenor'); ?></span>
                        </div> 

                        <!-- PLAFON PINJAMAN -->
                        <div class="form-group <?=form_error('tenor') ? 'has-error' : ''; ?>">
                            <label>Plafon Pinjaman</label>
                            <input type="number" name="tenor" class="form-control" value="<?php echo set_value('tenor'); echo $tenor; ?>" placeholder="Masukan Plafon Pinjaman" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tenor'); ?></span>
                        </div> 

                        <!-- PREMI -->
                        <div class="form-group <?=form_error('premi') ? 'has-error' : ''; ?>">
                            <label>Premi</label>
                            <input type="number" name="premi" class="form-control" value="<?php echo set_value('premi'); echo $premi; ?>" placeholder="Masukan Premi" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('premi'); ?></span>
                        </div> 

                        <!-- Nomor Kredit -->
                        <div class="form-group <?=form_error('nilai_klaim') ? 'has-error' : ''; ?>">
                            <label> Jumlah Klaim</label>
                            <input type="number" name="nilai_klaim" class="form-control" value="<?php echo set_value('nilai_klaim'); echo $nilai_klaim; ?>" placeholder="Masukan Jumlah Klaim" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('nilai_klaim'); ?></span>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputFile">Surat Kepesertaan (e-policy)</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">Surat Keterangan Kematian</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">KTP Identitas Debitur</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block"></p>
                        </div>

                    </div><!-- /.col1 -->
                

                    <!-- ===============================================  KOLOM 2 ==================================================== -->
                    <div class="col-md-6">
                        <!-- Jenis Asuransi -->
                        <div class="form-group <?=form_error('jns_kredit') ? 'has-error' : ''; ?>">
                            <label>Jenis Kredit</label>
                            <select name ="jns_kredit" value="<?php echo set_value('jns_kredit');?>"  class="form-control select2" style="width: 100%;" required>
                                <option value="1">-- Piih --</option>
                                <option value="INDEMNITY" <?=($jns_kredit) ? 'selected':''?>>INDEMNITY</option>
                                <option value="UP TETAP"<?=($jns_kredit) ? 'selected':''?> >UP TETAP</option>                                            
                            </select>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('jns_kredit'); ?></span>
                        </div>

                        <div class="form-group <?=form_error('jns_klaim') ? 'has-error' : ''; ?>">
                            <label>Jenis Klaim</label>
                            <select name ="jns_klaim" value="<?php echo set_value('jns_klaim');?>"  class="form-control select2" style="width: 100%;" required>
                                <option value="1">-- Piih --</option>
                                <option value="MENINGGAL NORMAL" <?=($jns_klaim) ? 'selected':''?>>MENINGGAL NORMAL</option>
                                <option value="MENINGGAL KECELAKAAN"<?=($jns_klaim) ? 'selected':''?> >MENINGGAL KECELAKAAN</option> 
                                <option value="MACET / PHK"<?=($jns_klaim) ? 'selected':''?> >MACET / PHK</option>                                            
                            </select>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('jns_klaim'); ?></span>
                        </div>
                        
                        <div class="form-group <?=form_error('tgl_akad') ? 'has-error' : ''; ?>">
                            <label>Tanggal Akad Kredit</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tgl_akad" value="<?php echo set_value('tgl_akad'); echo $tgl_akad;?>" class="form-control pull-right" id="tgl_akad" placeholder="Pilih Tanggal" required>
                            </div>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tgl_akad'); ?></span>
                        </div>

                        <div class="form-group <?=form_error('tgl_lapor') ? 'has-error' : ''; ?>">
                            <label>Tanggal Lapor</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tgl_lapor" value="<?php echo set_value('tgl_lapor'); echo $tgl_lapor;?>" class="form-control pull-right" id="tgl_lapor" placeholder="Pilih Tanggal" required>
                            </div>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tgl_lapor'); ?></span>
                        </div>

                        <!-- Tanggal Lapor -->
                        <div class="form-group">
                            <label>Tanggal Lapor</label>
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

                          <!-- Tanggal Lapor -->
                          <div class="form-group">
                            <label>Tanggal Kejadian</label>
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

                        <!-- Nomor Kredit -->
                        <div class="form-group">
                            <label>Tanggal Dokumen Lengkap</label>
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
                        

                        <div class="form-group">
                          <label for="exampleInputFile">Surat Pengajuan klaim</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">Catatan / Historical Angsuran</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">Photo Saat Akad Kredit</label>
                          <input type="file" id="exampleInputFile">
                          <p class="help-block"></p>
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
  <!-- /.row -->
</section>
<!-- /.content -->

<script>
  function getDetail(ini) {
    // var pelangganid = $(ini).attr('data-pelangganid');
    // var id = $('#pelayananid').val();
    // clearForm();
    // $.ajax({
    //   type: 'GET',
    //   url: "<?=base_url('');?>PelayananDetail/all/"+id+"/"+pelangganid,
    //   success: function (data) {
    //     //Do stuff with the JSON data
    //       console.log(data);
    //       if(data.length > 0 ){
    //         $(".showSukses").show();
    //         $.each(data, function(key, val){
    //           if(val.stokakhir < 0){
    //             var li = $("<div class='radio disabled'><label class='text-danger'><input disabled type='radio' name='sparepartid' value='"+val.sparepartid+"'>"+val.nama+" ("+val.stokakhir+" tersedia)</label></div>");
    //           }else{
    //             var li = $("<div class='radio'><label><input type='radio' name='sparepartid' value='"+val.sparepartid+"'>"+val.nama+" ("+val.stokakhir+" tersedia)</label></div>");
    //           }

    //           $(".menusparepart").append(li);
    //         });
    //       }
    //       else{
    //         $(".showGagal").show();
    //       }
         // $('#workorderid').val(id).hide();
         // $('#sparepartid').val(data.sparepartid);
         // $('#qty').val(data.qty);
    //   },
    //   error: function (data) {
    //     $(".showGagal").show();
    //   }
    // });
  }

  function clearForm() {    
    // $('#pelayananid').val("");
    $(".menusparepart").empty();
    $('#qty').val("");
    $(".showGagal").hide();
    $(".showSukses").hide();
  }
</script>

