<?php

	class ContactsController extends AppController {
		var $components = array('Email');
		var $name = 'Contacts';
		//var $scaffold;
		
		function add() {
		    if ($this->RequestHandler->isPost()) {
		        $this->Contact->set($this->data);
		        if ($this->Contact->validates()) {
		            //send email using the Email component
		            $this->Email->to = 'volkanvan@gmail.com';  
		            $this->Email->subject = 'Contact message from ' . $this->data['Contact']['name'];  
		            $this->Email->from = $this->data['Contact']['email'];
		            $this->Email->send($this->data['Contact']['details']);
		        }
		    }
		}
		
    }
?>