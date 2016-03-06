<html>
<head>
	<title>The Wall: Posts & Comments</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/materialize.min.css">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
	<style type="text/css">
		.info{
			display: inline-block;
		}
		.info_main{
			display: inline-block;

		}
		#side{
			display: inline-block;
			margin-top: 20px;
		}

		.container{
			margin-top: 50px;
		}
		.top{
			height: 150px;
		}
		#main
		{
			display: inline-block;
			vertical-align: top;
			margin-left: 70px;
		}
		.image_wrapper img
		{
			width: 200px;
			height: 200px;
			border: 5px solid #03a9f4;
		}
		.user_information
		{
			font-size: 12px;
			border: 1px solid lightblue;
			margin: 10px 10px 10px 0px;
			padding: 5px;
		}
		#message, #comment{
			border: 1px solid silver;
			height: 30px;
		}
		.silver{
			color: silver;
		}

	</style>

</head>
<body>
<?php
	var_dump($profile_userinfo);
	var_dump($loggedin_userinfo);
	var_dump($Users_Messages);
	var_dump($Comments);
?>
	<nav>
		<div class="navbar-wrapper container; light-blue">
			<h2 class="brand-logo; thin" style="display: inline-block; margin-left: 50px; color: white; ">The Wall</h2>
		</div>
	</nav>

	<div class="container">

		<div id="top">
				<h3 id="main_name"><?php echo $profile_userinfo['first_name'] . ' ' . $profile_userinfo['last_name'] ?></h3>
				<hr style="background-color: lightblue;">
		</div>

		<div id="side" >
			<div class="image_wrapper">
				<a href="/processes/edit_profileImg/<?= $profile_userinfo['id']?>">
					<img src="<?php echo $profile_userinfo['img_url'] ?>">
				</a>
			</div>

			<div class="user_information">
				<h6>About me....</h6>
				<i><?php echo $profile_userinfo['description'] ?>hihihihi</i>
			</div>

			<div class="user_information">
			<p>User Information -</p>
			<p>Registered: <?php echo $profile_userinfo['created_at']?></p>
			<p>User ID: <?php echo $profile_userinfo['id'] ?></p>
			<p>Email Address: <?php echo $profile_userinfo['email_address'] ?></p>
			</div>
		</div>

		<div id="main">
			<div id="input_message">
				<form action="/processes/add_message/<?php echo $profile_userinfo['id']?>/<?php echo $loggedin_userinfo['id'] ?>" method="post">
					<label for="textarea1" class="right">Leave a message for <?php echo $profile_userinfo['first_name'] . ' ' . $profile_userinfo['last_name'] ?></label>
					<textarea name="message" id="message" class="materialize-textarea right"></textarea>
					<input type="submit" value="Post a message" class="btn waves-effect waves-light right">
				</form>	
			</div>
			
			<div style="margin-top: 200px;">
			<?php 
				if($Users_Messages)
				{
					foreach ($Users_Messages as $user_message) 
					{
			?>
					<div style="padding: 10px; margin-top: 230px; background-color: #a3cfff">
						<p>"<?php echo $user_message['message'] ?>" -- <span style="font-size: 12px;"><?php echo $user_message['first_name'] . " " . $user_message['last_name']?> at <?php echo $user_message['created_at'] ?></span></p>
					</div>
					<?php foreach($Comments as $comment)
							{
								if($user_message['id'] == $comment['message_id'])
								{
							?>
								<div style="background-color: #f6f6f6; padding: 10px; border-bottom: 1px solid gray">
									<p>"<?php echo $comment['comment']?>" -- <span style="font-size: 12px;"><?php echo $comment['first_name'] . " " . $comment['last_name']?> wrote on: <?php echo $user_message['created_at'] ?></span></p>
								</div>
						<?php	}
							}
							?>

							 	<form style="" action="/processes/add_comment/<?php echo $user_message['id']?>/<?php echo $profile_userinfo['id'] ?>" method="post">
							 		<label for="textarea1" class="right">Write a comment to this message.</label>
							 		<textarea name="comment" id="comment" class="materialize-textarea right"></textarea>
									<input type="submit" value="Post a comment" class="btn waves-effect waves-light right">
								</form>				
					<?php	

				 	}

				}
			?>
			
			</div>
		</div>
	</div>
</body>
</html>