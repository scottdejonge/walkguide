<?php
	
	// View Variables
	$name = (!empty($walk['Walk']['name'])) ? $walk['Walk']['name'] : '';
	$owner = (!empty($walk['Walk']['owner'])) ? $walk['Walk']['owner'] : '';
	$region = (!empty($walk['Walk']['region'])) ? $walk['Walk']['region'] : '';
	$category = (!empty($walk['Walk']['category'])) ? $walk['Walk']['category'] : '';
	$type = (!empty($walk['Walk']['type'])) ? $walk['Walk']['type'] : '';
	$group = (!empty($walk['Walk']['group'])) ? $walk['Walk']['group'] : '';

	// Page settings
	$this->set('title_for_layout', $name);

	//Google Maps API
	$this->set('googleMaps', true);

?>

<header class="header">
	<div class="container">
		<?php 
			echo $this->Html->link(
				$this->element('icon', array('name' => 'arrow-back')) . '<span class="hidden-xsmall">Back to Walks</span>',
				'/walks/',
				array(
					'class' => 'button header-button',
					'escape' => false,
				)
			);
		?>
		<div class="header-controls button-group right">
			<a class="button header-button" href="#">
				<?php echo $this->element('icon', array('name' => 'person')); ?>
				<span class="hidden-xsmall">Profile</span>
			</a>
		</div>
	</div>
</header>

<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<?php if (!empty($walk['Walk']['grade'])) : ?>
				<svg class="page-header-icon" viewBox="0 0 44 44">
					<use xlink:href="/assets/icons/grades.svg#icon-grade-<?php echo $walk['Walk']['grade'] ?>"></use>
				</svg>
			<?php endif; ?>
			<h1 class="page-header-title"><?php echo $name; ?></h1>
			<h2 class="page-header-subtitle"><?php echo $owner; ?></h2>
			<p><?php echo $category . '. ' . $type . '. ' . $region . '. '.  $group ?></p>
			<div class="rating">
				<?php
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star-half', 'class' => 'icon-white'));
				?>
			</div>
		</div>
	</div>
</section>

<section class="map">
	<div class="map-canvas" data-map data-map-polyline="<?php echo $walk['Walk']['geometry']; ?>"></div>
</section>

<!-- <section class="tabs">
	<div class="container">
		<div class="button-group-block">
			<div class="button-group">
				<button class="active">All</button>
			</div>
			<div class="button-group">
				<button>Ratings</button>
			</div>
			<div class="button-group">
				<button>Comments</button>
			</div>
			<div class="button-group">
				<button>Photos</button>
			</div>
			<div class="button-group">
				<button>Videos</button>
			</div>
		</div>
	</div>
</section> -->

<section class="comments">
	<div class="container">

		<h2 class="title">Review <?php echo $name ?></h2>
		<?php
			echo $this->element('comment-form', array('walk_id' => $walk['Walk']['id']));
			echo $this->element('comments', array('comments' => $walk['Comment']));
		?>
	</div>
</section>