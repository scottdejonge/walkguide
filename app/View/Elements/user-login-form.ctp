<?php
	echo $this->Session->flash('auth');
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
	echo '<h2>' . __('Login') . '</h2>';
	echo '<p>' . __('Please enter your email and password') . '</p>';
	echo $this->Form->input('email', array('placeholder' => 'Email'));
	echo $this->Form->input('password', array('placeholder' => 'Password'));
	echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'button-primary'));
	echo $this->Form->end();
?>
