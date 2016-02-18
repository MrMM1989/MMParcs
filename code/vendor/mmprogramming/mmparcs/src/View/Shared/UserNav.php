<?php
$noticeboard = new \ModernWays\AnOrmApart\NoticeBoard();

$session = new \ModernWays\Identity\Session($noticeboard);
 ?>
<ul class="nav navbar-nav navbar-right">
	
	<?php if($session->isTicketSet()): ?>
	<li>
		<a href="index.php"><i class="fa fa-user"></i> <?php echo $session->get('UserName'); ?></a>
	</li>
	<li>
		<a href="index.php?uc=Account-logout"><i class="fa fa-sign-out"></i> Uitloggen</a>
	</li>
	<?php else: ?>
	
	<li>
		<a href="index.php?uc=Account-loggingIn"><i class="fa fa-sign-in"></i> Inloggen</a>
	</li>
	<li>
		<a href="index.php?uc=Account-creatingOne"><i class="fa fa-user-plus"></i> Registreren</a>
	</li>
	<?php endif; ?>
</ul>