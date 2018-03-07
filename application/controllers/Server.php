<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function sidang(){	
		$this->load->view('template/header');
		$this->load->view('content/dashboard', $data);
		$this->load->view('template/footer');
    }
    public function non_sidang(){
        $this->load->view('template/header');
    }
}
