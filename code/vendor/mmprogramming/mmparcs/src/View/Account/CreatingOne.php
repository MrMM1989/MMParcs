<?php $partialView('Shared', 'Header'); ?>
<div id="pbody" class="container">
	<h1 class="page-header">Registreer een account</h1>
	<form class="user-form" action="index.php?uc=Account-createOne" method="post">
		<div class="form-group">
			<label for="account-firstname">Voornaam: </label>
			<input type="text" id="account-firstname" class="form-control" name="account-firstname"
			placeholder="Geef hier je voornaam op" required/>
		</div>
		<div class="form-group">
			<label for="account-lastname">Achternaam: </label>
			<input type="text" id="account-lastname" class="form-control" name="account-lastname"
			placeholder="Geef hier je achternaam op" required/>
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