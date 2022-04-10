<?php
class Cetak_data extends CI_Controller{
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
	function index(){
		if($this->session->userdata('status_user')=='admin'){
			$data['pil'] = 4;
			$data['data']=$this->M_rekap->get_cetak_data();
			$data['title'] = "Cetak Data SPK";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_cetak',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	function detail(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->uri->segment(4);
            $data['pil'] = 4;
			$data['data'] = $this->M_rekap->get_cetak_spk($id);
			$data['title'] = "Detail Rekap Data";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_detail_cetak',$data);
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

	function edit_spk(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->input->post('id');
			$no_polisi=$this->input->post('no_polisi');			
			$merk_kendaraan=$this->input->post('merk_kendaraan');
			$kerusakan=$this->input->post('kerusakan');			
			$data = array(	'no_polisi'=>$no_polisi,
							'merk_kendaraan'=>$merk_kendaraan
							);
			$data2 = array('kerusakan'=>$kerusakan);
			$this->M_rekap->edit_rekap_data($data,$id);
			$this->M_kerusakan->edit_kerusakan($data2,$id);
			redirect('admin/Cetak_data');
		}
	}
	function edit_innvoice(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->input->post('id');
			$nama_tertanggung=$this->input->post('nama_tertanggung');	
			$no_polisi=$this->input->post('no_polisi');			
			$merk_kendaraan=$this->input->post('merk_kendaraan');
			$biaya=$this->input->post('biaya');
			$data = array('nama_tertanggung'=>$nama_tertanggung,														
							'no_polisi'=>$no_polisi,
							'merk_kendaraan'=>$merk_kendaraan,
							);
			$data2 = array('biaya' => $biaya);
			$this->M_rekap->edit_rekap_data($data,$id);
			$this->M_kerusakan->edit_kerusakan($data2,$id);
			redirect('admin/Cetak_data/innvoice');
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
	function innvoice(){
		if($this->session->userdata('status_user')=='admin'){
			$data['pil'] = 4;
			$data['data']=$this->M_rekap->get_cetak_data();
			$data['title'] = "Cetak Data Innvoice";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_cetak_innvoice',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}
	function detail_innvoice(){
		if($this->session->userdata('status_user')=='admin'){
			$id = $this->uri->segment(4);
            $data['pil'] = 4;
			$data['data'] = $this->M_rekap->get_cetak_spk($id);
			$data['title'] = "Detail Rekap Data";
			$this->load->view('v_index',$data);
			$this->load->view('admin/v_detail_cetak_innvoice',$data);
			$this->load->view('v_footer');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	
    function export_spk_pdf()
    {
		$this->load->library('Pdf');
		//Atur Ukuruan Kertas
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
        $pdf->AddPage();
		// setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',20);
		// mencetak string 
        $pdf->Cell(40,10,'SPK');
		// Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,12,'',0,1);
        $pdf->SetFont('Arial','B',15);
		//Atur Tabel/Content
		$id = $this->uri->segment(4);
		$k = $this->M_rekap->get_cetak_spk($id);
		//lebar, tinggi, text yang akan ditampilkan, border cell, pilihan pindah baris setelah cell, perataan text
		$pdf->Cell(50,7,'No. Polisi',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->no_polisi,0,1);
		$pdf->SetFont('Arial','B',15);
		//Baris Baru
		$pdf->Cell(50,7,'Merek Kendaraan',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->merk_kendaraan,0,1);
		//Baris Baru
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(50,7,'Kerusakan',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->kerusakan,0,1);
		//Tampil Pdf     
        $pdf->Output();
    }

	function export_innvoice_pdf()
    {
		$this->load->library('Pdf');
		//Atur Ukuruan Kertas
		$pdf = new FPDF('P','mm','A4');
		// membuat halaman baru
        $pdf->AddPage();
		// setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',20);
		// mencetak string 
        $pdf->Cell(40,10,'Innvoice');
		// Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,12,'',0,1);
        $pdf->SetFont('Arial','B',15);
		//Atur Tabel/Content
		$id = $this->uri->segment(4);
		$k = $this->M_rekap->get_cetak_spk($id);
		//lebar, tinggi, text yang akan ditampilkan, border cell, pilihan pindah baris setelah cell, perataan text
		$pdf->Cell(60,7,'Nama Tertanggung',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->nama_tertanggung,0,1);
		$pdf->SetFont('Arial','B',15);
		//Baris Baru
		$pdf->Cell(60,7,'No. Polisi',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->no_polisi,0,1);
		$pdf->SetFont('Arial','B',15);
		//Baris Baru
		$pdf->Cell(60,7,'Merek Kendaraan',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->merk_kendaraan,0,1);
		//Baris Baru
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(60,7,'Biaya Jasa Perbaikan',0,0);
        $pdf->Cell(10,7,':',0,0);
		$pdf->SetFont('Arial','',15);
        $pdf->Cell(80,7,$k->biaya,0,1);
		//Tampil Pdf     
        $pdf->Output();

    }
}