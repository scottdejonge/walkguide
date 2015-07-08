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
						if ($loggedIn) {
							echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'view'));
						} else {
							echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
						}
					?>
				</li>
			</ul>
		</nav>
	</div>
</header>