<html>
<head>
	<title>Eazybright Forum</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
		integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
		
		<?php echo '<h2>'.$news_item['title'].'</h2>'; ?>
		<h5><?php echo $news_item['text']. "</br>"; ?></h5>
		
		<?php echo "Go back to news "; ?>
		<a href="<?= base_url('news/index'); ?>">page</a>
		
	</body>
</html>