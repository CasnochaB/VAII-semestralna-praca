<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Prihlásenie</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Prihlásiť
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<div class="form-register container border border-4 center-offset"  style="max-width: 450px">
		<h1>Registrácia</h1>
		<div class="form-group">
			<label for="inputMeno"></label><input type="email" class="form-control" id="inputMeno" placeholder="Zadajte login">
		</div>
		<div class="form-group">
			<label for="inputHeslo"></label><input type="password" class="form-control" id="inputHeslo" placeholder="Zadajte Heslo">
		</div>
		<div class="form-group">
			<label for="inputHesloPotvrdit"></label><input type="password" class="form-control" id="inputHesloPotvrdit" placeholder="Potvrďte Heslo">
		</div>
		<button class="btn btn-primary" type="submit" name="submitRegister" style="margin-top: 30px;margin-bottom: 30px"><h2>Zaregistrovať sa</h2></button>
	</div>

	<div class="spacing"></div>
</div>
