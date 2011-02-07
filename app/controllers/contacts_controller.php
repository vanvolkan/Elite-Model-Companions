<?php

	class ContactsController extends AppController {
		public $name = 'Contacts';
		public $components = array('Email');
		//var $scaffold;
		
		public function index() 
		{
			if ($this->RequestHandler->isPost()) {
		        $this->Contact->set($this->data);
		        if ($this->Contact->validates()) {
		            //send email using the Email component
		            $this->Email->to = Configure::read('eliteModelsOwner');
					$this->Email->bcc = Configure::read('eliteModelsAdmins');
		            $this->Email->subject = 'Contact message from ' . $this->data['Contact']['full_name'];  
		            $this->Email->from = $this->data['Contact']['email'];
					$this->Email->delivery = 'debug';
		            $this->Email->send($this->data['Contact']['enquiry']);
					$this->Contact->save();
		        }
		    }
		}
		
    }
?>