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
	<div class="container-fluid">
        <?php if ($auth->isLogged()) { ?>
		<button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
			<img class="" src="public/assets/img/person-circle.svg" alt="Bootstrap" width="32" height="32">
		</button>
		<?php } ?>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="mynavbar">
			<ul class="navbar-nav me-auto navbar-text">

				<li class="nav-item dropdown">
					<a class="nav-link " href="?c=recipes" role="button" >Recepty</a>
				</li>
                <?php if ($auth->isLogged()) { ?>
				<li class="nav-item dropdown">
					<a class="nav-link" href="?c=admin"> Moje recepty</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="?c=recipes&a=favorite&id=<?=$auth->getLoggedUserId()?>"> Obľúbené</a>
				</li>
                <?php } ?>
			</ul>
		</div>
	</div>

	<a class="center-offset" href="?c=home">
		<img src="public/assets/logo.png" alt="Bootstrap" class = "navbar-logo">
		<p class="center-offset"><span id='date-time'></span></p>
	</a>


	<!--<div class="container left-offset nav-timeDisplay">

	</div>
	-->
	<script src="public/js/realTime.js"></script>

	<div class="container left-offset">
        <?php if (!$auth->isLogged()) { ?>
			<a  class="nav-link right-offset" href="<?= \App\Config\Configuration::LOGIN_URL ?>"> Prihlásiť</a>
        <?php } else { ?>
			<a  class="nav-link right-offset" href="?c=auth&a=logout"> Odhlásiť</a>
        <?php } ?>
	</div>
</nav>


<?php if ($auth->isLogged()) { ?>
	<div class="offcanvas offcanvas-start text-bg-dark" id="demo">
		<div class="offcanvas-header">
			<h1 class="offcanvas-title" style="color: #ff9852!important;"> <?= $auth->getLoggedUserName() ?> </h1>

			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
		</div>
		<div class="offcanvas-body">

			<a><h2>Obľubené recepty<span class="badge profile-counter">4</span></h2></a>
			<a><h2>Odoberané</h2></a>
			<a class="btn btn-primary" href="?c=recipes&a=create">pridaj recept</a>
			<div class="">
			</div>
		</div>
		<a class="btn btn-primary" href="?c=auth&a=logout" >odhlásiť sa</a>
	</div>
<?php } ?>
<!--<div class="modal" id="prihlasitModal">
	<div class="modal-dialog">
		<div class="modal-content">


			<div class="modal-header">
				<h4 class="modal-title">Prihlásenie</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>


			<div class="modal-body">
				<h3>Prihlasovacie meno</h3>
				<label>
					<input type="text">
				</label>
				<h3>Heslo</h3>
				<label>
					<input type="text">
				</label>
			</div>


			<hr>
			<div class="row" >
				<div class="col left-offset modal-margin">
					<p>Nie ste registrovaný?</p>
					<a class="btn btn-primary" href="public/html/registrationPage.html">Prejsť na registráciu</a>
				</div>
				<div class="col right-offset modal-margin" style="margin-top: auto">
					<button type="button" class="btn btn-primary">Prihlásiť</button>
				</div>
			</div>

		</div>
	</div>
</div>-->
<div class="container-fluid mt-3">
	<div class="web-content">
        <?= $contentHTML ?>
	</div>
</div>
</body>
</html>

