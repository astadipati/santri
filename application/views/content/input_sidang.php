
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">INPUT SIDANG</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div id="ccantrian">
<section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Section -->
        
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="container">
                <div class="row">
                    <br/><br/><br/>
                    <div class="col-md-2">
                        <!-- --------------------- -->
                    </div>
                    
                    <form id="frm_input_antrian" method="post">
                    <div class="col-md-8">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="menu-item green responsive-2 text-box">
                                    <input type="text" name="nomor_perkara" id="nomor_perkara" minlength="18" maxlength="22" autofocus="autofocus">
                                </div>
                            </div>
                        </div>     
                    </div>
                    </form>

                    <div class="col-md-2">
                        <!-- ----------------------- -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Body Section -->
       
</div>


<script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: "<?php echo site_url(); ?>antrian/f_validate_input_antrian",
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