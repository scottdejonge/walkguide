<?php

class Rating extends AppModel {


	/**
	 * Relationships
	 */

	public $belongsTo = array(
		'User',
		'Walk',
	);
	
	
	/**
	 * Save Callbacks
	 */
		
	public function updateAllAverageRatings() {
		// $sql = "UPDATE ratings c
		// 		SET average_rating = (
		// 			SELECT COUNT(projects.id)
		// 			FROM commodities_projects
		// 				LEFT JOIN projects ON commodities_projects.project_id = projects.id
		// 			WHERE
		// 				commodities_projects.commodity_id = c.id AND
		// 				projects.published = 1 AND
		// 				projects.archived = 0
		// 		)";
		// $this->query($sql);
	}
}