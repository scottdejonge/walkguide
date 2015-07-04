<?php
	
	// View Variables
	$name = (!empty($walk['Walk']['name'])) ? $walk['Walk']['name'] : '';
	$owner = $walk['Walk']['owner'];

	$category = (!empty($walk['Walk']['category'])) ? $walk['Walk']['category'] : '';
	$type = (!empty($walk['Walk']['type'])) ? $walk['Walk']['type'] : '';
	$group = (!empty($walk['Walk']['group'])) ? $walk['Walk']['group'] : '';

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
			<h1 class="page-header-title"><?php echo $name; ?></h1>
			<h2 class="page-header-subtitle"><?php echo $owner; ?></h2>
			<p><?php echo $category . '. ' . $type . '. ' . $group ?></p>
			<div class="rating">
				<?php
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white'));
					echo $this->element('icon', array('name' => 'star-half', 'class' => 'icon-white'));
				?>
			</div>
			<button class="button button-secondary">
				<?php echo $this->element('icon', array('name' => 'star', 'class' => 'icon-white')); ?>
				<span class="hidden-xsmall">Favourite</span>
			</button>
		</div>
		
	</div>
</section>

<section class="map">
	<div class="map-canvas" data-map></div>
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

<section class="form-wrapper">
	<div class="container">
		<h2 class="title">Review <?php echo $name ?></h2>
		<?php 
			echo $this->Form->create('Comment', array(
				'url' => '/comments/add',
				'id' => 'comment-form',
				'data-ajax-form' => '',
				'data-ajax-form-target' => 'comment-form',
				'inputDefaults' => array(
					'div' => false,
					'error' => array(
						'class' => 'error',
						'attributes' => array(
							'wrap' => 'p',
							'class' => 'form-message error',
						)
					)
				)
			));

			echo $this->Form->input(
				'first_name', array(
					'placeholder' => 'William',
					'type' => 'text',
				)
			);
		
			echo $this->Form->input(
				'last_name', array(
					'placeholder' => 'Shakespeare',
					'type' => 'text',
				)
			);
			
			echo $this->Form->input(
				'email', array(
					'placeholder' => 'w.shakespeare@email.com',
					'type' => 'text',
				)
			);

			echo $this->Form->input(
				'comment', array(	
					'type' => 'textarea',
					'placeholder' => 'Tell us your story',
					'rows' => '5',
				)
			);
			
			echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'button button-block button-primary')); 
			
			echo $this->Form->end();
		?>

	</div>
</section>

<section class="posts">
	<div class="container">

		<article class="post">

			<figure class="post-image">
				<?php echo $this->element('icon', array('name' => 'flower')); ?>
			</figure>
			
			<div class="post-content">
				<header class="post-header">
					<h3 class="post-title">John Doe</h3>
				</header>
				<div class="rating">
					<?php
						echo $this->element('icon', array('name' => 'star'));
						echo $this->element('icon', array('name' => 'star'));
						echo $this->element('icon', array('name' => 'star'));
						echo $this->element('icon', array('name' => 'star'));
						echo $this->element('icon', array('name' => 'star-half'));
					?>
				</div>
				<footer class="post-footer">
					
				</footer>
			</div>
			
		</article>

		<article class="post">

			<figure class="post-image">
				<?php echo $this->element('icon', array('name' => 'flower')); ?>
			</figure>
			
			<div class="post-content">
				<header class="post-header">
					<h3 class="post-title">John Doe</h3>
				</header>
				<p>Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
				<footer class="post-footer">
					
				</footer>
			</div>
			
		</article>
	

		<article class="post">

			<figure class="post-image">
				<?php echo $this->element('icon', array('name' => 'flower')); ?>
			</figure>
			
			<div class="post-content">
				<header class="post-header">
					<h3 class="post-title">John Doe</h3>
				</header>
				<div class="media media-4-3">

				</div>
				<footer class="post-footer">
					
				</footer>
			</div>
			
		</article>
	
		<article class="post">

			<figure class="post-image">
				<?php echo $this->element('icon', array('name' => 'flower')); ?>
			</figure>
			
			<div class="post-content">
				<header class="post-header">
					<h3 class="post-title">John Doe</h3>
				</header>
				<div class="media media-16-9">

				</div>
				<footer class="post-footer">
					
				</footer>
			</div>
			
		</article>
	
	</div>
</section>