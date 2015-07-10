<?php

App::uses('AppController', 'Controller');

class WalksController extends AppController {
	

	/**
	 * Views
	 */

	public function home() {

		$featured = $this->Walk->find('all', array(
			'limit' => 4,
			'contain' => array(
				'name',
				'owner',
				'category',
				'type',
				'group',
			),
			'conditions' => array(
				'Walk.featured' => 1,
			),
		));

		$rated = $this->Walk->find('all', array(
			'limit' => 4,
			'contain' => array(
				'name',
				'owner',
				'category',
				'type',
				'group',
				'Rating',
			),
			'conditions' => array(
				'Walk.featured' => 1,
			),
		));

		$this->set(compact('featured', 'rated'));
	}

	public function index() {
		$this->paginate = array(
			'limit' => 20,
			'contain' => array(
				'name',
				'owner',
				'category',
				'type',
				'group',
			),
			'conditions' => array(
				'not' => array('Walk.name' => null),
				'Walk.type' => 'Walking Track',
			),
			'order' => array('id' => 'desc')
		);

		$walks = $this->paginate('Walk');

		$this->set(compact('walks'));
	}

	public function view() {
		$walk_id = $this->request->params['id'];

		$walk = $this->Walk->find('first', array(
			'conditions' => array(
				'Walk.id' => $walk_id,
			),
			'contain' => array(
				'Rating',
			),
		));

		$comments = $this->Walk->getWalkComments($walk_id);

		// Get Average Rating
		$ratings = array();

		foreach ($walk['Rating'] as $rating) {
			array_push($ratings, $rating['rating']);
		}

		if (!empty($walk['Rating'])) {
			$average = round(array_sum($ratings) / count($ratings));
		} else {
			$average = 0;
		}

		if (!$walk) {
			throw new NotFoundException();
		}

		$this->set(compact('walk', 'comments', 'average'));
	}

	public function kml() {
		$walk = $this->Walk->find('first', array(
			'conditions' => array(
				'Walk.id' => $this->request->params['id'],
			),
			'contain' => array(
				'Walk.geometry',
			),
		));

		if (!$walk) {
			throw new NotFoundException();
		}

		$this->set(compact('walk'));
		
		$this->response->type("application/vnd.google-earth.kml+xml");
		$this->render('kml/kml', 'xml');
	}


	/**
	 * Functions
	 */

	// Updated Null
	public function points() {
		$success = true;
		$records = 0;
		$rows = 0;

		//echo 'Disabled'; exit;

		$walks = $this->Walk->find('all', array(
			'contain' => array(
				'id',
				'geometry',
			),
		));

		foreach ($walks as $walk) {
			$geometry = $walk['Walk']['geometry'];

			if ((stripos($geometry, '<LineString><coordinates>') !== false)) {
				preg_match('~<coordinates>([^,]+)~', $geometry, $matches);
				pr(h($matches));
				$start_lng = $matches[0];
				echo h($start_lng);
				preg_match('/([^,0]+)/', $geometry, $matches);
				pr(h($matches));
				$start_lat = $matches[0];
				echo h($start_lat);
			}

			echo '<hr>';

			pr(h($walk['Walk']['geometry'])); die;

			
							
			// if ($this->Walk->save($walk)) {
			// 	$records++;
			// } else {
			// 	$success = false;
			// }
		}

		echo ($success ? 'Success. ' : 'Failed. ');
		echo $records . ' records created.';
		
		exit;
	}

	// Updated Null
	public function null() {
		$success = true;
		$records = 0;
		$rows = 0;

		echo 'Disabled'; exit;

		$walks = $this->Walk->find('all', array(
			'contain' => array(
				'id',
				'name',
			),
		));

		foreach ($walks as $walk) {
			$name = $walk['Walk']['name'];

			if ($name == '') {
				$name = null;
			}

			echo $name;
			echo '<hr>';

			$walk['Walk']['name'] = $name;

			//pr($walk); die;
							
			if ($this->Walk->save($walk)) {
				$records++;
			} else {
				$success = false;
			}
		}

		echo ($success ? 'Success. ' : 'Failed. ');
		echo $records . ' records created.';
		
		exit;
	}

	// Groups to Grade
	public function grades() {
		$success = true;
		$records = 0;
		$rows = 0;

		echo 'Disabled'; exit;

		$walks = $this->Walk->find('all', array(
			'contain' => array(
				'id',
				'group',
				'grade',
			),
		));

		foreach ($walks as $walk) {
			$group = $walk['Walk']['group'];

			if ((stripos($group, 'Track Class') !== false)) {
				echo $group . '<br>';
				preg_match('/\d+/', $group, $matches);
				$grade = $matches[0];
			} else {
				$grade = null;
				echo 'No Group' . '<br>';
			}

			echo $grade;
			echo '<hr>';

			$walk['Walk']['grade'] = $grade;

			//pr($walk); die;
							
			if ($this->Walk->save($walk)) {
				$records++;
			} else {
				$success = false;
			}
		}

		echo ($success ? 'Success. ' : 'Failed. ');
		echo $records . ' records created.';
		
		exit;
	}
	
	// Imports Walk Data from CSV
	public function import() {	
		$success = true;
		$records = 0;
		$rows = 0;

		echo 'Disabled'; exit;
		
		$fieldMap = array(
			'name' => 'name',
			'category' => 'subcat',
			'type' => 'assettype',
			'group' => 'assetgroup',
			'region' => 'gw',
			'grade' => 'ped',
			'owner' => 'owner',
			'access' => 'access',
			'status' => 'status',
			'maintain' => 'maintain',
			'warning' => 'warning',
			'gisid' => 'gisid',
			'source' => 'source',
			'source_comment' => 'src_commen',
			'vetting' => 'vetting',
			'comments' => 'comments',
			'wheelchair' => 'wheelchair',
			'fireline' => 'fireline',
			'material' => 'material',
			'geometry' => 'geometry',
			'geometry_vertex_count' => 'geometry_vertex_count',
			'geometry' => 'geometry',
		);
		
		$csv = WWW_ROOT . 'data.csv';
		ini_set('auto_detect_line_endings', true);
		
		// Read CSV data.
		if (($handle = fopen($csv, "r")) !== FALSE) {

			// Get header 
			$header = fgetcsv($handle, 1000, ",");
		
		    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {

		        foreach ($header as $i => $heading_i) {

		        	if (isset($row[$i])) {
						$row_new[$heading_i] = $row[$i];
					}
				}
				
				$data[] = $row_new;
				$rows++;
			}

			fclose($handle);
		}
		
		ini_set('auto_detect_line_endings', false);
		
		// Add document, category, map fields and save Publications
		foreach ($data as $walkData) {
			$temp = array();
			
			foreach ($fieldMap as $schema => $csv) {
				$temp[$schema] = $walkData[$csv];
			}
			
			$walk = $this->Walk->create($temp);

			// Fix Name
			$walk['Walk']['name'] = ucwords(strtolower($walk['Walk']['name']));

			//pr($walk); die;
							
			if ($this->Walk->save($walk)) {
				$records++;
			} else {
				$success = false;
			}
		}
		
		echo ($success ? 'Success. ' : 'Failed. ');
		echo $records . ' records created.';
		
		exit;
	}

}