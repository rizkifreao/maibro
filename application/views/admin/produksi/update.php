<?php
$Debiturs = $this->DebiturModels->getAll();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     Update Pengajuan AJK
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?=site_url('');?>klaimjiwa"> Proses AJK </a></li>
    <li><a href=""> Pengajuan AJK </a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
  <!-- <form action="<?=base_url('');?>klaimjiwa/add" method="post" autocomplete="off" > -->
  <?=form_open_multipart('produksi/add')?>
    <input type="hidden" name="id_ajk" value="<?=$AJK->id_ajk?>">
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
                <a href="<?=site_url('produksi');?>" class="btn btn-danger">BATAL</a>
                <button type="submit" class="btn btn-success">SIMPAN</button>
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
                    <input type="text" class="form-control" id="KTP" name="KTP" value="<?=$AJK->KTP?>" disabled="">
                  </div>
                </div>            
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Nama Debitur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_debitur" name="nama_debitur" value="<?=$AJK->nama_debitur?>" disabled="">
                  </div>
                </div>        
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Email Debitur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_debitur" name="nomor_kredit" value="<?=$AJK->email_debitur?>" disabled="" >
                  </div>
                </div>   
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Jenis Kredit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jenis_kelamin" name="nomor_kredit" value="<?=$AJK->jenis_kelamin?>" disabled="" >
                  </div>
                </div>    
              </div> 
            <!-- KOLOM 2 -->
              <div class="col-md-6"> 
                <div class="form-group">
                  <label for="tmp_lahir" class="col-sm-4 control-label">Tempat Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?=$AJK->tmp_lahir?>" disabled="">
                  </div>
                </div>          
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=date('d F Y',strtotime($AJK->tgl_lahir))?>" disabled="" >
                  </div>
                </div>        
                <div class="form-group">
                  <label for="umur" class="col-sm-4 control-label">Umur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?=$AJK->umur?>" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="alamat" name="alamat" value="" disabled=""><?=$AJK->alamat?></textarea>
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
      
        
        <!-- BOX Debitur -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-text"></i> Form pengajuan klaim</h3>
                <input type="hidden" name="id_debitur" class="form-control" value="<?php echo set_value('id_debitur'); echo $AJK->debitur; ?>">
                <div class="box-tools pull-right">
                <!-- <button name="simpan" href="" class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button> -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-AJK->x-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                                
                <div class="row">
                    <div class="col-md-6"><!-- Kolom 1 -->

                        <!-- Nomor Kredit -->
                        <div class="form-group <?=form_error('nokredit') ? 'has-error' : ''; ?>">
                            <label>Nomor Kredit</label>
                            <input type="number" name="nokredit" class="form-control" value="<?php echo set_value('nokredit'); echo $AJK->nokredit; ?>" placeholder="Masukan Nomor Kredit" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('nokredit'); ?></span>
                        </div>   

                        <!-- MASA KREDIT -->
                        <div class="form-group <?=form_error('tenor') ? 'has-error' : ''; ?>">
                            <label>Masa Kredit</label>
                            <input type="number" name="tenor" class="form-control" value="<?php echo set_value('tenor'); echo $AJK->tenor; ?>" placeholder="Masukan Masa Kredit" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tenor'); ?></span>
                        </div> 

                        <!-- PLAFON PINJAMAN -->
                        <div class="form-group <?=form_error('plafon') ? 'has-error' : ''; ?>">
                            <label>Plafon Pinjaman</label>
                            <input type="plafon" name="plafon" class="form-control" value="<?php echo set_value('plafon'); echo $AJK->plafon; ?>" placeholder="Masukan Plafon Pinjaman" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('plafon'); ?></span>
                        </div> 

                        <!-- PREMI -->
                        <div class="form-group <?=form_error('premi') ? 'has-error' : ''; ?>">
                            <label>Premi</label>
                            <input type="number" name="premi" class="form-control" value="<?php echo set_value('premi'); echo $AJK->premi; ?>" placeholder="Masukan Premi" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('premi'); ?></span>
                        </div> 

                        <!-- Nomor Kredit -->
                        <div class="form-group <?=form_error('nilai_klaim') ? 'has-error' : ''; ?>">
                            <label> Jumlah Klaim</label>
                            <input type="number" name="nilai_klaim" class="form-control" value="<?php echo set_value('nilai_klaim'); echo $AJK->nilai_klaim; ?>" placeholder="Masukan Jumlah Klaim" required>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('nilai_klaim'); ?></span>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputFile">Surat Kepesertaan (e-policy)</label>
                            <?php if ($this->uri->segment(2) == 'update') { ?>
                              <?php if (file_exists('./public/documents/e-policy/' . $AJK->p_ep)) { ?>
                                <div><a href="<?=site_url('public/documents/e-policy/' . $AJK->p_ep)?>" target="_blank" ><?=$AJK->p_ep?></a></div>
                              <?php } ?>
                                <input type="file" id="exampleInputFile" name="p_ep">
                                <small class="text-danger"><?=!empty($err_ep) ? $err_ep : "";?></small>
                            <?php } else { ?>
                                <input type="file" id="exampleInputFile" name="p_ep">
                                <small class="text-danger"><?=!empty($err_ep) ? $err_ep : "";?></small>    
                            <?php } ?>
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">Surat Keterangan Kematian</label>
                            <?php if ($this->uri->segment(2) == 'update') { ?>
                              <?php if (file_exists('./public/documents/suratKematian/' . $AJK->p_skk)) { ?>
                                <div><a href="<?=site_url('public/documents/suratKematian/' . $AJK->p_skk)?>" target="_blank" ><?=$AJK->p_skk?></a></div>
                              <?php } ?>
                                <input type="file" id="exampleInputFile" name="p_skk">
                                <small class="text-danger"><?=!empty($err_skk) ? $err_skk : "";?></small>
                            <?php } else { ?>
                                <input type="file" id="exampleInputFile" name="p_skk">
                                <small class="text-danger"><?=!empty($err_skk) ? $err_skk : "";?></small>    
                            <?php } ?>
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">KTP Identitas Debitur</label>
                            <?php if ($this->uri->segment(2) == 'update') { ?>
                              <?php if (file_exists('./public/documents/ktp/' . $AJK->p_ktp)) { ?>
                                <div><a href="<?=site_url('public/documents/ktp/' . $AJK->p_ktp)?>" target="_blank" ><?=$AJK->p_ktp?></a></div>
                              <?php } ?>
                                <input type="file" id="exampleInputFile" name="p_ktp">
                                <small class="text-danger"><?=!empty($err_ktp) ? $err_ktp : "";?></small>
                            <?php } else { ?>
                                <input type="file" id="exampleInputFile" name="p_ktp">
                                <small class="text-danger"><?=!empty($err_ktp) ? $err_ktp : "";?></small>    
                            <?php } ?>
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
                                <option value="INDEMNITY" <?=($AJK->jns_kredit) ? 'selected':''?>>INDEMNITY</option>
                                <option value="UP TETAP"<?=($AJK->jns_kredit) ? 'selected':''?> >UP TETAP</option>                                            
                            </select>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('jns_kredit'); ?></span>
                        </div>

                        <div class="form-group <?=form_error('jns_klaim') ? 'has-error' : ''; ?>">
                            <label>Jenis Klaim</label>
                            <select name ="jns_klaim" value="<?php echo set_value('jns_klaim');?>"  class="form-control select2" style="width: 100%;" required>
                                <option value="1">-- Piih --</option>
                                <option value="MENINGGAL NORMAL" <?=($AJK->jns_klaim) ? 'selected':''?>>MENINGGAL NORMAL</option>
                                <option value="MENINGGAL KECELAKAAN"<?=($AJK->jns_klaim) ? 'selected':''?> >MENINGGAL KECELAKAAN</option> 
                                <option value="MACET / PHK"<?=($AJK->jns_klaim) ? 'selected':''?> >MACET / PHK</option>                                            
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
                                <input type="text" name="tgl_akad" value="<?php echo set_value('tgl_akad'); echo $AJK->tgl_akad;?>" class="form-control pull-right" id="tgl_akad" placeholder="Pilih Tanggal" required>
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
                                <input type="text" name="tgl_lapor" value="<?php echo set_value('tgl_lapor'); echo $AJK->tgl_lapor;?>" class="form-control pull-right" id="tgl_lapor" placeholder="Pilih Tanggal" required>
                            </div>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tgl_lapor'); ?></span>
                        </div>

                        <div class="form-group <?=form_error('tgl_kejadian') ? 'has-error' : ''; ?>">
                            <label>Tanggal Kejadian</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tgl_kejadian" value="<?php echo set_value('tgl_kejadian'); echo $AJK->tgl_kejadian;?>" class="form-control pull-right" id="tgl_kejadian" placeholder="Pilih Tanggal" required>
                            </div>
                            <!-- validasi eror -->
                            <span class="help-block"><?php echo form_error('tgl_kejadian'); ?></span>
                        </div>                        

                        <div class="form-group">
                          <label for="exampleInputFile">Surat Pengajuan Klaim</label>
                            <?php if ($this->uri->segment(2) == 'update') { ?>
                              <?php if (file_exists('./public/documents/spk/' . $AJK->p_spk)) { ?>
                                <div><a href="<?=site_url('public/documents/spk/' . $AJK->p_spk )?>" target="_blank" ><?=$AJK->p_spk?></a></div>
                              <?php } ?>
                                <input type="file" id="exampleInputFile" name="p_spk">
                                <small class="text-danger"><?=!empty($p_spk) ? $err_spk : "";?></small>
                            <?php } else { ?>
                                <input type="file" id="exampleInputFile" name="p_spk">
                                <small class="text-danger"><?=!empty($p_spk) ? $err_spk : "";?></small>    
                            <?php } ?>
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">Catatan / Historical Angsuran</label>
                            <?php if ($this->uri->segment(2) == 'update') { ?>
                              <?php if (file_exists('./public/documents/historical/' . $AJK->p_ha)) { ?>
                               <div><a href="<?=site_url('public/documents/historical/' . $AJK->p_ha)?>" target="_blank" ><?=$AJK->p_ha?></a></div>
                              <?php } ?>
                                <input type="file" id="exampleInputFile" name="p_ha">
                                <small class="text-danger"><?=!empty($err_ha) ? $err_ha : "";?></small>
                            <?php } else { ?>
                                <input type="file" id="exampleInputFile" name="p_ha">
                                <small class="text-danger"><?=!empty($err_ha) ? $err_ha : "";?></small>    
                            <?php } ?>
                          <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">Photo Saat Akad Kredit</label>
                            <?php if ($this->uri->segment(2) == 'update') { ?>
                              <?php if (file_exists('./public/documents/photokredit/' . $AJK->p_ak)) { ?>
                                <div><a href="<?=site_url('public/documents/photokredit/' . $AJK->p_ak)?>" target="_blank" ><?=$AJK->p_ak?></a></div>
                              <?php } ?>
                                <input type="file" id="exampleInputFile" name="p_ak">
                                <small class="text-danger"><?=!empty($err_ak) ? $err_ak : "";?></small>
                            <?php } else { ?>
                                <input type="file" id="exampleInputFile" name="p_ak">
                                <small class="text-danger"><?=!empty($err_ak) ? $err_ak : "";?></small>    
                            <?php } ?>
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

<script>
$(function () {

    $('#tgl_akad').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })

    $('#tgl_lapor').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })

    $('#tgl_kejadian').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    })

})
</script>