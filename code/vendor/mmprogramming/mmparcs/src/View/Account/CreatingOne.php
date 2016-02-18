<?php $partialView('Shared', 'Header'); ?>
<div id="pbody" class="container">
	<h1 class="page-header">Registreer een account</h1>
	<form class="user-form" action="index.php?uc=Account-createOne" method="post">
		<div class="form-group">
			<label for="account-name">Naam: </label>
			<input type="text" id="account-name" class="form-control" name="account-name"
			placeholder="Geef hier je naam op" required/>
		</div>
		<div class="form-group">
			<label for="account-email">Email: </label>
			<input type="email" id="account-email" class="form-control" name="account-email"
			placeholder="Geef hier je email op" required/>
		</div>
		<div class="form-group">
			<label for="account-remail">Herhaal email: </label>
			<input type="email" id="account-remail" class="form-control" name="account-remail"
			placeholder="Herhaal hier je email op" required/>
		</div>
		<div class="form-group">
			<label for="account-password">Wachtwoord: </label>
			<input type="password" id="account-password" class="form-control" name="account-password" value=""
			 required/>
		</div>
		<div class="form-group">
			<label for="account-rpassword">Herhaal wachtwoord: </label>
			<input type="password" id="account-rpassword" class="form-control" name="account-rpassword"
			required />
		</div>
		<p>
			<button type="submit" class="btn btn-primary">
				Registreren
			</button>
		</p>
	</form>
</div>
<?php $partialView('Shared', 'Footer'); ?>