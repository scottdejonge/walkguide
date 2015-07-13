<?php 
	echo $this->Form->create('Rating', array(
		'url' => '/ratings/add',
		'id' => 'rating-form',
		'class' => 'rating-form',
		'data-rating-form' => $average,
		'inputDefaults' => array(
			//'div' => false,
			'required' => false,
		)
	));

	echo $this->Form->hidden(
		'walk_id', array(
			'value' => isset($walk['Walk']['id']) ? $walk['Walk']['id'] : null,
		)
	);

	echo $this->Form->hidden(
		'user_id', array(
			'value' => $userData['id'],
		)
	);
?>

<?php for ($i = 5; $i > 0; $i--) : ?>
	<span <?php echo ($i <= $average) ?'class="checked"' : ''; ?>>
		<label for="rating-<?php echo $i ?>">
			<input type="radio" name="data[Rating][rating]" id="rating-<?php echo $i ?>" value="<?php echo $i ?>">
			<?php echo $this->element('icon', array('name' => 'star')); ?>
		</label>
	</span>
<?php endfor; ?>	

<?php
	echo $this->Form->end();
?>