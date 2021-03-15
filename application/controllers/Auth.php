<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth extends CI_Controller 
{
 
function __construct(){
    parent::__construct();    
    $this->load->model('Admin');
    
      if (!empty($this->session->userdata('username'))) {
          redirect('C_kelas');
          // echo "kosong";
      }
  }
  public function index()
  {
    $this->load->view('pilih_login');
  }
  function login_nasabah(){
    $this->load->view('login_nasabah');
  }
   function login_petugas(){
    $this->load->view('login');
  }
  function aksi_login(){
    $username = $this->input->post('username');
    // var_dump($username);
    $password = $this->input->post('password');
    // var_dump($password);
    $query = $this->db->get_where('petugas',array('username'=>$username));
    $data = $query->row_array();
    $hash = $data['password'];
    // var_dump();
    if (!password_verify($password, $hash)){
       echo "<script>alert('Username atau Password salah');history.go(-1)</script>";
    } 
    else {
      # code...
      $where = array(
      'username' => $username,
      'password' => $hash
      );
      $cek = $this->Admin->cek_login("petugas",$where)->num_rows();
      // var_dump($where);
      // var_dump($cek);
      if($cek > 0){
      $select=$this->db->get_where('petugas',array('username'=>$username));
      
      if($select->num_rows() > 0){ 
                $data=$select->row_array();
                $this->session->set_userdata('logged_in',TRUE);
                
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('username',$username);
                    $this->session->set_userdata('id_petugas',$data['id_petugas']);
                    redirect('C_nasabah');
                    
                
      }       
      
 
    }

    }

  }
  function aksi_login_nasabah(){
    $username = $this->input->post('username');
    // var_dump($username);
    $password = $this->input->post('password');
    // var_dump($password);
    $query = $this->db->get_where('nasabah',array('username'=>$username));
    $data = $query->row_array();
    $hash = $data['password'];
    // var_dump();
    if (!password_verify($password, $hash)){
       echo "<script>alert('Username atau Password salah');history.go(-1)</script>";
    } 
    else {
      # code...
      $where = array(
      'username' => $username,
      'password' => $hash
      );
      $cek = $this->Admin->cek_login("nasabah",$where)->num_rows();
      // var_dump($where);
      // var_dump($cek);
      if($cek > 0){
      $select=$this->db->get_where('nasabah',array('username'=>$username));
      
      if($select->num_rows() > 0){ 
                $data=$select->row_array();
                $this->session->set_userdata('logged_in',TRUE);
               
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('username',$username);
                    $this->session->set_userdata('id_nasabah',$data['id_nasabah']);
                    redirect('Dashboard_nasabah');
               
               
      }       
      
 
    }

    }

  }
  // function logout(){
  //   // $this->session->set_userdata('logged_in',FALSE);
  //   // var_dump($this->session->userdata('logged_in'));
  //   $this->session->sess_destroy();
  //   echo "kosong";
  //   // redirect(base_url('Auth/login'));
  // }

}