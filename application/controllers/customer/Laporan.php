<?php
class Laporan extends CI_CONTROLLER{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status_login') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('M_laporan');
    }
    function index(){
        if($this->session->userdata('status_user')=='customer'){
            $data['pil']=2;
            $k = $this->M_laporan->get($this->session->userdata('id_user'))->row();
            $cek = $this->M_laporan->get_data($k->no_polisi);
            if($cek->num_rows() > 0){
                $data['data'] = $cek->row();
                $data['title'] = "Laporan Data";
                $this->load->view('v_index',$data);
                $this->load->view('customer/v_laporan',$data);
                $this->load->view('v_footer');
            }else{
                echo "Data Belum dikonfirmasi Oleh Admin";
            }            
        }       
    }    
}


?>