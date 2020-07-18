<!DOCTYPE html>
<html>
<head>
	<title>Factory Worldwide</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./public/main.css">
	<script type="text/javascript" src="./public/main.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="<?php echo URL; ?>Scheduling" style="margin-right: 50px;">Factory Worldwide</a>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto" style="float: right;">
				<?php if (Session::get('logged') == true): ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL; ?>Scheduling">Scheduling</a>
					</li>
				<?php else: ?>
					<li class="nav-item" style="margin-right: 5px;">
						<a class="nav-link" href="<?php echo URL; ?>Registers">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL; ?>Login">Login</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php if (Session::get('logged') == true): ?>
			<div>
				<!-- logout user -->
				<li class="logout"><a href="<?php echo URL; ?>#"><?php echo $this->user['username']; ?></a></li>
				<li class="logout"><a href="<?php echo URL; ?>scheduling/logout">Log out</a></li>
			</div>
		<?php endif ?>

	</nav>
	<div id="wrapper">
		