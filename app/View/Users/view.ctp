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

		<?php foreach ($user['Comment'] as $comment) : ?>

			<article class="feed-item">
				<h3>
					<?php echo h($user['User']['first_name']) . ' ' . h($user['User']['last_name']); ?>
					<small>commented on</small>
					<?php
						echo $this->Html->link(
							h($comment['Walk']['name']),
							array(
								'controller' => 'walks',
								'action' => 'view',
								$comment['Walk']['id']
							)
						);
					?>
					<small><?php echo $this->Time->format('d M', $comment['created']); ?></small>
				</h3>
				
				<p><?php echo h($comment['comment']); ?></p>
			</article>

		<?php endforeach; ?>

		<?php foreach ($user['Rating'] as $rating) : ?>

			<article class="feed-item">
				<h3>
					<?php echo h($user['User']['first_name']) . ' ' . h($user['User']['last_name']); ?>
					<small>rated</small>
					<?php
						echo $this->Html->link(
							h($rating['Walk']['name']),
							array(
								'controller' => 'walks',
								'action' => 'view',
								$rating['Walk']['id']
							)
						);
					?>
					<small><?php echo $this->Time->format('d M', $rating['created']); ?></small>
				</h3>
				
				<p><?php echo h($rating['rating']); ?></p>
			</article>

		<?php endforeach; ?>

	</div>
</section>