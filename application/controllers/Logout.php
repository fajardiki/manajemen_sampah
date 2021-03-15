<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Logout extends CI_Controller 
{
 

  function index(){
    // $this->session->set_userdata('logged_in',FALSE);
    // var_dump($this->session->userdata('logged_in'));
    $this->session->sess_destroy();
    // echo "kosong";
    redirect(base_url('Auth'));
  }

}