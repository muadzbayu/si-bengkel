<?php
class M_login extends CI_MODEL{
    function cek($user,$pass){
        $data = array('username' => $user, 'password'=>$pass);
        return $this->db->get_where('tbl_login',$data);
    }
}

?>