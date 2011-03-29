<?php
	App::import('Sanitize');
	class EmploymentsController extends AppController
	{
		public $name = 'Employments';
		public $components = array('Email');
		
		
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
				// Set the IP of the user submitting the form
				$this->data['Employment']['ip_address'] = $this->RequestHandler->getClientIP();
		        $this->Employment->set($this->data);
				if ($this->Employment->validates()) {
					// Time to email the details
					$this->Email->to = Configure::read('eliteModelsOwner');
					$this->Email->bcc = Configure::read('eliteModelsAdmins');
					$this->Email->subject = 'New employment submission by ' . $this->data['Employment']['first_name'] . ' ' . $this->data['Employment']['last_name'];  
		            $this->Email->from = $this->data['Employment']['email_address'];
					
					$attachments = array();
					
					if ($recent_photograph1 != "")
						$attachments[time() . '_' . $recent_photograph1['name']] = $recent_photograph1['tmp_name'];
					if ($recent_photograph2 != "")
						$attachments[time() . '_' . $recent_photograph2['name']] = $recent_photograph2['tmp_name'];
					if ($recent_photograph3 != "")
						$attachments[time() . '_' . $recent_photograph3['name']] = $recent_photograph3['tmp_name'];
					if ($recent_photograph4 != "")
						$attachments[time() . '_' . $recent_photograph4['name']] = $recent_photograph4['tmp_name'];
						
					$this->Email->attachments = $attachments;
					
					$this->Email->template = 'employmentEmail';
					$this->Email->sendAs = 'both';
					$this->set('Employment', $this->data);
		            $this->Email->send();
					// Save the record to the database
					$this->Employment->save();
					$this->set('submitted', 'Your application for Employment has been submitted. We will review your application and respond back to you if you are applicable.');
					unset($this->data['Employment']);
					$this->Session->setFlash(__('No errors occurred during submission', true), 'flash_success');
				} else {
					$this->Session->setFlash(__('Errors occured during submission. Please review and fix the errors below.', true), 'flash_error');
					$this->set('errors', $this->Employment->validationErrors);
				}
			}
			$this->set('page_for_layout', 'employments_item');
		}
		
		public function admin_index()
		{}
	}