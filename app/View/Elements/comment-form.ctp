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

	echo $this->Form->hidden(
		'user_id', array(
			'value' => $userData['id'],
		)
	);

	echo $this->Form->input(
		'comment', array(	
			'type' => 'textarea',
			'placeholder' => 'Write a comment',
			'rows' => '5',
		)
	);
	
	echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'button button-block button-primary')); 
	
	echo $this->Form->end();
?>