<?php

	$user = $this->session->read('Auth.User');
	$username = $user['first_name'] . ' ' . $user['last_name'];

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

	$user_navigation = array(
		$this->Html->link($username, array(
			'controller' => 'users',
			'action' => 'view'
		)) => array(
			$this->Html->link('Edit Profile', array(
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
		)),
		$this->Html->link('Sign Up', array(
			'controller' => 'users',
			'action' => 'add'
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