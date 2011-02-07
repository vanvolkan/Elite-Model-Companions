<?php 
    echo $this->Form->create('Contact');
    echo $this->Form->input('full_name');
	echo $this->Form->input('email');
	echo $this->Form->input('contact_number');
	echo $this->Form->input('enquiry');
    echo $this->Form->end('Send');
?>
