<?php $partialView('Shared', 'AdminHeader'); ?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Gebruikers: Index</h1>
			<h2 class="sub-header">Huidige gebruikers</h2>
			<?php if($model->getList()> 0): ?>
				<table class="table m5t">
						<th>
							Gebruikernummer
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
							<td><a class="red" href="index.php?uc=User-readingOne_<?php echo $item['Id']; ?>">Selecteer</a></td>
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
