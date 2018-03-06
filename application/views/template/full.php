
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Code</label>
                            <div class="col-md-10">
                              <input type="text" name="product_code_edit" id="product_code_edit" class="form-control" placeholder="Product Code" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Price">
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
        
            
		show_product();	//call function show all product
		
		$('#mydata').dataTable();
		 responsive: true
		//function show all product
		function show_product(){
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
		                        // '<td>'+data[i].tanggal_sidang+'</td>'+
		                        '<td>'+data[i].ruangan+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}
 
        //Save product
        $('#btn_save').on('click',function(){
            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            var price        = $('#price').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/save')?>",
                dataType : "JSON",
                data : {product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                    $('[name="product_code"]').val("");
                    $('[name="product_name"]').val("");
                    $('[name="price"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var product_code = $(this).data('product_code');
            var product_name = $(this).data('product_name');
            var price        = $(this).data('price');
            
            $('#Modal_Edit').modal('show');
            $('[name="product_code_edit"]').val(product_code);
            $('[name="product_name_edit"]').val(product_name);
            $('[name="price_edit"]').val(price);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var product_code = $('#product_code_edit').val();
            var product_name = $('#product_name_edit').val();
            var price        = $('#price_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/update')?>",
                dataType : "JSON",
                data : {product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                    $('[name="product_code_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var product_code = $(this).data('product_code');
            
            $('#Modal_Delete').modal('show');
            $('[name="product_code_delete"]').val(product_code);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var product_code = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/delete')?>",
                dataType : "JSON",
                data : {product_code:product_code},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });

	});

</script>

</body>

</html>
