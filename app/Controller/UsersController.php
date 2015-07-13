<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {


	/**
	 * Callbacks
	 */

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('add', 'logout');
	}


	/**
	 * Views
	 */

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null) {
		$this->User->id = $this->Auth->user('id');

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		$this->set('user', $this->User->read(null, $id));

		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->User->id
			),
			'contain' => array(
				'Comment' => array(
					'Walk.id',
					'Walk.name',
				),
				'Rating' => array(
					'Walk.id',
					'Walk.name',
				),
			)
		));

		$items = array();

		foreach ($user['Comment'] as $comment) {
			$items[] = $comment;
		}

		foreach ($user['Rating'] as $rating) {
			$items[] = $rating;
		}

		if (sizeof($items) > 1) {
			$items = Set::sort($items, '/created', 'DESC');
		}

		$this->set(compact('items'));
	}


	/**
	 * Methods
	 */

	// Login
	public function login() {

		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}

			$this->Session->setFlash(
				__('Invalid username or password, try again'),
				'default',
				array('class' => 'alert error'),
				'auth'				
			);
		}
	}

	// Logout
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	// Add
	public function add() {

		if ($this->request->is('post')) {
			$this->User->create();

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(
					__('The user has been saved'),
					'default',
					array('class' => 'alert success'),
					'auth'					
				);
				return $this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(
					__('The user could not be saved. Please, try again.'),
					'default',
					array('class' => 'alert error'),
					'auth'				
				);
			}
		}
	}

	// Edit
	public function edit($id = null) {
		$this->User->id = $this->Auth->user('id');

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(
					__('The user has been saved'),
					'default',
					array('class' => 'alert success'),
					'auth'					
				);
				$this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
				//return $this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(
					__('The user could not be saved. Please, try again.'),
					'default',
					array('class' => 'alert error'),
					'auth'				
				);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
	}

	// Delete
	public function delete($id = null) {
		$this->request->allowMethod('post');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
	
		if ($this->User->delete()) {
			$this->Session->setFlash(
				__('User deleted'),
				'default',
				array('class' => 'alert success'),
				'auth'				
			);

			return $this->redirect(array('action' => 'index'));

		} else {
			$this->Session->setFlash(
				__('User was not deleted'),
				'default',
				array('class' => 'alert error'),
				'auth'	
			);
		}

		return $this->redirect(array('action' => 'index'));
	}

	
}