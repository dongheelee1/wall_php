<p>Mark Guillen wrote on: [date]</p>
<p>Hi Michael! I am having fun building this!</p>		


		<?php
			if($all_info)
			{
				foreach ($all_info as $info)
				{

					echo $info['message'];


					
				}
			}
					






					foreach ($all_users as $user) 
					{
						
						if($user['id'] == $message['author_id'])
						{
							echo "<h3>" . $user['first_name'] . " " . $user['last_name'] . " wrote on: " . $message['created_at'] . "</h3>";
				    	}
						
					}

					echo "<p>" . $message['message'] . "</p>";
					?>
								<div class="comment">
								 	<h3>Write a comment to this message</h3>
								 	<form action="/processes/add_comment/<?php echo $profile_userinfo['id']?>/<?php echo $loggedin_userinfo['id']?>/<?php echo $message['id'] ?>" method="post">
								 		<textarea name="comment"></textarea>
										<input type="submit" value="Post a comment">
									</form>	
								</div>
				

				<?php	if($comments){
							foreach ($comments as $comment) 
							{
								if($message['id'] == $comment['message_id'])
								{
									foreach ($all_users as $user) 
									{

										if($user['id'] == $comment['author_id'])
										{
									
											echo "<a href='/processes/getinfo_wall/{$user['id']}/$loggedin_id'>" . $user['first_name'] . " " . $user['last_name'] . " wrote on: " . $message['created_at'] . "</a>"; 
								  		} 
									}
									echo "<p>" . $comment['comment'] . "</p>";

								}
							}

						}
				  

				}
			}
		?>