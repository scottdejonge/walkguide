<?php 
	echo $this->Form->create('Rating', array(
		'url' => '/ratings/add',
		'id' => 'rating-form',
		'class' => 'rating-form',
		'data-rating-form' => '',
		'inputDefaults' => array(
			'div' => false,
			'required' => false,
		)
	));
?>
	
<?php for ($i = 5; $i > 0; $i--) : ?>
	<span>
		<label for="rating-<?php echo $i ?>">
			<input type="radio" name="rating" id="rating-<?php echo $i ?>" value="<?php echo $i ?>" hidden>
			<?php echo $this->element('icon', array('name' => 'star')); ?>
		</label>
	</span>
<?php endfor; ?>	

<?php
	echo $this->Form->end();
?>