<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengumuman extends CI_Model {
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_pengumuman') total FROM pengumuman as a JOIN nasabah as b on a.id_nasabah=b.id_nasabah WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM pengumuman as a JOIN nasabah as b on a.id_nasabah=b.id_nasabah WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('pengumuman', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_pengumuman',$data['id_pengumuman']);
		$this->db->update('pengumuman', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM pengumuman WHERE id_pengumuman=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_pengumuman", (int) $data);
        $this->db->delete("pengumuman");

                return ($this->db->affected_rows()) ? true : false;
    }
 	public function get_nasabah()
 	  {
 	  	$sql=$this->db->query("SELECT * FROM nasabah")->result();
		return $sql;
 	  }  
}
