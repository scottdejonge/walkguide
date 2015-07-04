<header class="header">
	<div class="container">
		<button class="header-button">
			<?php echo $this->element('icon', array('name' => 'arrow-back')); ?>
			<span class="hidden-xsmall">Back to results</span>
		</button>
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
			<h1 class="page-header-title">Walk Name</h1>
			<h2 class="page-header-subtitle">National Park</h2>
			<div class="rating">
				<?php
					echo $this->element('icon', array('name' => 'star'));
					echo $this->element('icon', array('name' => 'star'));
					echo $this->element('icon', array('name' => 'star'));
					echo $this->element('icon', array('name' => 'star'));
					echo $this->element('icon', array('name' => 'star-half'));
				?>
			</div>
			<button class="button button-secondary">
				<?php echo $this->element('icon', array('name' => 'star')); ?>
				<span class="hidden-xsmall">Favourite</span>
			</button>
		</div>
		
	</div>
</section>

<section class="map">
	<div class="map-canvas" data-map></div>
</section>

<section class="tabs">
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