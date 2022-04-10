<?php
class Daftar extends CI_CONTROLLER{
    function __construct(){
        parent::__construct();
        $this->load->model('M_daftar');
    }
    function index(){
        $this->load->view('v_daftar');
    }
    function tambahUser(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->M_daftar->tambah($username,$password);
        redirect('Daftar');
    }   
}


?>