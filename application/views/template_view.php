<?php
	if ((!isset($_COOKIE['user_id'])) && ($content_view != 'register_view.php')) header('Location: /register');

	function page($content_view) {
		return explode('_', $content_view)[0];
	}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<title><?= page($content_view); ?></title>
</head>
<body style="background: #f1e9ef40;">
	<header>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="/">BWT TEST</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="/">Главная</a></li>
							<li><a href="/show_feetback">Посмотреть все фитбеки</a></li>
						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li><a href="/register" class="btn btn-default active" role="button" aria-disabled="true" style="    padding: 5px 15px; margin-top: 8px;">Sign in</a></li>

						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div><!-- /.container --> 
	</header>
	<?php include 'application/views/' . $content_view; ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
	<script src="../../assets/js/main.js"></script>
</body>
</html>