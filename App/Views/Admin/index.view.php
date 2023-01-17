<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
?>

<div class="container spacing">
	<div class="container">
	<h1 class="center-offset">Môj profil</h1>
	<h2>prihlásený: <?=$auth->getLoggedUserName()?></h2>
		<hr>
	<h2>počet komentárov: <?=$data['commentsCount'] ?></h2>
	<h2><a href="?c=admin&a=comments">história komentárov </a></h2>

	<h2>počet uverejnených receptov: <?=$data['recipesCount']?></h2>
	<h2><a href="?c=admin&a=recipes">moje recepty</a></h2>

		<div style="width: 100%; height: 50px">
	<h2 style="float: left" data-bs-toggle="tooltip" title="Súčet like-ov na všetkých vašich receptoch">rating užívateľa: <?=$data['ratingCount'] ?> </h2>
		</div>
	</div>

	<hr>

	<div class="container">
		<h1>Zmena hesla:</h1>
		<p class="text-danger center-offset"><?=$data['message']?></p>
		<form class="form-singin  container border border-4 center-offset" method="post" action='?c=auth&a=resetPassword' style="max-width: 450px">
			<div class="center-offset">
				<div class="form-group mb-3">
					<input class="form-control" type="password" name="oldP" style="margin: 5px" placeholder="Stare heslo" required> <br>
				</div>
				<div class="form-group mb-3">
					<input class="form-control" type="password" name="newP" style="margin: 5px" placeholder="Nove heslo" required minlength="5"> <br>
				</div>
				<div class="form-group mb-3">
					<input class="form-control" type="password" name="conP" style="margin: 5px" placeholder="Potvrdit nove heslo" required minlength="5"> <br>
				</div>
				<button class="btn btn-primary" type="submit" id="resetPassword" name="resetPassword"> potvrdit</button>
			</div>
		</form>
	</div>
	<div class="spacing">
	</div>
	<button class="btn btn-danger" style="font-size: 24px" id="BigNoNoButton" data-bs-toggle="modal" data-bs-target="#deleteModal">
		Odstrániť účet
	</button>

	<div class="modal" id="deleteModal">
		<div class="modal-dialog">
			<div class="modal-content center-offset">

				<!-- Modal Header -->
				<div class="modal-header" >
					<h4 class="modal-title">Ste si istý že chcete odstániť svoj účet?</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					túto akciu nie je možné vrátiť spät!
				</div>

				<hr>

				<div>
					<a class="btn btn-danger" href="?c=auth&a=deleteAccount" style="float: left;margin: 10px">Odstrániť účet</a>
					<button type="button" class="btn btn-success" style="float: right;margin: 10px" data-bs-dismiss="modal">Zavrieť</button>
				</div>
			</div>
		</div>
	</div>

	<div class="spacing"></div>
</div>
