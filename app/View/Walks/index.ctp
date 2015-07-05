<?php

	// Page settings
	$this->set('title_for_layout', 'Walks');

?>
<section class="page-header">
	<div class="container">
		<div class="page-header-content">
			<h1 class="page-header-title">Walks</h1>
		</div>
	</div>
</section>

<!-- <section class="tabs">
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
</section> -->

<section class="tiles">
	<div class="container">
		<?php

			if ($walks) {

				foreach ($walks as $walk) {
					echo $this->element('tile', array('walk' => $walk));
				}

				// Pagination
				echo '<div class="pagination">';

					// echo $this->Paginator->first(
					// 	$this->element('icon', array('name' => 'arrow-back')),
					// 	array('escape' => false)
					// );

					if( $this->Paginator->hasPrev()) {
						echo $this->Paginator->prev(
							$this->element('icon', array('name' => 'angle-left')),
							array('escape' => false)
						);
					}

					echo $this->Paginator->numbers(array(
						'modulus' => 2,
						'separator' => '',
						'currentClass' => 'active',
					));

					if ($this->Paginator->hasNext()) {
						echo $this->Paginator->next(
							$this->element('icon', array('name' => 'angle-right')),
							array('escape' => false)
						);
					}
					// echo $this->Paginator->last(
					// 	$this->element('icon', array('name' => 'arrow-forward')),
					// 	array('escape' => false)
					// );

				echo '</div>';

			} else {
				echo 'No Walks found.';
			}
		?>
	</div>
</section>