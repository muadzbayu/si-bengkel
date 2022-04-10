<?php
class Home extends CI_CONTROLLER{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }
    function index(){
        if($this->session->userdata('status_user') == "admin"){
            redirect('admin/Data_order');
        }else if($this->session->userdata('status_user') == "customer"){
           redirect('customer/Registrasi_data');
        }else{
            $this->load->view('Login');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}


?>