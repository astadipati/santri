<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<!-- <meta http-equiv="refresh" content="60">  -->

<div class="show_antrian" id="show_antrian" align="center" style="width:105%;height:100%;background:#000" hidden>
        <div style="width:100%;background:#000;padding-top:40px;margin-left:-30px">
                <table style="font-size:4em;color:#fff;">   
                    <tbody>
                        <tr>
                            <td class="hit-the-floor">Nomor Antrian : </td>
                        </tr>
                        <tr>
                            <td>
                                  <div align="center">
                                  <h1><span id="no_antrian">A000</span></h1>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="linear-wipe-small"><div align="center"><span id="no_perk">-------------</span></div></td>
                        </tr>
                        <tr>
                            <td class="linear-wipe-small"><span id="pihak">----------- & ------------</span></td>
                        </tr>
                        <tr>
                            <td class="linear-wipe"><div align="center">Ruang Sidang <span id="ruangan">--</span></div></td>
                        </tr>
                      </tbody>
            </table>
    </div>
</div>

<!-- -------------------------- -->

<div class="show_antrian" id="show_antrian_ac" align="center" style="width:105%;height:100%;background:#000" hidden>
        <div style="width:100%;background:#000;padding-top:40px;margin-left:-30px">
                <table style="font-size:4em;color:#fff;">   
                    <tbody>
                        <tr>
                            <td class="hit-the-floor">Nomor Antrian : </td>
                        </tr>
                        <tr>
                            <td>
                                  <div align="center">
                                  <h1><span id="no_antrian_ac">A000</span></h1>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="linear-wipe-small"><div align="center"><span id="no_perk_ac">-------------</span></div></td>
                        </tr>
                        <tr>
                            <td class="linear-wipe-small"><span id="pihak_ac">----------- & ------------</span></td>
                        </tr>
                        <tr>
                            <td><div align="center"><span class="linear-wipe" id="tipeconv">R. ---------</span></div></td>
                        </tr>
                            <!-- <td class="pulse"><label id="ruangan">gajah</label></td> -->
                        </tr>
                    </tbody>
            </table>
    </div>
</div>

<!-- -------------------------- -->

<div class="show_antrian" id="show_antrian_pendaftaran" align="center" style="width:105%;height:100%;background:#000" hidden>
        <div style="width:100%;background:#000;padding-top:40px;margin-left:-30px">
                <table style="font-size:4em;color:#fff;">   
                    <col  width="50%">
                    <tbody>
                        <tr>
                            <td class="hit-the-floor">Nomor Antrian : </td>
                        </tr>
                        <tr>
                            <td>
                                  <div align="center">
                                  <br/>
                                  <h1><span id="no_antrian_pendaftaran">A000</span></h1>
                                  <br/>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div align="center"><span class="linear-wipe" id="tipeconvpendfataran">R. ---------</span></div></td>
                        </tr>
                        </tr>
                    </tbody>
            </table>
    </div>
</div>


<!-- ------------------------------ -->
<div class="show_antrian" id="show_antrian_kasir" align="center" style="width:105%;height:100%;background:#000" hidden>
        <div style="width:100%;background:#000;padding-top:40px;margin-left:-30px">
                <table style="font-size:4em;color:#fff;">   
                    <col  width="50%">
                    <tbody>
                        <tr>
                            <td class="hit-the-floor">Nomor Antrian : </td>
                        </tr>
                        <tr>
                            <td>
                                  <div align="center">
                                  <h1><span id="no_antrian_kasir">A000</span></h1>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div align="center"><span class="linear-wipe-small">Nomor Pendaftaran :</span></div></td>
                        </tr>
                        <tr>
                            <td>
                                  <div align="center">
                                  <h1><span id="nomor_antrian_dari_pedaftaran">A000</span></h1>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div align="center"><span class="linear-wipe" id="tipeconvkasir">R. ----------</span></div></td>
                        </tr>
                        </tr>
                    </tbody>
            </table>
    </div>
</div>

