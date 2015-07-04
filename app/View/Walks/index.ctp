<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<h1 class="page-header-title">Bushwalks</h1>
		</div>
	</div>
</section>

<section class="tiles">
	<div class="container">
		<?php
			foreach ($walks as $walk) {
				echo $this->element('tile', array('walk' => $walk));
			}
		?>
	</div>
</section>