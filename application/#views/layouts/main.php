<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Rekam Medik Gigi</title>
        <!-- Favicon-->
        <!--<link rel="icon" href="<?php echo site_url('resources/img/favicon.ico');?>" type="image/x-icon">-->

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		<!--<link href="<?php echo site_url('resources/css/icon.css');?>" rel="stylesheet" type="text/css">-->
		
        <!-- Font-awesome Css -->
        <link href="<?php echo site_url('resources/css/font-awesome.min.css');?>" rel="stylesheet">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo site_url('resources/css/bootstrap.css');?>" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo site_url('resources/css/waves.css');?>" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="<?php echo site_url('resources/css/animate.css');?>" rel="stylesheet" />

        <!-- Preloader Css -->
        <link href="<?php echo site_url('resources/css/md-preloader.css');?>" rel="stylesheet" />

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="<?php echo site_url('resources/css/bootstrap-material-datetimepicker.css');?>" rel="stylesheet" />

        <!-- Wait Me Css -->
        <link href="<?php echo site_url('resources/css/waitMe.css');?>" rel="stylesheet" />

        <!-- Bootstrap Select Css -->
        <link href="<?php echo site_url('resources/css/bootstrap-select.css');?>" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo site_url('resources/css/style.css');?>" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo site_url('resources/css/all-themes.css');?>" rel="stylesheet" />
		
		<!-- dataTable -->
		<link href="<?php echo site_url('resources/css/jquery.dataTables.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
    </head>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="md-preloader pl-size-md">
                    <svg viewbox="0 0 75 75">
                        <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                    </svg>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="">Sistem Penilaian Praktek Gigi</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
            </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="<?php echo site_url('resources/img/user.png');?>" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['username_admin']);?></div>
                        <div class="email"><?php echo ($_SESSION['level_admin'] = 'su' ? 'Super User' : 'Operator');?></div>
                        
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION </li>

						<?php echo ($this->uri->segment(1)=='mahasiswa' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('mahasiswa/index');?>">
                                <i class="material-icons">supervisor_account</i>
                                <span>Mahasiswa</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='dosen' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('dosen/index');?>">
                                <i class="material-icons">supervisor_account</i>
                                <span>Dosen</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='pasien' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('pasien/index');?>">
                                <i class="material-icons">person_pin</i>
                                <span>Pasien</span>
                            </a>
                        </li>						
						<?php echo ($this->uri->segment(1)=='konfigurasi' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('konfigurasi/index');?>">
                                <i class="material-icons">mode_edit</i>
                                <span>Konfigurasi</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='nilai_praktek' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('nilai_praktek/index');?>">
                                <i class="material-icons">assessment</i>
                                <span>Nilai Praktek</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='praktikum' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('praktikum/index');?>">
                                <i class="material-icons">view_list</i>
                                <span>Praktikum</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='sub_praktikum' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('sub_praktikum/index');?>">
                                <i class="material-icons">view_list</i>
                                <span>Sub Praktikum</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='aspek' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('aspek/index');?>">
                                <i class="material-icons">subject</i>
                                <span>Aspek</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='sub_aspek' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('sub_aspek/index');?>">
                                <i class="material-icons">subject</i>
                                <span>Sub Aspek</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='admin' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('admin/index');?>">
                                <i class="material-icons">perm_identity</i>
                                <span>Admin</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='password_admin' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('password_admin/index');?>">
                                <i class="material-icons">lock</i>
                                <span>Ubah Password</span>
                            </a>
                        </li>
						<?php echo ($this->uri->segment(1)=='login' ? "<li class='active'>" : "<li>"); ?>
                            <a href="<?php echo site_url('login');?>">
                                <i class="material-icons">input</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        SiGIGI <a href="http://adodisini.com/">&copy; 2017</a></div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2><?php echo "$judulform";?></h2>
                </div>
                <?php                    
                if(isset($_view) && $_view)
                    $this->load->view($_view);
                ?>                
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="<?php echo site_url('resources/js/jquery.min.js');?>"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo site_url('resources/js/bootstrap.js');?>"></script>

        <!-- Select Plugin Js -->
        <script src="<?php echo site_url('resources/js/bootstrap-select.js');?>"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo site_url('resources/js/jquery.slimscroll.js');?>"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo site_url('resources/js/waves.js');?>"></script>

        <!-- Autosize Plugin Js -->
        <script src="<?php echo site_url('resources/js/autosize.js');?>"></script>

        <!-- Moment Plugin Js -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>

        <!-- Bootstrap Material Datetime Picker Plugin Js -->
        <script src="<?php echo site_url('resources/js/bootstrap-material-datetimepicker.js');?>"></script>

        <!-- Custom Js -->
        <script src="<?php echo site_url('resources/js/admin.js');?>"></script>
        <script src="<?php echo site_url('resources/js/basic-form-elements.js');?>"></script>

        <!-- Demo Js -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
		
		<!-- data-tables -->
		<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.dataTables.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('resources/js/data-tables-script.js');?>"></script>
    </body>
</html>