<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Details van een rol</h1>
			<p>
				<a role="button" class="btn btn-warning button" href="index.php?uc=Role-updatingOne_<?php echo $model->getId(); ?>">
					<i class="fa fa-pencil"></i> Bewerk
				</a>
			</p>
			<h2 class="sub-header"><?php echo $model->getName()?> (#<?php echo $model -> getId(); ?>)</h2>
			<p><span class="bold">Beschrijving: </span><?php echo $model -> getDescription(); ?></p>
			<p><a href="index.php?uc=Role-index">Terug naar overzicht rollen</a></p>
		</div>
	</div>
</div>