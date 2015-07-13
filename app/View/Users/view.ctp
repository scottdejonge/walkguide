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

<section class="feed">
	<div class="container">

		<?php foreach ($items as $item) : ?>

			<article class="feed-item">
				<h3>
					<?php
						echo h($user['User']['first_name']) . ' ' . h($user['User']['last_name']);

						if (isset($item['comment'])) {
							echo '<small>commented on</small>';
						} else {
							echo '<small>rated</small>';
						}

						echo $this->Html->link(
							h($item['Walk']['name']),
							array(
								'controller' => 'walks',
								'action' => 'view',
								$item['Walk']['id']
							)
						);
					?>
					<small><?php echo $this->Time->format('d M', $item['created']); ?></small>
				</h3>
				<?php
					if (isset($item['comment'])) {
						echo '<p>' . h($item['comment']) . '</p>';
					} else {
						echo h($item['rating']);
					}
				?>
			</article>

		<?php endforeach; ?>

	</div>
</section>