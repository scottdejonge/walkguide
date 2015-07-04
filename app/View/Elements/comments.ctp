<section>
		
	<?php if (!empty($comments)) : ?>

		<?php foreach ($comments as $comment) : ?>

			<?php
				if (isset($comment['Comment'])) {
					$comment = $comment['Comment'];
				}
			?>

			<article class="comment">

				<figure class="comment-image">
					<?php echo $this->element('icon', array('name' => 'flower')); ?>
				</figure>
				
				<div class="comment-content">
					<h3 class="comment-title">
						<?php echo h($comment['first_name']) . ' ' . h($comment['last_name']); ?>
						<small><?php echo $this->Time->format('d M', $comment['created']); ?></small>
					</h3>
					<p><?php echo h($comment['comment']); ?></p>
				</div>
				
			</article>

		<?php endforeach; ?>

	<?php endif; ?>
	
</section>