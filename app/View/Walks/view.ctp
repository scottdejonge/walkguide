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
		</div>
	</div>
</section>

<section class="details">
	<div class="container">
		<div class="row">
			<div class="column-1-3 column-small-1-2 column-push-2-3 column-push-small-1-2 gutter-bottom">
				<section class="widget">
					<button class="button-large button-block">Favourite</button>
					<?php
						if ($loggedIn) {
							echo $this->element('rating-form', array('walk' => $walk, 'average' => $average));
						} else {
							echo $this->element('rating-form', array('walk' => $walk, 'average' => $average));
						}
					?>
					<div class="button-group button-group-block">
						<div class="button-group">
							<button class="button-large">Media</button>
						</div>
						<div class="button-group">
							<button class="button-large">Comments</button>
						</div>
					</div>
				</section>
			</div>
			<div class="column-2-3 column-small-1-2 column-pull-1-3 column-pull-small-1-2">
				<h3>Description</h3>
				<p>Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Curabitur blandit tempus porttitor.</p>
				<h3>Details</h3>
				<dl>
					<dt>Distance</dt>
					<dd>2km</dd>
					<dt>Duration</dt>
					<dd>2 hours</dd>
					<dt></dt>
					<dd></dd>
					<dt></dt>
					<dd></dd>
				</dl>
			</div>
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