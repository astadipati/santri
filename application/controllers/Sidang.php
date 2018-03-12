<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('M_dashboard');
        $this->load->model('antrian_m','antrian');
	}

	public function input_sidang(){
        $data['main_body']='antrian/input_antrian_pihak_sidang_v_tampilan_baru';
		// $this->load->view('template_antrian', $data);
		$this->load->view('template/header');
		$this->load->view('content/input_sidang', $data);
		$this->load->view('template/footer');
    }
    public function non_sidang(){
        $this->load->view('template/header');
    }
}
