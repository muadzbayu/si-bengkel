<?php
class M_data_order extends CI_Model{
	function get_data_order(){
		//$this->db->join('tbl_kerusakan','tbl_kerusakan.id_user = tbl_customer.id_user','LEFT');
		$data = $this->db->get('tbl_customer');
		return $data->result();
	}
	function get_detail($id){
		$this->db->join('tbl_kerusakan','tbl_kerusakan.id_user = tbl_customer.id_user','LEFT');
		$this->db->where('id_customer',$id);
		return $this->db->get('tbl_customer')->row();
	}
	function simpan_data($id){
		$data = array('id_user'=>$id);
		$this->db->insert('tbl_customer',$data);
	}
	function hapus($id){
		$this->db->where(array('id_user'=>$id));
		$this->db->delete('tbl_customer');
	}

	function get_instant($id){
		return $this->db->get_where('tbl_customer',array('id_customer'=>$id));
	}
}