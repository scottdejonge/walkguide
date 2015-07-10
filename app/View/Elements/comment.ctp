<article class="comment">

	<figure class="comment-image">
		<?php echo $this->element('icon', array('name' => 'flower')); ?>
	</figure>
	
	<div class="comment-content">
		<h3 class="comment-title">
			<?php echo h($comment['User']['first_name']) . ' ' . h($comment['User']['last_name']); ?>
			<small><?php echo $this->Time->format('d M', $comment['Comment']['created']); ?></small>
		</h3>
		<p><?php echo h($comment['Comment']['comment']); ?></p>
	</div>
	
</article>