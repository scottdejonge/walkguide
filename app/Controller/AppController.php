<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
                'controller' => 'walks',
                'action' => 'index'
            ),
			'logoutRedirect' => array(
				'controller' => 'walks',
				'action' => 'index',
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish'
				)
			)
		)
	);

	public function beforeFilter() {
		$this->Auth->allow('home', 'index', 'view', 'about');
		$this->set('loggedIn', $this->Auth->loggedIn());
	}
}
