<?php
	class UsersController extends AppController
	{
		public $name = 'Users';
		public $scaffold;
		
		public $components = array('Auth');
		
		// public function login()
		// 		{
		// 			if ($this->Session->read('User'))
		// 				$this->redirect(array('action' => 'index', 'admin' => true), 0, true);
		// 			
		// 			if (!empty($this->data)) {
		// 				// unset unrequired validation rules
		// 				unset($this->User->validate['username']['check_username_exists']);
		// 				
		// 				// validate form
		// 				$this->User->set($this->data);
		// 				
		// 			}
		// 		}
		
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
			
			$this->set(compact('eliteModelCount', 'employmentCount', 'contactCount', 'bookingCount'));
			
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