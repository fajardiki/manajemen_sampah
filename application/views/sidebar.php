 <div id="sidebar"  class="nav-collapse " style="background-color: #05445E">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                 
                  
                  <?php if($this->session->userdata('akses')==1){?>
                     <li >
                      <a href="<?php echo base_url()?>Dashboard" style="color: white;">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                    <li class="sub-menu">
                      <a href="javascript:;" style="color: white;">
                          <i class="icon-tasks"></i>
                          <span>Form Data</span>
                      </a>
                      <ul class="sub">
                           <li class="sub-menu"><a  href="<?php echo base_url()?>C_nasabah" style="color: white;">Tambah Nasabah</a></li>
                   <li class="sub-menu"><a  href="<?php echo base_url()?>C_sampah" style="color: white;">Tambah Jenis Sampah</a></li>
                          <li class="sub-menu"><a  href="<?php echo base_url()?>C_pengumuman" style="color: white;">Tambah Pengumuman</a></li>
                          <li class="sub-menu"><a  href="<?php echo base_url()?>C_petugas" style="color: white;">Tambah Petugas</a></li>
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" style="color: white;">
                          <i class="icon-tasks"></i>
                          <span>Form Transaksi</span>
                      </a>
                      <ul class="sub">
                           <li class="sub-menu"><a  href="<?php echo base_url()?>C_menabung" style="color: white;">Menabung</a></li>
                   <li class="sub-menu"><a  href="<?php echo base_url()?>C_penarikan" style="color: white;">Penarikan</a></li>
                          
                      </ul>
                  </li>
                   <li>
                      <a href="<?php echo base_url()?>C_report" style="color: white;">
                          <i class="icon-book"></i>
                          <span>Laporan Semua Nasabah</span>
                      </a>
                  </li>
                         
                    <?php }else{?>
                      <li class="sub-menu" style="background-color: #05445E"><a  href="<?php echo base_url()?>Dashboard_nasabah" style="color: white;">Dashboard</a></li>
                     <li class="sub-menu"><a  href="<?php echo base_url()?>C_profil" style="color: white;">Data Diri</a></li>
                       
                          
                          
                          <li class="sub-menu"><a  href="<?php echo base_url()?>C_riwayat_nasabah" style="color: white;">Riwayat Transaksi</a></li>
                          
                          <li class="sub-menu"><a  href="<?php echo base_url()?>C_profil/ganti_password" style="color: white;">Ganti Password</a></li>
                    <?php }?>
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-th"></i>
                          <span>Informasi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url()?>Logika">Implementasi Logika Fuzzy</a></li>
                          <li><a  href="<?php echo base_url()?>Logika/data_rekomendasi">Riwayat Implementasi User</a></li>
                      </ul>
                  </li> -->
              </ul>

          </div>