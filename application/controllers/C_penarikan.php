<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_penarikan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_penarikan'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            // "stokbarang"=>$this->m_stok->getStok(),
            "list_nasabah"=>$this->m_penarikan->get_nasabah(),
            
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Petugas/v_penarikan',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_penarikan', true);
        $respond= $this->m_penarikan->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        $id_nasabah=$this->db->query('SELECT id_nasabah FROM penarikan WHERE id_penarikan='.$id)->row()->id_nasabah;
        $saldo_sebelumnya=$this->db->query('SELECT jumlah_rekening FROM saldo WHERE id_nasabah='.$id_nasabah)->row()->jumlah_rekening;
        $pertambahan=$this->db->query('SELECT jumlah_penarikan FROM penarikan WHERE id_penarikan='.$id)->row()->jumlah_penarikan;
        $data_saldo=array(
            "jumlah_rekening"=>$saldo_sebelumnya+$pertambahan,
            "id_nasabah"=>$id_nasabah
        );
        $this->m_penarikan->edit_saldo($data_saldo);
        $sql    = $this->m_penarikan->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }
    function ganti_sisa(){
        
        $id     = $this->input->post('id', true);
       
        $saldo_sebelumnya=$this->db->query('SELECT jumlah_rekening FROM saldo WHERE id_nasabah='.$id)->row()->jumlah_rekening;

        echo $saldo_sebelumnya;
    }

	 function view() {
        
        $aColumns = array('id_penarikan','tgl_transaksi','nama','nama_nasabah','jumlah_penarikan' );
        $typeColumns = array('int','date','chr','chr','chr');
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
        
        $iTotalRecords = $this->m_penarikan->get_total($aColumns, $sWhere);
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
        
        $data = $this->m_penarikan->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_penarikan;
            // <a href="javascript:void(0)" onclick="set_val(\'' . $id . '\')" class="btn btn-xs default" title="Edit">
            //                             <i class="icon-pencil"></i>
            //                         </a>
            $action = '
                        
                        <a href="javascript:void(0)" onclick="set_del(\'' . $id . '\')" class="btn btn-xs default" title="Delete">
                                        <i class="icon-trash"></i>
                                    </a>
                                ';
            
            $records["aaData"][] = array(
                "<center>" . $ino . "</center>",
                date("d-m-Y",strtotime($row->tgl_transaksi)),
                $row->nama,
                $row->nama_nasabah,
                
                $row->jumlah_penarikan,
                
             
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
                        'id_petugas'=>$this->session->userdata('id_petugas'),
                        'id_nasabah'=>$this->input->post('id_nasabah'),
                        
                        'tgl_transaksi'=>date("Y-m-d"),
                        
                        'jumlah_penarikan'=>$this->input->post('jumlah_penarikan')
                    );
       

                if ($act == 'add') {
                    $saldo_sebelumnya=$this->db->query('SELECT jumlah_rekening FROM saldo WHERE id_nasabah='.$data['id_nasabah'])->row()->jumlah_rekening;
                    $data_saldo=array(
                        "jumlah_rekening"=>$saldo_sebelumnya-$data['jumlah_penarikan'],
                        "id_nasabah"=>$data['id_nasabah']
                    );
                    $sql = $this->m_penarikan->edit_saldo($data_saldo);

                    $sql = $this->m_penarikan->add($data);
                   
                    
                    if ($sql== true) {
                    
                     echo "1";
                    } else {
                     echo "0";
                    }
                } 
        // }else{
        //     echo "0";
        // }
       
    }
}
