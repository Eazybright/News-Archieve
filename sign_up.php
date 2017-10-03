<html>
	<head>
		<title>Eazybright Forum</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
		
		<body>
			<center>
					<h1> Welcome to Eazybright News Forum</h1>
					
					<h2>Register</h2>
					
				<?php echo form_open(); ?>
					
					<h5>Username</h5>
						<?php echo form_error('username'); ?>
						<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
						
					<h5>Password</h5>
						<?php echo form_error('password'); ?>
						<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />
						
					<h5>Password confirm</h5>
						<?php echo form_error('passconf'); ?>
						<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />
						
					<h5>Email address</h5>
						<?php echo form_error('email'); ?>
						<input type="text" name="email" value="<?php echo set_value('email'); ?> " size="50" />
						
					<form>
						<div><input type="submit" value="submit" /></div>
					</form>
					
					<?php echo "Already registered? Sign in"; ?>
					<a href="<?=base_url('news/login')?>">here</a>
			
			</center>
		</body>



</html>