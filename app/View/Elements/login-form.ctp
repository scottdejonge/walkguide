<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User');
	echo '<h3>' . __('Please enter your email and password') . '</h3>';
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'button-primary'));
	echo $this->Form->end();
?>