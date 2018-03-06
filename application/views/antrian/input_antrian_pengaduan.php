<hr class="thick-line" style="clear:both;">
<br/><br/> 
<table class="table table-bordered">
		<col  width="5%" />
        <col  width="15%" />
        <col  width="15%" />
        <col  width="10%" />
        <tbody>
			<tr>
				<td>No</td>
				<td>Nomor Antrian</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
			<?php
			if (!empty($arr_nomorantrian)){
				$i=1;
				while($row = mysql_fetch_assoc($arr_nomorantrian)) {
	  		    	echo "<tr>";
					echo "	<td>".$i."</td>";
					echo "	<td>".$row['nomor_antrian']."</td>";
					echo "	<td>".($row['status']==0?"Mengantri":($row['status']==1?"Tertunda":"Selesai"))."</td>";
					$onclick = "window.open('".base_url('manageAntrian/panggil_antrian_pendaftaran/'.base64_encode($this->encrypt->encode($row['id'])).'/'.$panggil_no_perk)."')";
					$onclick2 = "window.open('".base_url('manageAntrian/panggil_antrian_pendaftaran_selesai/'.base64_encode($this->encrypt->encode($row['id'])).'/'.$panggil_no_perk)."')";
					echo '<td align="center">';
					if (($row['status']==0 OR $row['status']==1) AND $i==1){
						echo '	[<a href="#" onclick="'.$onclick.'">PANGGIL</a>]';
						echo '	[<a href="#" id="selesai" onclick="'.$onclick2.'">SELESAI</a>]';
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
	$('#selesai').click(function() {
    location.reload();
	});
</script>
