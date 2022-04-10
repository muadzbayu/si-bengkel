<?php
class M_rekap extends CI_Model{
	function get_data_rekap(){
		$this->db->join('tbl_kerusakan','tbl_kerusakan.id_rekap = tbl_rekap.id','LEFT');
		$data = $this->db->get('tbl_rekap');
		return $data;
	}
	function get_cetak_spk($id){
		$this->db->join('tbl_kerusakan','tbl_kerusakan.id_rekap = tbl_rekap.id','LEFT');
		$this->db->where('id',$id);
		return $this->db->get('tbl_rekap')->row();
	}

	function get_detail($id){
		$this->db->join('tbl_kerusakan','tbl_kerusakan.id_rekap = tbl_rekap.id','LEFT');
		$this->db->where('id',$id);
		return $this->db->get('tbl_rekap')->row();
	}
	function tambah_rekap_data($data){
		$this->db->insert('tbl_rekap',$data);
	}
	function edit_rekap_data($data,$id){
		$this->db->where('id',$id);
		$this->db->update('tbl_rekap',$data);
	}
	function hapus($id){
		$this->db->where(array('id'=>$id));
		$this->db->delete('tbl_rekap');
	}
	function get_cetak_data(){
		$this->db->join('tbl_kerusakan','tbl_kerusakan.id_rekap = tbl_rekap.id','LEFT');
		$this->db->where('status','Konfirmasi');
		$data = $this->db->get('tbl_rekap');
		return $data;
	}
}