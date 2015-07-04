<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<h1 class="page-header-title">Bushwalks</h1>
		</div>
	</div>
</section>

<section class="tiles">
	<div class="container">
		<div class="row">

			<?php foreach ($walks as $walk) : ?>
				
				<div class="column-1-3 column-small-1-2 column-xlarge-1-4">
					<article class="tile">
						<header class="tile-header">
							<h3 class="tile-title"><?php echo $walk['Walk']['name']; ?></h3>
							<h4 class="tile-subtitle"><?php echo $walk['Walk']['owner']; ?></h4>
						</header>
						<div class="tile-content">
							<dl>
								<?php if (!empty($walk['Walk']['category'])) : ?>
									<dt>Category</dt>
									<dd><?php echo $walk['Walk']['category']; ?></dd>
								<?php endif; ?>
								<?php if (!empty($walk['Walk']['type'])) : ?>
									<dt>Type</dt>
									<dd><?php echo $walk['Walk']['type']; ?></dd>
								<?php endif; ?>
								<?php if (!empty($walk['Walk']['group'])) : ?>
									<dt>Group</dt>
									<dd><?php echo $walk['Walk']['group']; ?></dd>
								<?php endif; ?>
							</dl>
						</div>
						<footer class="tile-footer">
							<?php 
								echo $this->Html->link(
									'View Walk' . $this->element('icon', array('name' => 'angle-right')),
									'/walks/' . $walk['Walk']['id'],
									array(
										'class' => 'button button-primary button-action',
										'escape' => false,
									)
								);
							?>
						</footer>
					</article>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</section>