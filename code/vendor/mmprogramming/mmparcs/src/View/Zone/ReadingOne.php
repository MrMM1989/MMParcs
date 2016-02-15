<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Details van een zone</h1>
			<h2 class="sub-header"><?php echo $model->getName()?> (#<?php echo $model -> getId(); ?>)</h2>
			<p><span class="bold">Adres: </span><?php echo $model -> getAddress(); ?></p>
			<p><a href="index.php?uc=Zone-index">Terug naar overzicht zones</a></p>
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