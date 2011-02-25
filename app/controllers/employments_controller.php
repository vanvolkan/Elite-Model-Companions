<?php
	App::import('Sanitize');
	class EmploymentsController extends AppController
	{
		public $name = 'Employments';
		
		public function index()
		{
			if ($this->RequestHandler->isPost()) {
				// We need to sanitize the user input, however we should NOT sanitize the files as they will be borked on Win32 systems
				$recent_photograph1 = $this->data['Employment']['recent_photograph1'];
				$recent_photograph2 = $this->data['Employment']['recent_photograph2'];
				$recent_photograph3 = $this->data['Employment']['recent_photograph3'];
				$recent_photograph4 = $this->data['Employment']['recent_photograph4'];
				$this->data = Sanitize::clean($this->data);
				$this->data['Employment']['recent_photograph1'] = $recent_photograph1;
				$this->data['Employment']['recent_photograph2'] = $recent_photograph2;
				$this->data['Employment']['recent_photograph3'] = $recent_photograph3;
				$this->data['Employment']['recent_photograph4'] = $recent_photograph4;
				$this->data['Employment']['ip_address'] = $this->RequestHandler->getClientIP();
		        $this->Employment->set($this->data);
				if ($this->Employment->validates()) {
					// Set the IP of the user submitting the form
					$this->Employment->save();
					$this->set('submitted', 'Your application for Employment has been submitted. We will review your application and respond back to you if you are applicable.');
					unset($this->data['Employment']);
					$this->Session->setFlash(__('No errors occurred during submission', true), 'flash_success');
					// TODO: Send email and add to DB - also upload the file and ensure file is added to email as attachment
				} else {
					$this->Session->setFlash(__('Errors occured during submission. Please review and fix the errors below.', true), 'flash_error');
					$this->set('errors', $this->Employment->validationErrors);
				}
			}
		}
		
		public function admin_index()
		{}
	}