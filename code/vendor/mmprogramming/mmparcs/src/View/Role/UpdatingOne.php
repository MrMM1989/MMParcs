<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Een rol bewerken</h1>
			<p>
				Vul onderstaand formulier in om een rol te bewerken.
			</p>
			<form action="index.php?uc=Role-updateOne" method="post">
				<input type="hidden" name="role-id" value="<?php echo $model->getId(); ?>" />
				<div class="form-group">
					<label for="role-name">Naam: </label>
					<input type="text" id="role-name" class="form-control" name="role-name"
					placeholder="Geef hier de naam van de nieuwe rol" value="<?php echo $model->getName(); ?>" required/>
				</div>
				<div class="form-group">
					<label for="role-description">Beschrijving: </label>
					<textarea id="role-description" class="form-control" name="role-description" rows="5"><?php echo $model->getDescription(); ?></textarea>
				</div>
				<p>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> Verzenden
					</button>
					<a class="btn btn-danger" role="button" href="index.php?uc=Role-readingOne_<?php echo $model->getId(); ?>"> 
						<i class="fa fa-times"></i> Annuleren 
					</a>
				</p>
			</form>
		</div>
	</div>
</div>