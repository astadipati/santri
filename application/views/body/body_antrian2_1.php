<?php 
date_default_timezone_set("Asia/Jakarta");
$this->load->view($main_body); 
?>
<div id="ccantrian">

<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA MOJOKERTO</h1>
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
                    
                    <div class="col-md-4">
                        
                        <div class="menu-item blue">
                            <a href="#feature-modal">
                                <p class="nomor_antrian"><?php echo ($nomor_antrian_terakhir_sidang_1 == '' ? '----' : $nomor_antrian_terakhir_sidang_1); ?></p>
                                <p class="nama_ruang">RUANG SIDANG I</p>
                            </a>
                        </div>
                        
                        <div class="menu-item green">
                            <a href="#portfolio-modal">
                                <p class="nomor_antrian"><?php echo ($nomor_antrian_terakhir_sidang_2 == '' ? '----' : $nomor_antrian_terakhir_sidang_2); ?></p>
                                <p class="nama_ruang">RUANG SIDANG II</p>
                            </a>
                        </div>
                        
                        <div class="menu-item light-red">
                            <a href="#about-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutanmediasi; ?></p>
                                <p class="nama_ruang">MEDIASI</p>
                            </a>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        
                        <!-- Start Carousel Section -->
                        <div class="row">
                        <div class="menu-item tv light">
                            <a href="#feature-modal" >
                                <video height="262" autoplay loop muted>
                                  <source src="<?php echo base_url();?>resources/antrian/video/v.webm" type="video/mp4">
                                  <source src="<?php echo base_url();?>resources/antrian/video/v.webm" type="video/ogg">
                                  Your browser does not support HTML5 video.
                                </video>
                            </a>
                        </div>
                        </div>
                        <!-- Start Carousel Section -->
                        
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="menu-item color responsive">
                                    <a href="#service-modal" data-toggle="modal">
                                        <i class="fa fa-area-chart"></i>
                                        <p>Services</p>
                                    </a>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="menu-item light-orange responsive-2">
                                    <a href="#team-modal" data-toggle="modal">
                                        <p class="nomor_antrian"><?php echo $urutanpendaftaran; ?></p>
                                        <p class="nama_ruang">PENDAFTARAN</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        
                        <div class="menu-item light-red">
                            <a href="#contact-modal" data-toggle="modal">
                                <p class="nomor_antrian">----</p>
                                <p class="nama_ruang">KASIR</p>
                            </a>
                        </div>
                        
                        <div class="menu-item color">
                            <a href="#testimonial-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutanac; ?></p>
                                <p class="nama_ruang">LOKET AKTA CERAI</p>
                            </a>
                        </div>
                        
                        <div class="menu-item blue">
                            <a href="#news-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutanpengaduan; ?></p>
                                <p class="nama_ruang">INFORMASI & PENGADUAN</p>
                            </a>
                        </div>
                        
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
