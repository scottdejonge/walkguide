<article class="comment">

	<figure class="avatar" style="background: <?php echo $comment['User']['avatar_color'] ?>">
		<?php echo $this->Html->image('/assets/avatars/' . $comment['User']['avatar_icon'] . '.svg', array('alt' => '')); ?>
	</figure>

	<div class="comment-content">
		<h3 class="comment-title">
			<?php echo h($comment['User']['first_name']) . ' ' . h($comment['User']['last_name']); ?>
			<small><?php echo $this->Time->format('d M', $comment['Comment']['created']); ?></small>
		</h3>
		<p><?php echo h($comment['Comment']['comment']); ?></p>
	</div>
	
</article>