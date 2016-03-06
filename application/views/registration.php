<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/materialize.min.css">

	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
	<style type="text/css">
		#register
		{
			display: inline-block;
			width: 500px;
			margin: 50px;
			vertical-align: top;
			margin-left: 110px;
		}
		.btn-large{
			height: 30px;
			text-align: center;
			padding: 7px;
		}
		nav{
		opacity: 0.7;
	    filter: alpha(opacity=60);
	    background-color: lightblue;
		}
		.panel{
			opacity: 0.9;
		    filter: alpha(opacity=60);
		}
		body{
			background-image: url('/assets/light-blue-gradient-wallpaper-2.jpg');
		}
	</style>
</head>
<body>
	<nav>
		<div class="navbar-wrapper container; light-blue">
			<h2 class="brand-logo; thin" style="display: inline-block; margin-left: 50px; color: white; ">The Wall</h2>
			<ul class="right" style="margin-right: 120px;">
				<li><a href="/" class="top">home</a></li>
			</ul>
		</div>
	</nav>
	<div class="col container">
		<form action="/logins/register" method="post" id="register">
			<div class="row">
				<?php 	
						if($this->session->flashdata('errors'))
						{
				?>
						<div class="bold italic" style="color: red">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
				<?php	}
						if($this->session->flashdata('success'))
						{
				?>
						<div  class="bold italic" style="color: green">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
				<?php 			
						}
				?>
			</div>
				<div class="row">
					<h3>Join The Wall today.</h3>
				</div>
				<div class="row">
					<div class="input-field col s6">
						First Name: <input type="text" name="first_name">
					</div>
					<div class="input-field col s6">
						Last Name: <input type="text" name="last_name">
					</div>
				</div>
				<div class="row">
					<div>
						Email Address: <input type="text" name="email_address">
					</div>
				</div>
				<div class="row">
					<div>
						Password: <input type="text" name="password"> 
					</div>
				</div>
				<div class="row">
					<div>
						Confirm Password: <input type="text" name="confirm_password">
					</div>
				</div>
				<div class="row">
					<div>
						<input type="submit" value="register" class="waves-effect waves-light btn-large left #2196f3 blue" id="reg_button">
					</div>
				<a href="/logins/display_signin" class="waves-effect waves-light " style="text-decoration: underline">Done registering? Sign in here!</a>
				</div>
			
		</form>
	</div>
</body>
</html>