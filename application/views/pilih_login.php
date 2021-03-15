<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Pilih Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

     
       
        <form class="form-signin" >
        <h2 class="form-signin-heading" style="background-color: #05445E">Pilih User</h2>
        <div class="login-wrap">
          
           <button class="btn btn-lg  btn-block" style="background-color: #189AB4;color: #D4F1F4"  type="button" onclick="nasabah()">Sebagai Nasabah</button>
           <button class="btn btn-lg  btn-block" style="background-color: #189AB4;color: #D4F1F4"  type="button" onclick="petugas()">Sebagai Petugas</button>
           

        </div>

          <!-- Modal -->
        
          <!-- modal -->

      </form>

          <!-- modal -->

     

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       function nasabah() {
        window.location = "<?php echo base_url()?>Auth/login_nasabah";
        }
        function petugas() {
            window.location = "<?php echo base_url()?>Auth/login_petugas";
        }
    </script>

  </body>
</html>
