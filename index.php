<html>
<head>
		<title>Eazybright Forum</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

	<body>
		
			<h1><?php echo $title; ?></h1>
		<center>
			<?php foreach ($news as $news_item): ?>

				<h3><?php echo $news_item['title']; ?></h3>
				
				
				 <a href="<?= base_url('news/view/'.$news_item['slug'])?>">View article</a>

			<?php endforeach; ?>
			<?php echo "</br>"; ?>
			
			
			<h5>Do you want to add a news?<h5/>
			<h5><a href="<?= base_url('news/create')?>">Click Here</a></h5>
			<?= "Already logged in?" ?>
			<a href="<?= base_url('news/logout') ?>">Logout here</a>
		</center>
	</body>
</html>