<?php
class M_data_pengguna extends CI_Model{
	function get_data_pengguna($id){
		return $this->db->get_where('tbl_customer',array('id_user'=>$id));
	}
	function simpan_data_pengguna($id){
		$data = array('id_user'=>$id);
		$this->db->insert('tbl_customer',$data);
	}
	function update_data_pengguna($data,$id){
		$this->db->where(array('id_user'=>$id));
		$this->db->update('tbl_customer',$data);
	}
	function update_status($id){
		$this->db->where(array('id_user'=>$id));
		$this->db->delete('tbl_login');
	}
}