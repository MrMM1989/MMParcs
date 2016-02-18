<?php
$authFailedMessage = false;
$title = '';
$message = '';

foreach ($model->getModelState()->getBoard() as $boardItem) {
	if ($boardItem -> getType() === 'AUTH-FAILED') {
		$title = $boardItem -> getName();
		$message = $boardItem -> getText();
		$authFailedMessage = true;
	}
}

$partialView('Shared', 'Header');
?>
<div id="pbody" class="container">
	<h1 class="page-header">Inloggen</h1>
	<?php if($authFailedMessage): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong><?php echo $title; ?></strong> <?php echo $message; ?>
		</div>
	<?php endif; ?>
		<form class="user-form" action="index.php?uc=Account-login" method="post">
		<div class="form-group">
			<label for="account-email">Email: </label>
			<input type="email" id="account-email" class="form-control" name="account-email"
			placeholder="Geef hier je email op" required/>
		</div>
		<div class="form-group">
			<label for="account-password">Wachtwoord: </label>
			<input type="password" id="account-password" class="form-control" name="account-password" value=""
			required/>
		</div>
		<p>
			<button type="submit" class="btn btn-primary">
				Inloggen
			</button>
		</p>
		<p class="p3t">
			Heb je nog geen account? <a href="index.php?uc=Account-creatingOne">Registreer je dan hier!</a>
		</p>
	</form>
</div>
<?php $partialView('Shared', 'Footer'); ?>