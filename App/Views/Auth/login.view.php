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
                                   required>
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

	<form class="form-singin container border border-4 center-offset" method="post" action='?c=auth&a=register' style="max-width: 450px">
		<h1>Registrácia</h1>
		<div class="text-center text-danger mb-3">
            <?= @$data['message2'] ?>
		</div>
		<div class="form-group mb-3">
			<input name="Rlogin" type="text" class="form-control" id="Rlogin" placeholder="Zadajte login" required>
		</div>
		<div class="form-group mb-3">
			<input name="Rpassword" type="password" class="form-control" id="Rpassword" placeholder="Zadajte Heslo" required minlength="5">
		</div>
		<div class="form-group mb-3">
			<input name="RpasswordP" type="password" class="form-control" id="RpasswordP" placeholder="Potvrďte Heslo" required minlength="5">
		</div>
		<button class="btn btn-primary" type="submit" name="submitRegister" style="margin-top: 30px;margin-bottom: 30px">Zaregistrovať sa</button>
	</form>

	<div class="spacing"></div>
</div>
