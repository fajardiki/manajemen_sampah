<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_report extends CI_Model {
	public function get_total_report($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_nasabah') total FROM nasabah as a join saldo as b on a.id_nasabah=b.id_nasabah WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data_report($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM nasabah as a join saldo as b on a.id_nasabah=b.id_nasabah WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
   public function get_total_detail_report($aColumns,$sWhere,$id)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_penarikan') total FROM report_nasabah WHERE id_nasabah=".$id." $sWhere
			");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data_detail_report($sLimit,$sWhere,$sOrder,$aColumns,$id)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM report_nasabah WHERE id_nasabah=".$id." $sWhere $sOrder $sLimit
		 ";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
}
