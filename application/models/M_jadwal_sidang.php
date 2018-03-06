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
	
 
	function simpan(){
		$data = array(
				// 'nomor_perkara' 	=> $this->input->post('nomor_perkara'), 
				// 'pihak1_text' 	=> $this->input->post('pihak1_text'), 
				// 'pihak2_text' 	=> $this->input->post('pihak2_text'), 
				'ruangan' => $this->input->post('ruangan'), 
			);
		$result=$this->db->insert('perkara_jadwal_sidang',$data);
		return $result;
	}

	function update(){
		// $product_code=$this->input->post('product_code');
		// $product_name=$this->input->post('product_name');
        $ruangan=$this->input->post('ruangan');
        

		// $this->db->set('product_name', $product_name);
		$this->db->set('ruangan', $ruangan);
		$this->db->where('id', $id);
		$result=$this->db->update('perkara_jadwal_sidang');
		return $result;
	}


}