<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Antrian extends CI_Controller {

	function index(){
		$this->load->model('antrian_m','antrian');
		 $nomor_antrian=$this->antrian->get_nomor_antrian('2','4133');
		 echo $nomor_antrian;
	}  
// view untuk server
	function server_sidang(){
		// data jadwal sidang
		$this->load->model('antrian_m','antrian');
		$data['func']='display_antrian_server';
		$data['get_sidang_today']=$this->antrian->get_sidang_today()->result();
		$data['main_body']='antrian/display_antrian_v';
		$this->load->view('template_antrian_display_server', $data);
	}
//  ini yang mau dipanggil dimari
	function display_antrian_sidang(){
		// data jadwal sidang
		$this->load->model('antrian_m','antrian');
		$data['func']='display_antrian_sidang';
		$data['get_sidang_today']=$this->antrian->get_sidang_today()->result();
		$data['main_body']='antrian/display_antrian_v_no_sound';
		$this->load->view('template_antrian_display_sidang', $data);
	}
// view untuk server non sidang
	function display_antrian_non_sidang(){
		// data jadwal sidang
		$this->load->model('antrian_m','antrian');
		$data['func']='display_antrian_non_sidang';
		$data['get_sidang_today']=$this->antrian->get_sidang_today()->result();
		$data['main_body']='antrian/display_antrian_v_no_sound';
		$this->load->view('template_antrian_display_non_sidang', $data);
	}

	

	function home(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'pendaftaran' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC";
		$hasil = @mysql_query($query);
		$jumlah = @mysql_num_rows($hasil);
		$data['jumlah_pendaftar']= $jumlah;

		$this->load->model('antrian_m','antrian');
		$jumlah_sidang_1 = $this->antrian->get_antrian_list2(1)->result();
	    $jumlah_sidang_2 = $this->antrian->get_antrian_list2(2)->result();
	    $data['jumlah_sidang_1']= count($jumlah_sidang_1);
	    $data['jumlah_sidang_2']= count($jumlah_sidang_2);

	    $queryAC = "SELECT * FROM antrianlokal WHERE tipe = 'ac' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC";
		$hasilAC = @mysql_query($queryAC);
		$jumlahAC = @mysql_num_rows($hasilAC);
		$data['jumlah_ac']= $jumlahAC;

		$querymediasi = "SELECT * FROM antrianlokal WHERE tipe = 'mediasi' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC";
		$hasilmediasi = @mysql_query($querymediasi);
		$jumlahmediasi = @mysql_num_rows($hasilmediasi);
		$data['jumlah_mediasi']= $jumlahmediasi;


		$querypengaduan = "SELECT * FROM antrianlokal WHERE tipe = 'pengaduan' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC";
		$hasilpengaduan = @mysql_query($querypengaduan);
		$jumlahpengaduan = @mysql_num_rows($hasilpengaduan);
		$data['jumlah_pengaduan']= $jumlahpengaduan;

		$querykasir = "SELECT * FROM antrianlokal WHERE tipe = 'kasir' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC";
		$hasilkasir = @mysql_query($querykasir);
		$jumlahkasir = @mysql_num_rows($hasilkasir);
		$data['jumlah_kasir']= $jumlahkasir;

		$data['main_body']='antrian/display_home';
		$this->load->view('template_antrian', $data);
	}

	function infolain(){
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$querypengaduan = "SELECT * FROM antrianlokal WHERE tipe = 'pengaduan' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC";
		$hasilpengaduan = @mysql_query($querypengaduan);
		$jumlahpengaduan = @mysql_num_rows($hasilpengaduan);
		$data['jumlah_pengaduan']= $jumlahpengaduan;


		$data['main_body']='antrian/display_home_lain';
		$this->load->vars($data);
		$this->load->view('template_antrian');
	}


	function lihat_panjar(){
	$server = "192.168.2.4";
	$user = "sa";
	$pass = "peradilan";
	$database = "siadpaWin";

	$connection_string = "DRIVER={SQL Server};SERVER=$server;DATABASE=$database"; 
	$koneksi = odbc_connect($connection_string,$user,$pass) 
		or die("TIdak bisa membaca database $database");
	
	// $nomor_perkara = "0789G17";
	$nomor_perkara=$this->input->post('nomor_perkara',true);	
	$sql1_am="select * from trans_perk LEFT JOIN var_perkiraan ON trans_perk.var_perk = var_perkiraan.kode where no_perk = '".$nomor_perkara."' ORDER BY tgl_trans ASC";
	$x1_am = odbc_exec($koneksi,$sql1_am);
	$data['x1_am']=$x1_am; 
	$data['nomor_perkara']=$nomor_perkara; 
	$data['main_body']='antrian/lihat_panjar'; 
	$this->load->vars($data);
	$this->load->view('template_antrian');
	}

	function data_panjar(){
	$server = "192.168.1.101";
	$user = "sa";
	$pass = "peradilan";
	$database = "siadpaWin";

	$connection_string = "DRIVER={SQL Server};SERVER=$server;DATABASE=$database"; 
	$koneksi = odbc_connect($connection_string,$user,$pass) 
		or die("TIdak bisa membaca database $database");
	
	// $nomor_perkara = "0789G17";
	$nomor_perkara=$this->input->post('nomor_perkara',true);
	if(strlen($nomor_perkara) == 21){
		$nomor_perkara = $nomor_perkara[0].$nomor_perkara[1].$nomor_perkara[2].$nomor_perkara[3].$nomor_perkara[9].$nomor_perkara[13].$nomor_perkara[14];
	}if(strlen($nomor_perkara) == 20){
		$nomor_perkara = "0".$nomor_perkara[0].$nomor_perkara[1].$nomor_perkara[2].$nomor_perkara[8].$nomor_perkara[12].$nomor_perkara[13];
	}if(strlen($nomor_perkara) == 19){
		$nomor_perkara = "00".$nomor_perkara[0].$nomor_perkara[1].$nomor_perkara[7].$nomor_perkara[11].$nomor_perkara[12];
	}if(strlen($nomor_perkara) == 18){
		$nomor_perkara = "000".$nomor_perkara[0].$nomor_perkara[6].$nomor_perkara[10].$nomor_perkara[11];
	}	
	$sql1_am="select * from trans_perk LEFT JOIN var_perkiraan ON trans_perk.var_perk = var_perkiraan.kode where no_perk = '".$nomor_perkara."' ORDER BY tgl_trans ASC";
	$x1_am = odbc_exec($koneksi,$sql1_am);
	$data['x1_am']=$x1_am; 
	$data['nomor_perkara']=$nomor_perkara; 
	$this->load->vars($data);
	$this->load->view('antrian/lihat_panjar_data'); 
	}

	function cetak_panjar(){
		$nomor_perkara = $this->uri->segment(3);
		$tanggal = date("d-m-Y");
		$jam = date("H:i:s");

		$server = "192.168.1.101";
		$user = "sa";
		$pass = "peradilan";
		$database = "siadpaWin";

		$connection_string = "DRIVER={SQL Server};SERVER=$server;DATABASE=$database"; 
		$koneksi = odbc_connect($connection_string,$user,$pass) 
			or die("TIdak bisa membaca database $database");
		
		$nomor_perkara = $nomor_perkara;	
		$sql1_am="select * from trans_perk LEFT JOIN var_perkiraan ON trans_perk.var_perk = var_perkiraan.kode where no_perk = '".$nomor_perkara."' ORDER BY tgl_trans ASC";
		$x1_am = odbc_exec($koneksi,$sql1_am);
		
		$printer = printer_open("\\\\192.168.2.5\\POS-58");
		printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
		printer_start_doc($printer);
		printer_start_page($printer);

		$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

		$judul = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

		$judul_tabel = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);

$isi1 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi2 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi3 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi4 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi5 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi6 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi7 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi8 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi9 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi10 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi11 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi12 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi13 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi14 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi15 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi16 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi17 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi18 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi19 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi20 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi21 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);
$isi22 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_LIGHT, false, false, false, 0);

