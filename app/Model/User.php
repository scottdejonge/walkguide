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
				'message' => 'A first name is required'
			)
		),
		'last_name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A last name is required'
			)
		),
		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'An email address is required'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required'
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