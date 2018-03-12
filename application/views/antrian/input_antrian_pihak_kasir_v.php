<style type="text/css">
 /* background */
 body, html {
            height: 100%;
        }

        .bg { 
            /* The image used */
            background-image: url("../assets/images/bg.jpg");
            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /* end background */

    input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 6px 0;
    border: none;
    color: #000;
    font-size: 50px;
    }

    .text-box{
        padding: 15px !important;
        background:#000;opacity:0.4;filter:alpha(opacity=40);
    }

}
</style>
<div id="ccantrian">
<div class="bg">
    <section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">TEMPAT PENGAMBILAN NOMOR ANTRIAN KASIR</h1>
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
                    <br/><br/><br/>
                    <div class="col-md-2">
                        <!-- --------------------- -->
                    </div>
                    
                    <form id="frm_input_antrian" method="post">
                    <div class="col-md-8">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="menu-item green responsive-2 text-box">
                                    <input type="text" name="nomor_perkara" id="nomor_perkara" minlength="18" maxlength="21" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="col-md-12" >
                            <a href="<?php echo site_url(); ?>antrian/home"><h3 style="color: fff!important;">KEMBALI KE MENU UTAMA</h3></a>
                            </div>  
                      </div>     
                    </div>
                    </form>

                    <div class="col-md-2">
                        <!-- ------------------------ -->
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
<div id="fullscreen">
    <section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">TEMPAT PENGAMBILAN NOMOR ANTRIAN</h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>

                            <br><br><br>
                            <h1 class="judulh1_sub" id="pesan">---</h1>
                            <br/>
                            <h1 class="judulh1_sub" id="counter">5</h1>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<!-- ------------------------ PESAN ---------------------- -->


<script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: "<?php echo site_url(); ?>antrian/ambil_nomor_kasir",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    // alert(data);
                    var obj = jQuery.parseJSON( data );
                    // alert(obj);
                    if(obj.st == 0){
                        // alert(obj.msg);
                        $( "#fullscreen" ).show();
                        $( "#ccantrian" ).hide();
                        $( "#pesan" ).html( obj.msg );
                        setInterval(function() {
                                var div = document.querySelector("#counter");
                                var count = div.textContent * 1 - 1;
                                div.textContent = count;
                                if (count <= 0) {
                                    location.href="<?php echo site_url(); ?>antrian/home";
                                }
                        }, 1000);
                    }else{
                        $( "#fullscreen" ).show();
                        $( "#ccantrian" ).hide();
                        $( "#pesan" ).html( obj.msg );
                        setInterval(function() {
                                var div = document.querySelector("#counter");
                                var count = div.textContent * 1 - 1;
                                div.textContent = count;
                                if (count <= 0) {
                                    location.href="<?php echo site_url(); ?>antrian/home";
                                }
                        }, 1000);
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    location.href="<?php echo site_url(); ?>antrian/home";
                }
            });

            e.preventDefault();
        }
        $('#frm_input_antrian').submit( processForm );
    })(jQuery);

        $( "#fullscreen" ).hide();
</script>


