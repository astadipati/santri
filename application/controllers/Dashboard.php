<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_dashboard');
		// $this->load->model('Model_laporan');
		// $this->load->model('Model_instansi');
	}

	public function index()
	{
		$data['tot_daftar']    = $this->M_dashboard->tampil_daftar()->num_rows(); 
		// $data['tot_daftar'] = $this->M_dashboard->jml_sidang()->num_rows();
		$this->load->view('template/header');
		$this->load->view('content/dashboard', $data);
		$this->load->view('template/footer');
	}
}
