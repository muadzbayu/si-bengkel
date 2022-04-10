<?php
class Data_order extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status_login') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('M_data_order');
		$this->load->model('M_rekap');
	}
	/*function index(){
		if($this->session->userdata('status_user')=='admin'){
			$data['pil']=1;
			$data['data']=$this->M_data_order->get_data_order();
			$cek=$this->M_rekap->get_data_rekap();
			if($cek->num_rows<=0){
				$data['cek'] = "Belum ada data yang direkap";
			}
			else{
				$data['cek'] = "";
			}
			$data['data_rekap'] = $this->M_rekap->get_data_rekap()->result();
			$data['title'] = "Data Order";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_data_order',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}*/
	function index(){
		if($this->session->userdata('status_user')=='admin'){
			$data['pil']=1;
			$data['data']=$this->M_data_order->get_data_order();
			$data['title'] = "Data Order";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_data_order',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}
	function detail(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->uri->segment(4);
			$data['pil']=2;
			$data['data'] = $this->M_data_order->get_detail($id);
			$data['title'] = "Detail Data Order";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_detail_data_order',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}
	function edit(){
		if($this->session->userdata('status_user')=='admin'){
			$id_user=$this->input->post('id');
			$nama_tertanggung=$this->input->post('nama_tertanggung');
			$no_hp=$this->input->post('no_hp');
			$no_polisi=$this->input->post('no_polisi');			
			$merk_kendaraan=$this->input->post('merk_kendaraan');			
			$no_sim=$this->input->post('no_sim');
			$warna=$this->input->post('warna');
			$tahun=$this->input->post('tahun');
			$no_rangka=$this->input->post('no_rangka');
			$kerusakan=$this->input->post('kerusakan');
			$status=$this->input->post('status');
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
		}
	}
}