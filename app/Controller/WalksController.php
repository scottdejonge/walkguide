<?php

App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');

class WalksController extends AppController {
	
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

		$this->set(compact('featured'));
	}

	public function index() {
		$walks = $this->Walk->find('all', array(
			'limit' => 100,
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
		));

		//pr($walks); die;

		$this->set(compact('walks'));
	}

	public function view() {
		$walk = $this->Walk->find('first', array(
			'conditions' => array(
				'Walk.id' => $this->request->params['id'],
			),
			'contain' => array(

			),
		));

		if (!$walk) {
			throw new NotFoundException();
		}

		$this->set(compact('walk'));
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