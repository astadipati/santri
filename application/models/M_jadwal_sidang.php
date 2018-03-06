<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal_sidang extends CI_Model {


	function tampil_sidang(){ 
		$hasil=$this->db->query("SELECT a.`nomor_perkara`,
                                    DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
                                    DATE_FORMAT(b.`tanggal_sidang`,'%d/%m/%Y') AS tanggal_sidang,b.`ruangan` FROM perkara AS a
                                    LEFT JOIN perkara_jadwal_sidang AS b 
                                    ON a.`perkara_id`=b.`perkara_id`
                                    WHERE b.tanggal_sidang = DATE(NOW());");
		return $hasil->result();
	}
	
    // function tampil_sidang(){
    //     $query = $this->db->query("SELECT a.`nomor_perkara`,
    //                                 DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
    //                                 DATE_FORMAT(b.`tanggal_sidang`,'%d/%m/%Y') AS tanggal_sidang,b.`ruangan` FROM perkara AS a
    //                                 LEFT JOIN perkara_jadwal_sidang AS b 
    //                                 ON a.`perkara_id`=b.`perkara_id`
    //                                 WHERE b.tanggal_sidang = DATE(NOW());");
    //     return $query; 
    // } 

}