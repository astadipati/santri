<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_dashboard');
		$this->load->model('M_jadwal_sidang');
		// $this->load->model('Model_instansi');
	}

	public function index()
	{
		$data['tot_daftar']    = $this->M_dashboard->tampil_daftar()->num_rows(); 
		$data['jml_sdg1']    = $this->M_dashboard->tampil_sidang_1()->num_rows(); 
		$data['jml_sdg2']    = $this->M_dashboard->tampil_sidang_2()->num_rows(); 
		$data['ambil_sdg1']    = $this->M_dashboard->ambil_sidang_1()->num_rows(); 
		$data['ambil_sdg2']    = $this->M_dashboard->ambil_sidang_2()->num_rows(); 
		$this->load->view('template/header');
		$this->load->view('content/dashboard', $data);
		$this->load->view('template/footer');
	}
}
