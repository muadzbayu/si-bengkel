<?php
class Registrasi_data extends CI_CONTROLLER{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status_login') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('M_data_pengguna','Mdp');
        $this->load->model('M_kerusakan');
    }
    function index(){
        if($this->session->userdata('status_user')=='customer'){
            $cek = $this->Mdp->get_data_pengguna($this->session->userdata('id_user'));
            if($cek->num_rows() > 0){
                $data['pil']=1;
                $data['data'] = $cek->row();
                $data['title'] = "Registrasi Data";
                $this->load->view('v_index',$data);
                $this->load->view('customer/v_registrasi',$data);
                $this->load->view('v_footer');
            }
            else{
                //$this->M_kerusakan->simpan_data_kerusakan($this->session->userdata('id_user'));
                $this->Mdp->simpan_data_pengguna($this->session->userdata('id_user'));
                redirect('customer/Registrasi_data');
            }
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
    function daftar(){
        if($this->session->userdata('status_user')=='customer'){
            $id_user=$this->input->post('id_user');
            $nama_tertanggung=$this->input->post('nama_tertanggung');
            $alamat=$this->input->post('alamat');
            $no_hp=$this->input->post('no_hp');
            $no_sim=$this->input->post('no_sim');
            $no_rangka=$this->input->post('no_rangka');
            $merk_kendaraan=$this->input->post('merk_kendaraan');
            $warna=$this->input->post('warna');
            $tahun=$this->input->post('tahun');
            $no_polisi=$this->input->post('no_polisi');
            $data = array('nama_tertanggung'=>$nama_tertanggung,
                            'alamat'=>$alamat,
                            'no_hp'=>$no_hp,
                            'no_sim'=>$no_sim,
                            'no_rangka'=>$no_rangka,
                            'merk_kendaraan'=>$merk_kendaraan,
                            'warna'=>$warna,
                            'tahun'=>$tahun,
                            'no_polisi'=>$no_polisi);
            $this->Mdp->update_data_pengguna($data,$id_user);
            echo $this->session->set_flashdata('msg','<label style=color:green>Data Berhasil ditambahkan</label>');
            redirect('customer/Registrasi_data');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }

    function hapus(){
        if($this->session->userdata('status_user')=='admin'){
            $id_user=$this->uri->segment(4);
            $this->Mdp->hapus($id_user);
            redirect('admin/Data_order');
        }else{
            echo "Halaman tidak ditemukan";
        }
        }
}


?>