<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $helpers = array(
		'Form' => array('className' => 'MagicForm'),
		'Text',
	);

	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
                'controller' => 'user',
                'action' => 'view',
            ),
			'logoutRedirect' => array(
				'controller' => 'walks',
				'action' => 'index',
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish',
					'fields' => array('username' => 'email'),
				)
			),
		)
	);

	public function beforeFilter() {
		$this->Auth->allow('home', 'index', 'view', 'display', 'about');
		$this->set('loggedIn', $this->Auth->loggedIn());
		$this->set('userData', $this->Auth->user());
	}
}
