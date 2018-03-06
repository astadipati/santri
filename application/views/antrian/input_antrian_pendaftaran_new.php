<meta http-equiv="refresh" content="60"> 
<div id="ccantrian">

<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">ANTRIAN PENDAFTARAN</h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <br/><br/>    

	<table class="table table-bordered">
		<col  width="5%" />
        <col  width="15%" />
        <col  width="10%" />
        <tbody>
			<tr>
				<th>Nomor Antrian</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php
			if (!empty($arr_nomorantrian)){
				$i=1;
				while($row = mysql_fetch_assoc($arr_nomorantrian)) {
	  		    	echo "<tr>";
					echo "	<td><center>".$row['nomor_antrian']."</center></td>";
					echo "	<td><center>".($row['status']==0?"Mengantri":($row['status']==1?"Tertunda":"Selesai"))."</center></td>";
					$onclick = "window.open('".base_url('antrian/panggil_antrian_pendaftaran/'.base64_encode($this->encrypt->encode($row['id'])).'/'.$panggil_no_perk)."')";
					$onclick2 = "window.open('".base_url('antrian/panggil_antrian_pendaftaran_selesai/'.base64_encode($this->encrypt->encode($row['id'])).'/'.$panggil_no_perk)."')";
					echo '<td align="center">';
					if (($row['status']==0 OR $row['status']==1) AND $i<3){
						if($i == 1){
							echo '	[<a href="#" class="selesai" onclick="'.$onclick.'">PANGGIL</a>]';
							echo '	[<a href="#" class="selesai" onclick="'.$onclick2.'">SELESAI</a>]';
						}elseif ($status == 1 AND $i == 2) {
							echo '	[<a href="#" class="selesai" onclick="'.$onclick.'">PANGGIL</a>]';
							echo '	[<a href="#" class="selesai" onclick="'.$onclick2.'">SELESAI</a>]';
						}else{
							echo '---';
						}
					$status = $row['status'];	
					$i++;
					}else{
						echo '---';
					}
					echo '</td>';
					echo "</tr>";
				}
			}
			?>
		</tbody>
	</table>

	<br/><br/><br/><br/>


</div>

<script type="text/javascript">
	$('.selesai').click(function() {
    location.reload();
	});
</script>
