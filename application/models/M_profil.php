<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_profil extends CI_Model {

    public function get_siswa($id)
    {
    	return $this->db->query('SELECT * FROM nasabah WHERE id_nasabah='.$id)->result();
    }
    function edit_user($data){
		$this->db->where('id_nasabah',$data['id_nasabah']);
		$this->db->update('nasabah', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
}
