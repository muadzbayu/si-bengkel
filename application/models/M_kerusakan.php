<?php
class M_kerusakan extends CI_Model{
	function get_data_kerusakan($id){
		return $this->db->get_where('tbl_kerusakan',array('id_rekap'=>$id));
	}
	function simpan_data_kerusakan($id){
		$data = array('id_rekap'=>$id);
		$this->db->insert('tbl_kerusakan',$data);
	}
	function edit_kerusakan($data2,$id){
		$this->db->where('id_rekap',$id);
		$this->db->update('tbl_kerusakan',$data2);
	}
	function hapus($id){
		$this->db->where(array('id_rekap'=>$id));
		$this->db->delete('tbl_kerusakan');
	}
}