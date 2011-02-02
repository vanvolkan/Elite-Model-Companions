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
			// Home page
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
			
			$this->Auth->loginError = "The supplied username/password is incorrect. Please try again.";
			$this->Auth->authError = "This area of the website is for admins only. Please login to proceed.";
		}
	}