
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Ruang POSYANKUM</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
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


<script type="text/javascript">
	$('.selesai').click(function() {
    location.reload();
	});
</script>
            </div>
            