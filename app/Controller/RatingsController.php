<?php

App::uses('AppController', 'Controller');

class RatingsController extends AppController {

	public function add() {
		
		if (!empty($this->request->data) && $this->request->is('ajax')) {
			
			$this->Rating->create();

			if ($this->Rating->saveAll($this->request->data)) {
				return $this->render('/Elements/rating-form', false);
			}

		}
		
		$this->render('/Elements/rating-form', false);
		exit;
	}
}