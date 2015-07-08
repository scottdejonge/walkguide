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
}