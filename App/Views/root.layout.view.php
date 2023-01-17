<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
	<title><?= \App\Config\Configuration::APP_NAME ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
			crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
			integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
			crossorigin="anonymous"></script>
	<link rel="stylesheet" href="public/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-navbar">
	<div class="container" style="justify-content: left">

				<div id="logged-logo">
				</div>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="logged-option" class="left-offset">
		<div class="collapse navbar-collapse" id="mynavbar">
			<ul class="navbar-nav me-auto navbar-text">
				<li class="nav-item dropdown">
					<a class="nav-link " href="?c=recipes" role="button" >Recepty</a>
				</li>
			</ul>
		</div>
		</div>
	</div>

	<a class="center-offset" href="?c=home">
		<img src="public/assets/logo.png" alt="Bootstrap" class = "navbar-logo">
		<p class="center-offset"><span id='date-time'></span></p>
	</a>

	<script src="public/js/realTime.js"></script>

	<div class="container left-offset" id="login-container">
        <?php if (!$auth->isLogged()) { ?>
			<a href="#loginModal" class="right-offset nav-link" id="loginButton" data-bs-toggle="modal">
				prihlasit sa
			</a>
        <?php } ?>
	</div>
</nav>

<div class="modal" id="loginModal">
	<div class="modal-dialog">
		<div class="modal-content center-offset">

			<!-- Modal Header -->
			<div class="modal-header" >
				<h4 class="modal-title">Prihlásenie</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			</div>
			<div class="text-danger center-offset center-div" id="login-outcome"></div>
			<input class="form-control center-div" id="login-text" name="text" style="max-width: 60%" placeholder="Zadajte login!" required>
			<input class="form-control center-div" id="password" name="password" type="password" style="max-width: 60%" placeholder="Zadajte heslo!" required>

			<button id="login-submit" type="button" class="btn btn-success center-div" style="width: 60%;float: right;">prihlásiť sa</button>

			<hr>
			<H2>nemáte učet?</H2>
			<a style="margin: 10px" class="btn btn-primary" href="?c=auth&a=register">prejsť na registráciu</a>
		</div>
	</div>
</div>


<script src="public/js/login.js"></script>

<div class="container-fluid mt-3">
	<div class="web-content">
        <?= $contentHTML ?>
	</div>
</div>

</body>
</html>

