<html>
<head>
	<title>Eazybright Forum</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
	<body>
		<center>

				<h3><?php echo "Your form was created successfully!</br>" ?></h3>
					<hr/>
						<h1>Welcome <?php echo $_POST["username"]. "</br>"; ?></h1>

						<h2><?php echo "Your login details are as follows: "; ?><h2/>
						<h3><?php echo"Username: ". $_POST["username"]. "</br>"; ?>
						<?php echo "Password: **********</br>"; ?>
						<?php echo "Email: ".$_POST["email"]. "</br>";?>
					<hr/>
				</h3>
					<h1>Click below to login<h1/>
					<a href="<?= base_url('news/login')?>">Login</a>

		</center>
	</body>
</html>