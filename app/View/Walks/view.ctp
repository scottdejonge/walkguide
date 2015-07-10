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

<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<?php if (!empty($walk['Walk']['grade'])) : ?>
				<svg class="page-header-icon" viewBox="0 0 44 44">
					<use xlink:href="/assets/icons/grades.svg#icon-grade-<?php echo $walk['Walk']['grade'] ?>"></use>
				</svg>
			<?php endif; ?>
			<h1 class="page-header-title"><?php echo $name; ?></h1>
			<h2 class="page-header-subtitle"><?php echo $type; ?></h2>
			<h3>
				<?php
					echo (!empty($walk['Walk']['region'])) ? $walk['Walk']['region'] . '. ' : '';
					echo (!empty($walk['Walk']['owner'])) ? $walk['Walk']['owner'] . '. ' : '';
					echo (!empty($walk['Walk']['group'])) ? $walk['Walk']['group'] . '. ' : '';
				?>
			</h3>
			<?php echo $this->element('rating-form', array('walk' => $walk, 'average' => $average)); ?>
		</div>
	</div>
</section>

<section class="map">
	<div class="map-canvas" data-map data-walk-id="<?php echo $walk['Walk']['id']; ?>"></div>
</section>

<section class="comments" data-ajax-form-target="comment-form">
	<div class="container">
		<?php
			echo $this->element('comments', array('comments' => $comments));

			if ($loggedIn) {
				echo $this->element('comment-form', array('walk_id' => $walk['Walk']['id']));
			} else {
				echo '<p class="text-center">' . __('You must be ' . $this->Html->link('logged in', array('controller' => 'users', 'action' => 'login')) . ' in to post a comment.') . '</p>';
			}
		?>
	</div>
</section>