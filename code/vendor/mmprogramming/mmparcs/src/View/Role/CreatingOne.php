<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Een rol toevoegen</h1>
			<p>
				Vul onderstaand formulier in om een rol toe te voegen.
			</p>
			<form action="index.php?uc=Role-createOne" method="post">
				<div class="form-group">
					<label for="role-name">Naam: </label>
					<input type="text" id="role-name" class="form-control" name="role-name"
					placeholder="Geef hier de naam van de nieuwe rol" required/>
				</div>
				<div class="form-group">
					<label for="role-description">Beschrijving: </label>
					<textarea id="role-description" class="form-control" name="role-description" rows="5"></textarea>
				</div>
				<p>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> Verzenden
					</button>
					<a class="btn btn-danger" role="button" href="index.php?uc=Role-index"> 
						<i class="fa fa-times"></i> Annuleren 
					</a>
				</p>
			</form>
		</div>
	</div>
</div>
