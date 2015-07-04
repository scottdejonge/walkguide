<article class="tile">
	<header class="tile-header">
		
	</header>
	<div class="tile-content">
		<h3 class="tile-title"><?php echo $walk['Walk']['name']; ?></h3>
		<h4 class="tile-subtitle"><?php echo $walk['Walk']['owner']; ?></h4>
	</div>
	<footer class="tile-footer">
		<?php 
			echo $this->Html->link(
				'View Walk' . $this->element('icon', array('name' => 'angle-right', 'class' => 'icon-white')),
				'/walks/' . $walk['Walk']['id'],
				array(
					'class' => 'button button-primary button-action',
					'escape' => false,
				)
			);
		?>
	</footer>
</article>