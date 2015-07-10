<section class="comments" data-ajax-form-target="comment-form">
	<div class="container">
		<?php
			echo $this->element('comments', array('comments' => $comments));
			echo '<p class="text-center">' . __('Your comment has been posted!') . '</p>';
		?>
	</div>
</section>