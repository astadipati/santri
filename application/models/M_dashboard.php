<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	
    function tampil_daftar(){
        $query = $this->db->query("SELECT * FROM perkara_jadwal_sidang WHERE tanggal_sidang = DATE(NOW());");
        return $query; 
    } 
    
	function tampil_sidang_1(){
		$query=$this->db->query("SELECT a.`nomor_perkara`,b.`perkara_id`,
									DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
									DATE_FORMAT(b.`tanggal_sidang`,'%d/%m/%Y') AS tanggal_sidang,b.`ruangan` FROM perkara AS a
									LEFT JOIN perkara_jadwal_sidang AS b 
									ON a.`perkara_id`=b.`perkara_id`
									WHERE b.tanggal_sidang = DATE(NOW()) AND b.`ruangan`=1;");
		 return $query; 
	}

	function tampil_sidang_2(){
		$query=$this->db->query("SELECT a.`nomor_perkara`,b.`perkara_id`,
									DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
									DATE_FORMAT(b.`tanggal_sidang`,'%d/%m/%Y') AS tanggal_sidang,b.`ruangan` FROM perkara AS a
									LEFT JOIN perkara_jadwal_sidang AS b 
									ON a.`perkara_id`=b.`perkara_id`
									WHERE b.tanggal_sidang = DATE(NOW()) AND b.`ruangan`=2;");
		return $query;
    }

    // jumlah ambil antrian
	function ambil_sidang_1(){
		$query=$this->db->query("SELECT * FROM antrian WHERE tanggal_sidang= DATE(NOW()) AND ruang_id =1;");
		return $query;
    }
    
	function ambil_sidang_2(){
		$query=$this->db->query("SELECT * FROM antrian WHERE tanggal_sidang= DATE(NOW()) AND ruang_id =2;");
		return $query;
	}

}