<?php
	class Contact extends AppModel {
		
		public $name = 'Contact';
	
	    public $validate = array(
		    'full_name' => array(
		        'rule'=>array('minLength', 1), 
		        'message'=>'Full Name is required' ),
		    'email' => array(
		        'rule'=>'email', 
		        'message'=>'Please provide a valid email address' ),
		    'enquiry' => array(
		        'rule'=>array('minLength', 1), 
		        'message'=>'Enquiry is required' )
		);
	}
	
?>