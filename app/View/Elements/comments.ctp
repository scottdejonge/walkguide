<section>
		
	<?php
		if (!empty($comments)) {
			echo '<h2 class="title">' . __('Comments') . '</h2>';
			foreach ($comments as $comment) {
				echo $this->element('comment', array('comment' => $comment));
			}
		} else {
			echo '<h2 class="title">' . __('Add a Comment') . '</h2>';
		}
	?>
	
</section>