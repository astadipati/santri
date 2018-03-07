<?php
date_default_timezone_set("Asia/Jakarta");

?>
<html>
<head>

<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/png">
    <title>ANTRIAN PA TUBAN</title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/component.css" />
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

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
<div id="ccantrian" class="container" > 
            <div id="bl-main" class="bl-main">
                <section class="judul-utama">
                    <h1>PENGADILAN AGAMA TUBAN</h1>
                    <h2><span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span></h2>
                </section>
                <section>
                    <div class="videoWrapper">
                        <!-- Copy & Pasted from YouTube -->
                        <iframe width="420" height="315" src="https://www.youtube.com/embed/iBd4W8_jUzo?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe>
                        <!-- <iframe width="420" height="315" src="https://www.youtube.com/embed/fbYvp-_Gw_M&list=PLZinIqbK64U5bgHYB4kvRVIUV9HwThnui?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe> -->
                    </div>
                </section>
                <section id="bl-work-section">
                    <div class="bl-box judul-box">
                        <h1 id="nomor_antrian_terakhir_sidang_1">-----</h1>
                        <h2 id="nosidang_1">---------------</h2>
                        <h2 id="psidang_1">P : ------------</h2>
                        <h2 id="tsidang_1">T : ------------</h2>
                        <h1>RUANG SIDANG I</h1>
                    </div>          
                </section>
                <section>
                    <div class="bl-box informasi-box">
                        <marquee direction="up" scrollamount="3">
                        <h2>----------------------------~~------------------------------</h2>
                        <h2>Visi : " Terwujudnya Kesatuan Hukum dan Aparatur Pengadilan Agama yang Profesional efektif, efesien dan akuntabel menuju Badan Peradilan Indonesia yang Agung</h2>
                        <h2>----------------------------~~------------------------------</h2>
                        <BR/><BR/>
                        <h2>JADWAL SIDANG HARI INI :</h2>
                        <table border="1" width="100%" class="tabel">
                            <tr>
                                <!-- <th>No.</th> -->
                                <th>Nomor Perkara</th>
                                <th>Nama Pihak</th>
                                <th>Agenda</th>
                                <th>Ruang</th>
                            </tr>
                            <?php $no = 1; foreach ($get_sidang_today as $key => $value) { ?>
                            <tr>
                                <td><div align="center"><?php echo $value->nomor_perkara; ?></div></td>
                                <td><div align="center"><?php echo $value->para_pihak; ?></div></td>
                                <td><div align="center"><?php echo $value->agenda; ?></div></td>
                                <td><div align="center"><?php echo $value->ruangan; ?></div></td>
                            </tr>
                            <?php $no++;} ?>
                        </table>
                        </marquee>
                    </div>
                </section>
                <section>
                    <div class="bl-box judul-box">
                        <h1 id="nomor_antrian_terakhir_sidang_2">-----</h1>
                        <h2 id="nosidang_2">---------------</h2>
                        <h2 id="psidang_2">P : ------------</h2>
                        <h2 id="tsidang_2">T : ------------</h2>
                        <h1>RUANG SIDANG II</h1>
                    </div>
            
                    <span class="bl-icon bl-icon-close"></span>
                </section>
            </div>
        </div>
</body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/boxlayout.js"></script>
         <script>
            $(function() {

                causeRepaintsOn = $("h1, h2, h3, p");

                $(window).resize(function() {
                    causeRepaintsOn.css("z-index", 1);
                });

            });
        </script>
        <script>
            $(function() {
                Boxlayout.init();
            });
        </script>
        <script>
            // Find all YouTube videos
            var $allVideos = $("iframe[src^='//www.youtube.com']"),

                // The element that is fluid width
                $fluidEl = $("body");

            // Figure out and save aspect ratio for each video
            $allVideos.each(function() {

              $(this)
                .data('aspectRatio', this.height / this.width)

                // and remove the hard coded width/height
                .removeAttr('height')
                .removeAttr('width');

            });

            // When the window is resized
            $(window).resize(function() {

              var newWidth = $fluidEl.width();

              // Resize all videos according to their own aspect ratio
              $allVideos.each(function() {

                var $el = $(this);
                $el
                  .width(newWidth)
                  .height(newWidth * $el.data('aspectRatio'));

              });

            // Kick off one resize to fix all videos on page load
            }).resize();
        </script>
  
</html>