<script type="text/javascript">
jQuery.support.cors = true; 
setInterval(function(){ 
    (function($){
        $.ajax({
            url: "<?php echo site_url(); ?>antrian/cek_panggilan",
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function( data, textStatus, jQxhr ){
                console.log(data);

                var urls=JSON.parse(data);
                if(urls.tipe == 'sidang' || urls.tipe == 'ac' || urls.tipe == 'kasir' || urls.tipe == 'mediasi'){
                var pecah = urls.nomor_perkara.split("/", 3);
                var gabung = pecah[0]+" p d t  G "+pecah[2]+" P A M R";
                var pihakgabung = urls.pihak1 + ' & ' + urls.pihak2;
                }

                $("#urutanpendaftaran").text(urls.urutanpendaftaran);
                $("#urutanmeja1").text(urls.urutanmeja1);
                $("#nomor_antrian_terakhir_sidang_1").text(urls.nomor_antrian_terakhir_sidang_1);
                $("#nosidang_1").text(urls.nosidang_1);
                $("#psidang_1").text(urls.psidang_1);
                $("#tsidang_1").text(urls.tsidang_1);
                $("#nomor_antrian_terakhir_sidang_2").text(urls.nomor_antrian_terakhir_sidang_2);
                $("#nosidang_2").text(urls.nosidang_2);
                $("#psidang_2").text(urls.psidang_2);
                $("#tsidang_2").text(urls.tsidang_2);
                $("#urutanmediasi").text(urls.urutanmediasi);
                $("#nomediasi").text(urls.nomediasi);
                $("#pmediasi").text(urls.pmediasi);
                $("#tmediasi").text(urls.tmediasi);
                $("#urutanpengaduan").text(urls.urutanpengaduan);
                $("#urutanac").text(urls.urutanac);
                $("#noac").text(urls.noac);
                $("#pac").text(urls.pac);
                $("#tac").text(urls.tac);
                $("#urutankasir").text(urls.urutankasir);
                $("#nokasir").text(urls.nokasir);
                $("#pkasir").text(urls.pkasir);
                $("#tkasir").text(urls.tkasir);


                if(urls.tipe == 'ac'){
                    $('#tipeconv').text('LOKET AKTA CERAI');
                }else if(urls.tipe == 'kasir'){
                    $('#tipeconv').text('KASIR');
                    $('#tipeconvkasir').text('KASIR');
                }else if(urls.tipe == 'pendaftaran'){
                    $('#tipeconvpendfataran').text('RUANG POSYANKUM');
                }else if(urls.tipe == 'meja1'){
                    $('#tipeconvpendfataran').text('RUANG PENDAFTARAN');
                }else if(urls.tipe == 'pengaduan'){
                    $('#tipeconvpendfataran').text('RUANG INFORMASI & PENGADUAN');
                }else if(urls.tipe == 'mediasi'){
                    $('#tipeconv').text('RUANG MEDIASI');
                }

                if(urls.tipe == 'ac'){
                    $('#no_antrian_ac').text(urls.nomor_antrian);
                    $('#ruangan_ac').text(urls.ruangan);
                    $('#no_perk_ac').text(urls.nomor_perkara);
                    $('#pihak_ac').text(pihakgabung);
                    $("#ccantrian").hide();
                    $('#show_antrian_ac').fadeIn();
                }else if(urls.tipe == 'kasir'){
                    if(urls.id_sendiri == null){
                      $('#no_antrian_ac').text(urls.nomor_antrian);
                      $('#ruangan_ac').text(urls.ruangan);
                      $('#no_perk_ac').text(urls.nomor_perkara);
                      $('#pihak_ac').text(pihakgabung); 
                      $("#ccantrian").hide();
                      $('#show_antrian_ac').fadeIn(); 
                    }else{
                      $('#no_antrian_kasir').text(urls.nomor_antrian);
                      $('#nomor_antrian_dari_pedaftaran').text(urls.id_sendiri);
                      $("#ccantrian").hide();
                      $('#show_antrian_kasir').fadeIn();  
                    }      
                }else if(urls.tipe == 'pendaftaran'){
                    $('#no_antrian_pendaftaran').text(urls.nomor_antrian);
                    $("#ccantrian").hide();
                    $('#show_antrian_pendaftaran').fadeIn();
                }else if(urls.tipe == 'meja1'){
                    $('#no_antrian_pendaftaran').text(urls.nomor_antrian);
                    $("#ccantrian").hide();
                    $('#show_antrian_pendaftaran').fadeIn();
                }else if(urls.tipe == 'pengaduan'){
                    $('#no_antrian_pendaftaran').text(urls.nomor_antrian);
                    $("#ccantrian").hide();
                    $('#show_antrian_pendaftaran').fadeIn();
                }else if(urls.tipe == 'mediasi'){
                    $('#no_antrian_ac').text(urls.nomor_antrian);
                    $('#ruangan_ac').text(urls.ruangan);
                    $('#no_perk_ac').text(urls.nomor_perkara);
                    $('#pihak_ac').text(pihakgabung);
                    $("#ccantrian").hide();
                    $('#show_antrian_ac').fadeIn();
                }else if(urls.tipe == 'sidang'){
                    $('#no_antrian').text(urls.nomor_antrian);
                    $('#ruangan').text(urls.ruangan);
                    $('#no_perk').text(urls.nomor_perkara);
                    $('#pihak').text(pihakgabung);
                    $("#ccantrian").hide();
                    $('#show_antrian').fadeIn();
                }

                // -----------------------------------------------
                function rubah(){

                $.ajax({
                    url: "<?php echo site_url(); ?>antrian/rubah_waktu_panggilan/"+urls.id,
                    dataType: 'text',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: $(this).serialize(),
                    success: function( data, textStatus, jQxhr ){
                        // var obj = jQuery.parseJSON( data );
                        // alert(urls.id);
                        console.log('sukses');
                        $('#show_antrian').fadeOut();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        location.href="<?php echo site_url(); ?>antrian/"+<?php echo $func; ?>;
                    }
                });
                // e.preventDefault();
                }
                // -----------------------------------------------
                function sayIt(){
                function voiceStartCallback() {
                    console.log("Voice started");
                }
                 
                function voiceEndCallback() {
                    console.log("Voice ended");
                    $('#show_antrian').hide();
                    $('#show_antrian_ac').hide();
                    $('#show_antrian_pendaftaran').hide();
                    $('#show_antrian_kasir').hide();  
                    $("#ccantrian").show();
                    rubah();
                   
                    // location.reload();
                    // self.location.reload();
                }
                 
                var parameters = {
                    onstart: voiceStartCallback,
                    onend: voiceEndCallback,
                    pitch: 1, 
                    rate: 0.7, 
                    volume: 5
                }


                var nomor_antrian = urls.nomor_antrian.split("");
                if(nomor_antrian[1] == 0 && nomor_antrian[2] == 0){
                    nomor_antrian = nomor_antrian[0]+ ' 00' + nomor_antrian[3];
                }else if (nomor_antrian[1] == 0){
                    nomor_antrian = nomor_antrian[0]+ ' 0' + nomor_antrian[2]+nomor_antrian[3];
                }else{
                    nomor_antrian = nomor_antrian[0]+ ' ' + nomor_antrian[1]+nomor_antrian[2]+nomor_antrian[3];
                }
                


                if(urls.tipe == 'ac'){
                    console.log("ac");
                    responsiveVoice.speak("nomor antrian . " + nomor_antrian.toLowerCase() + " . perkara antara . " + pihakgabung.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " menuju loket . akta cerai" ,"Indonesian Female", parameters);
               }else if(urls.tipe == 'kasir'){
                    console.log("kasir");
                    if(urls.id_sendiri == null){
                        responsiveVoice.speak("nomor perkara . " + gabung + " perkara antara . " + pihakgabung.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " menuju kasir" ,"Indonesian Female", parameters);
                    }else{
                          responsiveVoice.speak("nomor antrian . " + nomor_antrian.toLowerCase() + " . dengan . nomor antrian pendaftaran . " + urls.id_sendiri +" . menuju kasir" ,"Indonesian Female", parameters);
                    }
                }else if(urls.tipe == 'pendaftaran'){
                    console.log("pendaftaran");
                    responsiveVoice.speak("nomor antrian . " + nomor_antrian.toLowerCase() + ". masuk ke ruang posyankum" ,"Indonesian Female", parameters);
                }else if(urls.tipe == 'meja1'){
                    console.log("meja1");
                    responsiveVoice.speak("nomor antrian . " + nomor_antrian.toLowerCase() + " . masuk ke ruang pendaftaran" ,"Indonesian Female", parameters);
                }else if(urls.tipe == 'pengaduan'){
                    console.log("pengaduan");
                    responsiveVoice.speak("nomor antrian . " + nomor_antrian.toLowerCase() + " . masuk ke ruang informasi dan pengaduan" ,"Indonesian Female", parameters);
                }else if(urls.tipe == 'mediasi'){
                    console.log("mediasi");
                     responsiveVoice.speak("nomor perkara . " + gabung + " . perkara antara . " + pihakgabung.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " . masuk ke ruang mediasi" ,"Indonesian Female", parameters);
                }else if(urls.tipe == 'sidang'){
                    console.log("sidang");
                    if(urls.untuk == 'saksi'){
                        responsiveVoice.speak("saksi-saksi . dari . " + pihakgabung.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " . masuk ke ruang sidang . " + urls.ruangan.toLowerCase() + "." ,"Indonesian Female", parameters);
                    }else if(urls.untuk == 'kuasa'){
                        responsiveVoice.speak("kuasa hukum . dari . " + pihakgabung.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " . masuk ke ruang sidang . " + urls.ruangan.toLowerCase() + "." ,"Indonesian Female", parameters);
                    }else{
                        responsiveVoice.speak("nomor antrian . " + nomor_antrian.toLowerCase() + " . perkara antara . " + pihakgabung.replace(/(<([^>]+)>)/ig,"").toLowerCase() + " . masuk ke ruang sidang . " + urls.ruangan.toLowerCase() + "." ,"Indonesian Female", parameters);
                    }
                    
                }
                
                    
                }

                setTimeout(sayIt, 1);
                
            },
            error: function( jqXhr, textStatus, errorThrown ){
               location.href="<?php echo site_url(); ?>antrian/"+<?php echo $func; ?>;
            }
        });
    })(jQuery);

    // --------------------
    
    // --------------------

}, 1000);
</script>
<style type="text/css">

