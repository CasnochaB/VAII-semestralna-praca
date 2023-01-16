<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
?>

<!--<div class="offcanvas offcanvas-start text-bg-dark" id="demo">
	<div class="offcanvas-header">
		<h1 class="offcanvas-title" style="color: #ff9852!important;">Meno Profilu</h1>
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
	</div>
	<div class="offcanvas-body">
		<a><h2>Moje recepty<span class="badge profile-counter">2</span></h2></a>
		<a><h2>Obľubené recepty<span class="badge profile-counter">4</span></h2></a>
		<a><h2>Odoberané</h2></a>
		<a class="btn btn-primary" href="?c=recipes&a=create">pridaj recept</a>
		<div class="">
		</div>
	</div>

	<button class="btn btn-primary ">odhlásiť sa</button>
</div>-->

<!--
	<div class="card recipe-card">
		<img class="card-img-top fixed-aspect" src="/assets/recepty/hamburger.png" alt="Card image">
		<div class="recept">
			<h4 class="card-title">Hamburger</h4>
			<div>
				<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer iaculis ac leo in mollis. Phasellus.</p>
				<img class="recipe-icon" src="/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px"> 25min.
			</div>
			<a href="#" class="btn btn-primary">Otvoriť recept</a>
		</div>
	</div>

	<div class="card recipe-card">
		<img class="card-img-top fixed-aspect" src="/assets/recepty/hamburger.png" alt="Card image">
		<div class="recept">
			<h4 class="card-title">Hamburger</h4>
			<div>
				<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer iaculis ac leo in mollis. Phasellus.</p>
				<img class="recipe-icon" src="/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px"> 25min.
			</div>
			<a href="#" class="btn btn-primary">Otvoriť recept</a>
		</div>
	</div>

	<div class="card recipe-card">
		<img class="card-img-top fixed-aspect" src="/assets/recepty/hamburger.png" alt="Card image">
		<div class="recept">
			<h4 class="card-title">Hamburger</h4>
			<div>
				<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer iaculis ac leo in mollis. Phasellus.</p>
				<img class="recipe-icon" src="/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px"> 25min.
			</div>
			<a href="#" class="btn btn-primary">Otvoriť recept</a>
		</div>
	</div>

	<div class="card recipe-card">
		<img class="card-img-top fixed-aspect" src="/assets/recepty/pizza.png" alt="Card image">
		<div class="recept">
			<h4 class="card-title">Šunková pizza</h4>
			<div>
				<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer iaculis ac leo in mollis. Phasellus.</p>
				<img class="recipe-icon" src="/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px"> 45min.
			</div>
			<a href="recipe.html" class="btn btn-primary">Otvoriť recept</a>
		</div>
	</div>-->

<div class="container spacing">
	<div class="container">
	<h1 class="center-offset">Môj profil</h1>

	<h2>počet komentárov: <?=$data['commentsCount'] ?></h2>
	<h2><a href="?c=admin&a=comments">história komentárov </a></h2>

	<h2>počet uverejnených receptov: <?=$data['recipesCount']?></h2>
	<h2><a href="?c=admin&a=recipes">moje recepty</a></h2>

		<div style="width: 100%; height: 50px">
	<h2 style="float: left" data-bs-toggle="tooltip" title="Súčet like-ov na všetkých vašich receptoch">rating užívateľa: <?=$data['ratingCount'] ?> </h2>
		</div>
	</div>

	<hr>

</div>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>