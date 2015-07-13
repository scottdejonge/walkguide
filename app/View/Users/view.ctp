<?php

	// Page settings
	$this->set('title_for_layout', 'Profile');

?>
<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<h1 class="page-header-title"><?php echo h($userData['first_name']); ?> <?php echo h($userData['last_name']); ?></h1>
		</div>
	</div>
</section>