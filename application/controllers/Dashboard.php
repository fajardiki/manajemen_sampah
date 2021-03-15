<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_dashboard'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            "saldo"=>$this->m_dashboard->get_jumlah_saldo(),
            "list_petugas"=>$this->m_dashboard->get_jumlah_petugas(),
            "list_nasabah"=>$this->m_dashboard->get_jumlah_nasabah(),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Petugas/v_dashboard',$data);
	}
	
}
