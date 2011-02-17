<h1 class="hReplaced_red">Contact Us</h1>
<p>Please submit emails to Elite Model Companions by completing the form below. All communications will be kept strictly confidential and private. Alternatively you can send an email to <a href="mailto:info@elitemodelcompanions.com.au">info@elitemodelcompanions.com.au</a></p>
<?php 
    echo $this->Form->create('Contact');
    echo $this->Form->input('full_name');
	echo $this->Form->input('email');
	echo $this->Form->input('contact_number');
	echo $this->Form->input('enquiry');
    echo $this->Form->end('Send');
?>
