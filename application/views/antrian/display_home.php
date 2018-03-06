<div id="ccantrian">

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
                            <div class="col-md-6" id="pendaftaran">
                                <div class="menu-item orange responsive-2">
                                    <a href="#">
                                        <p class="nomor_antrian_home">RUANG PENDAFTARAN [ <?php echo $jumlah_pendaftar; ?> ]</p>
                                        <p class="nama_ruang_home">PENDAFTARAN</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="menu-item light-orange responsive-2">
                                    <a href='<?php echo site_url(); ?>antrian/input_para_pihak_sidang'>
                                        <p class="nomor_antrian_home">RUANG SIDANG 1 [ <?php echo $jumlah_sidang_1; ?> ] : RUANG SIDANG 2 [ <?php echo $jumlah_sidang_2; ?> ]</p>
                                        <p class="nama_ruang_home">SIDANG</p>
                                    </a>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="menu-item green responsive-2">
                                    <a href='<?php echo site_url(); ?>antrian/input_para_pihak_mediasi'>
                                        <p class="nomor_antrian_home">MEDIASI [ <?php echo $jumlah_mediasi; ?> ]</p>
                                        <p class="nama_ruang_home">MEDIASI</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="menu-item color responsive-2">
                                    <a href='<?php echo site_url(); ?>antrian/input_para_pihak_kasir'>
                                        <p class="nomor_antrian_home">KASIR [ <?php echo $jumlah_kasir; ?> ]</p>
                                        <p class="nama_ruang_home_2">KASIR</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6" id="ac">
                                <div class="menu-item light-red responsive-2">
                                    <a href='<?php echo site_url(); ?>antrian/input_para_pihak_ac'>
                                        <p class="nomor_antrian_home">LOKET AKTA CERAI [ <?php echo $jumlah_ac; ?> ]</p>
                                        <p class="nama_ruang_home_2">AKTA CERAI / SALINAN PUTUSAN</p>
                                    </a>
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="menu-item blue responsive-2">
                                    <a href='<?php echo site_url(); ?>antrian/infolain'>
                                        <p class="nomor_antrian_home">AMBIL ANTRIAN & CEK INFO LAINNYA</p>
                                        <p class="nama_ruang_home_2">INFORMASI LAINNYA</p>
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

<script type="text/javascript">
    $( document ).ready(function() {
    console.log( "ready!" );
        $( "#pendaftaran" ).click(function() {
             window.location.href = "<?php echo site_url("antrian/ambil_nomor_pendaftaran");?>";
        });

        $( "#pengaduan" ).click(function() {
             window.location.href = "<?php echo site_url("antrian/ambil_nomor_pengaduan");?>";
        });
    });


</script>