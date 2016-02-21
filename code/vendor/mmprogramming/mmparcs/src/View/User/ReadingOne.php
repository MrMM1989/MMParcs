<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Details van een gebruiker</h1>
			<h2 class="sub-header"><?php echo $model->getFirstName().' '.$model->getLastName(); ?> (#<?php echo $model -> getId(); ?>)</h2>
			<p><span class="bold">Email: </span><?php echo $model -> getEmail(); ?></p>
			<p><span class="bold">Registratiedatum: </span><?php echo $model->getDateRegistration(); ?></p>
			<p><span class="bold">Geblokkeerd: </span><?php echo ($model->getIsBanned()? 'ja' : 'nee' ); ?></p>
			<p><span class="bold">Rol: </span><?php echo $model->getRoleName(); ?></p>
			<p><a href="index.php?uc=User-index">Terug naar overzicht gebruikers</a></p>
			<p>
				<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Toon log </a>
			</p>
			<div class="collapse" id="collapseExample">
				<div class="well">
					<?php $appStateView(); ?>
				</div>
			</div>
		</div>
	</div>
</div>