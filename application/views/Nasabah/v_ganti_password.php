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
                        
                       Ganti Password
                    </a>
                </h4>
            </div>
           
    </div>
                                    </div>
                                    <div class="portlet-body" id="form_container" >
                                        <form role="form" class="form-horizontal" id="form_vendor" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>C_profil/rubah_password">
                    
                    
                                         <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

                                                <tr>
                                                   <td colspan="3" style="font-weight:bold"> Detail Nasabah </td>

                                                   <!--  <td colspan="3"  style="font-weight:bold"> Atribut surat </td> -->

                                                </tr>
                                                 <tr>

                                                    <td width="150px">  Username </td>
                                                    <td width="10px"> : </td>
                                                    <td>
                                                     <input type="text" class="form-control" name="username" id="username" tabindex="1">
                                                    </td>
                                                    
                                                </tr> 
                                                  <tr>

                                                    <td width="150px">  Password </td>
                                                    <td width="10px"> : </td>
                                                    <td>  <input type="text" class="form-control" name="password" id="password" tabindex="1"> </td>
                                                    
                                                </tr> 
                                                 <tr>

                                                    <td width="150px"> Password Baru </td>
                                                    <td width="10px"> : </td>
                                                    <td>  <input type="text" class="form-control" name="password_baru" id="password_baru" tabindex="1"> </td>
                                                    
                                                </tr> 
                                                 <tr>

                                                    <td width="150px"> Konfirmasi Password Baru </td>
                                                    <td width="10px"> : </td>
                                                    <td>  <input type="text" class="form-control" name="password2" id="password2" tabindex="1"> </td>
                                                    
                                                </tr> 
                                                
                                                

                                                  
                        
                <td colspan="6" align="center">

            <button id="cancel" type="button" class="btn default" tabindex="15">Cancel</button>
            <button id="save" type="submit" class="btn blue"  data-loading-text="Loading..." tabindex="14">Save</button>

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
    
  </body>
</html>
