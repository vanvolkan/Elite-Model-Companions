<h1 class="hReplaced_red">Employment</h1>
<p>Attractive staffs between the ages of 18-30, of all nationalities are required for high class escort work in Newcastle, the Central Coast and Sydney areas.</p>
<p>We are a leading escort agency and have some of the highest rates in the industry, hence the opportunity exists to earn a very high income in a discrete, luxurious and executive environment. We offer an excellent environment for high class ladies and models to make unbelievable money – most models make more than court barristers make in a year!  You will meet and entertain some very interesting and successful gentlemen with the opportunity of experiencing 5 star hotels and restaurants and even accompanying our clients on national and international travel.</p>
<p>Discretion and confidentiality for both the women of Elite Model Companions and our clients is extremely important and we take it very seriously. All our clients undergo a screening process before a booking.</p>
<p>To apply as a high class escort you must be extremely attractive, illegal-drug free, body-pierce and scar free, warm and friendly, immaculately groomed, confident but polite, and of course, very sexually passionate and free.  You cannot assist a refined man in sensuality if you do not even know your own body or enjoy your own sexuality.</p>
<p>Finally, you must be between 18–30 yrs old to maximize your work.  We prefer ladies who like to see less clientele, but high quality, high paying ones.  Rather than seeing 3-6 gentlemen a night, you will spend time with 1-2 clients per night, and spend 2-12 hours there, at a higher price.</p>
<p>If you are one of these lovely women, we look forward to hearing from you:</p>
<div id="employmentForm" class="siteForm">
	<div class="formHeader"><h2><span>Employment</span></h2></div>
	<div class="formContent">
		<?php
			if (isset($errors))
				echo $this->element('errors', array('errors' => $errors));
			else if (isset($submitted))
				echo $this->element('formSuccess', array('data' => $submitted));
				
			echo $this->Form->create('Employment', array(
				'type'				=> 'file',
				'inputDefaults'	=> array(
					'error' => false
				)
			));
		
			echo $this->Form->input('work_name', array('label' => 'Work Name:'));
			echo $this->Form->input('first_name', array('label' => 'First Name:'));
			echo $this->Form->input('last_name', array('label' => 'Last Name:'));
			echo $this->Form->input('email_address', array('label' => 'Email address:'));
			echo $this->Form->input('phone_number', array('label' => 'Phone Number:'));
			echo $this->Form->input('suburb', array('label' => 'Suburb:'));
			echo $this->Form->input('state', array('label' => 'State:'));
			echo $this->Form->input('age', array('label' => 'Age:'));
			echo $this->Form->input('height', array('label' => 'Height:'));
			echo $this->Form->input('dress_size', array('label' => 'Dress Size:'));
			echo $this->Form->input('shoe_size', array('label' => 'Shoe Size:'));
			echo $this->Form->input('bust_size', array('label' => 'Bust Size:'));
			echo $this->Form->input('natural', array('label' => 'Naturual?', 'options' => array('Yes' => 'Yes', 'No' => 'No')));
			echo $this->Form->input('waist', array('label' => 'Waist:'));
			echo $this->Form->input('hips', array('label' => 'Hips:'));
			echo $this->Form->input('hair_colour', array('label' => 'Hair Colour:'));
			echo $this->Form->input('hair_length', array('label' => 'Hair Length:'));
			echo $this->Form->input('eye_colour', array('label' => 'Eye Colour:'));
			echo $this->Form->input('how_heard', array('label' => 'How did you hear about us:'));
			echo $this->Form->input('description', array('before' => '<div class="notice-info">Please write a brief description about yourself i.e. passions, interests, past employment history, desired outcomes from escorting for Elite Model Companions and any other information you feel we should know:</div>'));
			echo $this->Html->tag('h2', 'Recent Photographs', array('class' => 'formHeadingRedSpaced'));
			echo $this->Html->tag('div', $this->Form->label('Upload One:') . $this->Form->file('recent_photograph1'), array('class' => 'input text'));
			echo $this->Html->tag('div', $this->Form->label('Upload Two:') . $this->Form->file('recent_photograph2'), array('class' => 'input text'));
			echo $this->Html->tag('div', $this->Form->label('Upload Three:') . $this->Form->file('recent_photograph3'), array('class' => 'input text'));
			echo $this->Html->tag('div', $this->Form->label('Upload Four:') . $this->Form->file('recent_photograph4'), array('class' => 'input text'));
			echo $this->Form->end('Submit');
		?>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>