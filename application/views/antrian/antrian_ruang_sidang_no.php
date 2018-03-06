<meta http-equiv="refresh" content="5000"> 
<div id="ccantrian">

<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">ANTRIAN SIDANG - RUANG <?php echo $this->uri->segment(3);?></h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<br/><br/>
<div align="center">
<h2 style="color:#FFF !important;"">~~~</h2>
<h1 style="color:#9FFFB7 !important;">AGAR DAPAT MELAKUKAN PANGGILAN SIDANG SELANJUTNYA</h1>
<h1 style="color:#FFCF40 !important;">SILAHKAN MENGISI TUNDAAN / PUTUSAN SIPP TERLEBIH DAHULU</h1>
<h2 style="color:#FFF !important;"">~~~</h2>
</div>
</div>


<script type="text/javascript">
setInterval(function(){ 
    (function($){
        $.ajax({
            url: "<?php echo site_url(); ?>antrian/cek_sidang",
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function( data, textStatus, jQxhr ){
                console.log(data);
                var urls=JSON.parse(data);   
                if(urls.st==0){
                	self.location.reload();
                }
                  
            },
            error: function( jqXhr, textStatus, errorThrown ){
               // location.href="<?php //echo site_url(); ?>antrian/antrian_ruang_sidang/"+<?php //echo $ruang; ?>;
            }
        });
    })(jQuery);
}, 1000);
</script>
<style type="text/css">

