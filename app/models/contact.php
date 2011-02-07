<?php
	class Contact extends AppModel {
		
		public $name = 'Contact';
	
	    public $validate = array(
		    'full_name' => array(
		        'rule'=>array('minLength', 1), 
		        'message'=>'Name is required' ),
		    'email' => array(
		        'rule'=>'email', 
		        'message'=>'Must be a valid email address' ),
		    'enquiry' => array(
		        'rule'=>array('minLength', 1), 
		        'message'=>'Feedback is required' )
		);
	}
	
?>