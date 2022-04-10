<?php
class M_Daftar extends CI_MODEL{
    function cek($user,$pass){
        $data = array('username' => $user, 'password'=>$pass, 'status'=>"1");
        return $this->db->get_where('tbl_login',$data);
    }
    function tambah($user, $pass){
        $cekData = $this->db->get_where('tbl_login',array('username'=>$user));
        if($cekData->num_rows() > 0){
            echo $this->session->set_flashdata('msg','<p style="color:red">Username Tidak Tersedia</p>');
        }else{
            $data = array('username' => $user, 'password'=>$pass, 'status'=>"2");
            $this->db->insert('tbl_login',$data);
            echo $this->session->set_flashdata('msg', '<p style="color:green">Data Anda Telah Berhasil Ditambahkan</p>');
        }
    }
}

?>