<?php
$Debiturs = $this->DebiturModels->getAll();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     Detail Pengajuan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('');?>"><i class="fa fa-dashboard"></i> Viewer</a></li>
    <li><a href="<?=site_url('');?>klaimjiwa"> AJK Approved </a></li>
    <li><a href=""> Detail Pengajuan </a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- <form action="<?=base_url('');?>klaimjiwa/add" method="post" autocomplete="off" > -->
    <?=form_open_multipart('klaimjiwa/add')?>
    <input type="hidden" name="id_ajk">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="<?=site_url('viewer');?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="box-header">

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
                  <label for="nama" class="col-sm-4 control-label">Nomor Kredit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_debitur" name="nomor_kredit" value="<?=$AJK->nokredit?>" disabled="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Plafon Pinjaman</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_debitur" name="nomor_kredit" value="<?=$AJK->plafon?>" disabled="" >
                  </div>
                </div>  
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Jumlah Klaim</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_debitur" name="nomor_kredit" value="<?=$AJK->nilai_klaim?>" disabled="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Jenis Klaim</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_debitur" name="nomor_kredit" value="<?=$AJK->jns_klaim?>" disabled="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Tanggal Akad</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=date('d F Y',strtotime($AJK->tgl_akad))?>" disabled="" >
                  </div>
                </div>  
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Tanggal Kejadian</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=date('d F Y',strtotime($AJK->tgl_kejadian))?>" disabled="" >
                  </div>
                </div>      
              </div> 

            <!-------------------------------------------- KOLOM 2 --------------------------------------------------------------->
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
                <div class="form-group">
                  <label for="umur" class="col-sm-4 control-label">Masa Kredit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?=$AJK->tenor?>" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="umur" class="col-sm-4 control-label">Premi</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?=$AJK->premi?>" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="umur" class="col-sm-4 control-label">Jenis Kredit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?=$AJK->jns_kredit?>" disabled="">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Tanggal Lapor</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=date('d F Y',strtotime($AJK->tgl_lapor))?>" disabled="" >
                  </div>
                </div>
                <?php if($AJK->statusDok === 'Sudah Lengkap') {?>
                    <div class="form-group has-success">
                        <label for="nama" class="col-sm-4 control-label">Status Dokumen</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=$AJK->statusDok?>" disabled="" >
                        </div>
                    </div> 
                <?php } else { ?>
                    <div class="form-group has-warning">
                        <label for="nama" class="col-sm-4 control-label">Status Dokumen</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="tmp_lahir" value="<?=$AJK->statusDok?>" disabled="" >
                        </div>
                    </div> 
                <?php } ?>
              </div>        
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
        <div class="box-body table-responsive" style="margin-left: 50px; margin-right: 50px; padding-bottom: 50px">
        <div class="row">
            <div class="col-md-6">
              <h3>Lampiran</h3>
            </div>

            <div class="col-md-6">
              <div class="pull-right" style="padding-top: 13px">
                <a href="<?=base_url('klaimjiwa/downloadArchive').'/'.$this->uri->segment(3)?>" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-download-alt"></i> &nbsp; Unduh semua file</a>
              </div>
            </div>
        </div>
            <table class="table table-bordered" width="80%">  
                <thead>
                    <tr>
                        <th width="14.285%">Surat Pengajuan Klaim (SPK)</th>
                        <th width="14.285%">Surat Kepesertaan (e-policy)</th>
                        <th width="14.285%">Surat Keterangan Kematian (SKK)</th>
                        <th width="14.285%">Catatan / Historical Angsuran (HA)</th>
                        <th width="14.285%">KTP Identitas Debitur</th>
                        <th width="14.285%">Photo Saat Akad Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=(!empty($AJK->p_spk)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                        <td><?=(!empty($AJK->p_ep)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                        <td><?=(!empty($AJK->p_skk)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                        <td><?=(!empty($AJK->p_ha)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                        <td><?=(!empty($AJK->p_ktp)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                        <td><?=(!empty($AJK->p_ak)) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : "&minus;";?></td>
                    </tr>
                    <tr class="hp">
                        <td>
                            <?php if (!empty($AJK->p_spk)) { ?>
                                <a class="btn btn-default btn-xs hp" href="<?=site_url('public/documents/spk/'.$AJK->p_spk)?>" target="_blank">Lihat</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($AJK->p_ep)) { ?>
                                <a class="btn btn-default btn-xs hp" href="<?=site_url('public/documents/e-policy/'.$AJK->p_ep)?>" target="_blank">Lihat</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($AJK->p_skk)) { ?>
                                <a class="btn btn-default btn-xs hp" href="<?=site_url('public/documents/suratKematian/'.$AJK->p_skk)?>" target="_blank">Lihat</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($AJK->p_ha)) { ?>
                                <a class="btn btn-default btn-xs hp" href="<?=site_url('public/documents/historical/'.$AJK->p_ha)?>" target="_blank">Lihat</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($AJK->p_ktp)) { ?>
                                <a class="btn btn-default btn-xs hp" href="<?=site_url('public/documents/ktp/'.$AJK->p_ktp)?>" target="_blank">Lihat</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($AJK->p_ak)) { ?>
                                <a class="btn btn-default btn-xs hp" href="<?=site_url('public/documents/photokredit/'.$AJK->p_ak)?>" target="_blank">Lihat</a>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.col -->

  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
