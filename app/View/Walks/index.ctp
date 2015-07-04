<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<h1 class="page-header-title">Bushwalks</h1>
		</div>
	</div>
</section>

<section class="tabs">
	<div class="container">
		<div class="button-group-block">
			<div class="button-group">
				<button class="active">All</button>
			</div>
			<div class="button-group">
				<button>Grade 1</button>
			</div>
			<div class="button-group">
				<button>Grade 2</button>
			</div>
			<div class="button-group">
				<button>Grade 3</button>
			</div>
			<div class="button-group">
				<button>Grade 4</button>
			</div>
			<div class="button-group">
				<button>Grade 5</button>
			</div>
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