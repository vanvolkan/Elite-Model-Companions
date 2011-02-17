<?php
	class AppController extends Controller
	{
		public $components = array('RequestHandler', 'Session');
		public $helpers = array('Html', 'Form', 'Js', 'Session', 'Cache', 'Paginator', 'Text');
		
		function beforeFilter()
		{
			$user = $this->Session->read('Auth.User');
			
			if (isset($this->params['admin']) && $this->params['admin'] && is_null($user)) {
				$this->Session->setFlash('You need to be logged in for that action.', 'default', array('class' => 'flash_bad'));
				$this->redirect(array('controller' => 'users', 'action' => 'login', 'admin' => true));
			}
			
			parent::beforeFilter();
		}
		
		function beforeRender()
		{
			$user = $this->Session->read('Auth.User');
			
			if (!is_null($user))
				$this->layout = 'admin_layout';
				
			parent::beforeRender();
		}
	}