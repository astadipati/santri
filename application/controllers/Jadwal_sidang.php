<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_sidang extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_jadwal_sidang');
	}

	public function index()
	{
		// $data['tot_daftar']    = $this->M_jadwal_sidang->tampil_sidang()->num_rows(); 
		// $this->load->view('jadwal_sidang/jadwal_sidang_content');
		$this->load->view('template/header');
		$this->load->view('content/jadwal_sidang');
		$this->load->view('template/footer');
	}
	function jadwal_sidang_data(){
		$data=$this->M_jadwal_sidang->tampil_sidang();
		echo json_encode($data);
	}
}
