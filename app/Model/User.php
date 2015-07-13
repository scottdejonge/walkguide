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
	 * Static Data
	 */
	
	public function getAvatarIconList() {
		return array(
			'person' => 'Person',
			'flower' => 'Flower',
			'walk' => 'Walk',
			'run' => 'Run',
			'bike' => 'Bike',
			'camera' => 'Camera',
			'landscape' => 'Landscape',
		);
	}

	public function getAvatarColorList() {
		return array(
			'#2ECC71' => 'Green',
			'#3498DB' => 'Blue',
			'#9B59B6' => 'Purple',
			'#E74C3C' => 'Red',
			'#F1C40F' => 'Yellow',
		);
	}


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