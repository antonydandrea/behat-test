<!DOCTYPE HTML>
<html>
	<head>
		<title>Hello App</title>
	</head>
	<body>
		<div>
			<h1>Welcome!</h1>
			<form method="POST" id="submit_name">
				<p>Please enter your name below:</p>
				<input type="text" name="my_name" id="my_name" />
				<input name="submit_name" type="submit" value="Submit" />
			</form>
			<?php if (isset($_POST['my_name']) && !empty($_POST['my_name'])) { ?>
				<h2 id="greeting">Hello, <?php echo ucfirst($_POST['my_name']); ?>!</h2>
			<?php } ?>
		</div>
	</body>
</html>