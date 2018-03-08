
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">POS RUANG SIDANG <?php echo $this->uri->segment(3);?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" >
			<div class="table-responsive">
			<table  class="table table-striped table-bordered table-hover">
					<tbody>
						<tr >
							<td>Nomor Antrian</td>
							<td>Jenis Perkara</td>
							<td>Nomor Perkara</td>
							<td>Pihak Pemohon/Penggugat</td>
							<td>Pihak Termohon/Tergugat</td>
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
								echo "	<td>".$row->jenis_perkara_nama."</td>";
								echo "	<td>".$row->nomor_perkara."</td>";
								echo "	<td>".$row->pihak1_text."</td>";
								echo "	<td>".$row->pihak2_text."</td>";
								echo "	<td>".(($row->status==0 || $row->status==4) ?"Mengantri":($row->status==1?"Tertunda":"Selesai"))."</td>";
								$onclickpihak = "window.open('".base_url('antrian/panggil_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1/pihak')."')";
								$onclicksaksi = "window.open('".base_url('antrian/panggil_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1/saksi')."')";
								$onclickkuasa = "window.open('".base_url('antrian/panggil_antrian/'.base64_encode($this->encrypt->encode($row->id)).'/1/kuasa')."')";
								
								echo '<td align="center">';
								if (($row->status==4 OR $row->status==1 OR $row->status==0) AND $i==1){
									echo '<button type="button" class="btn btn-success btn-sm" onclick="'.$onclickpihak.'">Panggil Pihak</button> <hr>';
									echo '<button type="button" class="btn btn-primary btn-sm" onclick="'.$onclicksaksi.'">Panggil Saksi</button> <hr>';
									echo '<button type="button" class="btn btn-danger btn-sm" onclick="'.$onclickkuasa.'">Panggil Kuasa</button> <hr>';
									if($this->session->userdata('jenis_pengadilan')==4) {
										// echo '	[<a href="#" onclick="'.$onclick2.'">SKORS</a>] <br> ';
									}else{
										// echo '	[<a href="#" onclick="'.$onclick2.'">TUNDA</a>] <br> ';
									}
									// echo '	[<a href="#" onclick="'.$onclick3.'" id="selesai">SELESAI</a>] <br> ';
									echo '<a href="'.base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/m" id="mediasi"  class="btn btn-info btn-sm">MEDIASI</a><hr> ';
									?>
									<a href="<?php echo base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/t';?>"  class="btn btn-info btn-sm" onclick="window.open('<?php echo 'http://192.168.2.3/SIPP311/perkara_detil_agama/'.base64_encode($this->encrypt->encode($row->perkara_id)); ?>');">TUNDA</a><hr>
									<a href="<?php echo base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/p';?>" class="btn btn-warning btn-sm" onclick="window.open('<?php echo 'http://192.168.2.3/SIPP311/perkara_detil_agama/'.base64_encode($this->encrypt->encode($row->perkara_id)); ?>');">PUTUS</a><hr>
									<?php
									echo '<a href="'.base_url('antrian/selesai_antrian_sidang/'.base64_encode($this->encrypt->encode($row->id))).'/'.$this->uri->segment(3).'/i" id="ikrar"  class="btn btn-warning btn-sm">IKRAR</a> ';
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
			</div>
				


<script type="text/javascript">
	$('.selesai').click(function() {
    location.reload();
	});
</script>
            </div>
            