<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Walk Guide</title>
	<link rel="stylesheet" type="text/css" href="/generated/styles/styles.css" />
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
</head>
<body>

	

	<script type="text/javascript" src="/generated/scripts/scripts.js"></script>
</body>
</html>

<?php

	// Browser Detection
	$is_ie = preg_match('/msie\s*([\d.]+)/i', env('HTTP_USER_AGENT'), $ie_version);
	$ie_version = ($is_ie? (float)($ie_version[1]): 0);
	
?><!DOCTYPE html>
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
		?>
	</head>
	<body>
		<?php
			echo $this->fetch('content');
			//echo $this->element('navigation');
		?>
	</body>
	
	<?php
		// Scripts
		echo $this->Html->script('/generated/scripts/scripts.js', array('inline' => false));
		echo $this->fetch('script');
	?>
</html>