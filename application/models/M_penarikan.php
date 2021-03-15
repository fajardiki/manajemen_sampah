<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penarikan extends CI_Model {
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_penarikan') total FROM penarikan as a join nasabah as b on a.id_nasabah=b.id_nasabah join petugas as d on a.id_petugas=d.id_petugas WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM penarikan as a join nasabah as b on a.id_nasabah=b.id_nasabah join petugas as d on a.id_petugas=d.id_petugas WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('penarikan', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_penarikan',$data['id_penarikan']);
		$this->db->update('penarikan', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	function edit_saldo($data){
		$this->db->where('id_nasabah',$data['id_nasabah']);
		$this->db->update('saldo', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM penarikan WHERE id_penarikan=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_penarikan", (int) $data);
        $this->db->delete("penarikan");

                return ($this->db->affected_rows()) ? true : false;
    }
 	public function get_nasabah()
 	{
 		$sql=$this->db->query("SELECT * FROM nasabah")->result();
		return $sql;
 	}
 	
}
