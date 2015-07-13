<?php

class Walk extends AppModel {


	/**
	 * Relationships
	 */

	public $hasMany = array(
		'Comment',
		'Rating',
	);


	/**
	 * Save Callbacks
	 */

	public function afterSaveAll($result) {
		//$this->Rating->updateAllAverageRatings();
	}

	
	/**
	 * Methods
	 */

	public function getWalkComments($id) {
		$comments = $this->Comment->find('all', array(
			'conditions' => array(
				'walk_id' => $id,
			),
			'contain' => array(
				'User' => array(
					'id',
					'last_name',
					'first_name',
					'avatar_icon',
					'avatar_color',
				),
			),
		));

		return $comments;
	}
}