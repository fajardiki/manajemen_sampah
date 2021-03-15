<?php
  class Admin extends CI_Model {
    function cek_login($table,$where){    
    return $this->db->get_where($table,$where);
  }
  function delete($id){
		$this->db->where('idAdmin', $id);
        return $this->db->delete('admin');
	}     
public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_admin') total FROM admin WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode($aColumns, ', ') ." FROM admin WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       
		$this->db->insert('admin', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_admin',$data['id_admin']);
		$this->db->update('admin', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM admin WHERE id_admin=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_admin", (int) $data);
        $this->db->delete("admin");

                return ($this->db->affected_rows()) ? true : false;
    }
    
  }
  
?>