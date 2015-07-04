<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			// Meta
			echo $this->Html->charset('utf-8');
			echo $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1'));
			echo $this->Html->meta(array('name' => 'apple-mobile-web-app-title', 'content' => h(Configure::read('Site.Name'))));
			echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'));
			echo $this->Html->meta(array('name' => 'description', 'content' => h(Configure::read('Site.Description'))));
			
			//Title
			echo '<title>' . h(Configure::read('Site.Name')) . ' - ' . h($title_for_layout) . '</title>';
			
			// Open Graph
			echo $this->Html->meta(array('property' => 'og:site_name', 'type' => 'meta', 'content' => h(Configure::read('Site.Name')), 'rel' => null));
			echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' => h(Router::url($this->here, true)), 'rel' => null));
			echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => 'website', 'rel' => null));
			echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => h($title_for_layout), 'rel' => null));
			if (isset($og_image)) {
				echo $this->Html->meta(array('property' => 'og:image', 'type' => 'meta', 'content' => Router::url($og_image, true), 'rel' => null));
			} else {
				echo $this->Html->meta(array('property' => 'og:image', 'type' => 'meta', 'content' => Router::url('/assets/img/hero.jpg', true), 'rel' => null));
			}
			if (isset($og_description)) {
				echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' => h($og_description), 'rel' => null));
			}
			echo $this->fetch('meta');
			
			// Favicon
			echo $this->Html->meta(
				'favicon',
				'/assets/ico/favicon.ico',
				array('type' => 'icon')
			);
			echo $this->Html->meta(
				'favicon',
				'/assets/ico/favicon.ico',
				array('type' => 'shortcut icon')
			);

			// Styles
			echo $this->Html->css('/generated/styles/styles.css', array('inline' => false));
			echo $this->fetch('css');

			// Scripts
			echo $this->Html->script('/lib/svg4everybody.min.js');

			// Google Maps API 
			if (isset($googleMaps)) {
				$this->Html->script('https://maps.google.com/maps/api/js?sensor=true', false);
			}
		?>
	</head>
	<body>
		<?php
			echo $this->fetch('content');
		?>
	</body>
	
	<?php
		// Scripts
		echo $this->Html->script('/generated/scripts/scripts.js', array('inline' => false));
		echo $this->fetch('script');
	?>
</html>