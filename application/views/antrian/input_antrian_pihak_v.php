<br>
<div style="width:100%;align:center">
	<div class="detil" style="padding: 2px;margin:0px 15%;background-color: white;width:70%;">
		<form id="frm_input_antrian" method="post" action="<?php echo base_url().'manageAntrian/f_validate_input_antrian';?>">
			<table id="tableDetilPerkara">
				<tr>
					<td style="color:#fff;font-weight:bold;font-size:1em">Nomor Perkara</td>
					<td><input style="font-size:5em" id="nomor_perkara" name="nomor_perkara" type="text" style='width:250px;' autofocus="autofocus"></td>
				</tr>
				<tr>
					<td colspan="2" style="background:white;" align="center"><input id="simpan" class="btn" type="submit" value="Simpan" style="font-size:4em;"></td>
					<input type="hidden" id='close_frm_input_antrian' value="Kembali" class="btn close_frm_input_antrian">
				</tr>
			</table>
		</form>
</div>
</div>
<div style="width:100%;height:320px;overflow:hidden" >
	<div>
		<i>Double-click pada tabel untuk memasukkan nomor perkara</i>
		<iframe id="target_frame" style="width:100%;height:100%;border:none" src="<?php echo site_url('manageAntrian/iframe_jadwal_list');?>">></iframe>
	</div>
</div>
<script type="text/javascript">
	$('#frm_input_antrian').SubmitHandling({
        refresh:'0',
        setRefresh:0,
        divRef:'#konten',
        clicked:1,
        btnClicked:'#close_frm_input_antrian',
        whenStatus:1
    });
    $('.close_frm_input_antrian').click(function(event){
    	var iframe = document.getElementById('target_frame');
		iframe.src = iframe.src;
    });
    setInterval(function(){ 
    	var iframe = document.getElementById('target_frame');
		iframe.src = iframe.src;
	}, 20000);
	function PassParam(param){
		$('#nomor_perkara').val(param);
	}


	
</script>