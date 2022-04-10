<?php
class M_laporan extends CI_Model{
	function get_data($id){
		$this->db->join('tbl_kerusakan','tbl_kerusakan.id_rekap = tbl_rekap.id','LEFT');
		$this->db->where('tbl_rekap.no_polisi',$id);
		$data = $this->db->get('tbl_rekap');
		return $data;
	}
	function get($id){
		return $this->db->get_where('tbl_customer',array('id_user'=>$id));
	}
}