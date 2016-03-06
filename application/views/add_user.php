<html>
<head>
	<title>WALL</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/materialize.min.css">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
	<style type="text/css">
		#red{
			color: red;
		}
		#green{
			color: green;
		}
	</style>
</head>
<body>
	<nav>
		<div class="navbar-wrapper container; light-blue">
			<h2 class="brand-logo; thin" style="display: inline-block; margin-left: 50px; color: white; ">The Wall - Add User</h2>
			<a href="/logins/display_dashboard" class="right" style="margin-right: 100px;">Admin Dashboard</a>
		</div>
	</nav>

	<div class="container" style="margin-top: 100px">
		<div class="row">
			<?php 
				if($this->session->flashdata('errors'))
				{
			?>
					<div id="red"><?php echo $this->session->flashdata('errors'); ?></div>
			<?php 
				}
				else
				{
			?>
					 <div id="green"><?php echo $this->session->flashdata('success'); ?></div>
			<?php 
				}
			?>
		</div>
		<form action="/processes/create_user" method="post">
			<div class="row">
				<div class="input-field col s6">
					First Name: <input type="text" name="first_name">
				</div>
				<div class="input-field col s6">
					Last Name: <input type="text" name="last_name">
				</div>
			</div>
			<div class="row">
				Email Address:
				<input type="text" name="email_address">
			</div>
			<div class="row">
				Password:
				<input type="text" name="password">
			</div>
			<div class="row">
				Password Confirmation:
				<input type="text" name="confirm_password">
			</div>
			<div class="row">
				<input type="submit" value="create" style="background-color: green; color: white; border: 1px solid black; margin-top: 10px;">
			</div>
		</form>
	</div>
</body>
</html>