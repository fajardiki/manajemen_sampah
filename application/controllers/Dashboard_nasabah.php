<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_nasabah extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_dashboard_nasabah'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            "saldo"=>$this->m_dashboard_nasabah->get_saldo($this->session->userdata('id_nasabah')),
            "list"=>$this->m_dashboard_nasabah->get_kegiatan($this->session->userdata('id_nasabah')),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Nasabah/v_dashboard',$data);
	}
	
}
