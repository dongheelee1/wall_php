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
	</style>
</head>
<body>
	<nav>
		<div class="navbar-wrapper container; light-blue">
			<h2 class="brand-logo; thin" style="display: inline-block; margin-left: 50px; color: white; ">The Wall - Manage Users</h2>
			<a class="btn-floating btn-large waves-effect waves-light red right" href="/processes/display_add_user" style="margin: 25px 100px;"><i class="material-icons">+</i></a>
		</div>
	</nav>

	<table border="1" class="highlight" style="margin-top: 50px;">
		<thead>
			<tr class="highlight">
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>created_at</th>
				<th>user_level</th>
				<th>actions</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if($users_infos)
			{
				foreach ($users_infos as $value) 
				{
			?>
				<tr>
					<td><?php echo $value['id'] ?></td>
					<td><a href="/processes/display_wall/<?php echo $value['id'] ?>"><?php echo $value['first_name'] . ' ' . $value['last_name'] ?></a></td>
					<td><?php echo $value['email_address'] ?></td>
					<td><?php echo $value['created_at'] ?></td>
					<td><?php if($value['user_level'] == 1){echo 'Admin';}else{echo 'Normal User';} ?></td>
					<td><a style="color: green; display: block" href="/processes/display_edit/<?php echo $value['id'] ?>">edit</a> <a style="display: block;" href="/processes/remove_user/<?php echo $value['id'] ?>">remove</a></td>
				</tr>
			<?php   
				}
			}	
		?>
		</tbody>
	</table>
</body>
</html>