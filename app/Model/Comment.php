<?php

class Comment extends AppModel {


	/**
	 * Relationships
	 */

	public $belongsTo = 'User';
	
	
	/**
	 * Validation
	 */

	public $validate = array(
		'first_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your first name'
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your last name'
		),
		'email' => array(
			'rule' => array('email', true),
			'message' => 'Please enter your email'
		),
		'comment' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter your comment'
		),
	);
}