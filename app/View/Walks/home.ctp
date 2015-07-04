<section class="hero">
	<div class="hero-inner">
		<h1 class="hero-title">Walk Guide</h1>
		<p class="hero-lead lead">Explore Queensland's bushwalks.</p>
		<?php 
			echo $this->Html->link(
				'Explore Walks' . $this->element('icon', array('name' => 'angle-right', 'class' => 'icon-white')),
				'/walks/',
				array(
					'class' => 'button button-primary button-action',
					'escape' => false,
				)
			);
		?>
	</div>
</section>

<section class="tiles">
	<div class="container">
		<h2 class="title">Featured Walks</h2>
		<?php
			foreach ($featured as $walk) {
				echo $this->element('tile', array('walk' => $walk));
			}
		?>
		<h2 class="title">Highest Rated Walks</h2>
		<?php
			foreach ($featured as $walk) {
				echo $this->element('tile', array('walk' => $walk));
			}
		?>
	</div>
</section>