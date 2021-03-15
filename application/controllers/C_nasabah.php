<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_nasabah extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_nasabah'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            // "stokbarang"=>$this->m_stok->getStok(),
            // "list_tipemakanan"=>$this->m_nasabah->get_TipeMakan(),
            "last_rekening"=>$this->m_nasabah->get_no_rek(),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Petugas/v_nasabah',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_nasabah', true);
        $respond= $this->m_nasabah->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        
        $sql    = $this->m_nasabah->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }

	 function view() {
        
        $aColumns = array('a.id_nasabah','no_rek','nama_nasabah','jumlah_rekening' );
        $typeColumns = array('int','chr','chr','chr');
        $sSearch    = $this->input->post('sSearch',true);
        $sSearch    = str_replace("'","''",$sSearch);
        $sWhere     = "";
        
         if ( isset($sSearch) && $sSearch != "" ) {
            $sWhere = "AND (";
            for ( $i = 0 ; $i < count($aColumns) ; $i++ ) {
                if($typeColumns[$i]!="chr"){
                    $sWhere .= " LOWER(".$aColumns[$i].") LIKE LOWER('%".($sSearch)."%') OR ";
                }else{
                    $sWhere .= " LOWER(".$aColumns[$i].") LIKE LOWER('%".($sSearch)."%') OR ";
                }
            }
            $sWhere = substr_replace( $sWhere, "", - 3 );
            $sWhere .= ')';
        }
        
        $iTotalRecords = $this->m_nasabah->get_total($aColumns, $sWhere);
        $iDisplayLength = intval($this->input->post('iDisplayLength',true));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart  = intval($this->input->post('iDisplayStart',true));
        $sEcho          = intval($_REQUEST['sEcho']);
        $iSortCol_0     = $this->input->post('iSortCol_0',true);
        $records        = array();
        $records["aaData"] = array();
        $sOrder = "";
        if ( isset($iDisplayStart) && $iDisplayLength != '-1' ) {
            $sLimit = " limit ".intval($iDisplayLength)." offset ".intval( $iDisplayStart );
        }

            if ( isset($iSortCol_0)) {
                    $sOrder = "ORDER BY  ";
                    for ( $i = 0 ; $i < intval($this->input->post('iSortingCols')) ; $i++ ) {
                        if ( $this->input->post('bSortable_'.intval($this->input->post('iSortCol_'.$i))) == "true" ) {
                            $sOrder .= "".$aColumns[ intval($this->input->post('iSortCol_'.$i)) ]." ".($this->input->post('sSortDir_'.$i) === 'desc' ? 'asc' : 'desc') .", ";
                        }
                    }

                    $sOrder = substr_replace( $sOrder, "", - 2 );
                    if ( $sOrder == "ORDER BY" ) {
                            $sOrder = "";
                    }
            }
        
        $data = $this->m_nasabah->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_nasabah;

            $action = '
                        <a href="javascript:void(0)" onclick="set_val(\'' . $id . '\')" class="btn btn-xs default" title="Edit">
                                        <i class="icon-pencil"></i>
                                    </a>
                        <a href="javascript:void(0)" onclick="set_del(\'' . $id . '\')" class="btn btn-xs default" title="Delete">
                                        <i class="icon-trash"></i>
                                    </a>
                                ';
            if(strlen($row->no_rek)==1){
                $last_rekening="000".$row->no_rek;
            }elseif(strlen($row->no_rek)==2){
                $last_rekening="00".$row->no_rek;
            }elseif(strlen($row->no_rek)==3){
                $last_rekening="0".$row->no_rek;
            }elseif(strlen($row->no_rek)>=4){
                $last_rekening=$row->no_rek;
            }
            $records["aaData"][] = array(
                "<center>" . $ino . "</center>",
                $last_rekening,
                $row->nama_nasabah,
                $row->jumlah_rekening,
                
             
                $action
            );
        }
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        echo json_encode($records);
    }
	 public function save() {
        $sql = '';

        $act = $this->input->post('act', true);
       
                        $data = array (
                        'nama_nasabah'=>$this->input->post('nama_nasabah'),
                        'alamat'=>$this->input->post('alamat'),
                        'tgl_lahir'=>$this->input->post('tgl_lahir'),
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                        'no_telp'=>$this->input->post('no_telp'),
                        'no_ktp'=>$this->input->post('no_ktp'),
                           
                        'no_rek'=>$this->input->post('no_rek'),
                    );
       

                if ($act == 'add') {

                    $data['username']=$this->input->post('username');
                    $data['password']=password_hash($this->input->post('username'), PASSWORD_BCRYPT);

                    $sql = $this->m_nasabah->add($data);
                    $data_saldo=array(
                        "id_nasabah"=>$sql[1],
                        "jumlah_rekening"=>0
                    );
                    $this->m_nasabah->add_saldo($data_saldo);
                    if ($sql[0] == true) {
                    
                     echo "1";
                    } else {
                     echo "0";
                    }
                } elseif ($act == 'edit') {
                 $data['id_nasabah'] = $this->input->post('id_nasabah', true);
                 $sql = $this->m_nasabah->edit($data);
                    if ($sql == true) {
                        echo "1up";
                    } else {
                        echo "0up";
                    }
                }
        // }else{
        //     echo "0";
        // }
       
    }
}
