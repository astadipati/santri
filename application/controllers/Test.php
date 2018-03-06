<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_dashboard');
		// $this->load->model('Model_laporan');
		// $this->load->model('Model_instansi');
	}

	public function index()
	{
		$this->load->view('template/full');
	}
}
