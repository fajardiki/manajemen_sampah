<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_nasabah extends CI_Model {
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_nasabah') total FROM nasabah as a JOIN saldo as b ON a.id_nasabah=b.id_nasabah WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM nasabah as a JOIN saldo as b ON a.id_nasabah=b.id_nasabah WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('nasabah', $data);
		if($this->db->affected_rows()){
			$a[1]=$this->db->insert_id();
			$a[0]=true;
			return $a;
		}else{
			return false;
		}
	}
	function add_saldo($data){
       
		$this->db->insert('saldo', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	function edit($data){
		$this->db->where('id_nasabah',$data['id_nasabah']);
		$this->db->update('nasabah', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM nasabah WHERE id_nasabah=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_nasabah", (int) $data);
        $this->db->delete("nasabah");

                return ($this->db->affected_rows()) ? true : false;
    }
    public function get_no_rek()
    {
    	$sql=$this->db->query("SELECT MAX(no_rek)+1 as nomor FROM nasabah")->row()->nomor;
    	if ($sql==NULL||$sql==""||$sql==0) {
    		return 1;	
    	}else{
    		return $sql;	
    	}
		
    }
}
