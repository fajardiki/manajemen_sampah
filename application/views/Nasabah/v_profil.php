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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-1/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <link href="<?php echo base_url()?>assets/dist/css/select2.min.css" rel="stylesheet" /> -->
  <style type="text/css">
    .card-link h4,
.card-body .fas,
.card-footer .fab {color: #14abac}
.card-footer .fab:hover {color: #f1bc19}
.card p {color: #503534}
.card-footer .fab {
    
    margin: 0 5px;
}
.card{
  font-size: 11pt !important;
}

  </style>
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
            <?php 

            foreach($data_siswa as $ds){?>
            
              <?php }?>
              <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div id="accordion">
                <div class="card">
                  <div class="card-header">
                    <a class="card-link text-center" data-toggle="collapse" href="#collapseOne">
                      
                      <h1>PROFIL NASABAH</h1>
                      
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        <div class="panel-body bio-graph-info">
                              
                              <div class="row">
                                 
                                 
                                  <div class="bio-row">
                                      
                                      <p><span>Nama Nasabah </span>: <?php echo $ds->nama_nasabah?></p>
                                  </div>
                                  <div class="bio-row">
                                      
                                      <p><span>Nomor Rekening </span>: <?php echo $ds->no_rek?></p>
                                  </div>
                                  <div class="bio-row">
                                    <p><span>Nomor KTP </span>: <?php echo $ds->no_ktp?></p>
                                      
                                  </div>
                                 
                                  <div class="bio-row">
                                      <p><span>Jenis Kelamin </span>: <?php echo $ds->jenis_kelamin?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Nomor Telepon </span>: <?php echo $ds->no_telp?></p>
                                  </div>
                                   <div class="bio-row">
                                      <p><span>Tanggal Lahir </span>: <?php echo $ds->tgl_lahir?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Alamat</span>: <?php echo $ds->alamat?></p>
                                  </div>
                              </div>
                          </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                     
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 &copy; TK.
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
