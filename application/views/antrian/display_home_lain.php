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

</style>
<div id="ccantrian">
<div class="bg">
<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">TEMPAT PENGAMBILAN NOMOR ANTRIAN</h1>
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
                    
                    <div class="col-md-2">
                        <!-- --------------------- -->
                    </div>
                    
                    <div class="col-md-12">
                       <div class="row">
                           
                            <div class="col-md-6" id="pengaduan">
                                <div class="menu-item light-red responsive-2">
                                    <a href='#'>
                                        <p class="nomor_antrian_home">R. INFORMASI & PENGADUAN [ <?php echo $jumlah_pengaduan; ?> ]</p>
                                        <p class="nama_ruang_home_2">INFORMASI & PENGADUAN</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="menu-item blue responsive-2">
                                    <a href='<?php echo site_url(); ?>antrian/lihat_panjar'>
                                        <p class="nomor_antrian_home">CEK SISA PANJAR BIAYA PERKARA</p>
                                        <p class="nama_ruang_home_2">SISA PANJAR</p>
                                    </a>
                                </div>
                            </div>

                           
                            

                            
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-2">
                        <!-- ------------------------ -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->

        
        </div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
    console.log( "ready!" );
        // $( "#pendaftaran" ).click(function() {
        //      window.location.href = "<?php //echo site_url("antrian/ambil_nomor_pendaftaran");?>";
        // });

        $( "#pengaduan" ).click(function() {
             window.location.href = "<?php echo site_url("antrian/ambil_nomor_pengaduan");?>";
        });
    });


</script>