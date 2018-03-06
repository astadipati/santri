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

</body>
</html>