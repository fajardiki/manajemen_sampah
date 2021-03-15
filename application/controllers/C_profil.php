<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_profil extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_profil');
        $this->load->model('Admin'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            // "stokbarang"=>$this->m_stok->getStok(),
            // "list_tipemakanan"=>$this->m_profil->get_TipeMakan(),
            "data_siswa"=>$this->m_profil->get_siswa($this->session->userdata('id_nasabah')),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Nasabah/v_profil',$data);
     
	}
    public function ganti_password()
    {
      $data=array(
            // "stokbarang"=>$this->m_stok->getStok(),
            // "list_tipemakanan"=>$this->m_profil->get_TipeMakan(),
            "data_siswa"=>$this->m_profil->get_siswa($this->session->userdata('id_nasabah')),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Nasabah/v_ganti_password',$data);   
    }
	public function rubah_password()
    {
         if ($this->input->post('password_baru')==$this->input->post('password2') ) { 
            $username = $this->input->post('username');
            
            $password = $this->input->post('password');
            
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
                 $data_user = array (
                    'password'=>password_hash($this->input->post('password_baru'), PASSWORD_BCRYPT),
                    ); 

                     $data_user['id_nasabah'] = $this->session->userdata('id_nasabah');
                     $sql=$this->m_profil->edit_user($data_user);
                        if ($sql == true) {
                            
                            echo "<script>alert('Berhasil Mengganti ,silahkan login lagi');window.location.href='".base_url()."/Logout'</script>";
                            
                        } else {
                            echo "<script>alert('Tidak bisa menyimpan');history.go(-1)</script>";
                        }    
                }

            }
            
          }else {
          echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
          }
    }
}
