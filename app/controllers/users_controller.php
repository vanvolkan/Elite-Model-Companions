<?php
	App::import('Sanitize');
	class UsersController extends AppController
	{
		public $name = 'Users';
		public $scaffold;
		
		public $components = array('Auth');
		
		public function admin_index()
		{
			$this->loadModel('EliteModel');
			$this->loadModel('Employment');
			$this->loadModel('Contact');
			$this->loadModel('Booking');
			
			$eliteModelCount = $this->EliteModel->find('count');
			$employmentCount = $this->Employment->find('count');
			$contactCount = $this->Contact->find('count');
			$bookingCount = $this->Booking->find('count');
			$loggedInUser = $this->Session->read('Auth.User');
			
			$this->set(compact('eliteModelCount', 'employmentCount', 'contactCount', 'bookingCount', 'loggedInUser'));
			
		}
		
		public function admin_login()
		{
			if ($this->Auth->user()) {
				$this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => true));
			}
		}
		
		public function admin_logout()
		{
			$this->redirect($this->Auth->logout());
		}
		
		public function admin_changePassword()
		{
			if ($this->RequestHandler->isPost()) {
				$this->data = Sanitize::clean($this->data);
				$this->User->set($this->data);
				if ($this->User->validates()) {
					$this->User->save();
					$this->Session->setFlash(__('Your password has been updated!', true), 'flash_success');
					$this->redirect(array('action' => 'index', 'admin' => true));
				} else {
					$this->Session->setFlash(__('Errors occured during submission. Please review and fix the errors below.', true), 'flash_error');
					$this->set('errors', $this->User->validationErrors);
					$this->data = array();
				}
			}
			
			$this->set('loggedInUser', $this->Session->read('Auth.User'));
		}
		
		public function beforeFilter()
		{
			$this->Auth->autoRedirect = false;
			
			$this->Auth->authenticate = ClassRegistry::init('User');
			
			$this->Auth->loginAction = array(
				'controller' 	=> 'users',
				'action' 		=> 'login',
				'plugin'		=> false,
				'admin'			=> true
			);
			
			$this->Auth->logoutRedirect = array(Configure::read('Routing.admin') => false, 'controller' => 'users', 'action' => 'logout');
			
			$this->Auth->loginError = "The supplied username/password is incorrect. Please try again.";
			$this->Auth->authError = "This area of the website is for admins only. Please login to proceed.";
		}
	}