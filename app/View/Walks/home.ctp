<?php

	// Page settings
	$this->set('title_for_layout', 'Walk Guide');

?>
<section class="hero">
	<video class="hero-video" muted="muted" preload="auto" autoplay="autoplay" loop="loop" poster="/assets/video/hero.jpg">
		<source src="/assets/video/hero.mp4" type="video/mp4">
	</video>
	<div class="hero-inner">
		<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 200 200" enable-background="new 0 0 200 200">
			<path fill="#00D872" d="M165 200h-130c-19.2 0-35-15.8-35-35v-130c0-19.2 15.8-35 35-35h130c19.2 0 35 15.8 35 35v130c0 19.2-15.7 35-35 35z"/>
			<g fill="#fff">
				<path d="M71.6 104.2c2.5-.1 3.8-1.6 4.2-4.4l.6-17.2 6-6.5-2.6 47.7-8.8 23.1c-.5 1.1-.6 2.1-.5 3 .5 4.5 2.9 6.6 7.3 6.2 2.7-.5 4.5-1.9 5.5-4.5l9.6-24.8c.6-1.3.8-2.3.7-3.1l1-15.3 14.8 10.8 8.5 20.2c1.3 3.2 3.6 4.7 6.8 4.5 4.5-.5 6.5-3 6-7.5l-.1-.4c0-.1-.1-.4-.1-.8l-9.3-22c-.3-.7-1-1.7-1.5-2.1l-18.4-15.1 1.3-20 4.8 6.5c.6.7 1 1.1 1.2 1.2l16.4 7.6c5.9 2.5 8.8-5.7 3.5-8.1l-14.9-7.1-12.8-17.7c-2.7-2.6-5.5-3.7-8.4-3.5-2.6.2-4.8 1.2-6.5 3.1l-17 19.1c-.6.9-1 1.7-1 2.3 0 0-1.1 18.5-1.2 19.8-.2 3.8 1.9 5.2 4.9 5zM169.5 139.4c-.2-1.5-1.7-2.8-3.2-2.3-10.1 3.4-29 9-31.8 9.1-3.1.1-7.8.5-13.3.9-1.6.1-3.3.3-5 .4l-7 .5-1.5.1c-8.6.5-9.8.9-13.5 6.7-2.5 3.9-8.9 4.4-11.6 4.5-6.3.2-1.7.1-2.2.1-.6 0-2.8.1-5.9.2l-10.4.3c-7.2.2-28.3 1.7-30.8 1.8-1.6 0-2.8 1.3-2.7 2.9 0 1.6 1.3 2.8 2.9 2.7 0 0 44.9-2.2 47.2-2.3.5 0-3.3.2 2.2-.1 7.2-.3 13-2 15.7-6.4 2.9-4.7 5.1-4.6 9.5-4.8 4.4-.3 9.2-.6 13.6-1 5.2-.4 10-.8 13-.9 4.7-.1 32.5-9.2 32.5-9.2 1.4-.3 2.5-1.7 2.3-3.2z"/>
				<circle cx="98.8" cy="42.8" r="10"/>
			</g>
		</svg>
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
		<?php
			echo '<h2 class="title">' . __('Featured') . '</h2>';
			foreach ($featured as $walk) {
				echo $this->element('tile', array('walk' => $walk));
			}
		?>
	</div>
</section>

<section class="tiles">
	<div class="container">
		<?php
			echo '<h2 class="title">' . __('Highest Rated') . '</h2>';
			foreach ($featured as $walk) {
				echo $this->element('tile', array('walk' => $walk));
			}
		?>
	</div>
</section>

<section class="sign-up">
	<div class="container">
		<?php echo $this->element('user-add-form'); ?>
	</div>
</section>