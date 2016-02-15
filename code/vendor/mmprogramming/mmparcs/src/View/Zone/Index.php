<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Zones: Index</h1>
			<p>Dit zijn onze zones. Al deze locaties vallen onder het beheer van MMParcs. Bij wijzigingen, contacteer de dienst informatica.</p>
			<p>Er mogen geen wijzigingen aan de zones gebeuren zonder goedkeuring van de raad van bestuur.</p>
			<p>Barbara Van Pretpark - <span class="italic">Directeur Dienst Informatica</span></p>
			<h2 class="sub-header">Huidige zones</h2>
			<?php if($model->getList()> 0): ?>
				<table class="table">
					<tr>
						<th>
							Zonenummer
						</th>
						<th>
							Naam
						</th>
						<th>
						</th>
					</tr>
					<?php foreach($model->getList() as $item): ?>
						<tr>
							<td><?php echo $item['Id']; ?></td>
							<td><?php echo $item['Name']; ?></td>
							<td><a href="index.php?uc=Zone-readingOne_<?php echo $item['Id']; ?>">Selecteer</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
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
