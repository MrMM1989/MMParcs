<?php 

$succesMessage = false;
$title = '';
$message = '';
foreach($model->getModelState()->getBoard() as $boardItem){
	if($boardItem->getType() === 'SUCCESS'){
			$title = $boardItem->getName();
			$message = $boardItem->getText();
			$succesMessage = true;			
	}
}
			
$partialView('Shared', 'AdminHeader'); 
?>
<div id="padminbody" class="container-fluid">
	<div class="row">
		<?php $partialView('Shared', 'AdminSidebar'); ?>
		<div class="col-sm-9 col-md-10 admin-content">
			<h1 class="page-header">Rollen: Index</h1>
			<?php if($succesMessage): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong><?php echo $title; ?></strong> <?php echo $message; ?>
			</div>
			<?php endif; ?>
			<p>
				<a class="btn btn-success button" role="button" href="index.php?uc=Role-creatingOne"> <i class="fa fa-plus-circle"></i> Nieuwe Rol </a>
			</p>
			<h2 class="Sub-Header">Huidige Rollen</h2>
			<?php if($model->getList()> 0): ?>
				<table class="table">
					<tr>
						<th>
							Rolnummer
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
							<td><a href="index.php?uc=Role-readingOne_<?php echo $item['Id']; ?>">Selecteer</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</div>
	</div>
</div>
