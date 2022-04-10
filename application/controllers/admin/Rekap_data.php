<?php
class Rekap_data extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status_login') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('M_data_order');
		$this->load->model('M_rekap');
		$this->load->model('M_kerusakan');
	}
	/*function index(){
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
	}*/
	function index(){
		if($this->session->userdata('status_user')=='admin'){
			$data['pil'] = 2;
			$cek=$this->M_rekap->get_data_rekap();
			if($cek->num_rows<=0){
				$data['cek'] = "Belum ada data yang direkap";
			}
			else{
				$data['cek'] = "";
			}
			$data['data_rekap'] = $this->M_rekap->get_data_rekap()->result();
			$data['title'] = "Rekap Data";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_rekap_data',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	function detail(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->uri->segment(4);
			$cek = $this->M_kerusakan->get_data_kerusakan($id);
			if($cek->num_rows() <= 0 ){
				$this->M_kerusakan->simpan_data_kerusakan($id);
			}
			$data['pil']=2;
			$data['data'] = $this->M_rekap->get_detail($id);
			$data['title'] = "Detail Rekap Data";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_detail_rekap_data',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}	
	function tambah_instant(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->uri->segment(4);
			$data = $this->M_data_order->get_instant($id)->row();
			$nama_tertanggung=$data->nama_tertanggung;
			$no_hp=$data->no_hp;						
			$no_sim=$data->no_sim;
			$no_polisi=$data->no_polisi;			
			$merk_kendaraan=$data->merk_kendaraan;
			$warna=$data->warna;
			$tahun=$data->tahun;
			$no_rangka=$data->no_rangka;
			$data = array('nama_tertanggung'=>$nama_tertanggung,
							'no_hp'=>$no_hp,
							'no_sim'=>$no_sim,							
							'no_polisi'=>$no_polisi,
							'merk_kendaraan'=>$merk_kendaraan,
							'warna_kendaraan'=>$warna,
							'tahun'=>$tahun,							
							'no_rangka'=>$no_rangka);
			$this->M_rekap->tambah_rekap_data($data);
			redirect('admin/Data_order');
		}
	}

	function tambah_data(){
		if($this->session->userdata('status_user')=='admin'){
			$nama_tertanggung=$this->input->post('nama_tertanggung');
			$no_hp=$this->input->post('no_hp');						
			$no_sim=$this->input->post('no_sim');
			$no_polisi=$this->input->post('no_polisi');			
			$merk_kendaraan=$this->input->post('merk_kendaraan');
			$warna=$this->input->post('warna_kendaraan');
			$tahun=$this->input->post('tahun');
			$no_rangka=$this->input->post('no_rangka');
			$kerusakan=$this->input->post('kerusakan');
			$biaya=$this->input->post('biaya');
			$status=$this->input->post('status');
			$data = array('nama_tertanggung'=>$nama_tertanggung,
							'no_hp'=>$no_hp,
							'no_sim'=>$no_sim,							
							'no_polisi'=>$no_polisi,
							'merk_kendaraan'=>$merk_kendaraan,
							'warna_kendaraan'=>$warna,
							'tahun'=>$tahun,							
							'no_rangka'=>$no_rangka);
			$this->M_rekap->tambah_rekap_data($data);
		}
	}

	function edit(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->input->post('id');
			$nama_tertanggung=$this->input->post('nama_tertanggung');
			$no_hp=$this->input->post('no_hp');						
			$no_sim=$this->input->post('no_sim');
			$no_polisi=$this->input->post('no_polisi');			
			$merk_kendaraan=$this->input->post('merk_kendaraan');
			$warna=$this->input->post('warna_kendaraan');
			$tahun=$this->input->post('tahun');
			$no_rangka=$this->input->post('no_rangka');
			$kerusakan=$this->input->post('kerusakan');
			$biaya=$this->input->post('biaya');
			$status=$this->input->post('status');
			$data = array('nama_tertanggung'=>$nama_tertanggung,
							'no_hp'=>$no_hp,
							'no_sim'=>$no_sim,							
							'no_polisi'=>$no_polisi,
							'merk_kendaraan'=>$merk_kendaraan,
							'warna_kendaraan'=>$warna,
							'tahun'=>$tahun,							
							'no_rangka'=>$no_rangka);
			$data2 = array('kerusakan'=>$kerusakan,
							'biaya' => $biaya,
							'status' => $status);
			$this->M_rekap->edit_rekap_data($data,$id);
			$this->M_kerusakan->edit_kerusakan($data2,$id);
			redirect('admin/Rekap_data');
		}
	}
	function hapus(){
		if($this->session->userdata('status_user')=='admin'){
			$id_user=$this->uri->segment(4);
			$this->M_kerusakan->hapus($id_user);
			$this->M_rekap->hapus($id_user);
			redirect('admin/Data_order');
		}else{
			echo "Halaman tidak ditemukan";
		}
    }
}