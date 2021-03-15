<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pengumuman extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_pengumuman'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            // "stokbarang"=>$this->m_stok->getStok(),
            "list_nasabah"=>$this->m_pengumuman->get_nasabah(),
            // "last_rekening"=>$this->m_pengumuman->get_no_rek(),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Petugas/v_pengumuman',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_pengumuman', true);
        $respond= $this->m_pengumuman->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        
        $sql    = $this->m_pengumuman->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }

	 function view() {
        
        $aColumns = array('id_pengumuman','nama_nasabah','judul','tgl_pengumuman' );
        $typeColumns = array('int','chr','chr','date');
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
        
        $iTotalRecords = $this->m_pengumuman->get_total($aColumns, $sWhere);
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
        
        $data = $this->m_pengumuman->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_pengumuman;

            $action = '
                        <a href="javascript:void(0)" onclick="set_val(\'' . $id . '\')" class="btn btn-xs default" title="Edit">
                                        <i class="icon-pencil"></i>
                                    </a>
                        <a href="javascript:void(0)" onclick="set_del(\'' . $id . '\')" class="btn btn-xs default" title="Delete">
                                        <i class="icon-trash"></i>
                                    </a>
                                ';
            
            $records["aaData"][] = array(
                "<center>" . $ino . "</center>",
                $row->nama_nasabah,
                $row->judul,
                $row->tgl_pengumuman,
                
             
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
                        'id_nasabah'=>$this->input->post('id_nasabah'),
                        'judul'=>$this->input->post('judul'),
                        'isi_pengumuman'=>$this->input->post('isi_pengumuman'),
                        'tgl_pengumuman'=>date("m-d-Y"),
                    );
       

                if ($act == 'add') {

                   

                    $sql = $this->m_pengumuman->add($data);
                   
                    
                    if ($sql== true) {
                    
                     echo "1";
                    } else {
                     echo "0";
                    }
                } elseif ($act == 'edit') {
                 $data['id_pengumuman'] = $this->input->post('id_pengumuman', true);
                 $sql = $this->m_pengumuman->edit($data);
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
