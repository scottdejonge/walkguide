<?php

class Comment extends AppModel {


	/**
	 * Relationships
	 */

	public $belongsTo = array(
		'User',
		'Walk',
	);


	/**
	 * Validation
	 */

	public $validate = array(
		'comment' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your comment'
		),
	);
}