$isifoot1 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot2 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot3 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot4 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot5 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot6 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot7 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot8 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot9 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot10 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot11 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot12 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot13 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot14 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot15 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot16 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot17 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot18 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot19 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot20 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot21 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
$isifoot22 = printer_create_font("Agency FB", 18, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);
		// $nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

		// $terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);

		printer_select_font($printer, $jam_antrian);
		printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,0, 0);
		printer_delete_font($jam_antrian);

		printer_select_font($printer, $judul);
		printer_draw_text($printer, "PANJAR BIAYA PERKARA (PA Mr)",0,20);
		printer_delete_font($judul);

		printer_select_font($printer, $judul_tabel);
		printer_draw_text($printer, "----------------------------------------",0,45);
		printer_draw_text($printer, "Uraian",0,65);
		printer_draw_text($printer, "Tanggal",0,95);
		printer_draw_text($printer, "Pemasukkan",200,95);
		printer_draw_text($printer, "Pengeluaran",390,95);
		printer_draw_text($printer, "----------------------------------------",0,115);
		printer_delete_font($judul_tabel);



		$no = 1;
		$debet = 0;
        $kredit = 0;
        $ganti = 0;
        
		while ($rows = odbc_fetch_object($x1_am)) {
        $debet =  $debet + ($rows->var_perk[0].$rows->var_perk[1] == '01' ? $rows->nil_trans : '0');
        $kredit = $kredit + ($rows->var_perk[0].$rows->var_perk[1] == '02' ? $rows->nil_trans : '0');  

       	$dataarr[] = array(
       		"uraian" => $rows->keterangan,
       		"debet" => ($rows->var_perk[0].$rows->var_perk[1] == '01' ? $rows->nil_trans : '0'),
       		"kredit" => ($rows->var_perk[0].$rows->var_perk[1] == '02' ? $rows->nil_trans : '0'),
       		"tanggal" =>date("Y-m-d", strtotime($rows->tgl_trans))
       		);

 		$no++;
		$ganti+40;
        }

        // print_r($dataarr);
        // exit();
        $jumlaharr =  count($dataarr);
        
        // echo $dataarr[0]["tanggal"];

        // ------------------- ISI -----------------------
        if($jumlaharr > 0){
			printer_select_font($printer, $isi1);
			printer_draw_text($printer, $dataarr[0]["uraian"],0,135);
			printer_draw_text($printer, $dataarr[0]["tanggal"],0,165);
			printer_draw_text($printer, $dataarr[0]["debet"],200,165);
			printer_draw_text($printer, $dataarr[0]["kredit"],390,165);
			printer_delete_font($isi1);
        }
        if ($jumlaharr > 1) {
        	printer_select_font($printer, $isi2);
			printer_draw_text($printer, $dataarr[1]["uraian"],0,195);
			printer_draw_text($printer, $dataarr[1]["tanggal"],0,225);
			printer_draw_text($printer, $dataarr[1]["debet"],200,225);
			printer_draw_text($printer, $dataarr[1]["kredit"],390,225);
			printer_delete_font($isi2);
        }
        if ($jumlaharr > 2) {
        	printer_select_font($printer, $isi3);
			printer_draw_text($printer, $dataarr[2]["uraian"],0,245);
			printer_draw_text($printer, $dataarr[2]["tanggal"],0,275);
			printer_draw_text($printer, $dataarr[2]["debet"],200,275);
			printer_draw_text($printer, $dataarr[2]["kredit"],390,275);
			printer_delete_font($isi3);
				if($jumlaharr == 3){
					printer_select_font($printer, $isifoot3);
					printer_draw_text($printer, "Jumlah",0,305);
					printer_draw_text($printer, $debet,200,305);
					printer_draw_text($printer, $kredit,390,305);
					printer_draw_text($printer, "Sisa",0,335);
					printer_draw_text($printer, ($debet-$kredit),200,335);
					printer_delete_font($isifoot3); 
				}
        }
        if ($jumlaharr > 3) {
        	printer_select_font($printer, $isi4);
			printer_draw_text($printer, $dataarr[3]["uraian"],0,305);
			printer_draw_text($printer, $dataarr[3]["tanggal"],0,335);
			printer_draw_text($printer, $dataarr[3]["debet"],200,335);
			printer_draw_text($printer, $dataarr[3]["kredit"],390,335);
			printer_delete_font($isi4);
				if($jumlaharr == 4){
					printer_select_font($printer, $isifoot4);
					printer_draw_text($printer, "Jumlah",0,365);
					printer_draw_text($printer, $debet,200,365);
					printer_draw_text($printer, $kredit,390,365);
					printer_draw_text($printer, "Sisa",0,395);
					printer_draw_text($printer, ($debet-$kredit),200,395);
					printer_delete_font($isifoot4); 
				}
        }
        if ($jumlaharr > 4) {
        	printer_select_font($printer, $isi5);
			printer_draw_text($printer, $dataarr[4]["uraian"],0,365);
			printer_draw_text($printer, $dataarr[4]["tanggal"],0,395);
			printer_draw_text($printer, $dataarr[4]["debet"],200,395);
			printer_draw_text($printer, $dataarr[4]["kredit"],390,395);
			printer_delete_font($isi5);
				if($jumlaharr == 5){
					printer_select_font($printer, $isifoot5);
					printer_draw_text($printer, "Jumlah",0,425);
					printer_draw_text($printer, $debet,200,425);
					printer_draw_text($printer, $kredit,390,425);
					printer_draw_text($printer, "Sisa",0,455);
					printer_draw_text($printer, ($debet-$kredit),200,455);
					printer_delete_font($isifoot5); 
				}	
        }
        if ($jumlaharr > 5) {
        	printer_select_font($printer, $isifoot6);
			printer_draw_text($printer, $dataarr[5]["uraian"],0,425);
			printer_draw_text($printer, $dataarr[5]["tanggal"],0,455);
			printer_draw_text($printer, $dataarr[5]["debet"],200,455);
			printer_draw_text($printer, $dataarr[5]["kredit"],390,455);
			printer_delete_font($isifoot6);
				if($jumlaharr == 6){
					printer_select_font($printer, $isifoot6);
					printer_draw_text($printer, "Jumlah",0,485);
					printer_draw_text($printer, $debet,200,485);
					printer_draw_text($printer, $kredit,390,485);
					printer_draw_text($printer, "Sisa",0,515);
					printer_draw_text($printer, ($debet-$kredit),200,515);
					printer_delete_font($isifoot6); 
				}
        }
        if ($jumlaharr > 6) {
        	printer_select_font($printer, $isi7);
			printer_draw_text($printer, $dataarr[6]["uraian"],0,485);
			printer_draw_text($printer, $dataarr[6]["tanggal"],0,515);
			printer_draw_text($printer, $dataarr[6]["debet"],200,515);
			printer_draw_text($printer, $dataarr[6]["kredit"],390,515);
			printer_delete_font($isi7);
				if($jumlaharr == 7){
					printer_select_font($printer, $isifoot7);
					printer_draw_text($printer, "Jumlah",0,545);
					printer_draw_text($printer, $debet,200,545);
					printer_draw_text($printer, $kredit,390,545);
					printer_draw_text($printer, "Sisa",0,575);
					printer_draw_text($printer, ($debet-$kredit),200,575);
					printer_delete_font($isifoot7); 
				}
        }

        if ($jumlaharr > 7) {
        	printer_select_font($printer, $isi8);
			printer_draw_text($printer, $dataarr[7]["uraian"],0,545);
			printer_draw_text($printer, $dataarr[7]["tanggal"],0,575);
			printer_draw_text($printer, $dataarr[7]["debet"],200,575);
			printer_draw_text($printer, $dataarr[7]["kredit"],390,575);
			printer_delete_font($isi8);
				if($jumlaharr == 8){
					printer_select_font($printer, $isifoot8);
					printer_draw_text($printer, "Jumlah",0,605);
					printer_draw_text($printer, $debet,200,605);
					printer_draw_text($printer, $kredit,390,605);
					printer_draw_text($printer, "Sisa",0,635);
					printer_draw_text($printer, ($debet-$kredit),200,635);
					printer_delete_font($isifoot8); 
				}
        }

        if ($jumlaharr > 8) {
        	printer_select_font($printer, $isi9);
			printer_draw_text($printer, $dataarr[8]["uraian"],0,605);
			printer_draw_text($printer, $dataarr[8]["tanggal"],0,635);
			printer_draw_text($printer, $dataarr[8]["debet"],200,635);
			printer_draw_text($printer, $dataarr[8]["kredit"],390,635);
			printer_delete_font($isi9);
				if($jumlaharr == 9){
					printer_select_font($printer, $isifoot9);
					printer_draw_text($printer, "Jumlah",0,665);
					printer_draw_text($printer, $debet,200,665);
					printer_draw_text($printer, $kredit,390,665);
					printer_draw_text($printer, "Sisa",0,695);
					printer_draw_text($printer, ($debet-$kredit),200,695);
					printer_delete_font($isifoot9); 
				}
        }

        if ($jumlaharr > 9) {
        	printer_select_font($printer, $isi10);
			printer_draw_text($printer, $dataarr[9]["uraian"],0,665);
			printer_draw_text($printer, $dataarr[9]["tanggal"],0,695);
			printer_draw_text($printer, $dataarr[9]["debet"],200,695);
			printer_draw_text($printer, $dataarr[9]["kredit"],390,695);
			printer_delete_font($isi10);
				if($jumlaharr == 10){
					printer_select_font($printer, $isifoot10);
					printer_draw_text($printer, "Jumlah",0,725);
					printer_draw_text($printer, $debet,200,725);
					printer_draw_text($printer, $kredit,390,725);
					printer_draw_text($printer, "Sisa",0,755);
					printer_draw_text($printer, ($debet-$kredit),200,755);
					printer_delete_font($isifoot10); 
				}
        }

        if ($jumlaharr > 10) {
        	printer_select_font($printer, $isi11);
			printer_draw_text($printer, $dataarr[10]["uraian"],0,725);
			printer_draw_text($printer, $dataarr[10]["tanggal"],0,755);
			printer_draw_text($printer, $dataarr[10]["debet"],200,755);
			printer_draw_text($printer, $dataarr[10]["kredit"],390,755);
			printer_delete_font($isi11);
				if($jumlaharr == 11){
					printer_select_font($printer, $isifoot11);
					printer_draw_text($printer, "Jumlah",0,785);
					printer_draw_text($printer, $debet,200,785);
					printer_draw_text($printer, $kredit,390,785);
					printer_draw_text($printer, "Sisa",0,815);
					printer_draw_text($printer, ($debet-$kredit),200,815);
					printer_delete_font($isifoot11); 
				}
        }

        if ($jumlaharr > 11) {
        	printer_select_font($printer, $isi12);
			printer_draw_text($printer, $dataarr[11]["uraian"],0,785);
			printer_draw_text($printer, $dataarr[11]["tanggal"],0,815);
			printer_draw_text($printer, $dataarr[11]["debet"],200,815);
			printer_draw_text($printer, $dataarr[11]["kredit"],390,815);
			printer_delete_font($isi12);
				if($jumlaharr == 12){
					printer_select_font($printer, $isifoot12);
					printer_draw_text($printer, "Jumlah",0,845);
					printer_draw_text($printer, $debet,200,845);
					printer_draw_text($printer, $kredit,390,845);
					printer_draw_text($printer, "Sisa",0,875);
					printer_draw_text($printer, ($debet-$kredit),200,875);
					printer_delete_font($isifoot12); 
				}
        }

        if ($jumlaharr > 12) {
        	printer_select_font($printer, $isi13);
			printer_draw_text($printer, $dataarr[12]["uraian"],0,845);
			printer_draw_text($printer, $dataarr[12]["tanggal"],0,875);
			printer_draw_text($printer, $dataarr[12]["debet"],200,875);
			printer_draw_text($printer, $dataarr[12]["kredit"],390,875);
			printer_delete_font($isi13);
				if($jumlaharr == 13){
					printer_select_font($printer, $isifoot13);
					printer_draw_text($printer, "Jumlah",0,905);
					printer_draw_text($printer, $debet,200,905);
					printer_draw_text($printer, $kredit,390,905);
					printer_draw_text($printer, "Sisa",0,935);
					printer_draw_text($printer, ($debet-$kredit),200,935);
					printer_delete_font($isifoot13); 
				}
        }

        if ($jumlaharr > 13) {
        	printer_select_font($printer, $isi14);
			printer_draw_text($printer, $dataarr[13]["uraian"],0,905);
			printer_draw_text($printer, $dataarr[13]["tanggal"],0,935);
			printer_draw_text($printer, $dataarr[13]["debet"],200,935);
			printer_draw_text($printer, $dataarr[13]["kredit"],390,935);
			printer_delete_font($isi14);
				if($jumlaharr == 14){
					printer_select_font($printer, $isifoot14);
					printer_draw_text($printer, "Jumlah",0,965);
					printer_draw_text($printer, $debet,200,965);
					printer_draw_text($printer, $kredit,390,965);
					printer_draw_text($printer, "Sisa",0,995);
					printer_draw_text($printer, ($debet-$kredit),200,995);
					printer_delete_font($isifoot14); 
				}
        }

        if ($jumlaharr > 14) {
        	printer_select_font($printer, $isi15);
			printer_draw_text($printer, $dataarr[14]["uraian"],0,965);
			printer_draw_text($printer, $dataarr[14]["tanggal"],0,995);
			printer_draw_text($printer, $dataarr[14]["debet"],200,995);
			printer_draw_text($printer, $dataarr[14]["kredit"],390,995);
			printer_delete_font($isi15);
				if($jumlaharr == 13){
					printer_select_font($printer, $isifoot15);
					printer_draw_text($printer, "Jumlah",0,1025);
					printer_draw_text($printer, $debet,200,1025);
					printer_draw_text($printer, $kredit,390,1025);
					printer_draw_text($printer, "Sisa",0,1055);
					printer_draw_text($printer, ($debet-$kredit),200,1055);
					printer_delete_font($isifoot15); 
				}
        }

        if ($jumlaharr > 15) {
        	printer_select_font($printer, $isi16);
			printer_draw_text($printer, $dataarr[15]["uraian"],0,1025);
			printer_draw_text($printer, $dataarr[15]["tanggal"],0,1055);
			printer_draw_text($printer, $dataarr[15]["debet"],200,10555);
			printer_draw_text($printer, $dataarr[15]["kredit"],390,1055);
			printer_delete_font($isi16);
				if($jumlaharr == 14){
					printer_select_font($printer, $isifoot16);
					printer_draw_text($printer, "Jumlah",0,1085);
					printer_draw_text($printer, $debet,200,1085);
					printer_draw_text($printer, $kredit,390,1085);
					printer_draw_text($printer, "Sisa",0,1115);
					printer_draw_text($printer, ($debet-$kredit),200,1115);
					printer_delete_font($isifoot16); 
				}
        }

        if ($jumlaharr > 16) {
        	printer_select_font($printer, $isi17);
			printer_draw_text($printer, $dataarr[16]["uraian"],0,1085);
			printer_draw_text($printer, $dataarr[16]["tanggal"],0,1115);
			printer_draw_text($printer, $dataarr[16]["debet"],200,1115);
			printer_draw_text($printer, $dataarr[16]["kredit"],390,1115);
			printer_delete_font($isi17);
				if($jumlaharr == 15){
					printer_select_font($printer, $isifoot17);
					printer_draw_text($printer, "Jumlah",0,1145);
					printer_draw_text($printer, $debet,200,1145);
					printer_draw_text($printer, $kredit,390,1145);
					printer_draw_text($printer, "Sisa",0,1175);
					printer_draw_text($printer, ($debet-$kredit),200,1175);
					printer_delete_font($isifoot17); 
				}
        }

        if ($jumlaharr > 17) {
        	printer_select_font($printer, $isi18);
			printer_draw_text($printer, $dataarr[17]["uraian"],0,1145);
			printer_draw_text($printer, $dataarr[17]["tanggal"],0,1175);
			printer_draw_text($printer, $dataarr[17]["debet"],200,1175);
			printer_draw_text($printer, $dataarr[17]["kredit"],390,1175);
			printer_delete_font($isi18);
				if($jumlaharr == 16){
					printer_select_font($printer, $isifoot18);
					printer_draw_text($printer, "Jumlah",0,1205);
					printer_draw_text($printer, $debet,200,1205);
					printer_draw_text($printer, $kredit,390,1205);
					printer_draw_text($printer, "Sisa",0,1235);
					printer_draw_text($printer, ($debet-$kredit),200,1235);
					printer_delete_font($isifoot18); 
				}
        }

        if ($jumlaharr > 18) {
        	printer_select_font($printer, $isi19);
			printer_draw_text($printer, $dataarr[18]["uraian"],0,1205);
			printer_draw_text($printer, $dataarr[18]["tanggal"],0,1235);
			printer_draw_text($printer, $dataarr[18]["debet"],200,1235);
			printer_draw_text($printer, $dataarr[18]["kredit"],390,1235);
			printer_delete_font($isi19);
				if($jumlaharr == 16){
					printer_select_font($printer, $isifoot18);
					printer_draw_text($printer, "Jumlah",0,1265);
					printer_draw_text($printer, $debet,200,1265);
					printer_draw_text($printer, $kredit,390,1265);
					printer_draw_text($printer, "Sisa",0,1295);
					printer_draw_text($printer, ($debet-$kredit),200,1295);
					printer_delete_font($isifoot18); 
				}
        }
       

        // --------------------- ISI --------------------------

		// printer_select_font($printer, $nama_pa);
		// printer_draw_text($printer, "PA TUBAN",150,190);
		// printer_delete_font($nama_pa);

		// printer_select_font($printer, $terimakasih);
		// printer_draw_text($printer, "TERIMA KASIH",155, 260);
		// printer_draw_text($printer, "",155, 300);
		// printer_delete_font($terimakasih);

		printer_end_page($printer);
		printer_end_doc($printer);
		printer_close($printer);

		redirect('antrian/home');
	}



	// POS POSYANKUM 
	function pos_posyankum(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'pendaftaran' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$this->dblokal->tutupkoneksiantrian();
		// print_r($arr_nomorantrian);
		$data['arr_nomorantrian']=$hasil;
		$data['panggil_no_perk'] = 1;
		$data['main_body'] = 'antrian/input_antrian_pendaftaran_new';
		$this->load->view('template/header');
		$this->load->view('content/pos_posbakum', $data);
		$this->load->view('template/footer');
		
	}


	function panggil_antrian_pendaftaran(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		}	

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=1 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}


		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}
		

		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}

	function panggil_antrian_pendaftaran_selesai(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=2 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// UPDATE ANTRIAN	
		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}

	function ambil_nomor_pendaftaran(){
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'pendaftaran' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
		$hasil = @mysql_query($query);
		
		$nomor_antrian = 0;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $nomor_antrian = $row['nomor_antrian'];
		}	

		if($nomor_antrian == 0){
			$nomor_antrian = 1;
		}else{
			$nomor_antrian = ($nomor_antrian+1);
		}

		// INSERT ANTRIAN
		$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,status,urutan,tipe)
			VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','',0,'".$nomor_antrian."','pendaftaran')";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// INSERT ANTRIAN
		$this->dblokal->tutupkoneksiantrian();


		// CETAK ANTRIAN
		if(strlen($nomor_antrian) == 1){
		$nomor_antrian = "A00".$nomor_antrian;
		}elseif (strlen($nomor_antrian) == 2) {
		$nomor_antrian = "A0".$nomor_antrian;
		}else{
		$nomor_antrian = "A".$nomor_antrian;	
		}
		$data = array(
			'nomor_antrian' => $nomor_antrian,

			);
		
		// CETAK ANTRIAN
		 $this->cetak_antrian_r_pendaftaran($data);
		
		redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));

	}
	 
	function cetak_antrian_r_pendaftaran($data){
			$tanggal = date("d-m-Y");
			$jam = date("H:i:s");

			$printer = printer_open("\\\\192.168.2.5\\POS-58");
			printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
			printer_start_doc($printer);
			printer_start_page($printer);

			$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

			$judul_nomor_antrian = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

			$judul_antrian = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nomor_antrian = printer_create_font("Agency FB", 70, 50, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);

			printer_select_font($printer, $jam_antrian);
			printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,70, 0);
			printer_delete_font($jam_antrian);

			printer_select_font($printer, $judul_nomor_antrian);
			printer_draw_text($printer, "NOMOR ANTRIAN :",140,60);
			printer_delete_font($judul_nomor_antrian);

			printer_select_font($printer, $judul_antrian);
			printer_draw_text($printer, "R. PENDAFTARAN",130,95);
			printer_delete_font($judul_antrian);

			printer_select_font($printer, $nomor_antrian);
			printer_draw_text($printer, $data['nomor_antrian'],140,120);
			printer_delete_font($nomor_antrian);

			printer_select_font($printer, $nama_pa);
			printer_draw_text($printer, "PA TUBAN",150,190);
			printer_delete_font($nama_pa);

			printer_select_font($printer, $terimakasih);
			printer_draw_text($printer, "TERIMA KASIH",155, 260);
			printer_draw_text($printer, "",155, 300);
			printer_delete_font($terimakasih);

			printer_end_page($printer);
			printer_end_doc($printer);
			printer_close($printer);
	}


	// FUNGSI :: --------------------------------------------------
	function antrian_meja1(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'pendaftaran' AND status >= 2 AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$this->dblokal->tutupkoneksiantrian();
		
		$data['arr_nomorantrian']=$hasil;
		$data['panggil_no_perk'] = 1;
		$data['main_body'] = 'antrian/input_antrian_meja1';
		$this->load->vars($data);
		$this->load->view('template_antrian');
		
	}


	function panggil_antrian_meja1(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		}	

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=3 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}


		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}

		$this->dblokal->tutupkoneksiantrian();

		echo "<script>window.close()</script>";
	}

	function panggil_antrian_meja1_selesai(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=4 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// UPDATE ANTRIAN

		$query = "SELECT * FROM antrianlokal WHERE tipe = 'kasir' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			// INSERT ANTRIAN kasir
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket,id_sendiri)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','-',0,'".$nomor_antrian."','kasir','Bayar Panjar','".$antrian_id."')";
			if(@mysql_query($sql)){
			    // echo "Records inserted successfully.";
			    // echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			    // exit();
			} else{
				// echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				// exit();
			    // echo "ERROR: Could not able to execute";
			}
			// exit();
			// INSERT ANTRIAN
			

		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}



	// FUNGSI SIDANG :: -------------------------------------------
	// TAMPILAN BARU ANTRIAN SIDANG HAKIM PP
	function pos_sidang(){
		//$this->minta_akses();
		$segment=$this->uri->segment_array();
		$this->load->model('antrian_m','antrian');
		$query=$this->antrian->get_antrian_list2($segment[3])->result();
		$data['antrian_list']=$query;
		$data['ruang']=$segment[3];

			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			$query = "SELECT * FROM temp_sidang WHERE ruang = ".$segment[3];
			$hasil = @mysql_query($query);
			 
			$perkara_id= '';
			while($row = @mysql_fetch_assoc($hasil)) {
			   $perkara_id = $row['perkara_id'];
			}

			if($perkara_id != ''){
				$data['main_body'] = 'antrian/antrian_ruang_sidang_no';
			}else{
				$data['main_body'] = 'antrian/antrian_ruang_sidang';
			}

			$this->dblokal->tutupkoneksiantrian();
			
		$this->load->view('template/header');
		$this->load->view('content/pos_sidang_1', $data);
		$this->load->view('template/footer');
		
	}

	function cek_sidang(){
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		$this->load->model('antrian_m','antrian');

		$sqldel = "DELETE FROM temp_sidang WHERE tanggal < '".date('Y-m-d')."'";
		if(@mysql_query($sqldel)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}

		$query = "SELECT * FROM temp_sidang";
		$hasil = @mysql_query($query);

		$perkara_id = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $perkara_id = $row['perkara_id'];
		   $jumlah_ruang_sidang = $this->antrian->get_jadwal_sidang_lebih_hari_ini($perkara_id)->result();  
		   if(count($jumlah_ruang_sidang) > 0){
		    	$sqldel = "DELETE FROM temp_sidang WHERE perkara_id = ".$perkara_id;
				if(@mysql_query($sqldel)){
				    echo json_encode(array('st'=>0,'ruang'=>$row['ruang']));	
					return;
				} else{
				    // echo "ERROR: Could not able to execute";
				}
		   }

		   // -------- KALAU PUTUS -------------------------
		   $jumlah_putus = $this->antrian->get_putus_hari_ini($perkara_id)->result();  
		   if(count($jumlah_putus) > 0){
		    	$sqldel = "DELETE FROM temp_sidang WHERE perkara_id = ".$perkara_id;
				if(@mysql_query($sqldel)){
				    echo json_encode(array('st'=>0,'ruang'=>$row['ruang']));	
					return;
				} else{
				    // echo "ERROR: Could not able to execute";
				}
		   }

		}

		$this->dblokal->tutupkoneksiantrian();
	}

	function selesai_antrian_sidang(){
		$this->load->model('antrian_m','antrian');
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		
		$perkara_id = $this->antrian->get_antrian($antrian_id);
		$nomor_perkara = $this->antrian->get_nomor_perkara($perkara_id);
		
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		if($segment[5] == 'm'){
		$this->ambil_nomor_mediasi_param($perkara_id,$nomor_perkara);
		$datastatus['status'] = 2;	
		}elseif ($segment[5] == 't') {
			$sqlt = "INSERT INTO temp_sidang(id,perkara_id,tanggal,status,ruang)
				VALUES ('','".$perkara_id."','".date('Y-m-d')."','tunda','".$segment[4]."')";
				if(@mysql_query($sqlt)){
				    // echo "Records inserted successfully.";
				} else{
				    // echo "ERROR: Could not able to execute";
				}
		$datastatus['status'] = 2;
		}elseif ($segment[5] == 'p') {
			$sqlp = "INSERT INTO temp_sidang(id,perkara_id,tanggal,status,ruang)
				VALUES ('','".$perkara_id."','".date('Y-m-d')."','putus','".$segment[4]."')";
				if(@mysql_query($sqlp)){
				    // echo "Records inserted successfully.";
				} else{
				    // echo "ERROR: Could not able to execute";
				}	
		$this->ambil_nomor_kasir_param($perkara_id,$nomor_perkara,'Putus');
		$datastatus['status'] = 2;
		}elseif ($segment[5] == 'i') {
		$this->ambil_nomor_kasir_param($perkara_id,$nomor_perkara,'Ikrar');
		$datastatus['status'] = 2;
		}else{
		$datastatus['status'] = 2;
		}
		$this->dblokal->tutupkoneksiantrian();
		$this->antrian->edit_status($datastatus,$antrian_id);

		// echo "<script>window.close()</script>";
		redirect('antrian/pos_sidang/'.$segment[4]);
	}

	function panggil_antrian(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		$info_antrian=$this->antrian->get_info_antrian1($antrian_id)->row();
		$nomor_antrian=$info_antrian->nomor_antrian;
		$ruang_id=$info_antrian->ruang_id;
		$perkara_id=$info_antrian->perkara_id;
		$info_perkara=$this->antrian->get_info_perkara($perkara_id);
		$nomor_perkara=$info_perkara->row()->nomor_perkara;

		// ---------------
		// $pihak1=$info_antrian->pihak1_text;
		// $pihak2=$info_antrian->pihak2_text;
		
		// $pihak= $pihak1. '<br/> & <br/>'.$pihak2;
		// $pihak=str_replace("'","()",$pihak);
		// ---------------

		// ----mulai sidang-----
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM mulai_sidang WHERE tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$arr_id = array();
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_id[] = $row['id'];
		}

		if(empty($arr_id) && $antrian_id != ''){
			$sql = "INSERT INTO mulai_sidang (id,tanggal,ruang_sidang)
			VALUES ('','".date('Y-m-d')."','".$ruang_id."')";
			if(@mysql_query($sql)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute $sql.";
			}
		}

		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status,ket_panggilan,untuk)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."','sidang','".$segment[5]."')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}
		
		$this->dblokal->tutupkoneksiantrian();
		// ----mulai sidang-----

		// edit status jadi 4
		$datastatus['status'] = 4;
		$this->antrian->edit_status($datastatus,$antrian_id);

		echo "<script>window.close()</script>";
	}

	function tunda_antrian(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		$info_antrian=$this->antrian->get_info_antrian($antrian_id)->row();
		$ruang_id=$info_antrian->ruang_id;
		$nomor_urut=$this->antrian->get_nomor_urut($ruang_id);
		$data=array();
		$data['urutan']=$nomor_urut;
		$data['status']=1;
		$this->antrian->edit_status($data,$antrian_id);
		echo "<script>window.close()</script>";
	}

	function selesai_antrian(){
		$segment=$this->uri->segment_array();
		// $this->tanggal_sidang=$this->encrypt->decode(base64_decode($segment[7]));
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$this->load->model('antrian_m','antrian');
		$data=array('status'=>2);
		if ($this->antrian->edit_status($data,$antrian_id)){
			$ruang_id=$segment[4];
			$hakim_id=$segment[5];
			$panggil_no_perk=$segment[6];
			$this->show_antrian($ruang_id, $hakim_id,$panggil_no_perk);
		}
	}

	function f_validate_input_antrian(){
		if(empty($_POST)){
			show_404();
		}
		$nomor_perkara=$this->input->post('nomor_perkara',true);
		$nomor_perkara=trim($nomor_perkara);
		$this->load->model('antrian_m','antrian');
		$perkara_id=$this->antrian->get_perkara_id($nomor_perkara);
		if ($perkara_id!=''){
			$info_ruangan=$this->antrian->get_info_ruangan($perkara_id);
			if (empty($info_ruangan) OR empty($info_ruangan->ruangan_id)){
				//echo json_encode(array('st'=>0,'msg'=>'Error:<br /> Tidak Berhasil Membuat Antrian, Ruangan Sidang Belum Ditentukan<br />Petugas Belum Melengkapi Data Ruangan Sidang untuk Perkara '.$nomor_perkara));	
				echo json_encode(array('st'=>0,'msg'=>'Tidak Berhasil Membuat Antrian <br/>Hari Ini Tidak Ada Jadwal Sidang Untuk  <br/> Nomor Perkara: <strong>'.$nomor_perkara.'</strong>'));	
				return;
			}else{
				if ($info_ruangan->tanggal_sidang!=date('Y-m-d')){
					echo json_encode(array('st'=>0,'msg'=>'Tidak Berhasil Membuat Antrian <br/>Hari Ini Tidak Ada Jadwal Sidang Untuk  <br/> Nomor Perkara: <strong>'.$nomor_perkara.'</strong>'));	
					return;
				}
				$ruang_id=$info_ruangan->ruangan_id;
				$ruang_kode=$info_ruangan->kode;
				$cek_antrian=$this->antrian->cek_antrian($perkara_id);

				    $nomor_antrian=$this->antrian->get_nomor_antrian($ruang_id,$perkara_id);
					$nomor_urut=$this->antrian->get_nomor_urut($ruang_id);
					$data=array('nomor_antrian'=>$nomor_antrian,
								'tanggal_sidang'=>date('Y-m-d'),
								'ruang_id'=>$ruang_id,
								'perkara_id'=>$perkara_id,
								'status'=>0,
								'urutan'=>$nomor_urut);

					$data_c=array('nomor_antrian'=>$nomor_antrian,
								'tanggal_sidang'=>date('Y-m-d'),
								'ruang_id'=>$ruang_id,
								'perkara_id'=>$perkara_id,
								'status'=>0,
								'urutan'=>$nomor_urut,
								'noperk'=>$nomor_perkara);

				if ($cek_antrian==0){	
					if ($this->antrian->add_antrian($data)){
					$this->cetak_antrian_r_sidang($data_c);

					echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: <br/><strong>'.$nomor_antrian.'</strong> <br/> Ruang: <br/> '.$ruang_id.'<br/> Nomor Perkara: <br>'.$nomor_perkara));
					return;
						// NGE-PRINT ANTRIAN
					
					// redirect('antrian/home');
					}else{
						echo json_encode(array('st'=>0,'msg'=>'Tidak Berhasil Membuat Antrian untuk <br/> Nomor Perkara: '.$nomor_perkara));
						return;
					}
				}else{

					$data_c=array('nomor_antrian'=>$cek_antrian,
								'tanggal_sidang'=>date('Y-m-d'),
								'ruang_id'=>$info_ruangan->ruangan,
								'perkara_id'=>$perkara_id,
								'status'=>0,
								'urutan'=>$nomor_urut,
								'noperk'=>$nomor_perkara);
					$this->cetak_antrian_r_sidang($data_c);

					echo json_encode(array('st'=>1,'msg'=>'Perkara: <br/><strong>'.$nomor_perkara.'</strong> <br/> Nomor Antrian: <strong>'.$cek_antrian.'</strong> <br/> Ruangan Sidang : <strong>'.$info_ruangan->ruangan.'</strong> <br/> Sudah diambil'));
					return;
				}
			}
		}else{
			echo json_encode(array('st'=>1,'msg'=>'Tidak Berhasil Membuat Antrian<br /> Tidak Ada Perkara dengan Nomor: <strong>'.$nomor_perkara.'</strong>'));	
			return;
		}
	}

	function input_para_pihak_sidang(){
		$data['main_body']='antrian/input_antrian_pihak_sidang_v_tampilan_baru';
		$this->load->vars($data);
		$this->load->view('template_antrian');
	}


	function cetak_antrian_r_sidang($data){
			$tanggal = date("d-m-Y");
			$jam = date("H:i:s");
			
			$ruang_sidang = '';
			if($data['ruang_id'] == 1){
				if(strlen($data['nomor_antrian']) == 1){
				$ruang_sidang = "B00".$data['nomor_antrian'];
				}elseif (strlen($data['nomor_antrian']) == 2) {
				$ruang_sidang = "B0".$data['nomor_antrian'];
				}else{
				$ruang_sidang = "B".$data['nomor_antrian'];	
				}
			}elseif ($data['ruang_id'] == 2) {
				if(strlen($data['nomor_antrian']) == 1){
				$ruang_sidang = "C00".$data['nomor_antrian'];
				}elseif (strlen($data['nomor_antrian']) == 2) {
				$ruang_sidang = "C0".$data['nomor_antrian'];
				}else{
				$ruang_sidang = "C".$data['nomor_antrian'];	
				}
			}

			$printer = printer_open("\\\\192.168.2.5\\POS-58");
			printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
			printer_start_doc($printer);
			printer_start_page($printer);

			$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

			$judul_nomor_antrian = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

			$judul_antrian = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nomor_antrian = printer_create_font("Agency FB", 70, 50, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);



			printer_select_font($printer, $jam_antrian);
			printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,70, 0);
			printer_delete_font($jam_antrian);

			printer_select_font($printer, $judul_nomor_antrian);
			printer_draw_text($printer, "NOMOR ANTRIAN :",140,60);
			printer_delete_font($judul_nomor_antrian);

			printer_select_font($printer, $judul_antrian);
			printer_draw_text($printer, "R. SIDANG ".$data['ruang_id'],175,95);
			printer_delete_font($judul_antrian);

			printer_select_font($printer, $nomor_antrian);
			printer_draw_text($printer, $ruang_sidang,140,120);
			printer_delete_font($nomor_antrian);

			printer_select_font($printer, $nama_pa);
			printer_draw_text($printer, $data['noperk'],80,190);
			printer_draw_text($printer, "PA TUBAN",150,230);
			printer_delete_font($nama_pa);

			printer_select_font($printer, $terimakasih);
			printer_draw_text($printer, "TERIMA KASIH",155, 300);
			printer_draw_text($printer, "",155, 300);
			printer_delete_font($terimakasih);


			printer_end_page($printer);
			printer_end_doc($printer);
			printer_close($printer);
	}






	// FUNGSI AKTA CERAI :: --------------------------------------------
	function antrian_ac(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'ac' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$this->dblokal->tutupkoneksiantrian();
		// print_r($arr_nomorantrian);
		$data['arr_nomorantrian']=$hasil;
		$data['panggil_no_perk'] = 1;
		$data['main_body'] = 'antrian/input_antrian_ac';
		$this->load->vars($data);
		$this->load->view('template_antrian');
		
	}

	function panggil_antrian_ac(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		}	


		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=1 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}

		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status,ket_panggilan)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."','')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}

		$this->dblokal->tutupkoneksiantrian();
		
		
		echo "<script>window.close()</script>";
	}

	function panggil_antrian_ac_selesai(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=2 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// UPDATE ANTRIAN	
		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}

	function input_para_pihak_ac(){
		$data['main_body']='antrian/input_antrian_pihak_ac_v';
		$this->load->vars($data);
		$this->load->view('template_antrian');
	}

	function ambil_nomor_ac(){
		$jns=$this->input->post('jns',true);
		$nomor_perkara=$this->input->post('nomor_perkara',true);
		$nomor_perkara=trim($nomor_perkara);
		$this->load->model('antrian_m','antrian');
		$perkara_id=$this->antrian->get_perkara_id($nomor_perkara);
		
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();


		$query = "SELECT * FROM antrianlokal where perkara_id = '".$perkara_id."' AND ket = '".$jns."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = '';
		$arr_jns = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		   $arr_jns = $row['ket'];
		}	

		$this->dblokal->tutupkoneksiantrian();
		if($arr_nomorantrian != '' && $arr_jns != ''){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara: '.$nomor_perkara.' <br/> Sudah Mengambil Antrian'));
			exit();
		}

		if($perkara_id != '' ){
			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			
			$query = "SELECT * FROM antrianlokal WHERE tipe = 'ac' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			
			// INSERT ANTRIAN
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','".$nomor_perkara."',0,'".$nomor_antrian."','ac','".$jns."')";
			if(@mysql_query($sql)){
			    //echo "Records inserted successfully.";
			    if($jns != 'Ikrar'){
			    	// CETAK ANTRIAN
			    	// CETAK ANTRIAN
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian = "F00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian = "F0".$nomor_antrian;
				}else{
				$nomor_antrian = "F".$nomor_antrian;	
				}
				$data = array(
					'nomor_antrian' => $nomor_antrian,

					);

				$this->cetak_antrian_r_ac($data);
			    echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			    exit();
				}
			} else{
				if($jns != 'Ikrar'){
				echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				exit();
				}
			    // echo "ERROR: Could not able to execute";
			}
			// exit();
			// INSERT ANTRIAN
			$this->dblokal->tutupkoneksiantrian();


			
			
			
		}else{
			if($jns != 'Ikrar'){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara:'.$nomor_perkara.' <br/> Tidak Terdaftar'));
			exit();
			}
		}
		

		
		// redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));

	}

	function ambil_nomor_ac_param($ket,$perkara_id,$nomor_perkara){
		$jns= "Akta Cerai P";	
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();


		$query = "SELECT * FROM antrianlokal where perkara_id = '".$perkara_id."' AND ket = '".$jns."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = '';
		$arr_jns = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		   $arr_jns = $row['ket'];
		}	

		$this->dblokal->tutupkoneksiantrian();
		if($arr_nomorantrian != '' && $arr_jns != ''){
			if($ket != 'Ikrar'){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara: '.$nomor_perkara.' <br/> Sudah Mengambil Antrian'));
			exit();
			}
		}

		if($perkara_id != '' ){
			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			
			$query = "SELECT * FROM antrianlokal WHERE tipe = 'ac' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			
			// INSERT ANTRIAN
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','".$nomor_perkara."',0,'".$nomor_antrian."','ac','".$jns."')";
			if(@mysql_query($sql)){
			    //echo "Records inserted successfully.";
			    if($ket != 'Ikrar'){
			    	// CETAK ANTRIAN
			    	// CETAK ANTRIAN
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian = "F00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian = "F0".$nomor_antrian;
				}else{
				$nomor_antrian = "F".$nomor_antrian;	
				}
				$data = array(
					'nomor_antrian' => $nomor_antrian,

					);

				// $this->cetak_antrian_r_ac($data);
			    echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			    exit();
				}
			} else{
				if($ket != 'Ikrar'){
				echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				exit();
				}
			    // echo "ERROR: Could not able to execute";
			}
			// exit();
			// INSERT ANTRIAN
			$this->dblokal->tutupkoneksiantrian();


			
			
			
		}else{
			if($ket != 'Ikrar'){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara:'.$nomor_perkara.' <br/> Tidak Terdaftar'));
			exit();
			}
		}
		

		
		// redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));

	}

	function cetak_antrian_r_ac($data){
			$tanggal = date("d-m-Y");
			$jam = date("H:i:s");

			$printer = printer_open("\\\\192.168.2.5\\POS-58");
			printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
			printer_start_doc($printer);
			printer_start_page($printer);

			$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

			$judul_nomor_antrian = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

			$judul_antrian = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nomor_antrian = printer_create_font("Agency FB", 70, 50, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);



			printer_select_font($printer, $jam_antrian);
			printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,70, 0);
			printer_delete_font($jam_antrian);

			printer_select_font($printer, $judul_nomor_antrian);
			printer_draw_text($printer, "NOMOR ANTRIAN :",140,60);
			printer_delete_font($judul_nomor_antrian);

			printer_select_font($printer, $judul_antrian);
			printer_draw_text($printer, "LOKET AKTA CERAI",130,95);
			printer_delete_font($judul_antrian);

			printer_select_font($printer, $nomor_antrian);
			printer_draw_text($printer, $data['nomor_antrian'],140,120);
			printer_delete_font($nomor_antrian);

			printer_select_font($printer, $nama_pa);
			printer_draw_text($printer, "PA TUBAN",150,190);
			printer_delete_font($nama_pa);

			printer_select_font($printer, $terimakasih);
			printer_draw_text($printer, "TERIMA KASIH",155, 260);
			printer_draw_text($printer, "",155, 300);
			printer_delete_font($terimakasih);


			printer_end_page($printer);
			printer_end_doc($printer);
			printer_close($printer);
	}





	// FUNGSI KASIR :: -----------------------------------------------
	function antrian_kasir(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'kasir' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$this->dblokal->tutupkoneksiantrian();
		// print_r($arr_nomorantrian);
		$data['arr_nomorantrian']=$hasil;
		$data['panggil_no_perk'] = 1;
		$data['main_body'] = 'antrian/input_antrian_kasir';
		$this->load->vars($data);
		$this->load->view('template_antrian');
		
	}

	function panggil_antrian_kasir(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		}	


		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=1 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}

		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status,ket_panggilan)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."','')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}


		$this->dblokal->tutupkoneksiantrian();
		
		echo "<script>window.close()</script>";
	}

	function panggil_antrian_kasir_selesai(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_perkara_id = NULL;
		$arr_nomor_perkara = NULL;
		$arr_ket = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_perkara_id = $row['perkara_id'];
		   $arr_nomor_perkara = $row['nomor_perkara'];
		   $arr_ket = $row['ket'];
		}	

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=2 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		    if($arr_ket == 'Ikrar'){
		    $this->ambil_nomor_ac_param($arr_ket,$arr_perkara_id,$arr_nomor_perkara);		    	
		    }
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// UPDATE ANTRIAN	
		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}

	function input_para_pihak_kasir(){
		$data['main_body']='antrian/input_antrian_pihak_kasir_v';
		$this->load->vars($data);
		$this->load->view('template_antrian');
	}

	function ambil_nomor_kasir(){		
		$jns = 'Tambah Panjar';
		$nomor_perkara=$this->input->post('nomor_perkara',true);
		$nomor_perkara=trim($nomor_perkara);
		$this->load->model('antrian_m','antrian');
		$perkara_id=$this->antrian->get_perkara_id($nomor_perkara);
		
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where perkara_id = '".$perkara_id."' AND ket = '".$jns."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = '';
		$arr_jns = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		   $arr_jns = $row['ket'];
		}	


		$this->dblokal->tutupkoneksiantrian();

		if($arr_nomorantrian != '' && $arr_jns != ''){
			if($perkara_id == ""){
				if($jns == 'Tambah Panjar'){
				echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara: '.$nomor_perkara.' <br/> Sudah Mengambil Antrian'));
				exit();
				}
			}
		}

		if($perkara_id != '' ){
			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			
			$query = "SELECT * FROM antrianlokal WHERE tipe = 'kasir' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			

			// INSERT ANTRIAN
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','".$nomor_perkara."',0,'".$nomor_antrian."','kasir','".$jns."')";
			if(@mysql_query($sql)){
				// echo "Records inserted successfully.";
					// CETAK ANTRIAN
					// CETAK ANTRIAN
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian = "E00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian = "E0".$nomor_antrian;
				}else{
				$nomor_antrian = "E".$nomor_antrian;	
				}
				$data = array(
					'nomor_antrian' => $nomor_antrian,

					);
				$this->cetak_antrian_r_kasir($data);
				if($jns == 'Tambah Panjar'){
					 echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			         exit();
				}
			   
				
			} else{
				if($jns == 'Tambah Panjar'){
				   echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				    exit();
				}
				
			    // echo "ERROR: Could not able to execute";
			}
			// exit();
			// INSERT ANTRIAN
			$this->dblokal->tutupkoneksiantrian();


			
			
			
		}else{
			if($jns == 'Tambah Panjar'){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara:'.$nomor_perkara.' <br/> Tidak Terdaftar'));
			    exit();
			}
		}
		

		
		
		// redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));

	}

	function ambil_nomor_kasir_param($perkara_id,$nomor_perkara,$jns){			
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where perkara_id = '".$perkara_id."' AND ket = '".$jns."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = '';
		$arr_jns = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		   $arr_jns = $row['ket'];
		}	


		$this->dblokal->tutupkoneksiantrian();

		if($arr_nomorantrian != '' && $arr_jns != ''){
			if($perkara_id == ""){
				// if($jns == 'Tambah Panjar'){
				// echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara: '.$nomor_perkara.' <br/> Sudah Mengambil Antrian'));
				// exit();
				// }
			}
		}

		if($perkara_id != '' ){
			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			
			$query = "SELECT * FROM antrianlokal WHERE tipe = 'kasir' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			

			// INSERT ANTRIAN
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','".$nomor_perkara."',0,'".$nomor_antrian."','kasir','".$jns."')";
			if(@mysql_query($sql)){
				// echo "Records inserted successfully.";
					// CETAK ANTRIAN
					// CETAK ANTRIAN
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian = "E00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian = "E0".$nomor_antrian;
				}else{
				$nomor_antrian = "E".$nomor_antrian;	
				}
				$data = array(
					'nomor_antrian' => $nomor_antrian,

					);
				// $this->cetak_antrian_r_kasir($data);
				// if($jns == 'Tambah Panjar'){
				// 	 echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			 //         exit();
				// }
			   
				
			} else{
				// if($jns == 'Tambah Panjar'){
				//    echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				//     exit();
				// }
				
			    // echo "ERROR: Could not able to execute";
			}
			// exit();
			// INSERT ANTRIAN
			$this->dblokal->tutupkoneksiantrian();


			
			
			
		}else{
			// if($jns == 'Tambah Panjar'){
			// echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara:'.$nomor_perkara.' <br/> Tidak Terdaftar'));
			//     exit();
			// }
		}
		

		
		
		// redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));

	}

	function cetak_antrian_r_kasir($data){
			$tanggal = date("d-m-Y");
			$jam = date("H:i:s");

			$printer = printer_open("\\\\192.168.2.5\\POS-58");
			printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
			printer_start_doc($printer);
			printer_start_page($printer);

			$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

			$judul_nomor_antrian = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

			$judul_antrian = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nomor_antrian = printer_create_font("Agency FB", 70, 50, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);



			printer_select_font($printer, $jam_antrian);
			printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,70, 0);
			printer_delete_font($jam_antrian);

			printer_select_font($printer, $judul_nomor_antrian);
			printer_draw_text($printer, "NOMOR ANTRIAN :",140,60);
			printer_delete_font($judul_nomor_antrian);

			printer_select_font($printer, $judul_antrian);
			printer_draw_text($printer, "LOKET KASIR",130,95);
			printer_delete_font($judul_antrian);

			printer_select_font($printer, $nomor_antrian);
			printer_draw_text($printer, $data['nomor_antrian'],140,120);
			printer_delete_font($nomor_antrian);

			printer_select_font($printer, $nama_pa);
			printer_draw_text($printer, "PA TUBAN",150,190);
			printer_delete_font($nama_pa);

			printer_select_font($printer, $terimakasih);
			printer_draw_text($printer, "TERIMA KASIH",155, 260);
			printer_draw_text($printer, "",155, 300);
			printer_delete_font($terimakasih);


			printer_end_page($printer);
			printer_end_doc($printer);
			printer_close($printer);
	}





	// FUNGSI PENGADUAN :: --------------------------------------------
	function antrian_pengaduan(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'pengaduan' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$this->dblokal->tutupkoneksiantrian();
		// print_r($arr_nomorantrian);
		$data['arr_nomorantrian']=$hasil;
		$data['panggil_no_perk'] = 1;
		$data['main_body'] = 'antrian/input_antrian_pengaduan_new';
		$this->load->vars($data);
		$this->load->view('template_antrian');
		
	}

	function panggil_antrian_pengaduan(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		}	


		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=1 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}

		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status,ket_panggilan)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."','')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}


		$this->dblokal->tutupkoneksiantrian();
		
		echo "<script>window.close()</script>";
	}

	function panggil_antrian_pengaduan_selesai(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=2 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// UPDATE ANTRIAN	
		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}

	function ambil_nomor_pengaduan(){
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'pengaduan' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
		$hasil = @mysql_query($query);
		
		$nomor_antrian = 0;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $nomor_antrian = $row['nomor_antrian'];
		}	

		if($nomor_antrian == 0){
			$nomor_antrian = 1;
		}else{
			$nomor_antrian = ($nomor_antrian+1);
		}

		

		// INSERT ANTRIAN
		$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,status,urutan,tipe)
			VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','',0,'".$nomor_antrian."','pengaduan')";
		if(@mysql_query($sql)){
			// CETAK ANTRIAN
			// CETAK ANTRIAN
			if(strlen($nomor_antrian) == 1){
			$nomor_antrian = "G00".$nomor_antrian;
			}elseif (strlen($nomor_antrian) == 2) {
			$nomor_antrian = "G0".$nomor_antrian;
			}else{
			$nomor_antrian = "G".$nomor_antrian;	
			}
			$data = array(
				'nomor_antrian' => $nomor_antrian,

				);
			$this->cetak_antrian_r_pengaduan($data);
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// INSERT ANTRIAN
		$this->dblokal->tutupkoneksiantrian();


		
		
		
		
		redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));

	}
	
	function cetak_antrian_r_pengaduan($data){
			$tanggal = date("d-m-Y");
			$jam = date("H:i:s");

			$printer = printer_open("\\\\192.168.2.5\\POS-58");
			printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
			printer_start_doc($printer);
			printer_start_page($printer);

			$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

			$judul_nomor_antrian = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

			$judul_antrian = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nomor_antrian = printer_create_font("Agency FB", 70, 50, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);



			printer_select_font($printer, $jam_antrian);
			printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,70, 0);
			printer_delete_font($jam_antrian);

			printer_select_font($printer, $judul_nomor_antrian);
			printer_draw_text($printer, "NOMOR ANTRIAN :",140,60);
			printer_delete_font($judul_nomor_antrian);

			printer_select_font($printer, $judul_antrian);
			printer_draw_text($printer, "R. PENGADUAN",130,95);
			printer_delete_font($judul_antrian);

			printer_select_font($printer, $nomor_antrian);
			printer_draw_text($printer, $data['nomor_antrian'],140,120);
			printer_delete_font($nomor_antrian);

			printer_select_font($printer, $nama_pa);
			printer_draw_text($printer, "PA TUBAN",150,190);
			printer_delete_font($nama_pa);

			printer_select_font($printer, $terimakasih);
			printer_draw_text($printer, "TERIMA KASIH",155, 260);
			printer_draw_text($printer, "",155, 300);
			printer_delete_font($terimakasih);


			printer_end_page($printer);
			printer_end_doc($printer);
			printer_close($printer);
	}




	// FUNGSI MEDIASI :: -----------------------------------------------
	function antrian_mediasi(){
		//$this->minta_akses();
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$query = "SELECT * FROM antrianlokal WHERE tipe = 'mediasi' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$this->dblokal->tutupkoneksiantrian();
		// print_r($arr_nomorantrian);
		$data['arr_nomorantrian']=$hasil;
		$data['panggil_no_perk'] = 1;
		$data['main_body'] = 'antrian/input_antrian_mediasi';
		$this->load->vars($data);
		$this->load->view('template_antrian');
		
	}

	function panggil_antrian_mediasi(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$query = "SELECT * FROM antrianlokal where id = '".$antrian_id."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		}	


		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=1 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}

		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		$querycekpanggilan = "SELECT COUNT(*) as total FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status ='0'";
		$hasilcekpanggilan = @mysql_query($querycekpanggilan);
		$hasilcekpanggilan = @mysql_fetch_assoc($hasilcekpanggilan);
		if($hasilcekpanggilan['total'] > 0){
			$status = 1;
		}else{
			$status = 0;
		}
		
		// INSERT ANTRIAN
		$sqlpanggilan = "INSERT INTO panggilan(id,waktu_panggilan,antrianlokal_id,status,ket_panggilan)
			VALUES ('','".$waktu_panggilan->format('Y-m-d H:i:s')."',".$antrian_id.",'".$status."','')";
			if(@mysql_query($sqlpanggilan)){
			    // echo "Records inserted successfully.";
			} else{
			    // echo "ERROR: Could not able to execute";
			}

		$this->dblokal->tutupkoneksiantrian();

		echo "<script>window.close()</script>";
	}

	function panggil_antrian_mediasi_selesai(){
		$segment=$this->uri->segment_array();
		$antrian_id=$this->encrypt->decode(base64_decode($segment[3]));
		$panggil_no_perk=$segment[4];
		$this->load->model('antrian_m','antrian');
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		// UPDATE ANTRIAN
		$sql = "UPDATE antrianlokal SET status=2 WHERE id=".$antrian_id." AND tanggal_antrian = '".date('Y-m-d')."'";
		if(@mysql_query($sql)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}
		// exit();
		// UPDATE ANTRIAN	
		$this->dblokal->tutupkoneksiantrian();
		echo "<script>window.close()</script>";
	}

	function input_para_pihak_mediasi(){
		$data['main_body']='antrian/input_antrian_pihak_mediasi_v';	
		$this->load->vars($data);
		$this->load->view('template_antrian');
	}

	function ambil_nomor_mediasi(){
		$this->load->model('antrian_m','antrian');
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$jns='mediasi';

		$nomor_perkara=$this->input->post('nomor_perkara',true);
		$nomor_perkara=trim($nomor_perkara);
		$perkara_id = $this->antrian->get_perkara_id($nomor_perkara);
		
		$query = "SELECT * FROM antrianlokal where perkara_id = '".$perkara_id."' AND ket = '".$jns."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = '';
		$arr_jns = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		   $arr_jns = $row['ket'];
		}	

		$this->dblokal->tutupkoneksiantrian();

		if($arr_nomorantrian != '' && $arr_jns != ''){
			// echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara: '.$nomor_perkara.' <br/> Sudah Mengambil Antrian'));
			// exit();
		}

		if($perkara_id != '' ){
			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			
			$query = "SELECT * FROM antrianlokal WHERE tipe = 'mediasi' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			

			// INSERT ANTRIAN
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','".$nomor_perkara."',0,'".$nomor_antrian."','mediasi','".$jns."')";
			if(@mysql_query($sql)){
			   
			    if($this->input->post('nomor_perkara',true) != ""){
			    	// CETAK ANTRIAN
			    	// CETAK ANTRIAN
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian = "D00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian = "D0".$nomor_antrian;
				}else{
				$nomor_antrian = "D".$nomor_antrian;	
				}
				$data = array(
					'nomor_antrian' => $nomor_antrian,

					);
				$this->cetak_antrian_r_mediasi($data);
			    echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			    exit();
				}else{
				 echo "Records inserted successfully.";	
				}
			} else{
				if($this->input->post('nomor_perkara',true) != ""){
				echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				exit();
				}else{
				echo "ERROR: Could not able to execute";	
				}
			    
			}
			// exit();
			// INSERT ANTRIAN
			$this->dblokal->tutupkoneksiantrian();
	
		}else{
			if($this->input->post('nomor_perkara',true) != ""){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara:'.$nomor_perkara.' <br/> Tidak Terdaftar'));
			exit();
			}else{
				echo "Gagal membuat antrian";
			}
		}
		// redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));
	}


	function ambil_nomor_mediasi_param($perkara_id,$nomor_perkara){
		$this->load->model('antrian_m','antrian');
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		
		$jns='mediasi';

		$query = "SELECT * FROM antrianlokal where perkara_id = '".$perkara_id."' AND ket = '".$jns."' AND tanggal_antrian = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);

		$arr_nomorantrian = '';
		$arr_jns = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_nomorantrian = $row['nomor_antrian'];
		   $arr_jns = $row['ket'];
		}	

		$this->dblokal->tutupkoneksiantrian();

		if($arr_nomorantrian != '' && $arr_jns != ''){
			// echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara: '.$nomor_perkara.' <br/> Sudah Mengambil Antrian'));
			// exit();
		}

		if($perkara_id != '' ){
			$this->load->library('dblokal');
			$this->dblokal->koneksiantrian();
			
			$query = "SELECT * FROM antrianlokal WHERE tipe = 'mediasi' AND tanggal_antrian = '".date('Y-m-d')."' ORDER BY id DESC LIMIT 1";
			$hasil = @mysql_query($query);
			
			$nomor_antrian = 0;
			while($row = @mysql_fetch_assoc($hasil)) {
			   $nomor_antrian = $row['nomor_antrian'];
			}	

			if($nomor_antrian == 0){
				$nomor_antrian = 1;
			}else{
				$nomor_antrian = ($nomor_antrian+1);
			}

			

			// INSERT ANTRIAN
			$sql = "INSERT INTO antrianlokal (id,nomor_antrian,tanggal_antrian,perkara_id,nomor_perkara,status,urutan,tipe,ket)
				VALUES ('','".$nomor_antrian."','".date('Y-m-d')."','".$perkara_id."','".$nomor_perkara."',0,'".$nomor_antrian."','mediasi','".$jns."')";
			if(@mysql_query($sql)){
			   
			    if($this->input->post('nomor_perkara',true) != ""){
			    	// CETAK ANTRIAN
			    	// CETAK ANTRIAN
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian = "D00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian = "D0".$nomor_antrian;
				}else{
				$nomor_antrian = "D".$nomor_antrian;	
				}
				$data = array(
					'nomor_antrian' => $nomor_antrian,

					);
				// $this->cetak_antrian_r_ac($data);
			    echo json_encode(array('st'=>1,'msg'=>'Antrian Berhasil Dibuat <br/>Nomor Antrian: '.$nomor_antrian));
			    exit();
				}else{
				 echo "Records inserted successfully.";	
				}
			} else{
				if($this->input->post('nomor_perkara',true) != ""){
				echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat'));
				exit();
				}else{
				echo "ERROR: Could not able to execute";	
				}
			    
			}
			// exit();
			// INSERT ANTRIAN
			$this->dblokal->tutupkoneksiantrian();
	
		}else{
			if($this->input->post('nomor_perkara',true) != ""){
			echo json_encode(array('st'=>0,'msg'=>'Antrian Gagal Dibuat <br/>Nomor Perkara:'.$nomor_perkara.' <br/> Tidak Terdaftar'));
			exit();
			}else{
				echo "Gagal membuat antrian";
			}
		}
		// redirect('antrian/home');
		// header('Refresh: 10; URL='.base_url("antrian/home"));
	}

	function cetak_antrian_r_mediasi($data){
			$tanggal = date("d-m-Y");
			$jam = date("H:i:s");

			$printer = printer_open("\\\\192.168.2.5\\POS-58");
			printer_set_option($printer, PRINTER_MODE, "RAW"); // mode disobek ( kertas tidak menggulung )
			printer_start_doc($printer);
			printer_start_page($printer);

			$jam_antrian = printer_create_font("Agency FB", 18, 17, PRINTER_FW_THIN, false, false, false, 0);

			$judul_nomor_antrian = printer_create_font("Agency FB", 24, 17, PRINTER_FW_LIGHT, false, false, false, 0);

			$judul_antrian = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nomor_antrian = printer_create_font("Agency FB", 70, 50, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$nama_pa = printer_create_font("Agency FB", 30, 17, PRINTER_FW_ULTRABOLD, false, false, false, 0);

			$terimakasih = printer_create_font("Agency FB", 22, 17, PRINTER_FW_THIN, false, false, false, 0);



			printer_select_font($printer, $jam_antrian);
			printer_draw_text($printer, $this->hari().", ".$tanggal." ".$jam,70, 0);
			printer_delete_font($jam_antrian);

			printer_select_font($printer, $judul_nomor_antrian);
			printer_draw_text($printer, "NOMOR ANTRIAN :",140,60);
			printer_delete_font($judul_nomor_antrian);

			printer_select_font($printer, $judul_antrian);
			printer_draw_text($printer, "R. MEDIASI",130,95);
			printer_delete_font($judul_antrian);

			printer_select_font($printer, $nomor_antrian);
			printer_draw_text($printer, $data['nomor_antrian'],140,120);
			printer_delete_font($nomor_antrian);

			printer_select_font($printer, $nama_pa);
			printer_draw_text($printer, "PA TUBAN",150,190);
			printer_delete_font($nama_pa);

			printer_select_font($printer, $terimakasih);
			printer_draw_text($printer, "TERIMA KASIH",155, 260);
			printer_draw_text($printer, "",155, 300);
			printer_delete_font($terimakasih);


			printer_end_page($printer);
			printer_end_doc($printer);
			printer_close($printer);
	}


	// FUNGSI TAMBAHAN :: -----------------------------------------------
	function cek_panggilan(){
		header("Access-Control-Allow-Methods: *");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		$this->load->model('antrian_m','antrian');
		
		

		$id = '';
		$ruangan = '';
		$ruang_id = '';
		$nomor_perkara = '';
		$pihak1 = '';
		$pihak2 = '';
		$nomor_antrian_e = '';
		$id_sendiri = '';
		$untuk = '';

		$nomorantrian = NULL;
		$tipe = NULL;
		$panggilan_id = NULL;
		$ket_panggilan = NULL;
		$ket = NULL;
		$antrian_id = NULL;
		$perkara_id = NULL;
		$nomor_perkara = NULL;
		
		$querysidang = "SELECT * FROM panggilan WHERE waktu_panggilan = '".date('Y-m-d H:i:s')."' AND status = '0'";
		$hasilsidang = @mysql_query($querysidang);

		while($rowsidang = @mysql_fetch_assoc($hasilsidang)) {
		   $panggilan_id = $rowsidang['id'];
		   $antrian_id = $rowsidang['antrianlokal_id'];
		   $tipe = $rowsidang['ket_panggilan'];
		   $untuk = $rowsidang['untuk'];
		}

		$querycekwaktu = "SELECT * FROM panggilan WHERE waktu_panggilan < '".date('Y-m-d H:i:s')."' AND status = '0'";
		$hasilcekwaktu = @mysql_query($querycekwaktu);

		$waktu_panggilan_cek = NULL;	
		while($rowcekwaktu = @mysql_fetch_assoc($hasilcekwaktu)) {
		   $waktu_panggilan_cek = date('Y-m-d H:i:s', strtotime($rowcekwaktu['waktu_panggilan']));
		}


		// CEK SELISIH WAKTU
		$awal  = new DateTime($waktu_panggilan_cek);
		$akhir = new DateTime(); // Waktu sekarang
		$diff  = $awal->diff($akhir);

		if($tipe == NULL && $waktu_panggilan_cek != NULL && intval($diff->s) > 30){
			// 	// UPDATE ANTRIAN
			// echo "ubah";
			$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
			$waktu_panggilan->modify('+1 seconds');

			// echo date('Y-m-d H:i:s')."  ---  ".$waktu_panggilan->format('Y-m-d H:i:s');
				$sql = "UPDATE panggilan SET waktu_panggilan='".$waktu_panggilan->format('Y-m-d H:i:s')."' WHERE status='0'";
				if(@mysql_query($sql)){
				    // echo "Records inserted successfully.".$id;
				} else{
				    // echo "ERROR: Could not able to execute".$id;
				}
		}
		


		if($tipe != 'sidang'){
			$query = "SELECT panggilan.id, panggilan.untuk, nomor_antrian, tipe, antrianlokal.status, antrianlokal.ket,panggilan.ket_panggilan, antrianlokal.perkara_id, antrianlokal.nomor_perkara,antrianlokal.id_sendiri FROM panggilan INNER JOIN antrianlokal ON panggilan.antrianlokal_id = antrianlokal.id WHERE waktu_panggilan = '".date('Y-m-d H:i:s')."' AND panggilan.status = '0'";
			$hasil = @mysql_query($query);

			while($row = @mysql_fetch_assoc($hasil)) {
			   $panggilan_id = $row['id'];
			   $nomorantrian = $row['nomor_antrian'];
			   $perkara_id = $row['perkara_id'];
			   $nomor_perkara = $row['nomor_perkara'];
			   $id_sendiri = $row['id_sendiri'];
			   		if($id_sendiri != null){
					$querypendaftaran_sub = "SELECT * FROM antrianlokal WHERE tipe = 'pendaftaran' AND id=".$id_sendiri." AND tanggal_antrian = '".date('Y-m-d')."'";
					$hasilpendaftaran_sub = mysql_query($querypendaftaran_sub);
					
					$nomorantrianpendaftaran = '';
					while($rowpendaftaran_sub = mysql_fetch_assoc($hasilpendaftaran_sub)) {
					   $nomorantrianpendaftaran = $rowpendaftaran_sub['nomor_antrian'];
					}

					if(strlen($nomorantrianpendaftaran) == 1){
					$nomorantrianpendaftaran = "A00".$nomorantrianpendaftaran;
					}elseif (strlen($nomor_antrian) == 2) {
					$nomorantrianpendaftaran = "A0".$nomorantrianpendaftaran;
					}elseif (strlen($nomor_antrian) == 1){
					$nomorantrianpendaftaran = "A".$nomorantrianpendaftaran;	
					}
			        $id_sendiri = $nomorantrianpendaftaran;
					}

			   $tipe = $row['tipe'];
				   if($tipe == 'pendaftaran'){
				   		$tipe = ($row['status'] > 2 ? 'meja1' : 'pendaftaran');		
				   }
			}
		}


		
		$this->dblokal->tutupkoneksiantrian();

		

		if($tipe == 'sidang'){
			// R. SIDANG ---------------------------
			$result_antrian=$this->antrian->get_info_antrian1($antrian_id);
			$info_antrian=$result_antrian->row();
			$kode_ruang=$info_antrian->kode;
			$nomor_antrian=$info_antrian->nomor_antrian;
			$ruang_id=$info_antrian->ruang_id;
			$ruangan=$info_antrian->nama;

			// ---------------
			$pihak1=$info_antrian->pihak1_text;
			$pihak2=$info_antrian->pihak2_text;
			
			$perkara_id=$info_antrian->perkara_id;
			$info_perkara=$this->antrian->get_info_perkara($perkara_id);
			$nomor_perkara=trim($info_perkara->row()->nomor_perkara);

			$ruangan=strtolower($ruangan);
			$ruangan=str_replace("ruang", "", $ruangan);
			$ruangan=str_replace("sidang", "", $ruangan);
			$ruangan=trim($ruangan);
			$no=$nomor_antrian;

			// ubah nomor antrian
			if($ruang_id == 1){
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian_e = "B00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian_e = "B0".$nomor_antrian;
				}else{
				$nomor_antrian_e = "B".$nomor_antrian;	
				}
			}elseif ($ruang_id == 2) {
				if(strlen($nomor_antrian) == 1){
				$nomor_antrian_e = "C00".$nomor_antrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian_e = "C0".$nomor_antrian;
				}else{
				$nomor_antrian_e = "C".$nomor_antrian;	
				}
			}
			// ubah nomor antrian

			
		}else{
			if($tipe == 'meja1' || $tipe == 'pendaftaran'){
				if(strlen($nomorantrian) == 1){
				$nomor_antrian_e = "A00".$nomorantrian;
				}elseif (strlen($nomorantrian) == 2) {
				$nomor_antrian_e = "A0".$nomorantrian;
				}else{
				$nomor_antrian_e = "A".$nomorantrian;	
				}
			}elseif($tipe == 'mediasi') {
				if(strlen($nomorantrian) == 1){
				$nomor_antrian_e = "D00".$nomorantrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian_e = "D0".$nomorantrian;
				}else{
				$nomor_antrian_e = "D".$nomorantrian;	
				}

				$result_antrianmediasi=$this->antrian->get_pihak($perkara_id);

				$pihak1=$result_antrianmediasi->pihak1_text;
				$pihak2=$result_antrianmediasi->pihak2_text;
			}elseif ($tipe == 'pengaduan') {
				if(strlen($nomorantrian) == 1){
				$nomor_antrian_e = "G00".$nomorantrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian_e = "G0".$nomorantrian;
				}else{
				$nomor_antrian_e = "G".$nomorantrian;	
				}
			}elseif($tipe == 'ac'){
				if(strlen($nomorantrian) == 1){
				$nomor_antrian_e = "F00".$nomorantrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian_e = "F0".$nomorantrian;
				}else{
				$nomor_antrian_e = "F".$nomorantrian;	
				}

				$result_antrianac=$this->antrian->get_pihak($perkara_id);

				// ---------------
				$pihak1=$result_antrianac->pihak1_text;
				$pihak2=$result_antrianac->pihak2_text;
			}elseif ($tipe == 'kasir') {
				if(strlen($nomorantrian) == 1){
				$nomor_antrian_e = "E00".$nomorantrian;
				}elseif (strlen($nomor_antrian) == 2) {
				$nomor_antrian_e = "E0".$nomorantrian;
				}else{
				$nomor_antrian_e = "E".$nomorantrian;	
				}

				$result_antriankasir=$this->antrian->get_pihak($perkara_id);
				if(!empty($result_antriankasir)){
					$pihak1=$result_antriankasir->pihak1_text;
					$pihak2=$result_antriankasir->pihak2_text;				
				}else{
					$pihak1= '';
					$pihak2= '';
				}
			}	
		}
		

		// =======================================================================
		// =======================================================================
		// =======================================================================
		// =======================================================================
		// =======================================================================
		$this->load->model('antrian_m','antrian');
		$list_ruang_sidang=$this->antrian->get_ruang_sidang_list();
		$arr_ruang_sidang=array();
		if (!empty($list_ruang_sidang)){
			foreach ($list_ruang_sidang->result() as $row) {
				$arr_ruang_sidang[$row->id]=$row->nama;
			}
		}
		
		$data['ruang_sidang_list']=$arr_ruang_sidang;
		
		// ----mulai sidang-----
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();
		$this->load->model('antrian_m','antrian');

		$query = "SELECT * FROM mulai_sidang WHERE tanggal = '".date('Y-m-d')."'";
		$hasil = @mysql_query($query);
		 
		$arr_id = array();
		$mulai_sidang_1 = '';
		$mulai_sidang_2 = '';
		while($row = @mysql_fetch_assoc($hasil)) {
		   $arr_id[] = $row['id'];
		   if($row['ruang_sidang'] == 1){
		   		$mulai_sidang_1 = 1;
		   }elseif ($row['ruang_sidang'] == 2) {
		   		$mulai_sidang_2 = 2;
		   }
		}


		
		$querypendaftaran_ada_1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 1 AND tipe = 'pendaftaran' ORDER BY id DESC LIMIT 1";
		$hasilpendaftaran_ada_1 = @mysql_query($querypendaftaran_ada_1);
		$urutanpendaftaran_ada_1 = '----';
		while($rowpendaftaran_ada_1 = @mysql_fetch_assoc($hasilpendaftaran_ada_1)) {
			$urutanpendaftaran_ada_1 = $rowpendaftaran_ada_1['nomor_antrian'];
		}

		$querypendaftaran = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 2 AND tipe = 'pendaftaran' ORDER BY id DESC LIMIT 1";
		$hasilpendaftaran = @mysql_query($querypendaftaran);
		$urutanpendaftaran = '----';
		while($rowpendaftaran = @mysql_fetch_assoc($hasilpendaftaran)) {
			$urutanpendaftaran = $rowpendaftaran['nomor_antrian'];
		}

		if(!empty($urutanpendaftaran_ada_1)){
			$urutanpendaftaran = $urutanpendaftaran_ada_1;
		}else{
			$urutanpendaftaran = $urutanpendaftaran;
		}

		if(strlen($urutanpendaftaran) == 1){
				$urutanpendaftaran = "A00".$urutanpendaftaran;
				}elseif (strlen($urutanpendaftaran) == 2) {
				$urutanpendaftaran = "A0".$urutanpendaftaran;
				}elseif (strlen($urutanpendaftaran) == 3){
				$urutanpendaftaran = "A".$urutanpendaftaran;
				}else{
				$urutanpendaftaran = "----";	
				}
		// $data['urutanpendaftaran'] = $urutanpendaftaran;

				$querymeja1_ada_1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 3 AND tipe = 'pendaftaran' ORDER BY id ASC LIMIT 1";
		$hasilmeja1_ada_1 = @mysql_query($querymeja1_ada_1);
		$urutanmeja1_ada_1 = '----';
		while($rowmeja1_ada_1 = @mysql_fetch_assoc($hasilmeja1_ada_1)) {
			$urutanmeja1_ada_1 = $rowmeja1_ada_1['nomor_antrian'];
		}

		$querymeja1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 4 AND tipe = 'pendaftaran' ORDER BY id DESC LIMIT 1";
		$hasilmeja1 = @mysql_query($querymeja1);
		$urutanmeja1 = '----';
		while($rowmeja1 = @mysql_fetch_assoc($hasilmeja1)) {
			$urutanmeja1 = $rowmeja1['nomor_antrian'];
		}

		if(!empty($urutanmeja1_ada_1)){
			$urutanmeja1 = $urutanmeja1_ada_1;
		}else{
			$urutanmeja1 = $urutanmeja1;
		}

		if(strlen($urutanmeja1) == 1){
				$urutanmeja1 = "A00".$urutanmeja1;
				}elseif (strlen($urutanmeja1) == 2) {
				$urutanmeja1 = "A0".$urutanmeja1;
				}elseif (strlen($urutanmeja1) == 3){
				$urutanmeja1 = "A".$urutanmeja1;
				}else{
				$urutanmeja1 = "----";	
				}
		$data['urutanmeja1'] = $urutanmeja1;

		$queryac_ada_1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 1 AND tipe = 'ac' ORDER BY id DESC LIMIT 1";
		$hasilac_ada_1 = @mysql_query($queryac_ada_1);
		$urutanac_ada_1 = '----';
		$perkara_id_ac_ada_1 = '';
		while($rowac_ada_1 = @mysql_fetch_assoc($hasilac_ada_1)) {
			$urutanac_ada_1 = $rowac_ada_1['nomor_antrian'];
			$perkara_id_ac_ada_1 = $rowac_ada_1['perkara_id'];
		}

		$queryac = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 2 AND tipe = 'ac' ORDER BY id DESC LIMIT 1";
		$hasilac = @mysql_query($queryac);
		$urutanac = '----';
		while($rowac = @mysql_fetch_assoc($hasilac)) {
			$urutanac = $rowac['nomor_antrian'];
			$perkara_id_ac = $rowac['perkara_id'];
		}

		if(!empty($urutanac_ada_1)){
			$urutanac = $urutanac_ada_1;
			$perkara_id_ac = $perkara_id_ac_ada_1;
		}else{
			$urutanac = $urutanac;
			$perkara_id_ac = $perkara_id_ac;
		}

		if(strlen($urutanac) == 1){
				$urutanac = "F00".$urutanac;
				}elseif (strlen($urutanac) == 2) {
				$urutanac = "F0".$urutanac;
				}elseif (strlen($urutanac) == 3){
				$urutanac = "F".$urutanac;	
				}else{
				$urutanac = "----";	
				}
				$urutanac = $urutanac;

				$result_ac=$this->antrian->get_pihak($perkara_id_ac);
				if(!empty($result_ac->nomor_perkara)){
					$noac= $result_ac->nomor_perkara;
					$pac= "P : ".$result_ac->pihak1_text;
					$tac= "T : ".$result_ac->pihak2_text;
				}else{
					$noac= '-------------';
					$pac = 'P : ---------';
					$tac = 'T : ---------';
				}		


		
		$querypengaduan_ada_1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 1 AND tipe = 'pengaduan' ORDER BY id DESC LIMIT 1";
		$hasilpengaduan_ada_1 = @mysql_query($querypengaduan_ada_1);
		$urutanpengaduan_ada_1 = '----';
		while($rowpengaduan_ada_1 = @mysql_fetch_assoc($hasilpengaduan_ada_1)) {
			$urutanpengaduan_ada_1 = $rowpengaduan_ada_1['nomor_antrian'];
		}

		$querypengaduan = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 2 AND tipe = 'pengaduan' ORDER BY id DESC LIMIT 1";
		$hasilpengaduan = @mysql_query($querypengaduan);
		$urutanpengaduan = '----';
		while($rowpengaduan = @mysql_fetch_assoc($hasilpengaduan)) {
			$urutanpengaduan = $rowpengaduan['nomor_antrian'];
		}

		if(!empty($urutanpengaduan_ada_1)){
			$urutanpengaduan = $urutanpengaduan_ada_1;
		}else{
			$urutanpengaduan = $urutanpengaduan;
		}

		if(strlen($urutanpengaduan) == 1){
				$urutanpengaduan = "G00".$urutanpengaduan;
				}elseif (strlen($urutanpengaduan) == 2) {
				$urutanpengaduan = "G0".$urutanpengaduan;
				}elseif (strlen($urutanpengaduan) == 3){
				$urutanpengaduan = "G".$urutanpengaduan;	
				}else{
				$urutanpengaduan = "----";	
				}
				$data['urutanpengaduan'] = $urutanpengaduan;
		
		

		$querymediasi_ada_1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 1 AND tipe = 'mediasi' ORDER BY id DESC LIMIT 1";
		$hasilmediasi_ada_1 = @mysql_query($querymediasi_ada_1);
		$urutanmediasi_ada_1 = '----';
		$perkara_id_mediasi_ada_1 = '';
		while($rowmediasi_ada_1 = @mysql_fetch_assoc($hasilmediasi_ada_1)) {
			$urutanmediasi_ada_1 = $rowmediasi_ada_1['nomor_antrian'];
			$perkara_id_mediasi_ada_1 = $rowmediasi_ada_1['perkara_id'];
		}

		$querymediasi = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 2 AND tipe = 'mediasi' ORDER BY id DESC LIMIT 1";
		$hasilmediasi = @mysql_query($querymediasi);
		$urutanmediasi = '----';
		while($rowmediasi = @mysql_fetch_assoc($hasilmediasi)) {
			$urutanmediasi = $rowmediasi['nomor_antrian'];
			$perkara_id_mediasi = $rowmediasi['perkara_id'];
		}

		if(!empty($urutanmediasi_ada_1)){
			$urutanmediasi = $urutanmediasi_ada_1;
			$perkara_id_mediasi = $perkara_id_mediasi_ada_1;
		}else{
			$urutanmediasi = $urutanmediasi;
			$perkara_id_mediasi = $perkara_id_mediasi;
		}

		if(strlen($urutanmediasi) == 1){
				$urutanmediasi = "D00".$urutanmediasi;
				}elseif (strlen($urutanmediasi) == 2) {
				$urutanmediasi = "D0".$urutanmediasi;
				}elseif (strlen($urutanmediasi) == 3){
				$urutanmediasi = "D".$urutanmediasi;	
				}else{
				$urutanmediasi = "----";	
				}
				$urutanmediasi = $urutanmediasi;

				$result_mediasi=$this->antrian->get_pihak($perkara_id_mediasi);
				if(!empty($result_mediasi->nomor_perkara)){
					$nomediasi= $result_mediasi->nomor_perkara;
					$pmediasi= "P : ".$result_mediasi->pihak1_text;
					$tmediasi= "T : ".$result_mediasi->pihak2_text;
				}else{
					$nomediasi= '-------------';
					$pmediasi = 'P : ---------';
					$tmediasi = 'T : ---------';
				}	



		$querykasir_ada_1 = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 1 AND tipe = 'kasir' ORDER BY id DESC LIMIT 1";
		$hasilkasir_ada_1 = @mysql_query($querykasir_ada_1);
		$urutankasir_ada_1 = '----';
		$perkara_id_kasir_ada_1 = '';
		while($rowkasir_ada_1 = @mysql_fetch_assoc($hasilkasir_ada_1)) {
			$urutankasir_ada_1 = $rowkasir_ada_1['nomor_antrian'];
			$perkara_id_kasir_ada_1 = $rowkasir_ada_1['perkara_id'];
		}

		$querykasir = "SELECT * FROM antrianlokal WHERE tanggal_antrian = '".date('Y-m-d')."' AND status = 2 AND tipe = 'kasir' ORDER BY id DESC LIMIT 1";
		$hasilkasir = @mysql_query($querykasir);
		$urutankasir = '----';
		$perkara_id_kasir = '';
		while($rowkasir = @mysql_fetch_assoc($hasilkasir)) {
			$urutankasir = $rowkasir['nomor_antrian'];
			$perkara_id_kasir = $rowkasir['perkara_id'];
		}

		if(!empty($perkara_id_kasir_ada_1)){
			$urutankasir = $urutankasir_ada_1;
			$perkara_id_kasir = $perkara_id_kasir_ada_1;
		}else{
			$urutankasir = $urutankasir;
			$perkara_id_kasir = $perkara_id_kasir;
		}

		if(strlen($urutankasir) == 1){
				$urutankasir = "E00".$urutankasir;
				}elseif (strlen($urutankasir) == 2) {
				$urutankasir = "E0".$urutankasir;
				}elseif (strlen($urutankasir) == 3){
				$urutankasir = "E".$urutankasir;	
				}else{
				$urutankasir = "----";	
				}
				$urutankasir = $urutankasir;

				$result_kasir=$this->antrian->get_pihak($perkara_id_kasir);
				if(!empty($result_kasir->nomor_perkara)){
					$nokasir= $result_kasir->nomor_perkara;
					$pkasir= "P : ".$result_kasir->pihak1_text;
					$tkasir= "T : ".$result_kasir->pihak2_text;
				}else{
					$nokasir= '-------------';
					$pkasir = 'P : ---------';
					$tkasir = 'T : ---------';
				}		
		

		$this->dblokal->tutupkoneksiantrian();
		// ----mulai sidang-----
		$r_nomor_antrian_terakhir_sidang_1_ada_1 =$this->antrian->get_antrian_perruangan_terakhir_ada_1(1)->row();
		$r_nomor_antrian_terakhir_sidang_1 =$this->antrian->get_antrian_perruangan_terakhir(1)->row();
		
		// print_r($r_nomor_antrian_terakhir_sidang_1_ada_1);
		// print_r($r_nomor_antrian_terakhir_sidang_1);

		// exit();

		if(!empty($r_nomor_antrian_terakhir_sidang_1_ada_1)){
			$nomor_antrian_terakhir_sidang_1 = $r_nomor_antrian_terakhir_sidang_1_ada_1->nomor_antrian;
			$perkara_id_sidang_1 = $r_nomor_antrian_terakhir_sidang_1_ada_1->perkara_id;
		}elseif(!empty($r_nomor_antrian_terakhir_sidang_1)){
			$nomor_antrian_terakhir_sidang_1 = $r_nomor_antrian_terakhir_sidang_1->nomor_antrian;
			$perkara_id_sidang_1 = $r_nomor_antrian_terakhir_sidang_1->perkara_id;
		}else{
			$nomor_antrian_terakhir_sidang_1 = '-----';
			$perkara_id_sidang_1 = '';
		}
		if($mulai_sidang_1 != ''){
			if(strlen($nomor_antrian_terakhir_sidang_1) == 1){
				$nomor_antrian_terakhir_sidang_1 = "B00".$nomor_antrian_terakhir_sidang_1;
				}elseif (strlen($nomor_antrian_terakhir_sidang_1) == 2) {
				$nomor_antrian_terakhir_sidang_1 = "B0".$nomor_antrian_terakhir_sidang_1;
				}else{
				$nomor_antrian_terakhir_sidang_1 = "B".$nomor_antrian_terakhir_sidang_1;	
			}
			$nomor_antrian_terakhir_sidang_1 = $nomor_antrian_terakhir_sidang_1;
		}else{
			$nomor_antrian_terakhir_sidang_1 = '----';
		}
		
		$r_nomor_antrian_terakhir_sidang_2_ada_1 =$this->antrian->get_antrian_perruangan_terakhir_ada_1(2)->row();
		$r_nomor_antrian_terakhir_sidang_2 =$this->antrian->get_antrian_perruangan_terakhir(2)->row();
		if(!empty($r_nomor_antrian_terakhir_sidang_2_ada_1)){
			$nomor_antrian_terakhir_sidang_2 = $r_nomor_antrian_terakhir_sidang_2_ada_1->nomor_antrian;
			$perkara_id_sidang_2 = $r_nomor_antrian_terakhir_sidang_2_ada_1->perkara_id;
		}elseif(!empty($r_nomor_antrian_terakhir_sidang_2)){
			$nomor_antrian_terakhir_sidang_2 = $r_nomor_antrian_terakhir_sidang_2->nomor_antrian;
			$perkara_id_sidang_2 = $r_nomor_antrian_terakhir_sidang_2->perkara_id;
		}else{
			$nomor_antrian_terakhir_sidang_2 = '----'; 
			$perkara_id_sidang_2 = '';
		}
		
			
		if($mulai_sidang_2 != ''){
			if(strlen($nomor_antrian_terakhir_sidang_2) == 1){
				$nomor_antrian_terakhir_sidang_2 = "C00".$nomor_antrian_terakhir_sidang_2;
				}elseif (strlen($nomor_antrian_terakhir_sidang_2) == 2) {
				$nomor_antrian_terakhir_sidang_2 = "C0".$nomor_antrian_terakhir_sidang_2;
				}else{
				$nomor_antrian_terakhir_sidang_2 = "C".$nomor_antrian_terakhir_sidang_2;	
			}
			$nomor_antrian_terakhir_sidang_2 = $nomor_antrian_terakhir_sidang_2;
		}else{
			$nomor_antrian_terakhir_sidang_2 = '----';
		}

		// echo "-----------".$perkara_id_sidang_1." ====== ".$perkara_id_sidang_2;
		$result_sidang_1=$this->antrian->get_pihak($perkara_id_sidang_1);
				if(!empty($result_sidang_1->nomor_perkara)){
					$nosidang_1= $result_sidang_1->nomor_perkara;
					$psidang_1= "P : ".$result_sidang_1->pihak1_text;
					$tsidang_1= "T : ".$result_sidang_1->pihak2_text;
				}else{
					$nosidang_1= '-------------';
					$psidang_1 = 'P : ---------';
					$tsidang_1 = 'T : ---------';
				}

		$result_sidang_2=$this->antrian->get_pihak($perkara_id_sidang_2);
				if(!empty($result_sidang_2->nomor_perkara)){
					$nosidang_2= $result_sidang_2->nomor_perkara;
					$psidang_2= "P : ".$result_sidang_2->pihak1_text;
					$tsidang_2= "T : ".$result_sidang_2->pihak2_text;
				}else{
					$nosidang_2= '-------------';
					$psidang_2 = 'P : ---------';
					$tsidang_2 = 'T : ---------';
				}	
		// =======================================================================
		// =======================================================================
		// =======================================================================
		// =======================================================================
		// =======================================================================
		


		$json=array('id'=>$panggilan_id,'nomor_antrian'=>$nomor_antrian_e, 'tipe'=>$tipe, 'ruangan'=>$ruangan,'ruang_id'=>$ruang_id, 'nomor_perkara'=>$nomor_perkara, 'pihak1'=>$pihak1, 'pihak2'=>$pihak2, 'id_sendiri'=>$id_sendiri, 'untuk'=>$untuk, 'urutanpendaftaran'=>$urutanpendaftaran, 'urutanmeja1'=>$urutanmeja1, 'nomor_antrian_terakhir_sidang_1'=>$nomor_antrian_terakhir_sidang_1, 'nosidang_1'=>$nosidang_1, 'psidang_1'=>$psidang_1, 'tsidang_1'=>$tsidang_1, 'nomor_antrian_terakhir_sidang_2'=>$nomor_antrian_terakhir_sidang_2, 'nosidang_2'=>$nosidang_2, 'psidang_2'=>$psidang_2, 'tsidang_2'=>$tsidang_2, 'urutanmediasi'=>$urutanmediasi, 'nomediasi'=>$nomediasi, 'pmediasi'=>$pmediasi, 'tmediasi'=>$tmediasi, 'urutanpengaduan'=>$urutanpengaduan, 'urutanac'=>$urutanac, 'noac'=>$noac, 'pac'=>$pac, 'tac'=>$tac, 'urutankasir'=>$urutankasir, 'nokasir'=>$nokasir, 'pkasir'=>$pkasir, 'tkasir'=>$tkasir,'perkara_id'=>$perkara_id);
		echo json_encode($json);
		// if($nomorantrian == NULL){
		// 	echo '<meta http-equiv="refresh" content="1">';

		// }
		exit();
	}

	function rubah_waktu_panggilan(){
		$segment=$this->uri->segment_array();
		$id = $segment[3];
		// echo $id."-------------------------";
		// ganti db lokal
		$this->load->library('dblokal');
		$this->dblokal->koneksiantrian();

		$sqlupdatestatus = "DELETE FROM panggilan WHERE id=".$id;
		if(@mysql_query($sqlupdatestatus)){
		    // echo "Records inserted successfully.";
		} else{
		    // echo "ERROR: Could not able to execute";
		}	

		$query = "SELECT * FROM panggilan WHERE waktu_panggilan LIKE '%".date('Y-m-d')."%' AND status = '1' ORDER BY id ASC LIMIT 1";
		$hasil = @mysql_query($query);

		$id = NULL;
		while($row = @mysql_fetch_assoc($hasil)) {
		   $id = $row['id'];
		}

		// UPDATE ANTRIAN		
		$waktu_panggilan = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
		$waktu_panggilan->modify('+2 seconds');
		if($id != NULL){
			$sql = "UPDATE panggilan SET waktu_panggilan='".$waktu_panggilan->format('Y-m-d H:i:s')."',status='0' WHERE id=".$id;
			if(@mysql_query($sql)){
			    // echo "Records inserted successfully.".$id;
			} else{
			    // echo "ERROR: Could not able to execute".$id;
			}	
		}




		$this->dblokal->tutupkoneksiantrian();
	}

	function hari(){
			$day = date('D');
			$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => "Jum'at",
			'Sat' => 'Sabtu'
		);
			return $dayList[$day];
	}



	// ---------------------- minta akses

	function minta_akses(){

		$arrakses =  array();
		$path = ('assets/file/ini/akses.txt');
		if (file_exists($path)){
			$fh = fopen($path, "r");
			while (!feof($fh)) {
			    $line = fgets($fh);
			    if($line != ''){
			    	// echo $line;
			    $line = explode("|", $this->encrypt->decode(base64_decode($line)));	
			    	if(!empty($line)){
			    		$arrakses[] = $this->encrypt->decode(base64_decode($line[0]))."|".$line[1];		
			    	}
			    }
			}
			fclose($fh);	
		}

		$router =& load_class('Router', 'core');
		$mac = substr(exec('getmac'),0,17);
		$gabmacrouter = $mac."|".$router->fetch_method();

		if (!in_array($gabmacrouter, $arrakses)) {
			$arrmintaakses =  array();
			$pathmintaakses = ('assets/file/ini/minta_akses.txt');
			if (file_exists($pathmintaakses)){
				$fhmintaakses = fopen($pathmintaakses, "r");
				while (!feof($fhmintaakses)) {
				    $linemintaakses = fgets($fhmintaakses);
				    if($linemintaakses != ''){
				    	// echo $line;
				    $linemintaakses = explode("|", $this->encrypt->decode(base64_decode($linemintaakses)));	

				    	if(!empty($linemintaakses)){
				    		$arraksesmintaakses[] = $this->encrypt->decode(base64_decode($linemintaakses[0]))."|".$linemintaakses[1];		
				    	}
				    }
				}
				fclose($fh);	
			}

			if (!in_array($gabmacrouter, $arraksesmintaakses)) {
				$minta_akses = 1;
			}else{
				$minta_akses = 0;
			}

			$data['minta_akses'] = $minta_akses;
			$data['main_body'] = 'antrian/input_minta_akses';
			$this->load->vars($data);
			$this->load->view('header_antrian');
			$this->load->view('body/body_antrian');
			exit();
		}
	}

	function simpan_minta_akses(){

		$segment=$this->uri->segment_array();
		// $_3=$this->encrypt->decode(base64_decode($segment[3]));
		$path = ('assets/file/ini/minta_akses.txt');
		if (file_exists($path)){
		$fh = fopen($path, 'a') or die("can't open file");
		$data = $segment[3]."|".$segment[4]."|".$segment[5]."|".date('Y-m-d H:i:s');
		$data2 = $segment[3]."|".$segment[4];
		if(!$this->cari($data2,$path)){
			fwrite($fh, base64_encode($this->encrypt->encode($data))."\n\n");
			// fclose($fh);
		}
		fclose($fh);
		}

		echo "<script>window.close()</script>";
	}

	function daftar_minta_akses(){
		$arrmintaakses =  array();
		$pathmintaakses = ('assets/file/ini/akses.txt');
		if (file_exists($pathmintaakses)){
			$fhmintaakses = fopen($pathmintaakses, "r");
			while (!feof($fhmintaakses)) {
			    $linemintaakses = fgets($fhmintaakses);
			    if($linemintaakses != ''){
			    	// echo $line;
			    $linemintaakses = explode("|", $this->encrypt->decode(base64_decode($linemintaakses)));	

			    	if(!empty($linemintaakses)){
			    		$arraksesmintaakses[] = $this->encrypt->decode(base64_decode($linemintaakses[0]))."|".$linemintaakses[1];		
			    	}
			    }
			}
			fclose($fh);	
		}

		//print_r($arraksesmintaakses);
		//echo "----------------------<br/>";


		$path = ('assets/file/ini/minta_akses.txt');
		if (file_exists($path)){
			$fh = fopen($path, "r");
			while (!feof($fh)) {
			    $line = fgets($fh);
			    $line = preg_replace('/\s+/','',$line);
			    if($line != ''){
				$line2 = $line;
				//echo $line2."---  <br/>";			   
			    	// echo $this->encrypt->decode(base64_decode($line))."<br/>";
			    $line = explode("|", $this->encrypt->decode(base64_decode($line)));	

			    	if(!empty($line)){
			    		$gabmacrouter = $this->encrypt->decode(base64_decode($line[0]))."|".$line[1];

			    		if (in_array($gabmacrouter, $arraksesmintaakses)) {
			    			$onclick = "window.open('".base_url('antrian/terima_tolak_minta_akses/'.$line2.'/0')."');location.reload();";
			    			echo $gabmacrouter."<a href='#' onclick=".$onclick.">[TOLAK]</a> <hr/><br/>";
						}else{
							$onclick2 = "window.open('".base_url('antrian/terima_tolak_minta_akses/'.$line2.'/1')."');location.reload();";
							echo $gabmacrouter."<a href='#' onclick=".$onclick2.">[TERIMA]</a> <hr/><br/>";
						}	

			    		
			    	}	
			    
				}
			}
			 
			fclose($fh);	
		}

	}


	function terima_tolak_minta_akses(){
		$segment=$this->uri->segment_array();
		$path = ('assets/file/ini/akses.txt');
		if (file_exists($path)){
		$fh = fopen($path, 'a') or die("can't open file");
		$data = $segment[3]."\n";
		if($segment[4] == 1){
			fwrite($fh, $data);
		}

		if($segment[4] == 0){
		 	$fc=file($path);
			 foreach($fc as $line)
			  {
			    if (!strstr($line,$segment[3]))
			    {
			       $contents .= $line; 
			     }  
			  }
			  file_put_contents($path,$contents);
		}

		fclose($fh);
		}
		echo "<script>window.close()</script>";
	}

	function cari($search,$path)
	{
	    // header('Content-Type: text/plain');
	    $contents = file_get_contents($path);
	    $pattern = preg_quote($search, '/');
	    $pattern = "/^.*$pattern.*\$/m";
	    if(preg_match_all($pattern, $contents, $matches)){
	      $hasil=1;
	    }
	    else{    
	         $hasil=0;
	    }
	    return $hasil;
	}
}
