<style type="text/css">
    input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 6px 0;
    border: none;
    color: #000;
    font-size: 30px;
    }

    .text-box{
        padding: 10px !important;
        background:#000;opacity:0.4;filter:alpha(opacity=40);
    }

    input[type=radio]:checked ~ .check {
      border: 5px solid #0DFF92;
    }

    input[type=radio]:checked ~ .check::before{
      background: #0DFF92;
    }

    input[type=radio]:checked ~ label{
      color: #0DFF92;
    }
   
</style>
<div id="ccantrian">
<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">PANJAR BIAYA PERKARA</h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Section -->
        
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="container">
                <div class="row">
                    <!-- <br/><br/><br/> -->
                    <div class="col-md-1">
                      
                    </div>
                    
                    <form id="frm_input_antrian" method="post">
                    <div class="col-md-10">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="menu-item green responsive-2 text-box">
                                    <input type="text" name="nomor_perkara" id="nomor_perkara" minlength="18" maxlength="21" autofocus="autofocus">
                                </div>
                            </div>

                            <div class="col-md-12" id="datapanjar">
                               
                            </div>

                            <div class="col-md-12" >
                            <!-- <a href="<?php //echo site_url(); ?>antrian/cetak_panjar/<?php //echo $nomor_perkara; ?>"><h3 style="color: fff!important;">CETAK</h3></a> -->
                            <a href="<?php echo site_url(); ?>antrian/home"><h3 style="color: fff!important;">KEMBALI KE MENU UTAMA</h3></a>
                            </div>  
                      </div>     
                    </div>
                    </form>

                    <div class="col-md-1">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->
        
        <!-- Start Copyright Section -->
        <div class="copyright text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <marquee behavior="scrool"direction="left"scrollamount="5"scrolldelay="50">Visi : " Terwujudnya Kesatuan Hukum dan Aparatur Pengadilan Agama yang Profesional efektif, efesien dan akuntabel menuju Badan Peradilan Indonesia yang Agung"</marquee>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Section -->

</div>


<style type="text/css">
#fullscreen{
    position: absolute;
    min-width: 100%;
    min-height: 100%;
    /*background: #000;*/
}
</style>
<!-- ------------------------ PESAN ---------------------- -->

<!-- ------------------------ PESAN ---------------------- -->


<script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: "<?php echo site_url(); ?>antrian/data_panjar",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    $("#datapanjar").html(data);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    location.href="<?php echo site_url(); ?>antrian/home";
                }
            });

            e.preventDefault();
        }
        $('#frm_input_antrian').submit( processForm );
    })(jQuery);
</script>


