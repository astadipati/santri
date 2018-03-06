<?php 
$mac = exec('getmac');
$mac = substr(exec('getmac'),0,17);
$router =& load_class('Router', 'core');
?>
<div id="ccantrian">
<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>
                            <br/><br/><br/><br/>
                            <h1 class="judulh1_sub ">ANDA TIDAK DAPAT MENGAKSES HALAMAN INI</h1>
                            <?php $onclick = "window.open('".base_url('manageAntrian/simpan_minta_akses/'.base64_encode($this->encrypt->encode(substr(exec('getmac'),0,17))).'/'.$router->fetch_method().'/'.base64_encode($this->input->ip_address()))."')";
                            ?>
                            <?php if($minta_akses){?>
                            <div style="text-align:center"><a href="#" onclick="<?php echo $onclick; ?>">[ MINTA AKSES ]</a></div>
                            <?php }else{ ?>
                            <div style="text-align:center"><a href="#">[ SUDAH MENGIRIM PERMINTAAN AKSES ]</a></div>    
                            <?php } ?>   
                            <br/><br/><br/><br/>
                            <h3>SILAHKAN HUBUNGI IT UNTUK MINTA AKSES</h3>
                            
                            <span>
                            	<?php
                                echo $mac." - ".$this->input->ip_address()." - ".$router->fetch_method();
								?>
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>


</div>

<style type="text/css">
	h3{
		color: #F8751D;
	}

    a{
        float: none !important;
        width: none !important;
    }
</style>

<script type="text/javascript">
	$('#minta').click(function() {
    	
	});
</script>

<?php
function get_IP_address()
{
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe

                if (filter_var($IPaddress,
                               FILTER_VALIDATE_IP,
                               FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                    !== false) {

                    return $IPaddress;
                }
            }
        }
    }
}
?>
