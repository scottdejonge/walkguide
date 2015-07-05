<?php

class Walk extends AppModel {

	public $hasMany = array(
		'Comment',
		'Rating',
	);
}