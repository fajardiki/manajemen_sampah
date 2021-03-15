<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Manajemen Sampah</title>

    <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatables/lib/css/dataTables.bootstrap.min.css') ?>"/>
    <!-- <link href="<?php echo base_url()?>assets/dist/css/select2.min.css" rel="stylesheet" /> -->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
         <?php $this->load->view($notif)?>
     </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
        <?php $this->load->view($menu_admin)?>
      </aside>
      <!--sidebar end-->
      <!--main content start-->

      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
             <!-- <div class="container"> -->
                 <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                  <!--   <div class="portlet-title" style="background-color: #B32525;">
                                        <div class="caption">
                                            <i class="fa fa-comments"></i> Form Data Pasien
                    </div>
                    <div class="actions">
                    <div class="btn-group btn-group-solid" style="float: right;"> -->
                    <!--   <a class="btn default" href="javascript:;" id="form_act"><i class="fa fa-plus-square"></i> Daftarkan Pasien </a> -->
                    <!-- </div>
                    </div> -->
                    <!-- <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                        </div> -->
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                   <a class="btn btn-xs default" href="javascript:;" id="form_act">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                       Tambah Tabungan
                    </a>
                </h4>
            </div>
           
    </div>
                                    </div>
                                    <div class="portlet-body" id="form_container" style="display:none;">
                                        <form role="form" class="form-horizontal" id="form_vendor" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act" value="add"/>
                    <input type="hidden" name="id_menabung" id="id_menabung" value=""/>
                                         <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

                                                <tr>
                                                   <td colspan="6" style="font-weight:bold"> Detail Menabung </td>

                                                    <!-- <td colspan="3"  style="font-weight:bold"> Atribut surat </td> -->

                                                </tr>
                                                 <tr>

                                                     <td width="150px"> Nama Nasabah  </td>
                                                    <td width="10px"> : </td>
                                                     <td>  
                                                      <select name="id_nasabah" id="id_nasabah" class="form-control">
                                                        <option value="">----pilih nama nasabah----</option>
                                                        <?php foreach($list_nasabah as $list){
                                                           if(strlen($list->no_rek)==1){
                                                                  $last_rekening="000".$list->no_rek;
                                                              }elseif(strlen($list->no_rek)==2){
                                                                  $last_rekening="00".$list->no_rek;
                                                              }elseif(strlen($list->no_rek)==3){
                                                                  $last_rekening="0".$list->no_rek;
                                                              }elseif(strlen($list->no_rek)>=4){
                                                                  $last_rekening=$list->no_rek;
                                                              }
                                                          ?>
                                                          <option value="<?php echo $list->id_nasabah?>">

                                                            <?php echo $last_rekening?>-<?php echo $list->nama_nasabah?>
                                                          </option>
                                                        <?php }?>
                                                      </select>
                                                     </td>
                                                     <td width="150px"> Jenis Sampah </td>
                                                    <td width="10px"> : </td>
                                                     <td>  
                                                      <select name="id_jenis_sampah" id="id_jenis_sampah" class="form-control">
                                                        <option value="">----pilih jenis sampah----</option>
                                                        <?php foreach($list_sampah as $ls){
                                                          
                                                          ?>
                                                          <option value="<?php echo $ls->id_jenis_sampah?>-<?php echo $ls->harga_per_kg?>">

                                                            <?php echo $ls->nama_sampah?> - <?php echo $ls->harga_per_kg?>
                                                          </option>

                                                        <?php }?>
                                                      </select>
                                                     </td>
                                                </tr> 
                                                 <tr>

                                                    <td width="150px"> Jumlah sampah (KG)  </td>
                                                    <td width="10px"> : </td>
                                                    <td>  
                                                     <input type="number" class="form-control" name="jumlah_kg" id="jumlah_kg" tabindex="1" onchange="ganti_total()">
                                                     </td>
                                                      <td width="150px"> Total Harga </td>
                                                    <td width="10px"> : </td>
                                                    <td> 
                                                      <input type="text" class="form-control" name="total_harga" id="total_harga" tabindex="1" readonly>
                                                     </td>
                                                </tr>                                                
                                              
                <td colspan="6" align="center">

            <button id="cancel" type="button" class="btn default" tabindex="15">Cancel</button>
            <button id="save" type="button" class="btn blue"  data-loading-text="Loading..." tabindex="14">Save</button>

                </td>
            </tr>

                                        </table>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-globe"></i>
          <big>Data Menabung</big>
        </div>
        <div class="actions"></div>
      </div>
      <div class="portlet-body">
        <div id="view-table">
          <table class="table table-bordered" id="table-siswa">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          
                          
                          <th>Tanggal Transaksi</th>
                          <th>Nama Petugas</th>
                          <th>Nama Nasabah</th>
                          <th>Nama Jenis Sampah</th>
                          <th>Total Harga</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
        </div>
      </div>
    </div>
  </div>
