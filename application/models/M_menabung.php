<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menabung extends CI_Model {
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_menabung') total FROM menabung as a join nasabah as b on a.id_nasabah=b.id_nasabah join jenis_sampah as c on a.id_jenis_sampah=c.id_jenis_sampah join petugas as d on a.id_petugas=d.id_petugas WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM menabung as a join nasabah as b on a.id_nasabah=b.id_nasabah join jenis_sampah as c on a.id_jenis_sampah=c.id_jenis_sampah join petugas as d on a.id_petugas=d.id_petugas WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('menabung', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_menabung',$data['id_menabung']);
		$this->db->update('menabung', $data);
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
		$sql=$this->db->query("SELECT * FROM menabung WHERE id_menabung=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_menabung", (int) $data);
        $this->db->delete("menabung");

                return ($this->db->affected_rows()) ? true : false;
    }
 	public function get_nasabah()
 	{
 		$sql=$this->db->query("SELECT * FROM nasabah")->result();
		return $sql;
 	}
 	public function get_sampah()
 	{
 		$sql=$this->db->query("SELECT * FROM jenis_sampah")->result();
		return $sql;
 	}
}
