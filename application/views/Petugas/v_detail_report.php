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
  <div class="col-lg-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-globe"></i>
          <big>Data Report Nasabah <?php echo $nama_nasabah?></big>
        </div>
        <div class="actions"></div>
      </div>
      <div class="portlet-body">
        <div id="view-table">
          <table class="table table-bordered" id="table-menabung">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          
                          <th>Jenis Transaksi</th>
                          <th>Tanggal Transaksi</th>
                          <th>Nama Petugas</th>
                          <th>Nama Nasabah</th>
                          <th>Nama Jenis Sampah</th>
                          <th>Total Harga/Jumlah Penarikan</th>
                          
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
    var TableAdvancedMenabung = function () {
  var initTable1 = function() {

  
    /*
    * Initialize DataTables, with no sorting on the 'details' column
    */

    var target='#table-menabung';
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
          { "sWidth": "10%" },
          
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
        "sAjaxSource": "<?php echo base_url(); ?>c_report/view_detail_report/<?php echo $id_nasabah?>", // define ajax source URL
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
      TableAdvancedMenabung.init();
      
    });

    </script>
  </body>
</html>
