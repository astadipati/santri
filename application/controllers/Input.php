<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function klien(){	
		$this->load->view('template/header');
		$this->load->view('content/dashboard', $data);
		$this->load->view('template/footer');
    }
    public function operator(){
        $this->load->view('template/header');
    }
}
