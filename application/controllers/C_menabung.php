<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_menabung extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_menabung'); // Load model SiswaModel.php yang ada di folder models
        if (!$this->session->userdata('username')) {
          redirect('auth');
        }

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            // "stokbarang"=>$this->m_stok->getStok(),
            "list_nasabah"=>$this->m_menabung->get_nasabah(),
            "list_sampah"=>$this->m_menabung->get_sampah(),
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('Petugas/v_menabung',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_menabung', true);
        $respond= $this->m_menabung->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        $id_nasabah=$this->db->query('SELECT id_nasabah FROM menabung WHERE id_menabung='.$id)->row()->id_nasabah;
        $saldo_sebelumnya=$this->db->query('SELECT jumlah_rekening FROM saldo WHERE id_nasabah='.$id_nasabah)->row()->jumlah_rekening;
        $pengurangan=$this->db->query('SELECT total_harga FROM menabung WHERE id_menabung='.$id)->row()->total_harga;
        $data_saldo=array(
            "jumlah_rekening"=>$saldo_sebelumnya-$pengurangan,
            "id_nasabah"=>$id_nasabah
        );
        $this->m_menabung->edit_saldo($data_saldo);
        $sql    = $this->m_menabung->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }

	 function view() {
        
        $aColumns = array('id_menabung','tgl_transaksi','nama','nama_nasabah','nama_sampah','total_harga' );
        $typeColumns = array('int','date','chr','chr','chr','chr');
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
        
        $iTotalRecords = $this->m_menabung->get_total($aColumns, $sWhere);
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
        
        $data = $this->m_menabung->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_menabung;
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
                $row->nama_sampah,
                $row->total_harga,
                
             
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
        $ls=$this->input->post('id_jenis_sampah').strlen("-");
        
        
                        $data = array (
                        'id_petugas'=>$this->session->userdata('id_petugas'),
                        'id_nasabah'=>$this->input->post('id_nasabah'),
                        'id_jenis_sampah'=>$ls[0],
                        'tgl_transaksi'=>date("Y-m-d"),
                        'jumlah_kg'=>$this->input->post('jumlah_kg'),
                        'total_harga'=>$this->input->post('total_harga')
                    );
       

                if ($act == 'add') {
                    $saldo_sebelumnya=$this->db->query('SELECT jumlah_rekening FROM saldo WHERE id_nasabah='.$data['id_nasabah'])->row()->jumlah_rekening;
                    $data_saldo=array(
                        "jumlah_rekening"=>$saldo_sebelumnya+$data['total_harga'],
                        "id_nasabah"=>$data['id_nasabah']
                    );
                    $sql = $this->m_menabung->edit_saldo($data_saldo);

                    $sql = $this->m_menabung->add($data);
                   
                    
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
