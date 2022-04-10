<?php
class Login extends CI_CONTROLLER{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }
    function index(){
        $this->load->view('v_login');
    }
    function cekUser(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $cek = $this->M_login->cek($username,$password);
        if($cek->num_rows() > 0){
            $this->session->set_userdata('status_login',true);
            $this->session->set_userdata('user',$username);
            $data = $cek->row();
            if($data->status == "1"){// 1 = status admin
                $this->session->set_userdata('status_user','admin');
                $this->session->set_userdata('id_user',$data->id_user);
            }else if($data->status == "2"){//2 = status customer
                $this->session->set_userdata('status_user','customer');
                $this->session->set_userdata('id_user',$data->id_user);
            }
            redirect('Home');
        }
        if($this->session->userdata('status_login') == false){
            $this->session->set_flashdata('msg','<br>Username atau Password Salah');
            redirect('Login');
        }
    }
}


?>