<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status_login') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('M_pengguna');
		$this->load->model('M_data_order');
	}
	function index(){
		if($this->session->userdata('status_user')=='admin'){
			$data['pil'] = 3;
			$data['data']=$this->M_pengguna->get_pengguna();
			$data['title'] = "Daftar Akun Pengguna";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_pengguna',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	function tambah_pengguna(){
	if($this->session->userdata('status_user')=='admin'){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$status=$this->input->post('status');
		if ($password2 <> $password) {
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
			redirect('admin/pengguna');
		}else{
			$this->M_pengguna->simpan_pengguna($username,$password,$status);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil ditambahkan</label>');
			redirect('admin/pengguna');
		}
		
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_pengguna(){
	if($this->session->userdata('status_user')=='admin'){
		$id_user=$this->input->post('id');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$status=$this->input->post('status');
		if($password2 <> $password) {
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
			redirect('admin/pengguna');
		}else{
			$this->M_pengguna->update_pengguna($id_user,$username,$password,$status);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil diupdate</label>');
			redirect('admin/pengguna');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function nonaktifkan(){
	if($this->session->userdata('status_user')=='admin'){
		$id_user=$this->input->post('id');
		$this->M_data_order->hapus($id_user);
		$this->M_pengguna->update_status($id_user);
		redirect('admin/pengguna');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}