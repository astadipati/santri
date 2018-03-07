<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal_sidang extends CI_Model {


	function tampil_sidang(){ 
		$hasil=$this->db->query("SELECT a.`nomor_perkara`,b.`perkara_id`,
                                    DATE_FORMAT(a.`tanggal_pendaftaran`,'%d/%m/%Y') AS tanggal_pendaftaran,a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
                                    DATE_FORMAT(b.`tanggal_sidang`,'%d/%m/%Y') AS tanggal_sidang,b.`ruangan` FROM perkara AS a
                                    LEFT JOIN perkara_jadwal_sidang AS b 
                                    ON a.`perkara_id`=b.`perkara_id`
                                    WHERE b.tanggal_sidang = DATE(NOW());");
		return $hasil->result();
	}

	function sidang_1_detil(){ 
		$hasil=$this->db->query("SELECT a.`tanggal_pendaftaran`, a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
							b.`id`,b.`nomor_antrian`,b.`ruang_id`,b.`tanggal_sidang`,
							c.`ruangan`
							FROM perkara AS a
							LEFT JOIN antrian AS b ON a.`perkara_id`=b.`perkara_id`
							LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
							WHERE c.`tanggal_sidang`=DATE(NOW()) AND c.`ruangan`=1 AND b.`id` IS NULL
							GROUP BY a.`perkara_id`;");
		return $hasil->result();
	}

	function sidang_2_detil(){ 
		$hasil=$this->db->query("SELECT a.`tanggal_pendaftaran`, a.`jenis_perkara_nama`,a.`pihak1_text`,a.`pihak2_text`,
							b.`id`,b.`nomor_antrian`,b.`ruang_id`,b.`tanggal_sidang`,
							c.`ruangan`
							FROM perkara AS a
							LEFT JOIN antrian AS b ON a.`perkara_id`=b.`perkara_id`
							LEFT JOIN perkara_jadwal_sidang AS c ON a.`perkara_id`=c.`perkara_id`
							WHERE c.`tanggal_sidang`=DATE(NOW()) AND c.`ruangan`=2 AND b.`id` IS NULL
							GROUP BY a.`perkara_id`;");
		return $hasil->result();
	}
	

}