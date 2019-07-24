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