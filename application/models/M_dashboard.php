<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	
    function tampil_daftar(){
        $query = $this->db->query("SELECT * FROM perkara_jadwal_sidang WHERE tanggal_sidang = DATE(NOW());");
        return $query; 
    } 

}