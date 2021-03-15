            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            
                 <a href="<?php echo base_url()?>C_nasabah" class="logo"> 
               <!--  <img 
                style="
                width: auto;
                height: auto;
                max-width: 150px;
                max-height: 50px;
                margin-bottom: 3px;
                " src="<?php echo base_url('assets/img/logo_tk.png');?>"> -->
                Manajemen Sampah
            </a>
            <!--logo end-->
            
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username" ><?php echo $this->session->userdata('username'); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout" style="background-color: #189AB4">
                            <li style="background-color: #189AB4"><a href="<?php echo base_url('logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
            </div>
