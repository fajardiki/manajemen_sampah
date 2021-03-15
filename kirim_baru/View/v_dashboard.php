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
     <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?php echo $list_nasabah?>
                              </h1>
                              <p>Nasabah</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?php echo $list_petugas?>
                              </h1>
                              <p>Petugas</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-dollar"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  <?php echo $saldo?>
                              </h1>
                              <p>Jumlah Saldo</p>
                          </div>
                      </section>
                  </div>
                  
                
              </div>
              <!--state overview end-->

            <!--  <canvas id="myChart"></canvas>
             <?php
              //Inisialisasi nilai variabel awal
              $nama_bulan= "";
              $jumlah=null;
              foreach ($jumlah_saldo as $item)
              {
                  $dateObj   = DateTime::createFromFormat('!m', $item->bulan);
                  $monthName = $dateObj->format('F'); // March
                  $nama_bulan .= "'$monthName'". ", ";
                  $jum=$item->jumlah;
                  $jumlah .= "$jum". ", ";
              }
              ?> -->
             <div class="col-lg-6">
                          <section class="panel">
                             <header class="panel-heading">
                              Jumlah Saldo selama 1 tahun
                          </header>
                          <?php
                              foreach($jumlah_saldo as $item){
                                $dateObj   = DateTime::createFromFormat('!m', $item->bulan);
                                $monthName = $dateObj->format('F'); // March
                                  $Tanggal1[] = $monthName;
                                  $JumlahHarga1[] = (float) $item->jumlah;
                              }
                          ?>
                          <canvas id="canvas" width="500px" height="280"></canvas>
 
                        <!--Load chart js-->
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js"></script>
                        <script>
                     
                                var lineChartData = {
                                    labels : <?php echo json_encode($Tanggal1);?>,
                                    datasets : [
                                         
                                        {
                                            fillColor: "rgba(60,141,188,0.9)",
                                            strokeColor: "rgba(60,141,188,0.8)",
                                            pointColor: "#3b8bba",
                                            pointStrokeColor: "#fff",
                                            pointHighlightFill: "#fff",
                                            pointHighlightStroke: "rgba(152,235,239,1)",
                                            data : <?php echo json_encode($JumlahHarga1);?>
                                        }
                     
                                    ]
                                     
                                }
                     
                            var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
                             
                        </script>

                          </section>
                      </div>

          </section>
      </section>
       
      <script src="<?php echo base_url()?>/assets/assets/chart-master/Chart.js"></script>
     <!--  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $nama_bulan; ?>],
            datasets: [{
                label:'Data Saldo Per bulan selama 1 tahun ',
                backgroundColor: ['rgb(255, 99, 132)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script> -->
  </body>
</html>
