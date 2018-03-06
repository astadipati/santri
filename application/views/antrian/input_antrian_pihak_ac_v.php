<style type="text/css">
    input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 6px 0;
    border: none;
    color: #000;
    font-size: 50px;
    }

    .text-box{
        padding: 15px !important;
        background:#000;opacity:0.4;filter:alpha(opacity=40);
    }

    .menu-item-radio ul{
      list-style: none;
      margin: 0;
      padding: 0;
        overflow: auto;
    }

    ul li{
      color: #AAAAAA;
      display: block;
      position: relative;
      float: left;
      width: 50%;
      height: 60px;
      border-bottom: 1px solid #333;
    }

    ul li input[type=radio]{
      position: absolute;
      visibility: hidden;
    }

    ul li label{
     cursor: pointer;
    display: block;
    font-size: 1.15em;
    font-weight: 300;
    height: 30px;
    padding: 15px 25px 25px 50px;
    position: relative;
      z-index: 9;
      cursor: pointer;
      -webkit-transition: all 0.25s linear;
    }

    ul li:hover label{
        color: #FFFFFF;
    }

    ul li .check{
      display: block;
      position: absolute;
      border: 5px solid #AAAAAA;
      border-radius: 100%;
      height: 25px;
      width: 25px;
      top: 30px;
      left: 20px;
        z-index: 5;
        transition: border .25s linear;
        -webkit-transition: border .25s linear;
    }

    ul li:hover .check {
      border: 5px solid #FFFFFF;
    }

    ul li .check::before {
      display: block;
      position: absolute;
       content: '';
      border-radius: 100%;
      height: 15px;
      width: 15px;
      top: 0px;
      left: 0px;
      margin: auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
    }

    input[type=radio]:checked ~ .check {
      border: 5px solid #0DFF92;
    }

    input[type=radio]:checked ~ .check::before{
      background: #0DFF92;
    }

    input[type=radio]:checked ~ label{
      color: #0DFF92;
    }
   
</style>
<div id="ccantrian">
<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">TEMPAT PENGAMBILAN NOMOR ANTRIAN</h1>
                             <h1 class="judulh1_sub">AKTA CERAI, SALINAN PUTUSAN & LEGALISIR</h1>
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
                    <!-- <br/><br/><br/> -->
                    <div class="col-md-1">
                      
                    </div>
                    
                    <form id="frm_input_antrian" method="post">
                    <div class="col-md-10">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="menu-item green responsive-2 text-box menu-item-radio">
                                    <ul>
                                      <li>
                                        <input type="radio" id="f-option" value="Akta Cerai P" name="jns" checked>
                                        <label for="f-option">AKTA CERAI [P]</label>
                                        
                                        <div class="check"></div>
                                      </li>
                                      
                                      <li>
                                        <input type="radio" id="s-option" value="Akta Cerai T" name="jns">
                                        <label for="s-option">AKTA CERAI [T]</label>
                                        
                                        <div class="check"><div class="inside"></div></div>
                                      </li>
                                      
                                      <li>
                                        <input type="radio" id="k-option" value="Salinan Putusan P" name="jns">
                                        <label for="k-option">SALINAN PUTUSAN [P]</label>
                                        
                                        <div class="check"><div class="inside"></div></div>
                                      </li>

                                       <li>
                                        <input type="radio" id="l-option" value="Salinan Putusan T" name="jns">
                                        <label for="l-option">SALINAN PUTUSAN [T]</label>
                                        
                                        <div class="check"><div class="inside"></div></div>
                                      </li>

                                      <li>
                                        <input type="radio" id="m-option" value="Legalisir P" name="jns">
                                        <label for="m-option">LEGALISIR [P]</label>
                                        
                                        <div class="check"><div class="inside"></div></div>
                                      </li>

                                      <li>
                                        <input type="radio" id="o-option" value="Legalisir T" name="jns">
                                        <label for="o-option">LEGALISIR [T]</label>
                                        
                                        <div class="check"><div class="inside"></div></div>
                                      </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="menu-item green responsive-2 text-box">
                                    <input type="text" name="nomor_perkara" id="nomor_perkara" minlength="18" maxlength="21" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="col-md-12" >
                            <a href="<?php echo site_url(); ?>antrian/home"><h3 style="color: fff!important;">KEMBALI KE MENU UTAMA</h3></a>
                            </div>  
                      </div>     
                    </div>
                    </form>

                    <div class="col-md-1">
                        
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


<style type="text/css">
#fullscreen{
    position: absolute;
    min-width: 100%;
    min-height: 100%;
    /*background: #000;*/
}
</style>
<!-- ------------------------ PESAN ---------------------- -->
<div id="fullscreen">
    <section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1>PENGADILAN AGAMA TUBAN</h1>
                            <h1 class="judulh1_sub">TEMPAT PENGAMBILAN NOMOR ANTRIAN</h1>
                            <span id="tgl"><script>document.write(tgl)</script></span> <span id="jam"></span>

                            <br><br><br>
                            <h1 class="judulh1_sub" id="pesan">---</h1>
                            <br/>
                            <h1 class="judulh1_sub" id="counter">5</h1>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<!-- ------------------------ PESAN ---------------------- -->


<script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: "<?php echo site_url(); ?>antrian/ambil_nomor_ac",
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    var obj = jQuery.parseJSON( data );
                    // alert(obj.st);
                    if(obj.st == 0){
                        // alert(obj.msg);
                        $( "#fullscreen" ).show();
                        $( "#ccantrian" ).hide();
                        $( "#pesan" ).html( obj.msg );
                        setInterval(function() {
                                var div = document.querySelector("#counter");
                                var count = div.textContent * 1 - 1;
                                div.textContent = count;
                                if (count <= 0) {
                                    location.href="<?php echo site_url(); ?>antrian/home";
                                }
                        }, 1000);
                    }else{
                        $( "#fullscreen" ).show();
                        $( "#ccantrian" ).hide();
                        $( "#pesan" ).html( obj.msg );
                        setInterval(function() {
                                var div = document.querySelector("#counter");
                                var count = div.textContent * 1 - 1;
                                div.textContent = count;
                                if (count <= 0) {
                                    location.href="<?php echo site_url(); ?>antrian/home";
                                }
                        }, 1000);
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    location.href="<?php echo site_url(); ?>antrian/home";
                }
            });

            e.preventDefault();
        }
        $('#frm_input_antrian').submit( processForm );
    })(jQuery);

        $( "#fullscreen" ).hide();
</script>


