<?php
class M_pengguna extends CI_Model{
	function get_pengguna(){
		return $this->db->get('tbl_login');
	}
	function simpan_pengguna($username,$password,$status){
		$data = array('username'=>$username, 'password'=>md5($password), 'status' => $status);
		$this->db->insert('tbl_login',$data);
	}
	function update_pengguna($id,$username,$password,$status){
		$data = array('username'=>$username, 'password'=>md5($password), 'status' => $status);
		$this->db->where(array('id_user'=>$id));
		$this->db->update('tbl_login',$data);
	}
	function update_status($id){
		$this->db->where(array('id_user'=>$id));
		$this->db->delete('tbl_login');
	}
}