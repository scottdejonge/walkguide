<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

	public function add() {
		
		if (!empty($this->request->data) && $this->request->is('ajax')) {
			
			$this->Comment->create();

			if ($this->Comment->saveAll($this->request->data)) {
				$this->loadModel('Walk');
				$comments = $this->Walk->getWalkComments($this->request->data['Comment']['walk_id']);
				$this->set(compact('comments'));
				return $this->render('/Elements/comment-form-success', false);
			}

		}
		
		$this->render('/Elements/comment-form', false);
		exit;
	}
}