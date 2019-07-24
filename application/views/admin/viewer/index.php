
<section class="content-header">
  <h1>
     AJK Approved
     <small>Klaim Approved</small>  
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="<?=site_url('');?>"><i class="fa fa-dashboard"></i> Viewer</a></li>
    <li><a href=""> AJK Approved </a></li>
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
                Tabel klaim approved
            </h4>
            <div class="pull-right">
            <!-- <a href="KlaimJiwa/create" class="btn btn-primary btn-xs" ><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="KlaimJiwa/exportExcel" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-download-alt"></i> Ekspor ke Excel</a> -->
            </div>
        </div>
        <?= $this->session->flashdata('failed')?>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="ProdAJK" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr style="font-size: 12px">
                        <th>#</th>
                        <th>Detail</th>
                        <th>Bank</th>
                        <th>No Sertifikat</th>
                        <th>No Kredit</th>
                        <th>Debitur</th>
                        <th>SPK</th>
                        <th>EP</th>
                        <th>SKK</th>
                        <th>KTP</th>
                        <th>HA</th>
                        <th>AK</th>
                        <th>Status Dok</th>
                        <th style="align : center;">Aksi</th>
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


<!-- MODAL FORM -->
<div id="modalForm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Revisi</h4>
      </div>
      <?=form_open("produksi/revised","class='form-horizontal'");
      ?>
      <div class="modal-body">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">            
                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_ajk" placeholder="pelangganid" name="id_ajk" value="">
                    <textarea type="text" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" value=""></textarea>
                  </div>
                </div>         
              </div>        
            </div>
          </div>
          <!-- /.box-footer -->
      </div>
      <div class="modal-footer">
        <?=form_submit("btnsubmit", "Kirim","class='btn btn-success'");?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <?=form_close();?>
    </div>

  </div>
</div>

<!-- DATA TABEL PROD AJK -->
<script>
    //OPEN MODAL
    function getDetail(ini) {
    var id = $(ini).attr('data-id');
    $.ajax({
      type: 'GET',
      url: "<?=base_url('');?>klaimjiwa/detailJson/"+id,
      success: function (data) {
        //Do stuff with the JSON data
          console.log(data);
         $('#id_ajk').val(id).hide();
        }
    });
    }

    function clearForm() {  	
        $('#workorderid').val("");
        $('#nomor').val("");
        $('#pelangganid').val("");
        $('#tanggal_masuk').val("");
        $('#keterangan').val("");
        $('#keluhan').val("");
    }

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
            "ajax":{"url":"<?=site_url('viewer/statusProduksi/');?>","dataSrc":"data_klaim"},
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
                { "data": 'nama_bank'},
                { "data": 'sertifikat'},
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
                    "data": "id_ajk",
                    "className": "text-center",
                    "orderable": false,
                    "mRender": function (data) {
                        return '<a href="<?=base_url('viewer/detail')?>/'+ data +'" class="btn btn-xs btn-info" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>';
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