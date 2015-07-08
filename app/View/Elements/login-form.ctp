<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User');
	echo '<h3>' . __('Please enter your email and password') . '</h3>';
	echo $this->Form->input('email', array('placeholder' => 'Email'));
	echo $this->Form->input('password', array('placeholder' => 'Password'));
	echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'button-primary'));
	echo $this->Form->end();
?>