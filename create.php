<html>
<head>
	<title>Eazybright Forum</title>
</head>

	<body>
		<center>

		<h2><?php echo $title; ?></h2>

			<?php echo validation_errors(); ?>

			<?php echo form_open('news/create'); ?>

				<label for="title">Title</label>
				<input type="input" name="title" placeholder="Title" /><br />

				<label for="text">Text</label>
				<textarea name="text"></textarea><br />

				<input type="submit" name="submit" value="Create news item" />
				<input type="reset" name="reset" value="reset" />
				
			</form>
		</center>
	</body>
</html>