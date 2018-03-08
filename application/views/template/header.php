
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SANTRI Pengadilan Agama Tuban</title>
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
                <a class="navbar-brand" href="index.html">SANTRI V.1.0</a>
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
                                    <a href="<?php echo site_url('/antrian/server_sidang')?>" target="_blank">Server Sidang</a>
                                </li>
                                <li>
                                    <a href="morris.html">Server Non Sidang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>jadwal_sidang"><i class="fa fa-table fa-fw"></i> Jadwal Sidang</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-plus  fa-fw"></i> Input Non Sidang<span class="fa arrow"></span></a>
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
                            <a href="#"><i class="fa fa-institution  fa-fw"></i> Ruang Sidang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url()?>antrian/pos_sidang/1">Ruang Sidang 1</a>
                                </li>
                                <li>
                                <a href="<?php echo base_url()?>antrian/pos_sidang/2">Ruang Sidang 2</a>
                                </li>
                                <!-- <li>
                                    <a href="blank.html">Ruang Sidang 3</a>
                                </li>
                                <li>
                                    <a href="blank.html">Ruang Sidang 4</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bullhorn -o fa-fw"></i> POS Panggilan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="<?php echo base_url()?>antrian/pos_posyankum">Posyankum</a>
                                </li>
                                <li>
                                    <a href="blank.html">Kasir</a>
                                </li>
                                <li>
                                    <a href="blank.html">Meja 1</a>
                                </li>
                                <li>
                                    <a href="blank.html">Akte Cerai</a>
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
