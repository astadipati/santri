<?php
date_default_timezone_set("Asia/Jakarta");

?>
<html>
<head>

<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/png">
    <title>ANTRIAN PA TUBAN</title>

        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/component.css" /> -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <style>
        /* background */
        body, html {
            height: 100%;
        }

        .bg { 
            /* The image used */
            background-image: url("http://localhost/santri/assets/images/bg.jpg");
            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /* end background */
        .wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 1em;
            /* grid-template-rows: 1em; */
            /* grid-auto-rows: 100px; */
            grid-auto-rows: minmax(100px, auto); /*jadi auto*/
        }
       
        .wrapper > div{
           
            background: #388E3C;
            /* padding: 0em; */
            border: 1px #f3f388 solid;
            /* grid-auto-rows: 1em; */
        }
    
        .wrapper > div:nth-child(odd){
            background: #388E3C;
        }
        .box1{
            /* padding: 1rem; */
            /* opacity: 0.5;
            filter: alpha(opacity=50); For IE8 and earlier */
            grid-column: 1/4;
        }
        .box2{
            grid-column: 1/3;
            grid-row: 2/6;
            
        }
        .box3{
            /* padding: 1rem; */
            /* opacity: 0.5;
            filter: alpha(opacity=50); For IE8 and earlier */
            grid-row: 2/4;
          
        }
        .box4{
            /* padding: 1rem; */
            grid-row: 4/6;
            
        }
        .box5{
            /* padding: 1rem; */
            grid-column: 1;
            /* grid-row: 4/7; */
            align-self: start;
            /* grid-column: 1/4; */
            /* grid-row: 4/5; */
        }
        .box6{
            /* padding: 1rem; */
            grid-column: 2/4;
            align-self: start;
            /* grid-column: 1/4; */
        }
    </style>
        <script type='text/javascript'>
      
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
        </script>

        <script type="text/javascript">
       
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
    <div class="bg">
            <div class="wrapper">
           
                    <div class="box box1 bg-grey"><h1 align=center>PENGADILAN AGAMA TUBAN</h1></div>
                    <div class="box box2">
                     <iframe width="100%" height="100%" src="https://www.youtube.com/embed/DhPYnvZmFQA?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="box box3" align="center">
                        <div class="bl-box judul-box">
                            <!-- <h2>RUANG SIDANG I</h1> -->
                            <h1 id="nomor_antrian_terakhir_sidang_1">-----</h1>
                            <h3 id="nosidang_1">---------------</h2>
                            <h3 id="psidang_1">P : ------------</h2>
                            <h3 id="tsidang_1">T : ------------</h2>
                        </div>  
                    </div>
                    <div class="box box4" align="center">
                        <div class="bl-box judul-box">
                            <!-- <h2>RUANG SIDANG II</h1> -->
                            <h1 id="nomor_antrian_terakhir_sidang_2">-----</h1>
                            <h3 id="nosidang_2">---------------</h2>
                            <h3 id="psidang_2">P : ------------</h2>
                            <h3 id="tsidang_2">T : ------------</h2>
                        </div>
                    </div>
                    <div class="box box5"><h3 align="center"><span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span></h3></div>
                    <div class="box box6">
                            <marquee direction="left" scrollamount="3">
                                    <h3>Visi : " Terwujudnya Kesatuan Hukum dan Aparatur Pengadilan Agama yang Profesional efektif, efesien dan akuntabel menuju Badan Peradilan Indonesia yang Agung</h3>
                            </marquee>
                    </div>
                </div>
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