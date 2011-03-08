<?php
	class AppController extends Controller
	{
		public $components = array('RequestHandler', 'Session', 'DebugKit.Toolbar');
		public $helpers = array('Html', 'Form', 'Js' => array('Jquery'), 'Session', 'Cache', 'Paginator', 'Text');
		
		function beforeFilter()
		{
			$user = $this->Session->read('Auth.User');
			
			if (isset($this->params['admin']) && $this->params['admin'] && is_null($user)) {
				$this->Session->setFlash(__('You need to be logged in for that action.', 'flash_error', true), 'flash_error');
				$this->redirect(array('controller' => 'users', 'action' => 'login', 'admin' => true));
			}
			
			parent::beforeFilter();
		}
		
		function beforeRender()
		{
			$user = $this->Session->read('Auth.User');
			
			if (!is_null($user))
				$this->set('__ADMIN_USER__', true);
			
			if (isset($this->params['admin']))
				$this->layout = 'admin_layout';
				
			parent::beforeRender();
		}
	}