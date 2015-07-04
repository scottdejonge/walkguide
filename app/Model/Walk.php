<?php

class Walk extends AppModel {

	public $hasMany = array(
		'Comment' => array(
			'conditions' => array(
				
			),
		),
	);
}