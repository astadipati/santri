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
                    
                    <div class="col-md-3">
                        
                        <div class="menu-item blue">
                            <a href="#feature-modal" data-toggle="modal" >
                                <p class="nomor_antrian">01</p>
                                <p class="nama_ruang">RUANG SIDANG I</p>
                            </a>
                        </div>
                        
                        <div class="menu-item green">
                            <a href="#portfolio-modal" data-toggle="modal">
                                <p class="nomor_antrian">01</p>
                                <p class="nama_ruang">RUANG SIDANG II</p>
                            </a>
                        </div>
                        
                        <!-- <div class="menu-item light-red">
                            <a href="#about-modal" data-toggle="modal">
                                <i class="fa fa-user"></i>
                                <p>About Us</p>
                            </a>
                        </div> -->
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                        <!-- Start Carousel Section -->
                        <div class="row">
                        <div class="menu-item tv light">
                            <a href="#feature-modal" >
                                <video width="600" height="260" autoplay loop muted>
                                  <source src="<?php echo base_url();?>resources/antrian/video/Sidang Keliling PA Mojokerto.mp4" type="video/mp4">
                                  <source src="<?php echo base_url();?>resources/antrian/video/Sidang Keliling PA Mojokerto.mp4" type="video/ogg">
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
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="menu-item light-orange responsive-2">
                                    <a href="#team-modal" data-toggle="modal">
                                        <p class="nomor_antrian">01</p>
                                        <p class="nama_ruang">PENDAFTARAN</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-3">
                        
                        <div class="menu-item light-red">
                            <a href="#contact-modal" data-toggle="modal">
                                <p class="nomor_antrian">01</p>
                                <p class="nama_ruang">KASIR</p>
                            </a>
                        </div>
                        
                        <div class="menu-item color">
                            <a href="#testimonial-modal" data-toggle="modal">
                                <p class="nomor_antrian">01</p>
                                <p class="nama_ruang">LOKET AKTA CERAI</p>
                            </a>
                        </div>
                        
                        <!-- <div class="menu-item blue">
                            <a href="#news-modal" data-toggle="modal">
                                <i class="fa fa-mortar-board"></i>
                                <p>Latest News</p>
                            </a>
                        </div> -->
                        
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
        
            <!-- Start Feature Section -->
        <div class="section-modal modal fade" id="feature-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>Our Awesome Feature</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-magic"></i>
                                <div class="feature-content">
                                    <h4>Web Design</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-gift"></i>
                                <div class="feature-content">
                                    <h4>Graphics Design</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-wordpress"></i>
                                <div class="feature-content">
                                    <h4>Wordpress Theme</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-plug"></i>
                                <div class="feature-content">
                                    <h4>Wordpress Plugin</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-joomla"></i>
                                <div class="feature-content">
                                    <h4>Joomla Template</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-cube"></i>
                                <div class="feature-content">
                                    <h4>Joomla Extension</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-css3"></i>
                                <div class="feature-content">
                                    <h4>HTML 5 & CSS3</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature">
                                <i class="fa fa-android"></i>
                                <div class="feature-content">
                                    <h4>Android Apps</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor. reprehenderit</p>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.row -->
                </div>
                
            </div>
        </div>
        <!-- End Feature Section -->

</div>

<div hidden id="div_audio">
    <audio id='audio_display' controls="controls" preload="auto"><source id="audio_source" src='' type="audio/wav" /></audio>
