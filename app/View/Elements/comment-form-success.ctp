<section class="comments" data-ajax-form-target="comment-form">
	<div class="container">

		<h2 class="title">Comments</h2>
		<?php
			echo $this->element('comments', array('comments' => $comments));
		?>
		<p class="text-center">Your review has been posted!</p>
	</div>
</section>