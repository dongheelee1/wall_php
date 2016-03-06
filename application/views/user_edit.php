<html>
<head>
	<title>WALL</title>
	<title>WALL</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/materialize.min.css">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
	<style type="text/css">
	*{
		padding: 0px;
		margin: 0px;
	}
	body{
		background-image: url('/assets/kandinsky1.jpg');
	}
		.edit_user{
			/*display: inline-block;*/
			border: 1px solid black;
			padding: 30px;
		}

		.edit_password{
/*			display: inline-block;
			vertical-align: top;*/
			margin-left: 20px;
			border: 1px solid black;
			padding: 30px;
		}
	nav{
	opacity: 0.8;
    filter: alpha(opacity=60);
    background-color: lightblue;
	}
	.panel{
		opacity: 0.9;
	    filter: alpha(opacity=60);
	}
	.button{
		border: 1px solid black; background-color: white; padding: 5px; margin-top: 5px;
	}
	</style>
</head>
<body>
	<nav>
		<div class="navbar-wrapper container; light-blue">
			<h2 class="brand-logo; thin" style="display: inline-block; margin-left: 50px; color: white; ">The Wall - Edit User Profile</h2>
			<a href="/logins/display_dashboard" class="right" style="margin-right: 100px;">Admin Dashboard</a>
		</div>
	</nav>

	<div class="container" style="margin: 50px;">
	<div class="row">
	<?php 
		// var_dump($loggedin_userinfo);
		// var_dump($users_infos);	
			if($this->session->flashdata('errors'))
			{
	?>
			<div class="red">
				<?php echo $this->session->flashdata('errors'); ?>
			</div>
	<?php	}
			if($this->session->flashdata('success'))
			{
	?>
			<div class="green">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
	<?php 			
			}
	?>
	<div>
		<div class="row">

				<h1 style="margin: 10px; font-weight: bold" class="thin"><i>User #<?php echo $profile_userinfo['id'] ?></i></h1>
		</div>
		<div class="row">
			<div  class="col s6">
				<div class="edit_user card-panel">
					<h1 class="thin">Edit Information</h1>
					<form action="/processes/update_profileinfo/<?php echo $profile_userinfo['id'] ?>" method="post">
						<div>
							First Name: <input type="text" name="first_name" placeholder="<?php echo $profile_userinfo['first_name'] ?>">
						</div>
						<div>
							Last Name: <input type="text" name="last_name" placeholder="<?php echo $profile_userinfo['last_name'] ?>">
						</div>
						<div>
							Email Address: <input type="text" name="email_address" placeholder="<?php echo $profile_userinfo['email_address'] ?>">
						</div>
						<div class="input-field">
							User Level: 
							<select name="user_level" class="browser-default">
								<option value="0">Normal User</option>
							</select>
						</div>
						<div>
							<input type="submit" value="Save" class="button">
						</div>
					</form>
				</div>
			</div>
			<div  class="col s6">
			<div class="edit_password card-panel">
				<h1 class="thin">Change Password</h1>
				<form action="/processes/update_password/<?php echo $profile_userinfo['id'] ?>" method="post">
					<div>
						Password: <input type="text" name="password" placeholder="<?php echo $profile_userinfo['password'] ?>"> 
					</div>
					<div>
						Password Confirmation: <input type="text" name="confirm_password"> 
					</div>
					<div>
						<input type="submit" value="Update Password" class="button">
					</div>
				</form>
			</div>
			</div>
		</div>
</div>
	</div>
</body>
</html>