</div>
                <!-- </div> -->

          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 &copy; Manajemen Sampah.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('js/jquery.min.js') ?>"></script> -->
    <script type="text/javascript" src="<?php echo base_url('datatables/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/assets/ckeditor/ckeditor.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/dist/js/select2.min.js"></script> -->
    <script>
    var tabel = null;
    var TableAdvanced = function () {
  var initTable1 = function() {

  
    /*
    * Initialize DataTables, with no sorting on the 'details' column
    */

    var target='#table-siswa';
    var oTable = $(target).dataTable( {
        "aoColumnDefs": [
          {
            "bSortable": false,
            "aTargets": [ -1 ]
          },{
            "bSortable": false,
            "aTargets": [ 0 ]
          }
        ],
        "aoColumns": [
          { "sWidth": "1%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "5%" }
                    ],
        "aaSorting": [[0, 'asc']],
        "aLengthMenu": [
          [5,10, 20, 50, -1],
          [5,10, 20, 50, "All"] // change per page values here
        ],
        // set the initial value
        "iDisplayLength": 5, // default records per page
        "oLanguage": {
          // language settings
          "sLengthMenu": "Display _MENU_ records",
          "sSearch": "Search _INPUT_ <a class='btn default bts' href='javascript:void(0);'><i class='fa fa-search'></i></a>",
          "sProcessing": '<img src="<?php echo base_url(); ?>assets/global/img/loading-spinner-grey.gif"/><span>&nbsp;&nbsp;Loading...</span>',
          "sInfoEmpty": "No records found to show",
          "sAjaxRequestGeneralError": "Could not complete request. Please check your internet connection",
          "sEmptyTable":  "No data available in table",
          "sZeroRecords": "No matching records found",
          "oPaginate": {
            "sPrevious": "Prev",
            "sNext": "Next",
            "sPage": "Page",
            "sPageOf": "of"
          }
        },
        "bAutoWidth": true,   // disable fixed width and enable fluid table
        "bSortCellsTop": true, // make sortable only the first row in thead
        "sPaginationType": "full_numbers", // pagination type(bootstrap, bootstrap_full_number or bootstrap_extended)
        "bProcessing": true, // enable/disable display message box on record load
        "bServerSide": true, // enable/disable server side ajax loading
        "sAjaxSource": "<?php echo base_url(); ?>c_menabung/view", // define ajax source URL
        "sServerMethod": "POST"
      });

      jQuery(target+'_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
      jQuery(target+'_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
      // jQuery(target+'_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
      jQuery(target+'_wrapper .dataTables_filter input').unbind();
      jQuery(target+'_wrapper .dataTables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
          oTable.fnFilter(this.value);
        }
      });
      jQuery(target+'_wrapper .dataTables_filter a').bind('click', function(e) {
        var key=jQuery(target+'_wrapper .dataTables_filter input').val();
        oTable.fnFilter(key);
      });
  }

  return {
    //main function to initiate the module
    init: function () {
      if (!jQuery().dataTable) {
        return;
      }
      initTable1();
    }
  };

}();
    $(document).ready(function() {
      TableAdvanced.init();
      jQuery('#form_act').bind('click', function(e) {
          jQuery('#form_container').slideToggle(500);
          $('#form_vendor')[0].reset();
          $('#act').val('add');
          $("#id_menabung").val("");
        });
       
      $('#save').click(function(){
       if ($('#id_nasabah').val() == "") {
          alert("Nama Nasabah harus di isi");
          $('#id_nasabah').focus();
          return false;
        }else if ($('#id_jenis_sampah').val() == "") {
          alert("Jenis Sampah harus di isi");
          $('#id_jenis_sampah').focus();
          return false;
        }else if ($('#jumlah_kg').val() == "") {
          alert("Jumlah KG harus di isi");
          $('#jumlah_kg').focus();
          return false;
        }else if ($('#total_harga').val() == "") {
          alert("Jangan lupa enter jumlah kg");
          $('#total_harga').focus();
          return false;
        }else {
        
          $('#form_vendor').submit();
        
        }

    return false;
  });
      $('#cancel').click(function(){
        $('#form_vendor')[0].reset();
        
        $('#id_menabung').val('');
       
        $('#act').val('add');
        $('#form_container').slideUp(500);
            // window.location.href = window.location.href;
      });
      $('#form_vendor').submit(function(e){
    e.preventDefault();
    var sInap = 0;
    var sPen = 0;

    $.ajax({
      type: 'POST',
      url: 'c_menabung/save',
      data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
      // data: $(this).serialize(),

      beforeSend: function(){
        $('#save').prop('innerHTML', 'Loading...');
                $('#save').prop('disabled', true);  
      },
      complete: function() {
        $('#save').prop('innerHTML', 'Save');
                $('#save').prop('disabled', false);
      },
      success: function(data) {
        if(data=='1') {
          alert("Data telah berhasil di simpan");
          $('#cancel').click();
          loadTbl();
        }else if(data=='1del'){
          alert("Data berhasil dihapus");
          $('#cancel').click();
          loadTbl();
        }else if(data=='1up'){
          alert("Data berhasil update");
          $('#cancel').click();
          loadTbl();
        }else if(data=='0') {
          alert("Data gagal di simpan");
        }else if(data=='0del'){
          alert("Data gagal dihapus");
        }else if(data=='0up'){
          alert("Data gagal update");
        }
      }
    });
    return false;
  });

       
    });
function loadTbl(){
  $("#table-siswa").dataTable().fnDraw();
} 
function set_val(data) {
  // body...
  
   $.post('<?php echo base_url()?>c_menabung/dataedit', {id_menabung: data}, function(respond) {  
                  
                  $("#id_menabung").val(respond[0].id_menabung);
                 
                  $("#id_jenis_sampah").val(respond[0].id_jenis_sampah);
                
                  $("#id_nasabah").val(respond[0].id_nasabah);
                  $("#jumlah_kg").val(respond[0].jumlah_kg);
                  
                                        }, 'json');
   $('#form_container').slideDown(500);
   $("#act").val("edit");
  $('html, body').animate({scrollTop: 0}, 500);
}
function set_del(data) {
  if( confirm("Apakah data ingin dihapus ?") ){
    
    $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>c_menabung/delete',
                data: { id : data},
                success: function(data) {
                    if(data === 'true')
                    // $('#cancel').click();
                alert('Data berhasil dihapus');
                // window.location.href = window.location.href;
                loadTbl();
                }
            });
  }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function ganti_total() {
  jumlah_kg=$("#jumlah_kg").val();
  id_jenis_sampah=$("#id_jenis_sampah").val();
  res=id_jenis_sampah.split("-");
  $("#total_harga").val(res[1]*jumlah_kg);
}

    </script>
  </body>
</html>
