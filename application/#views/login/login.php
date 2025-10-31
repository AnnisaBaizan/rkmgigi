<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login SiGIGI | Sistem Penilaian Praktek Gigi</title>

    <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->
	<link href="<?php echo site_url('resources/css/icon.css');?>" rel="stylesheet" type="text/css">
	
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
	
	<style>
			
		/* -- body styles ------------------------------------- */

		body {
			font-family: "Roboto", 'Helvetica Neue, Helvetica, Arial', sans-serif; 
			background: #0277bd; // Light Blue 800
		}

		/* -- button styles ------------------------------------- */
		// imported from http://codepen.io/zavoloklom/pen/Gubja

		/*-- signin-card animation ---------------------------------------- */
		.signin-card {
		  -webkit-animation: cardEnter 0.75s ease-in-out 0.5s;
		  animation: cardEnter 0.75s ease-in-out 0.5s;
		  -webkit-animation-fill-mode: both;
		  animation-fill-mode: both;
		  opacity: 0;
		}

		/* -- login paper styles ------------------------------ */
		.signin-card {
		  max-width: 350px;
		  border-radius: 2px;
		  margin: 20px auto;
		  padding: 20px;   
		  background-color: #eceff1; // Blue Grey 50
		  box-shadow: 0 10px 20px rgba(0, 0, 0, .19),
		  0 6px 6px rgba(0, 0, 0, .23); // shadow depth 3
		}

		.signin-card { 
		  .logo-image, h1, p {
			text-align: center;
		  }    
		}

		/* -- font styles ------------------------------------- */
		.display1 {
		  font-size: 28px;
		  font-weight: 100;
		  line-height: 1.2;
		  color: #757575;
		  text-transform: inherit;
		  letter-spacing: inherit;
		}

		.subhead {
		  font-size: 16px;
		  font-weight: 300;
		  line-height: 1.1;
		  color: #212121;
		  text-transform: inherit;
		  letter-spacing: inherit;
		}

		/* card animation from Animate.css -------------------- */
		@-webkit-keyframes cardEnter {
		  0%, 20%, 40%, 60%, 80%, 100% {
			-webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		  }
		  0% {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			-ms-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		  }
		  20% {
			-webkit-transform: scale3d(1.1, 1.1, 1.1);
			-ms-transform: scale3d(1.1, 1.1, 1.1);
			transform: scale3d(1.1, 1.1, 1.1);
		  }
		  40% {
			-webkit-transform: scale3d(0.9, 0.9, 0.9);
			-ms-transform: scale3d(0.9, 0.9, 0.9);
			transform: scale3d(0.9, 0.9, 0.9);
		  }
		  60% {
			opacity: 1;
			-webkit-transform: scale3d(1.03, 1.03, 1.03);
			-ms-transform: scale3d(1.03, 1.03, 1.03);
			transform: scale3d(1.03, 1.03, 1.03);
		  }
		  80% {
			-webkit-transform: scale3d(0.97, 0.97, 0.97);
			-ms-transform: scale3d(0.97, 0.97, 0.97);
			transform: scale3d(0.97, 0.97, 0.97);
		  }
		  100% {
			opacity: 1;
			-webkit-transform: scale3d(1, 1, 1);
			-ms-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
		  }
		}
		@keyframes cardEnter {
		  0%, 20%, 40%, 60%, 80%, 100% {
			-webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		  }
		  0% {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			-ms-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		  }
		  20% {
			-webkit-transform: scale3d(1.1, 1.1, 1.1);
			-ms-transform: scale3d(1.1, 1.1, 1.1);
			transform: scale3d(1.1, 1.1, 1.1);
		  }
		  40% {
			-webkit-transform: scale3d(0.9, 0.9, 0.9);
			-ms-transform: scale3d(0.9, 0.9, 0.9);
			transform: scale3d(0.9, 0.9, 0.9);
		  }
		  60% {
			opacity: 1;
			-webkit-transform: scale3d(1.03, 1.03, 1.03);
			-ms-transform: scale3d(1.03, 1.03, 1.03);
			transform: scale3d(1.03, 1.03, 1.03);
		  }
		  80% {
			-webkit-transform: scale3d(0.97, 0.97, 0.97);
			-ms-transform: scale3d(0.97, 0.97, 0.97);
			transform: scale3d(0.97, 0.97, 0.97);
		  }
		  100% {
			opacity: 1;
			-webkit-transform: scale3d(1, 1, 1);
			-ms-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
		  }
		}
	</style>
  </head>

  <body>
    <div class="container">
<div id="login" class="signin-card">
  <div class="logo-image" style="text-align:center">
  <img src="<?php echo site_url('resources/img/logo.png');?>" alt="Logo" title="Logo" width="138">
  </div>
  <h1 class="display1">Login </h1>
  <p class="subhead">Sistem Penilaian Praktek Gigi</p>
  <?php 
		if(isset($_SESSION['error'])){
			echo "<font color=red>$_SESSION[error]</font>";  
		}
  ?>
  <?php echo form_open('login/cari'); ?>
    <div id="form-login-username" class="form-group">
      <input id="username" class="form-control" name="username" type="text" size="18" alt="login" required />
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="username" class="float-label">login</label>
    </div>
    <div id="form-login-password" class="form-group">
      <input id="passwd" class="form-control" name="password" type="password" size="18" alt="password" required>
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="password" class="float-label">password</label>
    </div>
    
    <div>
      <button class="btn btn-block btn-success ripple-effect" type="submit" name="Submit" alt="sign in">Sign in</button>  
	  </div>

    </div>
  <?php echo form_close();?>
</div>
</div>
  </body>
</html>