<header class="header">
	<div class="container no-gutter">
		<nav class="navigation left">
			<ul>
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<a href="/walks/">Walks</a>
				</li>
				<li>
					<a href="/about/">About</a>
				</li>
			</ul>
		</nav>
		<nav class="navigation right">
			<ul>
				<li>
					<?php
						if (!$loggedIn) {
							echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
						}
					?>
				</li>
				<li>
					<?php
						if ($loggedIn) {
							echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'profile'));
						} else {
							echo $this->Html->link('Sign Up', array('controller' => 'users', 'action' => 'signup'));
						}
					?>
				</li>
				<li>
					<?php
						if (!$loggedIn) {
							echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
						}
					?>
				</li>
			</ul>
		</nav>
	</div>
</header>