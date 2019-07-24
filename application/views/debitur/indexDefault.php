
<section class="content-header">
  <h1>
     Debitur
     <small>Daftar Debitur</small>  
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="<?=site_url('');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href=""> Debitur </a></li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

    <!-- =========================================================================================================================== -->
    <!-- +                                                             TABLE                                                       + -->
    <!-- =========================================================================================================================== -->
            
    <div class="box box-warning">
    <div class="box-header bg-gray-active">
        <h4 class="box-title">
        <i class="fa fa-table"></i>
            Data Debitur
        </h4>
        <div class="pull-right">
        <a href="debitur/create" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Tambah Data</a>
        <a href="debitur/exportExcel" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-download-alt"></i> Ekspor ke Excel</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="dataDebitur" class="table table-bordered table-striped table-responsive">
        <thead>
        <tr style="font-size: 12px">
            <th>#</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal lahir</th>
            <th>Umur</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tindakan</th>

        </tr>
        </thead>
        <tbody>
            <?php 
            $start = 0;
            foreach ($data_debitur as $debitur) :
            ?>
            <tr class="small">
            <td><?=++$start;?></td>
            <td><?=$debitur->nama_debitur;?></td>

            <td><?=$debitur->jenis_kelamin;?></td>
            <td><?=$debitur->tgl_lahir;?></td>
            <td><?=$debitur->umur;?></td>
            <td><?=$debitur->tlp;?></td>
            <td><?=$debitur->alamat;?></td>
            <td>
                <a href="debitur/edit/<?=$debitur->id_debitur?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Ubah</a>
                <a href="<?=site_url('debitur/delete/'.$debitur->id_debitur);?>" data-name="<?=$debitur->nama_debitur?>" class="btn btn-xs btn-danger hapus-debitur"><i class="fa fa-trash"></i> Hapus</a>
            </td>
            <!-- <td>
            <a href="<?php //site_url('debitur/detail/'.$row->id_debitur);?>" class="btn btn-xs bg-navy"><i class="fa fa-eye"></i> tes</a>
            </td> -->
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    </div>

    <!-- =========================================================================================================================== -->
    <!-- +                                                       /END TABEL                                                         + -->
    <!-- =========================================================================================================================== -->

        </div><!-- END COLS 12 -->
    </div><!-- END ROW -->
</section><!-- END CONTENT -->


<?php if ($this->session->flashdata('message')): ?>
    <script>
    // Dialog Eror ketika edit tapi tidak ada datanya
    jQuery(document).ready(function($){
        swal({
            title: "Error !!!",
            text: "<?php echo $this->session->flashdata('message'); ?>",
            html: true,
            // timer: 1500,
            showCancelButton: false,
            type: 'error'
        });
    });
    </script>
<?php endif; ?>

<script type="text/javascript">
    //Data tabel Debitur
    $(document).ready(function () {
        $("#dataDebitur").dataTable();
    });

    //Hapus allert
    jQuery(document).ready(function($){
    $('.hapus-debitur').on('click',function(){
        var getLink = $(this).attr('href');
        var name = $(this).attr('data-name');
        swal({
            title:"Konfirmasi",
            text:"Hapus data debitur : "+name+" ?",
            html: true,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
                },function(){
                window.location.href = getLink
            });
        return false;
    });
});
</script>
