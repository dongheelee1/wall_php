<html>
<head>
	<title>WALL</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/materialize.min.css">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
	<style type="text/css">
		th{
			padding: 20px;
		}
		.add_button{
			background-color: blue; 
			color: white; 
			border: 1px solid black;
			margin-left: 400px;
		}
		.red{
			color: red;
		}
		.green{
			color: green;
		}
		.highlight th{
			width: 200px;
		}
	</style>

</head>
<body>
<!-- 	<?php 
		var_dump($loggedin_userinfo);
		var_dump($users_infos);
	?> -->
	<nav>
		<div class="navbar-wrapper container; light-blue">
			<h2 class="brand-logo; thin" style="display: inline-block; margin-left: 50px; color: white; ">The Wall - User Dashboard</h2>
		</div>
	</nav>

	<div class="container"> 
		<table border="1" class="highlight" style="margin-top: 50px;">
			<tr class="highlight">
				<th style="width: 100px">ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Action</th>
			</tr>
			<?php
			if(isset($users_infos) && isset($loggedin_userinfo))
			{
				foreach ($users_infos as $value) 
				{
			?>
				<tr>
					<td style="padding-left: 25px"><?php echo $value['id'] ?></td>
					<td><a href="/processes/display_wall/<?php echo $value['id'] ?>/<?php echo $loggedin_userinfo['id'] ?>"><?php echo $value['first_name'] . ' ' . $value['last_name'] ?></a></td>
					<td><?php echo $value['email_address'] ?></td>
					<td><?php echo $value['created_at'] ?></td>
			<?php 	if($value['email_address'] == $loggedin_userinfo['email_address'])
					{
				?>
						<td><a href="/processes/display_edit/<?php echo $loggedin_userinfo['id'] ?>">Edit</a></td>
			<?php
					}
				}
			}
			?>
		</table>
	</div>
</body>
</html>