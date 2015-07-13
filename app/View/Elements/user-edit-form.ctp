<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User', array(
		'inputDefaults' => array(
			'div' => false,
			'error' => array(
				'attributes' => array(
					'wrap' => 'p',
					'class' => 'form-message error'
				),
			),
		)
	));

	echo '<h2>' . __('Settings') . '</h2>';
	echo $this->Form->input('first_name', array('placeholder' => 'First Name'));
	echo $this->Form->input('last_name', array('placeholder' => 'Last Name'));
	echo $this->Form->input('email', array('placeholder' => 'Email'));
	echo $this->Form->input('password', array('placeholder' => 'Password'));
	echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'button-primary'));
	
	echo '<hr>';

	echo '<h2>' . __('Avatar') . '</h2>';

	$avatar_icons = array(
		'flower' => 'Flower',
	);

	echo $this->Form->input('avatar_icon', array('options' => $avatar_icons));
	echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'button-primary'));

	echo '<hr>';

	echo '<h2>' . __('Theme') . '</h2>';

	$colors = array(
		'#2ECC71' => 'Green',
		'#3498DB' => 'Blue',
		'#9B59B6' => 'Purple',
		'#E74C3C' => 'Red',
		'#F1C40F' => 'Yellow',
	);
	echo $this->Form->radio('avatar_color', $colors, array('legend' => false));
	echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'button-primary'));

	echo $this->Form->end();
	
?>