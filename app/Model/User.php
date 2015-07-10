<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {


	/**
	 * Relationships
	 */

	public $hasMany = array(
		
	);


	/**
	 * Validation
	 */

	public $validate = array(
		'first_name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a first name'
			)
		),
		'last_name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a last name'
			)
		),
		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter an email address'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a password'
			)
		),
	);


	/**
	 * Callbacks
	 */

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}