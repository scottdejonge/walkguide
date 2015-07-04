<?php

App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');

class WalksController extends AppController {
		
	public function index() {
		$walks = $this->Walk->find('all');
		$this->set(compact('walks'));
	}

	public function view() {

	}
	
	// Imports Walk Data from CSV
	public function import() {	
		$success = true;
		$records = 0;
		$rows = 0;
		
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