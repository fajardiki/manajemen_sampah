<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	
 public function get_jumlah_saldo()
 	{
 		$sql=$this->db->query('SELECT SUM(jumlah_rekening) as total FROM saldo')->row()->total;
 		return $sql;
 	}
  public function get_jumlah_nasabah()
 	{
 		$sql=$this->db->query('SELECT COUNT(id_nasabah) as total FROM nasabah')->row()->total;
 		return $sql;
 	}	
  public function get_jumlah_petugas()
 	{
 		$sql=$this->db->query('SELECT COUNT(id_petugas) as total FROM petugas')->row()->total;
 		return $sql;
 	}
  function jumlah_saldo()
    {	
    	$year=date("Y");
        $sql=$this->db->query("SELECT COUNT(id_saldo) as jumlah,MONTH(saldo.update_tanggal) as bulan FROM saldo WHERE YEAR(saldo.update_tanggal)=2021 GROUP BY MONTH(saldo.update_tanggal)")->result();
        return $sql;
    }
}
