<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#UKURANKERTAS {background-color:#FFFFFF;
		left:5px;
		right:5px;
		height:2in ; /*Ukuran Panjang Kertas */
		width: 2in; /*Ukuran Lebar Kertas */
		margin:1px solid #FFFFFF;
		 
		font-family: "Arial";

		/*background: #000000;*/
		border: 1px solid #000000;
		}

		#judul{
			margin-top: 10px !important;
			text-align: center;
			font-size: 18px;
		}

		#judul_antrian{
			text-align: center;
			font-size: 16px;
		}

		#nomor_antrian{
			text-align: center;
			font-size: 60px;
		}

		#ruang{
			text-align: center;
			font-size: 16px;
		}

		#tgl{
			text-align: center;
			font-size: 14px;
		}

		p{
			margin: 0 !important;
			padding: 0 !important;
		}
	</style>

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
        <script>

			setTimeout("closePrintView()", 200);
			function closePrintView() {
		       window.location.href = "http://localhost/ANTRIANPAMR/manageantrian/input_para_pihak"; 
		    }
        	// bekerja di mozilla tapi jika print masih gagal
        	window.onbeforeprint = function() {
			    console.log('This will be called before the user prints.');
			};
			window.onafterprint = function() {
			    console.log('This will be called after the user prints');  
			    window.location.href = "http://localhost/ANTRIANPAMR/manageantrian/input_para_pihak"; 
			};

        </script>
</head>
<body onload="window.print()">
	<div id="UKURANKERTAS">
		<p id="judul">PA TUBAN</p>
		<p id="judul_antrian">ANTRIAN SIDANG</p>
		<p id="nomor_antrian"><?php echo $nomor_antrian; ?></p>
		<p id="ruang"><b>Ruang : <?php echo $ruang_id; ?></b></p>
		<p id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></p>

	</div>
</body>
</html>