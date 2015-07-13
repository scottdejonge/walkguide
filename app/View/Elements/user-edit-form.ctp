<?php
	
	// Variables
	$model = ClassRegistry::init('User');
	$icons = $model->getAvatarIconList();
	$colors = $model->getAvatarColorList();
	
	// Form
	echo $this->Session->flash('auth');
	echo $this->Form->create('User', array(
		'inputDefaults' => array(
			'styledControl' => true,
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
	echo $this->Form->input('avatar_icon', array('options' => $icons, 'label' => 'Avatar icon'));
	echo $this->Form->input('avatar_color', array(
		'type' => 'radio',
		'before' => '<label>Avatar Color</label>',
		'legend' => false,
		'class' => 'radio-btn',
		'options' => $colors,
		'value' => 'Green'
	));
	echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'button-primary'));
	echo $this->Form->end();
?>