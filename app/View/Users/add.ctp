<main class="content">
	<div class="container">
	
		<section class="content-inner">
			<?php
				echo $this->Form->create('User');
				echo '<h3>' . __('Add User') . '</h3>';
				echo $this->Form->input('email');
				echo $this->Form->input('password');
				echo $this->Form->button('Sign Up', array('type' => 'submit', 'class' => 'button-primary'));
				echo $this->Form->end();
			?>
		</section>

	</div>
</main>