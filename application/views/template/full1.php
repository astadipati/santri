
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/vendor/bootstrap/css/bootstrap.min.css" />
   
    <!-- MetisMenu CSS -->
     <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- datatable CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    
    <!-- datatable Responsive CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Custom CSS -->
     <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
     <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/sb2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SANTRI V.1.2</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>rama_astadipati&copy;2018</strong>
                                    <span class="pull-right text-muted">
                                        <em>085851484003</em>
                                    </span>
                                </div>
                                <div><a target="_blank" href="https://www.facebook.com/BlckZn">Kontak Saya</a></div>
                            </a>
                        </li>
                       
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Server<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Server Sidang</a>
                                </li>
                                <li>
                                    <a href="morris.html">Server Non Sidang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Jadwal Sidang</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Input Non Sidang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Pendaftaran</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Meja 1</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Kasir</a>
                                </li>
                                <li>
                                    <a href="typography.html">Mediasi</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Akte Cerai</a>
                                </li>
                                <li>
                                    <a href="grid.html">Pengaduan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
              
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Ruang Sidang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Ruang Sidang 1</a>
                                </li>
                                <li>
                                    <a href="blank.html">Ruang Sidang 2</a>
                                </li>
                                <li>
                                    <a href="blank.html">Ruang Sidang 3</a>
                                </li>
                                <li>
                                    <a href="blank.html">Ruang Sidang 4</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Laporan</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Jadwal Sidang</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="panel-body">
                <div id="dataTables-example_wrapper"
                    class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline collapsed" id="mydata" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 71px;">
                                            Nomor Perkara</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 91px;">
                                            Tanggal Daftar</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 81px;">
                                            Jenis Perkara</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 61px;">
                                            Pihak 1</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 61px;">
                                            Pihak 2</th>
                                            <th class="sorting" tabindex="0" aria-controls="mydata" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 61px;">
                                            Ruang</th>
                                            <th style="width: 61px;">Actions</th>
                                        </tr>
                                    </thead>
                                <tbody id="show_data">

                                </tbody>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- MODAL EDIT -->
    <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Ruang Sidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nomor Perkara</label>
                            <div class="col-md-10">
                              <input type="text" name="nomor_perkara" id="nomor_perkara" class="form-control" placeholder="Nomor Perkara" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Pemohon/Penggugat</label>
                            <div class="col-md-10">
                              <input type="text" name="pihak1_text" id="pihak1_text" class="form-control" placeholder="Nama Pemohon/Penggugat" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Termohon/Tergugat</label>
                            <div class="col-md-10">
                              <input type="text" name="pihak2_text" id="pihak2_text" class="form-control" placeholder="Nama Termohon/Tergugat" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Ruang Sidang</label>
                            <div class="col-md-10">
                              <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="Ruang Sidang">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
    <!-- /#wrapper -->

    <!-- jQuery -->

     <script src="<?php echo base_url()?>assets/sb2/vendor/jquery/jquery.min.js"></script>

    <!-- <script src="<?php echo base_url()?>assets/sb2/vendor/jquery/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/sb2/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>assets/sb2/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url()?>assets/sb2/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/sb2/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/sb2/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url()?>assets/sb2/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url()?>assets/sb2/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url()?>assets/sb2/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>assets/sb2/dist/js/sb-admin-2.js"></script>

    
<script type="text/javascript">
	$(document).ready(function(){
        
            
		show_data();	//call function show all data
		
		$('#mydata').dataTable();
		 responsive: true
		//function show all data
		function show_data(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo site_url('jadwal_sidang/jadwal_sidang_data')?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].nomor_perkara+'</td>'+
		                        '<td>'+data[i].tanggal_pendaftaran+'</td>'+
		                        '<td>'+data[i].jenis_perkara_nama+'</td>'+
		                        '<td>'+data[i].pihak1_text+'</td>'+
		                        '<td>'+data[i].pihak2_text+'</td>'+
		                        '<td>'+data[i].ruangan+'</td>'+
		                        '<td style="text-align:right;">'+
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}
 
        //Save data
        $('#btn_save').on('click',function(){
            var nomor_perkara = $('#nomor_perkara').val();
            var pihak1_text = $('#pihak2_text').val();
            var pihak2_text = $('#pihak2_text').val();
            var ruangan        = $('#ruangan').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('jadwal_sidang/save')?>",
                dataType : "JSON",
                data : {ruangan:ruangan},
                success: function(data){
                    $('[name="nomor_perkara"]').val("");
                    $('[name="pihak1_text"]').val("");
                    $('[name="pihak2_text"]').val("");
                    $('[name="ruangan"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_data();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var nomor_perkara = $(this).data('nomor_perkara');
            var pihak1_text = $(this).data('pihak1_text');
            var pihak2_text = $(this).data('pihak2_text');
            var ruangan        = $(this).data('ruangan');
            // modal edit tampil
            $('#Modal_Edit').modal('show');
            $('[name="nomor_perkara"]').val(nomor_perkara);
            $('[name="pihak1_text"]').val(pihak1_text);
            $('[name="pihak2_text"]').val(pihak2_text);
            $('[name="ruangan"]').val(ruangan);
        });

        //baca setelah edit close
         $('#btn_update').on('click',function(){
            // var nomor_perkara = $('#nomor_perkara').val();
            // var pihak1_text = $('#pihak1_text').val();
            // var pihak2_text = $('#pihak2_text').val();
            var ruangan     = $('#ruangan').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('jadwal_sidang/update')?>",
                dataType : "JSON",
                data : {ruangan:ruangan},
                success: function(data){
                    console.log(data);
                    // $('[name="nomor_perkara"]').val("");
                    // $('[name="pihak1_text"]').val("");
                    // $('[name="pihak2_text"]').val("");
                    $('[name="ruangan"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_data();
                }
            });
            return false;
        });


	});

</script>

</body>

</html>
