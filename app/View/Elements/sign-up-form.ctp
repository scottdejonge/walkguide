<?php
	echo $this->Form->create('User', array(
		'inputDefaults' => array(
			'div' => false,
			'error' => array(
				'attributes' => array(
					'wrap' => 'p',
					'class' => 'form-message floating-form-message error'
				),
			),
		)
	));
	echo $this->Form->input('first_name', array('placeholder' => 'First Name'));
	echo $this->Form->input('last_name', array('placeholder' => 'Last Name'));
	echo $this->Form->input('email', array('placeholder' => 'Email'));
	echo $this->Form->input('password', array('placeholder' => 'Password'));
	echo $this->Form->button('Sign Up', array('type' => 'submit', 'class' => 'button-primary'));
	echo $this->Form->end();
?>