</div>
<script type="text/javascript">

    var on_call=true;var i=0;var nextSongs = [];
    <?php
    $i=0;
    $ruangs='';
    foreach ($ruang_sidang_list as $key => $value) {
        if($i!=0)$ruangs.=',';
        $ruangs.=$key;
        $i++;
    }
    ?> 
        setInterval(function(){ 
            if (on_call){
                $.post( "<?php echo base_url('manageAntrian/cek_session_antrian/') ?>", { ruang_id: '<?php echo $ruangs;?>'})
                  .done(function( data ) {
                    if (data!=''){
                        
                        on_call=false;
                        var urls=JSON.parse(data);
                        var pecah = urls.nomor_perkara.split("/", 3);
                        var gabung = pecah[0]+" p d t  G "+pecah[2]+" P A M R";
                        if(urls.tipe == 'ac'){
                            $('#tipeconv').text('Loket Akta Cerai');
                        }else if(urls.tipe == 'kasir'){
                            $('#tipeconv').text('Kasir');
                        }

                        if(urls.tipe == 'ac' || urls.tipe == 'kasir'){
                            $('#no_antrian_ac').text(urls.nomor_antrian);
                            $('#ruangan_ac').text(urls.ruangan);
                            $('#no_perk_ac').text(urls.nomor_perkara);
                            $('#pihak_ac').text(urls.pihak);
                            $('#show_antrian_ac').fadeIn();
                        }else{
                            $('#no_antrian').text(urls.nomor_antrian);
                            $('#ruangan').text(urls.ruangan);
                            $('#no_perk').text(urls.nomor_perkara);
                            $('#pihak').text(urls.pihak);
                            $('#show_antrian').fadeIn();
                        }
                        // $('#no_antrian').text(urls.nomor_antrian);
                        // $('#ruangan').text(urls.ruangan);
                        // $('#no_perk').text(urls.nomor_perkara);
                        // $('#pihak').text(urls.pihak);
                        // $('#show_antrian').fadeIn();
                        

                        function sayIt(){

                        function voiceStartCallback() {
                            console.log("Voice started");
                        }
                         
                        function voiceEndCallback() {
                            console.log("Voice ended");
                            $('#show_antrian').fadeOut();
                            // location.reload();
                            self.location.reload();
                        }
                         
                        var parameters = {
                            onstart: voiceStartCallback,
                            onend: voiceEndCallback
                        }


                        if(urls.tipe == 'ac'){
                            console.log("ac");
                            responsiveVoice.speak("   nomor antrian perkara " + gabung + " perkara antara " + urls.pihak.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " menuju loket akta cerai terima kasih." ,"Indonesian Female", parameters, {pitch: 1, rate: 0.9, volume: 1});
                        }if(urls.tipe == 'kasir'){
                            console.log("kasir");
                            responsiveVoice.speak("   nomor antrian perkara " + gabung + " perkara antara " + urls.pihak.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " menuju kasir terima kasih." ,"Indonesian Female", parameters, {pitch: 1, rate: 0.9, volume: 1});
                        }else{
                            console.log("sidang");
                            responsiveVoice.speak("   nomor antrian perkara " + gabung + " perkara antara " + urls.pihak.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " masuk ke ruang sidang " + urls.ruangan.toLowerCase() + " terima kasih." ,"Indonesian Female", parameters, {pitch: 1, rate: 0.9, volume: 1});
                        }
                        
                            
                        }

                        setTimeout(sayIt, 1000);


                    }
                  });
            }
        }, 3000);
    
    function setup() {
        audios.get(0).addEventListener('ended', function myFunction(){
            if (i==((nextSongs.length))){
                // this.src = '';
                // this.load(); 
                // this.pause(); 
                // on_call=true;
                // $('#show_antrian').fadeOut();
            }else{
                // this.src = nextSongs[i];
          //    this.load(); 
          //    this.play(); 
            }
            i++;
        }, false); 
    } 
    setInterval(function(){ 
        if (on_call){
            var iframe1 = document.getElementById('target_frame1');
            iframe1.src = iframe1.src;
            var iframe2 = document.getElementById('target_frame2');
            iframe2.src = iframe2.src;
        }
    }, 30000);
    setInterval(function(){ 
        if (on_call){
            window.open('<?php echo $history;?>','_self');
        }
    }, 1800000);

</script>

