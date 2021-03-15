<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard_nasabah extends CI_Model {
	public function get_kegiatan($id_nasabah)
	   {
	   	return $this->db->query('SELECT * FROM pengumuman WHERE id_nasabah='.$id_nasabah)->result();
	   } 
	public function get_saldo($id_nasabah)
	   {
	   	return $this->db->query('SELECT jumlah_rekening FROM saldo WHERE id_nasabah='.$id_nasabah)->row()->jumlah_rekening;
	   }   
}
