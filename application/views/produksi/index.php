
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

    <div class="box box-primary">
        <div class="box-header bg-gray-active">
            <h4 class="box-title">
            <i class="fa fa-table"></i>
                Tabel Produksi AJK
            </h4>
            <div class="pull-right">
            <!-- <a href="KlaimJiwa/create" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="KlaimJiwa/exportExcel" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-download-alt"></i> Ekspor ke Excel</a> -->
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="ProdAJK" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr style="font-size: 12px">
                        <th>#</th>
                        <th>Detail</th>
                        <th>Nomor Kredit</th>
                        <th>Debitur</th>
                        <th>SPK</th>
                        <th>EP</th>
                        <th>SKK</th>
                        <th>KTP</th>
                        <th>HA</th>
                        <th>AK</th>
                        <th>Status Dok</th>
                        <th>Keterangan</th>
                        <th style="align : center;">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">
            <i class="fa fa-table"></i>
                Sedang Proses
            </h4>
            <div class="pull-right">
            <!-- <a href="KlaimJiwa/create" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="KlaimJiwa/exportExcel" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-download-alt"></i> Ekspor ke Excel</a> -->
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="OnProses" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr style="font-size: 12px">
                        <th>#</th>
                        <th>Detail</th>
                        <th>No Sertifikat</th>
                        <th>Nomor Kredit</th>
                        <th>Debitur</th>
                        <th>SPK</th>
                        <th>EP</th>
                        <th>SKK</th>
                        <th>KTP</th>
                        <th>HA</th>
                        <th>AK</th>
                        <th>Status Dok</th>
                        <th>Keterangan</th>
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


<!-- DATA TABEL PROD AJK -->
<script>
    //format untuk detail tabel show dan hide
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="0" cellspacing="0" style="margin-left:70px;" class="table">'+
            '<tr>'+
                '<th>Premi :</th>'+
                '<td>Rp. '+d.premi+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Plafon :</th>'+
                '<td>Rp. '+d.plafon+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Jenis Kredit :</th>'+
                '<td>'+d.jns_kredit+'</td>'+
            '</tr>'+
        '</table>';
    }

    $(document).ready(function() {
        
        var table = $('#ProdAJK').DataTable( {
            "processing": false,
            "serverSide": false,
            "ajax":{"url":"<?=site_url('produksi/statusProduksi/');?>","dataSrc":"data_klaim"},
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
                { "data": 'nokredit'},
                { "data": 'nama_debitur' },
                { "data": 'p_spk',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return '&minus;' }
                    }
                },
                { "data": 'p_ep',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { "data": 'p_skk',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { "data": 'p_ktp',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { "data": 'p_ha',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { "data": 'p_ak',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { "data": 'statusDok',
                    "searchable": true,
                    "orderable": false, 
                    "className": "text-center",
                    "mRender": function(data){
                        if (data === 'Sudah Lengkap'){ return '<button class="btn btn-xs btn-success" disable>'+data+'</button>' } else { return '<button class="btn btn-xs btn-warning" disable>'+data+'</button>' }
                    }
                },
                { 
                    "data": 'keterangan',
                    "searchable": true,
                    "orderable": false
                },
                {
                    "data": "id_ajk",
                    
                    "className": "text-center",
                    "orderable": false,
                    "mRender": function (data) {
                        return '<a href="<?=base_url('produksi/detail')?>/'+ data +'" class="btn btn-xs btn-info" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a> \n\
                        <a href="<?=base_url('produksi/update')?>/'+ data +'" class="btn btn-xs bg-navy" title="Ubah"><i class="fa fa-edit"></i></a> \n\
                        <a href="<?=base_url('produksi/send')?>/'+ data +'" class="btn btn-xs btn-primary zzz" title="Kirim ke admin"><i class="fa fa-send-o"></i></a>';
                    }
                }
            ],
            "order": [[1, 'desc']],
            "fnCreatedRow": function (row, data, index) {
                $('td', row).eq(0).html(index + 1);
                }
                
        });
        
        // Add event listener for opening and closing details
        $('#ProdAJK tbody').on('click', 'td.details-control', function () {
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

        $('#ProdAJK').on('click', 'button.hapus-debitur', function(){
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

<!-- DATA TABEL PROD AJK ON PROSES -->
<script>
    //format untuk detail tabel show dan hide
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="0" cellspacing="0" style="margin-left:70px;" class="table">'+
            '<tr>'+
                '<th>Premi :</th>'+
                '<td>Rp. '+d.premi+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Plafon :</th>'+
                '<td>Rp. '+d.plafon+'</td>'+
            '</tr>'+
            '<tr>'+
                '<th>Jenis Kredit :</th>'+
                '<td>'+d.jns_kredit+'</td>'+
            '</tr>'+
        '</table>';
    }

    $(document).ready(function() {
        
        var table = $('#OnProses').DataTable( {
            "processing": false,
            "serverSide": false,
            "ajax":{"url":"<?=site_url('produksi/statusProduksi/TRUE');?>","dataSrc":"data_klaim"},
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
                { "data": 'nokredit'},
                { "data": 'nama_debitur' },
                { 
                    "data": 'p_spk',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return '&minus;' }
                    }
                },
                { 
                    "data": 'p_ep',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { 
                    "data": 'p_skk',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { 
                    "data": 'p_ktp',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { 
                    "data": 'p_ha',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { 
                    "data": 'p_ak',
                    "orderable": false, 
                    "mRender": function(data){
                        if (data !== null){ return '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' } else { return "&minus;" }
                    }
                },
                { 
                    "data": 'statusDok',
                    "searchable": true,
                    "orderable": false, 
                    "className": "text-center",
                    "mRender": function(data){
                        if (data === 'Sudah Lengkap'){ return '<button class="btn btn-xs btn-success" disable>'+data+'</button>' } else { return '<button class="btn btn-xs btn-warning" disable>'+data+'</button>' }
                    }
                },
                { 
                    "data": 'keterangan',
                    "searchable": true,
                    "orderable": false, 
                },
                
            ],
            "order": [[1, 'desc']],
            "fnCreatedRow": function (row, data, index) {
                $('td', row).eq(0).html(index + 1);
                }
                
        });
        
        // Add event listener for opening and closing details
        $('#OnProses tbody').on('click', 'td.details-control', function () {
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

        $('#OnProses').on('click', 'button.hapus-debitur', function(){
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