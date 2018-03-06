<?php
date_default_timezone_set("Asia/Jakarta");
?>
<html>
<head>
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/png">
    <title>ANTRIAN PA TUBAN</title>
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>


        <!-- Template js -->
        <script src="<?php echo base_url();?>assets/antrian/js/jquery.min.js"></script>
        <!-- <script src="<?php //echo base_url();?>assets/antrian/js/jquery-2.1.1.min.js"></script> -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/antrian/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/antrian/js/jquery.appear.js"></script>
    
        <script src="<?php echo base_url();?>assets/antrian/js/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url();?>assets/antrian/js/modernizr.custom.js"></script>
        <script src="<?php echo base_url();?>assets/antrian/js/script.js"></script>      
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type='text/javascript'>
        <!--
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        var tgl = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;

        // document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
        //-->

    
        </script>

        <script type="text/javascript">
        <!--
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
         document.getElementById('jam').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
            }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
        //-->
        </script>
</head>
<body>
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
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Section -->
        
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="">
                <div class="">
                    
                    <div class="col-md-4 hilang-padding-left">
                        
                        <div class="menu-item blue ganti-padding-top-bottom">
                            <a href="#feature-modal">
                                <p class="nomor_antrian"><?php echo ($nomor_antrian_terakhir_sidang_1 == '' ? '----' : $nomor_antrian_terakhir_sidang_1); ?></p>
                                <p class="detail_tv"><?php echo $nosidang_1; ?></p>
                                <p class="detail_tv"><?php echo $psidang_1; ?></p>
                                <p class="detail_tv"><?php echo $tsidang_1; ?></p>
                                <p class="nama_ruang">RUANG SIDANG I</p>
                            </a>
                        </div>
                        
                        <div class="menu-item green ganti-padding-top-bottom">
                            <a href="#portfolio-modal">
                                <p class="nomor_antrian"><?php echo ($nomor_antrian_terakhir_sidang_2 == '' ? '----' : $nomor_antrian_terakhir_sidang_2); ?></p>
                                <p class="detail_tv"><?php echo $nosidang_2; ?></p>
                                <p class="detail_tv"><?php echo $psidang_2; ?></p>
                                <p class="detail_tv"><?php echo $tsidang_2; ?></p>
                                <p class="nama_ruang">RUANG SIDANG II</p>
                            </a>
                        </div>
                        
                        <div class="menu-item light-red ganti-padding-top-bottom">
                            <a href="#about-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutanmediasi; ?></p>
                                <p class="detail_tv"><?php echo $nomediasi; ?></p>
                                <p class="detail_tv"><?php echo $pmediasi; ?></p>
                                <p class="detail_tv"><?php echo $tmediasi; ?></p>
                                <p class="nama_ruang">MEDIASI</p>
                            </a>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                        
                        <!-- Start Carousel Section -->
                        <div class="row">
                        <div class="menu-item tv light ">
                            <a href="#feature-modal" >
                                <video height="291" autoplay loop muted>
                                  <source src="<?php echo base_url();?>resources/antrian/video/vvv.mp4" type="video/mp4">
                                  <source src="<?php echo base_url();?>resources/antrian/video/vvv.mp4" type="video/ogg">
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
                            <div class="col-md-6 hilang-padding-left hilang-padding-right">
                                <div class="menu-item light-orange ganti-padding-top-bottom">
                                    <a href="#team-modal" data-toggle="modal">
                                        <p class="nomor_antrian"><?php echo $urutanpendaftaran; ?></p>
                                        <p class="detail_tv">-------------</p>
                                        <p class="detail_tv">P : ---------</p>
                                        <p class="detail_tv">T : ---------</p>
                                        <p class="nama_ruang">POSYANKUM</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 hilang-padding-left hilang-padding-right">
                                <div class="menu-item light-orange ganti-padding-top-bottom">
                                    <a href="#team-modal" data-toggle="modal">
                                        <p class="nomor_antrian"><?php echo $urutanmeja1; ?></p>
                                        <p class="detail_tv">-------------</p>
                                        <p class="detail_tv">P : ---------</p>
                                        <p class="detail_tv">T : ---------</p>
                                        <p class="nama_ruang">MEJA 1</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4 hilang-padding-right">
                        
                        <div class="menu-item light-red ganti-padding-top-bottom">
                            <a href="#contact-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutankasir; ?></p>
                                <p class="detail_tv"><?php echo $nokasir; ?></p>
                                <p class="detail_tv"><?php echo $pkasir; ?></p>
                                <p class="detail_tv"><?php echo $tkasir; ?></p>
                                <p class="nama_ruang">KASIR</p>
                            </a>
                        </div>
                        
                        <div class="menu-item color ganti-padding-top-bottom">
                            <a href="#testimonial-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutanac; ?></p>
                                <p class="detail_tv"><?php echo $noac; ?></p>
                                <p class="detail_tv"><?php echo $pac; ?></p>
                                <p class="detail_tv"><?php echo $tac; ?></p>
                            
                                <p class="nama_ruang">LOKET AKTA CERAI</p>
                            </a>
                        </div>
                        
                        <div class="menu-item blue ganti-padding-top-bottom">
                            <a href="#news-modal" data-toggle="modal">
                                <p class="nomor_antrian"><?php echo $urutanpengaduan; ?></p>
                                <p class="detail_tv">----------</p>
                                <p class="detail_tv">-------------------------</p>
                                <p class="detail_tv">----------</p>
                                <p class="nama_ruang">INFORMASI & PENGADUAN</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->
        
        <!-- Start Copyright Section -->
       <!--  <div class="copyright text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <marquee behavior="scrool"direction="left"scrollamount="5"scrolldelay="50">Visi : " Terwujudnya Kesatuan Hukum dan Aparatur Pengadilan Agama yang Profesional efektif, efesien dan akuntabel menuju Badan Peradilan Indonesia yang Agung"</marquee>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Copyright Section -->

</div>
</body>
</html>