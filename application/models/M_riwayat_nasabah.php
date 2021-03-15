<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_riwayat_nasabah extends CI_Model {
	public function get_total_menabung($aColumns,$sWhere,$id_nasabah)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_menabung') total FROM menabung as a join nasabah as b on a.id_nasabah=b.id_nasabah join jenis_sampah as c on a.id_jenis_sampah=c.id_jenis_sampah join petugas as d on a.id_petugas=d.id_petugas WHERE a.id_nasabah=".$id_nasabah." $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data_menabung($sLimit,$sWhere,$sOrder,$aColumns,$id_nasabah)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM menabung as a join nasabah as b on a.id_nasabah=b.id_nasabah join jenis_sampah as c on a.id_jenis_sampah=c.id_jenis_sampah join petugas as d on a.id_petugas=d.id_petugas WHERE a.id_nasabah=".$id_nasabah." $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
   public function get_total_penarikan($aColumns,$sWhere,$id)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_penarikan') total FROM penarikan as a join nasabah as b on a.id_nasabah=b.id_nasabah join petugas as d on a.id_petugas=d.id_petugas WHERE a.id_nasabah=".$id." $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data_penarikan($sLimit,$sWhere,$sOrder,$aColumns,$id)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM penarikan as a join nasabah as b on a.id_nasabah=b.id_nasabah join petugas as d on a.id_petugas=d.id_petugas WHERE a.id_nasabah=".$id." $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
}
