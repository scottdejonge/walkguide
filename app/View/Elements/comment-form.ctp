<?php 
	echo $this->Form->create('Comment', array(
		'url' => '/comments/add',
		'id' => 'comment-form',
		'data-ajax-form' => '',
		'data-ajax-form-target' => 'comment-form',
		'inputDefaults' => array(
			'div' => false,
			'required' => false,
			'error' => array(
				'class' => 'error',
				'attributes' => array(
					'wrap' => 'p',
					'class' => 'form-message error',
				)
			)
		)
	));

	echo $this->Form->hidden(
		'walk_id', array(
			'value' => isset($walk_id) ? $walk_id : null,
		)
	);

	echo $this->Form->input(
		'first_name', array(
			'placeholder' => 'Enter your first name',
			'type' => 'text',
		)
	);

	echo $this->Form->input(
		'last_name', array(
			'placeholder' => 'Enter your last name',
			'type' => 'text',
		)
	);
	
	echo $this->Form->input(
		'email', array(
			'placeholder' => 'Enter your email address',
			'type' => 'text',
		)
	);

	echo $this->Form->input(
		'comment', array(	
			'type' => 'textarea',
			'placeholder' => 'Write a review',
			'rows' => '5',
		)
	);
	
	echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'button button-block button-primary')); 
	
	echo $this->Form->end();
?>