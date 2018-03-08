<meta http-equiv="refresh" content="5000"> 
<div id="ccantrian">

<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
						<img src="<?php echo base_url()?>assets/images/monitor.png?>" width=45>
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">ANTRIAN SIDANG - RUANG <?php echo $this->uri->segment(3);?></h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<br/><br/>
<table class="table table-bordered">
	    <col  width="15%" />
        <col  width="15%" />
        <col  width="15%" />
        <col  width="10%" />
        <col  width="10%" />
		<tbody>
			<tr>
				<td>Nomor Antrian</td>
				<td>Tanggal Sidang</td>
				<td>Nomor Perkara</td>
				<td>Pihak 1</td>
				<td>Pihak 2</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
			<?php
			if (!empty($antrian_list)){
				$no=1;
				$i = 1;
				foreach ($antrian_list as $row) {
					echo "<tr>";
					echo "	<td>".$row->nomor_antrian."</td>";
					echo "	<td>".$row->tanggal_sidang."</td>";
					echo "	<td>".$row->nomor_perkara."</td>";
					echo "	<td>".$row->pihak1_text."</td>";
					echo "	<td>".$row->pihak2_text."</td>";
					echo "	<td>".(($row->status==0 || $row->status==4) ?"Mengantri":($row->status==1?"Tertunda":"Selesai"))."</td>";
					$onclickpihak = "window.open('".base_url('antrian/panggil_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1/pihak')."')";
					$onclicksaksi = "window.open('".base_url('antrian/panggil_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1/saksi')."')";
					$onclickkuasa = "window.open('".base_url('antrian/panggil_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1/kuasa')."')";
					// $onclick2 = "window.open('".base_url('antrian/tunda_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1')."');location.reload();";
					// $onclick3 = "window.open('".base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id)).'/1')."');location.reload();";
					
					echo '<td align="center">';
					if (($row->status==4 OR $row->status==1 OR $row->status==0) AND $i==1){
						echo '	[<a href="#" onclick="'.$onclickpihak.'">PANGGIL PIHAK</a>] ';
						echo '	[<a href="#" onclick="'.$onclicksaksi.'">PANGGIL SAKSI</a>] ';
						echo '	[<a href="#" onclick="'.$onclickkuasa.'">PANGGIL KUASA</a>] ';
						if($this->session->userdata('jenis_pengadilan')==4) {
							// echo '	[<a href="#" onclick="'.$onclick2.'">SKORS</a>] <br> ';
						}else{
							// echo '	[<a href="#" onclick="'.$onclick2.'">TUNDA</a>] <br> ';
						}
						// echo '	[<a href="#" onclick="'.$onclick3.'" id="selesai">SELESAI</a>] <br> ';
						echo '	[<a href="'.base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/m" id="mediasi">MEDIASI</a>] ';
						?>
						[<a href="<?php echo base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/t';?>" onclick="window.open('<?php echo 'http://192.168.2.3/SIPP311/perkara_detil_agama/'.base64_encode($this->encrypt->encode($row->perkara_id)); ?>');">TUNDA</a>]
						[<a href="<?php echo base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/p';?>" onclick="window.open('<?php echo 'http://192.168.2.3/SIPP311/perkara_detil_agama/'.base64_encode($this->encrypt->encode($row->perkara_id)); ?>');">PUTUS</a>]
						<?php
						echo '	[<a href="'.base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/i" id="ikrar">IKRAR</a>] ';
						$i++;
					}else{
						echo '---';
					}
					echo '</td>';
					echo "</tr>";
					$no++;
				}
			}
			?> 
		</tbody>
	</table>

	<br/><br/><br/><br/>
</div>

