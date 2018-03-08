<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian_m extends CI_Model {
	

	function get_ruang_sidang_list(){
		try {
			$this->db->where('aktif', 'Y');
			return $this->db->get('ruangan_sidang');
		} catch (Exception $e) {
			return false;
		}
	}
	
	function get_perkara_id($nomor_perkara){
		try {
			$this->db->select('perkara_id');
			$this->db->where('nomor_perkara', $nomor_perkara);
			$resul=$this->db->get('perkara');			
			if ($resul->num_rows()>0){
				return $resul->row()->perkara_id;
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function get_nomor_perkara($perkara_id){
		try {
			$this->db->select('nomor_perkara');
			$this->db->where('perkara_id', $perkara_id);
			$resul=$this->db->get('perkara');			
			if ($resul->num_rows()>0){
				return $resul->row()->nomor_perkara;
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}



	function get_info_perkara($perkara_id){
		try {
			$this->db->where('perkara_id', $perkara_id);
			return $this->db->get('v_perkara');
		} catch (Exception $e) {
			return false;
		}
	}

	function get_info_ruangan($perkara_id){
		try {
			$today=date('Y-m-d');
			$add = " AND tanggal_sidang='".$today."' ";
			
			$sql="SELECT jw.ruangan_id, rs.kode, jw.ruangan, jw.tanggal_sidang 
					FROM (select * from perkara_jadwal_sidang WHERE perkara_id = ".$perkara_id." ".$add.") as jw 
					left join ruangan_sidang rs on rs.id=jw.ruangan_id";
			$res=$this->db->query($sql);
			if ($res->num_rows()>0){
				return $res->row();
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function cek_antrian($perkara_id){
		try {
			if(empty($perkara_id)) return '';
			$this->db->select('nomor_antrian');
			$this->db->where('perkara_id',$perkara_id);
			$this->db->where('tanggal_sidang',date('Y-m-d'));
			$cek=$this->db->get('antrian');
			if ($cek->num_rows()>0){
				return $cek->row()->nomor_antrian;
			}else{
				return 0;
			}
		} catch (Exception $e) {
			
		}
	}

	function get_nomor_antrian($ruangan_id, $perkara_id){
		try {
			if(empty($ruangan_id)) return '';
			if(empty($perkara_id)) return '';
			try {
				$query = $this->db->query("SELECT (IFNULL(MAX(nomor_antrian),0)) +1 AS nomor 
				FROM antrian WHERE ruang_id='".$ruangan_id."' AND tanggal_sidang = '".date('Y-m-d')."';");
				if($query->num_rows()>0){
					foreach ($query->result() as $row) {
						return $row->nomor;
					}
		    	}else{
		    		return 0;
		    	}
			} catch (Exception $e) {
				return false;
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function get_nomor_urut($ruangan_id){
		try {
			if(empty($ruangan_id)) return '';
			try {
				$query = $this->db->query("SELECT (ifnull(max(urutan),0)) +1 AS nomor_urut 
				FROM antrian WHERE ruang_id='".$ruangan_id."' AND tanggal_sidang = '".date('Y-m-d')."';");
				if($query->num_rows()>0){
					foreach ($query->result() as $row) {
						return $row->nomor_urut;
					}
		    	}else{
		    		return 0;
		    	}
			} catch (Exception $e) {
				log_message('error', $e);
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function get_sidang_today(){
		try {
			$sql="select p.nomor_perkara, p.para_pihak, js.ruangan, js.agenda
					from (select perkara_id, tanggal_sidang, ruangan_id, ruangan, agenda 
							from perkara_jadwal_sidang
							where tanggal_sidang='".date('Y-m-d')."') as js
					left join v_perkara p on p.perkara_id=js.perkara_id";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return '';
		}
	}

	// function get_sidang_today(){
	// 	try {
	// 		$sql="select p.majelis_hakim_id, p.majelis_hakim_nama,js.ruangan_id, js.ruangan 
	// 				from (select perkara_id, tanggal_sidang, ruangan_id, ruangan 
	// 						from perkara_jadwal_sidang
	// 						where tanggal_sidang='".date('Y-m-d')."') as js
	// 				left join v_perkara p on p.perkara_id=js.perkara_id";
	// 		return $this->db->query($sql);
	// 	} catch (Exception $e) {
	// 		return '';
	// 	}
	// }

	function get_sidang_antrian_today(){
		try {
			$sql="select p.nomor_perkara, p.para_pihak, rs.kode, if(a.nomor_antrian is null,'x',a.nomor_antrian) as nomor_antrian, if(a.status is null, 'x',a.status) as status, if(a.urutan is null, 'x',a.urutan) as urutan, a.id, a.ruang_id, js.ruangan_id
					from (select perkara_id, tanggal_sidang, ruangan_id, ruangan 
							from perkara_jadwal_sidang
							where tanggal_sidang='".date('Y-m-d')."') as js
					left join v_perkara p on p.perkara_id=js.perkara_id
					left join antrian a on a.perkara_id=js.perkara_id and a.tanggal_sidang=js.tanggal_sidang 
					left join ruangan_sidang rs on rs.id=a.ruang_id
				ORDER BY status asc, urutan asc, nomor_antrian asc;";
					return $this->db->query($sql);
		} catch (Exception $e) {
			return '';
		}
	}

	function get_antrian_by_ruang(){
		try {
			$sql="select rs.id, rs.kode, rs.nama, x.urutan, x.nomor_antrian
				from ruangan_sidang rs
				left join (SELECT * 
							FROM antrian WHERE (ruang_id,urutan) IN 
							( SELECT ruang_id, MAX(urutan)
							  FROM antrian
							  WHERE status=2 and tanggal_sidang='".date('Y-m-d')."'
							  GROUP BY ruang_id
							)) x on x.ruang_id=rs.id
				where aktif='Y' order by rs.id";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}

	function add_antrian($data){
		try {
			return $this->db->insert('antrian',$data);
		} catch (Exception $e) {
			return false;
		}
	}

	function edit_status($data,$antrian_id){
		try {
			$this->db->where('id',$antrian_id);
			if ($this->db->update('antrian',$data)){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	function update_ruang($ruang_id,$hakim_id, $tanggal_sidang){
		try {
			$sql="update perkara_jadwal_sidang
					set ruangan_id=".$ruang_id.",
						ruangan=(select nama from ruangan_sidang where id=".$ruang_id."),
						diperbaharui_oleh = '".$this->session->userdata('username')."',
						diperbaharui_tanggal = '".date("Y-m-d h:i:s",time())."'
					where perkara_id in(
						select pjs.perkara_id
						from (select *
							from perkara_jadwal_sidang where tanggal_sidang='".$tanggal_sidang."') as pjs
						left join perkara_penetapan pp on pjs.perkara_id=pp.perkara_id
						where pp.majelis_hakim_id like '".$hakim_id.",%' OR pp.majelis_hakim_id = '".$hakim_id."') 
					and tanggal_sidang='".$tanggal_sidang."';";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}

	function get_antrian_list($ruangan_id,$hakim_id){
		try {
			$sql="select * 
				from (select * from antrian where tanggal_sidang='".date('Y-m-d')."' AND ruang_id=".$ruangan_id.") as a
				left join v_perkara vp on a.perkara_id=vp.perkara_id WHERE vp.majelis_hakim_id like '".$hakim_id.",%' OR vp.majelis_hakim_id = '".$hakim_id."' order by status asc, urutan asc, nomor_antrian ASC;";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}

	function get_antrian_list2($ruangan_id){
		$ruangan_id = ($ruangan_id == '' ? 0 : $ruangan_id);
		try {
			$sql="select *  
				from (select * from antrian where tanggal_sidang='".date('Y-m-d')."' AND ruang_id=".$ruangan_id.") as a
				left join perkara p on a.perkara_id=p.perkara_id order by id ASC;";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}

	function get_info_antrian($id){
		try {
			$sql="select a.*, rs.kode, rs.nama
					from (select * from antrian where id=".$id.") a
					left join ruangan_sidang rs on rs.id=a.ruang_id ";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}

	function get_info_antrian1($id){
		try {
			$sql="SELECT a.*, rs.kode, rs.nama,g.pihak1_text,g.pihak2_text
					FROM (SELECT * FROM antrian WHERE id=".$id.") a
					LEFT JOIN ruangan_sidang rs ON rs.id=a.ruang_id LEFT JOIN perkara g ON g.perkara_id= a.perkara_id";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}

	function get_jadwal_sidang_hakim($hakim_id, $tanggal_sidang){
		try {
			$sql="select pjs.*, p.nomor_perkara, rs.kode
					FROM (select id, perkara_id, tanggal_sidang, ruangan_id, ruangan 
						from perkara_jadwal_sidang
						where tanggal_sidang='".$tanggal_sidang."' AND perkara_id in (select perkara_id 
						from perkara_penetapan
						where majelis_hakim_id like '".$hakim_id.",%' OR majelis_hakim_id like '".$hakim_id."')) pjs
					left join perkara p on pjs.perkara_id=p.perkara_id
					left join ruangan_sidang rs on rs.id=pjs.ruangan_id order by nomor_perkara;";
			return $this->db->query($sql);
		} catch (Exception $e) {
			return false;
		}
	}


	// antrian lain
	function get_antrian_lain($perkara_id){
		try {
			$this->db->where_in('perkara.perkara_id', $perkara_id);
			return $this->db->get('perkara');
		} catch (Exception $e) {
			return false;
		}
	}

	function get_antrian_perruangan_terakhir($ruang){
		try {
			$this->db->select('perkara_id,nomor_antrian');
			$this->db->where('ruang_id', $ruang);
			$this->db->where('tanggal_sidang', date('Y-m-d'));
			$this->db->where('status',2);
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);
			return $this->db->get('antrian');
		} catch (Exception $e) {
			return false;
		}
	}

	function get_antrian_perruangan_terakhir_ada_1($ruang){
		try {
			$this->db->select('perkara_id,nomor_antrian');
			$this->db->where('ruang_id', $ruang);
			$this->db->where('tanggal_sidang', date('Y-m-d'));
			$this->db->where('status',4);
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);
			return $this->db->get('antrian');
		} catch (Exception $e) {
			return false;
		}
	}


	function get_antrian_by_ruang_sidang(){
		try {
			$this->db->select('antrian.id, antrian.nomor_antrian, antrian.tanggal_sidang, antrian.ruang_id, antrian.status, antrian.urutan, perkara.nomor_perkara');
			$this->db->join('perkara', 'perkara.perkara_id = antrian.perkara_id');
			$this->db->where('ruang_id', 2);
			$this->db->where('tanggal_sidang',date('Y-m-d'));
			return $this->db->get('antrian');

		} catch (Exception $e) {
			return false;
		}
	}


	function get_pihak($perkara_id){
		try {
			$this->db->select('nomor_perkara, pihak1_text, pihak2_text');
			$this->db->where('perkara_id',$perkara_id);
			return $this->db->get('perkara')->row();

		} catch (Exception $e) {
			return false;
		}
	}

	function get_antrian($id){
		try {
			$this->db->select('perkara_id');
			$this->db->where('id', $id);
			$resul=$this->db->get('antrian');			
			if ($resul->num_rows()>0){
				return $resul->row()->perkara_id;
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function get_antrian_nomor_antrian($perkara_id){
		try {
			$this->db->select('nomor_antrian');
			$this->db->where('perkara_id', $perkara_id);
			$this->db->where('tanggal_sidang',date('Y-m-d'));
			$resul=$this->db->get('antrian');			
			if ($resul->num_rows()>0){
				return $resul->row()->nomor_antrian;
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function get_jadwal_sidang_lebih_hari_ini($perkara_id){
		try {
			$this->db->select('*');
			$this->db->where('perkara_id', $perkara_id);
			$this->db->where('tanggal_sidang >',date('Y-m-d'));
			return $this->db->get('perkara_jadwal_sidang');			
		} catch (Exception $e) {
			return '';
		}
	}

	function get_putus_hari_ini($perkara_id){
		try {
			$this->db->select('*');
			$this->db->where('perkara_id', $perkara_id);
			$this->db->where('tahapan_terakhir_id >',14);
			return $this->db->get('perkara');			
		} catch (Exception $e) {
			return '';
		}
	}
	
	



}