/*tambahan*/
h1 span {
  position: relative;
  top: 30px;
  display: inline-block;
  animation: bounce .3s ease infinite alternate;
  font-family: Helvetica;
  font-size: 120px;
  color: #FFF;
  text-shadow: 0 1px 0 #CCC,
               0 2px 0 #CCC,
               0 3px 0 #CCC,
               0 4px 0 #CCC,
               0 5px 0 #CCC,
               0 6px 0 transparent,
               0 7px 0 transparent,
               0 8px 0 transparent,
               0 9px 0 transparent,
               0 10px 10px rgba(0, 0, 0, .4);
}

h1 span:nth-child(2) { animation-delay: .1s; }
h1 span:nth-child(3) { animation-delay: .2s; }
h1 span:nth-child(4) { animation-delay: .3s; }
h1 span:nth-child(5) { animation-delay: .4s; }
h1 span:nth-child(6) { animation-delay: .5s; }
h1 span:nth-child(7) { animation-delay: .6s; }
h1 span:nth-child(8) { animation-delay: .7s; }

@keyframes bounce {
  100% {
    top: -10px;
    text-shadow: 0 1px 0 #CCC,
                 0 2px 0 #CCC,
                 0 3px 0 #CCC,
                 0 4px 0 #CCC,
                 0 5px 0 #CCC,
                 0 6px 0 #CCC,
                 0 7px 0 #CCC,
                 0 8px 0 #CCC,
                 0 9px 0 #CCC,
                 0 50px 25px rgba(0, 0, 0, .2);
  }
}

/*tambahan 2 */
.hit-the-floor {
color: #fff;
font-size: 1em;
font-weight: bold;
font-family: Helvetica;
text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
}

.hit-the-floor {
  text-align: center;
}

/*TAMBAHAN 3 */
.linear-wipe {
  text-align: center;
  /*background: linear-gradient(to right, #FFF 20%, #FF0 40%, #FF0 60%, #FFF 80%);*/
  /*background-size: 200% auto;*/
  font-size: 1em !important;
  color: #FFF !important;
  /*background-clip: text;*/
  /*text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  
  animation: shine 1s linear infinite;
  @keyframes shine {
    to {
      background-position: 200% center;
    }
  }*/
}


.linear-wipe-small {
  text-align: center;
  /*background: linear-gradient(to right, #FFF 20%, #FF0 40%, #FF0 60%, #FFF 80%);*/
  /*background-size: 200% auto;*/
  font-size: 0.8em !important;
  color: #FFF !important;
  /*background-clip: text;*/
  /*text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  
  animation: shine 1s linear infinite;
  @keyframes shine {
    to {
      background-position: 200% center;
    }
  }*/
}


/*body {
  background-color: #f1f1f1;
}*/
</style>