<article class="tile">
	
	<?php if (!empty($walk['Walk']['grade'])) : ?>
		<header class="tile-header">
			<svg class="tile-icon" viewBox="0 0 44 44">
				<use xlink:href="/assets/icons/grades.svg#icon-grade-<?php echo $walk['Walk']['grade'] ?>"></use>
			</svg>
		</header>
	<?php endif; ?>

	<div class="tile-content">
		<h3 class="tile-title">
			<?php echo $walk['Walk']['name']; ?><br>
			<small><?php echo $walk['Walk']['owner']; ?> <?php echo $walk['Walk']['region']; ?></small>
		</h3>
	</div>
	<footer class="tile-footer">
		<?php 
			echo $this->Html->link(
				'<span class="hidden-xsmall">View Walk</span>' . $this->element('icon', array('name' => 'angle-right', 'class' => 'icon-white')),
				'/walks/' . $walk['Walk']['id'],
				array(
					'class' => 'button button-primary button-action',
					'escape' => false,
				)
			);
		?>
	</footer>
</article>