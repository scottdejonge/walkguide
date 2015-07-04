<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

	public function add() {
		
		if (!empty($this->request->data) && $this->request->is('ajax')) {
			
			$this->Comment->create();

			if ($this->Comment->saveAll($this->request->data)) {
				return $this->render('/Elements/comment-form-success', false);
			}

		}
		
		$this->render('/Elements/comment-form', false);
		exit;
	}
}