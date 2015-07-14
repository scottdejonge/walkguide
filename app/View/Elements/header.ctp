<?php

	$navigation = array(
		$this->Html->link('Home', array(
			'controller' => 'walks',
			'action' => 'home'
		)),
		$this->Html->link('Walks', array(
			'controller' => 'walks',
			'action' => 'index'
		)),
		$this->Html->link('About', array(
			'controller' => 'pages',
			'action' => 'display', 'about'
		))
	);

	$user_avatar = $this->element('avatar') . '<span class="hidden-small-down">' . $userData['first_name'] . ' ' . $userData['last_name'] . '</span>';

	$user_navigation = array(
		$this->Html->link($user_avatar, array(
			'controller' => 'users',
			'action' => 'view'
		), array(
			'class' => 'navigation-user',
			'escape' => false
		)) => array(
			$this->Html->link('Settings', array(
				'controller' => 'users',
				'action' => 'edit'
			)),
			$this->Html->link('Logout', array(
				'controller' => 'users',
				'action' => 'logout'
			))
	));

	$user_login = array(
		$this->Html->link('Login', array(
			'controller' => 'users',
			'action' => 'login'
		))
	);

?>

<header class="header">
	<div class="container no-gutter">
		<nav class="navigation left">
			<?php echo $this->Html->nestedList($navigation); ?>
		</nav>
		<nav class="navigation right">
			<?php
				if ($loggedIn) {
					echo $this->Html->nestedList($user_navigation);
				} else {
					echo $this->Html->nestedList($user_login);
				}	
			?>
		</nav>
	</div>
</header>