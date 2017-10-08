<!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Navigation Builder</title>
</head>
<body>
	<div id="wrapper">
	<header>
		<h1>Welcome to my page builder :) :) :)</h1>
	</header>
	<main>
		<section>
		<form  method="get">
			<div id="input">
				<div>
					<label>Categories</label>
					<input type="text" name="category"/>
				</div>
				<div>
					<label>Tags</label>
					<input type="text" name="tag"/>
				</div>
				<div>
					<label>Months</label>
					<input type="text" name="month"/>
				</div>
			</div>
			<div id="submit">
				<input type="submit" name="submit" value="Generate"/>
			</div>
		</form>
		</section>
		<aside>
			<?php include 'navBuilder.php'; ?>
		</aside>
	</main>
	</div>
</body>
</html>