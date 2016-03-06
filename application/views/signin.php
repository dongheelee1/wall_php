<html>
<head>
	<title>WALL</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/materialize.min.css">

	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
	<style type="text/css">
		#login
		{

			width: 300px;
			margin: 50px;
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
	<div class="container">
		<form action="/logins/signin" method="post" class="col s12" id="login" style="display: inline-block">
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
							<div class="bold italic" style="color: green">
								<?php echo $this->session->flashdata('success'); ?>
							</div>
					<?php 			
							}
				?>
			</div>
			<div class="row">
				<h1>Login</h1>
			</div>
			<div class="row">
				<div>
					Email Address: <input type="text" name="email_address" class="validate">
				</div>
			</div>
			<div class="row">
				<div>
					Password: <input type="text" name="password" class="validate"> 
				</div>
			</div>
			<div class="row" style="text-align: center; color: lightblue">
				<div>
					<input type="submit" value="login" class="waves-effect waves-light btn-large left #2196f3 blue" id="login_button">
				</div>
			</div>
			<div class="row">
				<a href="/logins/display_registration" class="waves-effect waves-light " style="text-decoration: underline">Register if you don't have an account yet!</a>
			</div>
		</form>

	</div>

</body>
</html>