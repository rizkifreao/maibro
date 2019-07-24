
<section class="content-header">
  <h1>
     Klaim Asuransi Jiwa
     <small>Pengajuan Klaim</small>  
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="<?=site_url('');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href=""> Klaim Asuransi Jiwa </a></li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

    <!-- =========================================================================================================================== -->
    <!-- +                                                             TABLE                                                       + -->
    <!-- =========================================================================================================================== -->
            
    <div class="box box-warning">
        <div class="box-header bg-green disable">
            <h4 class="box-title">
            <i class="fa fa-table"></i>
                Daftar Debitur Yang Belum Diajukan
            </h4>
            <div class="pull-right">
            <!-- <a href="debitur/create" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Tambah Data</a> -->
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="dataDebitur" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr style="font-size: 12px">
                        <th>#</th>
                        <th>Detail</th>
                        <th>KTP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal lahir</th>
                        <th>Umur</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-warning">
        <div class="box-header bg-gray-active">
            <h4 class="box-title">
            <i class="fa fa-table"></i>
                Data Debitur
            </h4>
            <div class="pull-right">
            <a href="KlaimJiwa/create" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="KlaimJiwa/exportExcel" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-download-alt"></i> Ekspor ke Excel</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="dataAJK" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr style="font-size: 12px">
                        <th>#</th>
                        <th>Detail</th>
                        <th>No Sertifikat</th>
                        <th>Debitur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal lahir</th>
                        <th>Umur</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div style="margin-top: 50vh"></div>

    <!-- =========================================================================================================================== -->
    <!-- +                                                       /END TABEL                                                         + -->
    <!-- =========================================================================================================================== -->

        </div><!-- END COLS 12 -->
    </div><!-- END ROW -->
</section><!-- END CONTENT -->


<?php if ($this->session->flashdata('sucess')){ ?>
    <script>
    // Dialog Berhasil
    jQuery(document).ready(function($){
        swal({
            title: "Berhasil !!!",
            text: "<?php echo $this->session->flashdata('sucess'); ?>",
            html: true,
            // timer: 1500,
            showCancelButton: false,
            type: 'success'
        });
    });
    </script>
<?php } else if($this->session->flashdata('failed')) { ?>
    <script>
    // Dialog Eror
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
<?php } ?>

<!-- DATATABLE PENGAJUAN DEBITURS -->
<script>
    //format untuk detail tabel show dan hide
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="0" cellspacing="0" style="margin-left:70px;" class="table">'+
            '<tr>'+
                '<th>Email :</th>'+
                '<td>'+d.email_debitur+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Tempat Lahir :</th>'+
                '<td>'+d.tmp_lahir+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Alamat :</th>'+
                '<td>'+d.alamat+'</td>'+
            '</tr>'+
        '</table>';
    }

    $(document).ready(function() {
        
        var table = $('#dataDebitur').DataTable( {
            "processing": false,
            "serverSide": false,
            "ajax":{"url":"<?=site_url('debitur/statusPengajuan/BELUM');?>","dataSrc":"data_debitur"},
            // "ajax": "",
            "columns": [
                {
                    "data" : null,
                    "orderable": false,
                },
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": 'KTP'},
                { "data": 'nama_debitur'},
                { "data": 'jenis_kelamin' },
                { "data": 'tgl_lahir' },
                { "data": 'umur' },
                { "data": 'tlp' },
                {
                    "data": "id_debitur",
                    "orderable": false,
                    "mRender": function (data) {
                        return '<a href="klaimjiwa/pengajuan/'+ data +'" class="btn btn-xs bg-navy" data-toggle="tooltip" title="Ubah"><i class="fa fa-clipboard"> </i> Ajukan Klaim</a>';
                    }
                }
            ],
            "order": [[1, 'desc']],
            "fnCreatedRow": function (row, data, index) {
                $('td', row).eq(0).html(index + 1);
                }
                
        });
        
        // Add event listener for opening and closing details
        $('#dataDebitur tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                // tr.find('svg').attr('data-icon', 'plus-circle');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
                // tr.find('svg').attr('data-icon', 'minus-circle');
            }
        } );

        $('#dataDebitur').on('click', 'button.hapus-debitur', function(){
            var getLink = $(this).attr('href');
            var id = $(this).attr('data-id');

            //ambil nama dengan parameter id untuk di tampilkan di dialog box
            $.ajax({
                type: 'GET',
                url: "<?=base_url('');?>debitur/getNama/"+id,
                success: function (data) {

                    //munculkan dialog sweetallart
                    swal({
                    title:"Konfirmasi",
                    text:"Hapus data debitur : "+data+" ?",
                    html: true,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    closeOnConfirm: true,
                        },function(){
                        window.location.href = "<?=base_url('');?>debitur/delete/"+id
                    });
                    return false;

                }
            });  
        });

    } );
</script>

<!-- DATA TABEL AJK -->
<script>

    //format untuk detail tabel show dan hide
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="0" cellspacing="0" style="margin-left:70px;" class="table">'+
            '<tr>'+
                '<th>Email :</th>'+
                '<td>'+d.email_debitur+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Tempat Lahir :</th>'+
                '<td>'+d.tmp_lahir+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Alamat :</th>'+
                '<td>'+d.alamat+'</td>'+
            '</tr>'+
        '</table>';
    }

    $(document).ready(function() {
        
        var table = $('#dataAJK').DataTable( {
            "processing": false,
            "serverSide": false,
            "ajax":{"url":"<?=site_url('KlaimJiwa/getAjaxKlaim');?>","dataSrc":"data_klaim"},
            // "ajax": "",
            "columns": [
                {
                    "data" : null,
                    "orderable": false,
                },
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": 'sertifikat'},
                { "data": 'nama_debitur' },
                { "data": 'tenor' },
                { "data": 'plafon' },
                { "data": 'premi' },
                {
                    "data": "id_ajk",
                    "orderable": false,
                    "mRender": function (data) {
                        return '<a href="<?=base_url('klaimjiwa/pengajuan/')?>"'+ data +'" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i> Ubah</a> \n\
                        <button href="" data-id="'+ data +'" class="btn btn-xs btn-danger hapus-debitur" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>';
                    }
                }
            ],
            "order": [[1, 'desc']],
            "fnCreatedRow": function (row, data, index) {
                $('td', row).eq(0).html(index + 1);
                }        
        });

        setInterval(function(){ 
            $('#dataAJK').DataTable(); 
        }, 300);
        
        // Add event listener for opening and closing details
        $('#dataAJK tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                // tr.find('svg').attr('data-icon', 'plus-circle');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
                // tr.find('svg').attr('data-icon', 'minus-circle');
            }
        } );

        $('#dataAJK').on('click', 'button.hapus-debitur', function(){
            var getLink = $(this).attr('href');
            var id = $(this).attr('data-id');

            //ambil nama dengan parameter id untuk di tampilkan di dialog box
            $.ajax({
                type: 'GET',
                url: "<?=base_url('');?>klaimjiwa/test/"+id,
                success: function (data) {

                    //munculkan dialog sweetallart
                    swal({
                    title:"Konfirmasi",
                    text:"Hapus data klaim : "+data+" ?",
                    html: true,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    closeOnConfirm: true,
                        },function(){
                        window.location.href = "<?=base_url('');?>klaimjiwa/delete/"+id
                    });
                    return false;
                }
            });  
        });
        
    } );
</script>