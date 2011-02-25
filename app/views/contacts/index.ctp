<div class="two_col_layout">
	<div class="col1">
		<h1 class="hReplaced_red">Contact Us</h1>
		<p>Please submit emails to Elite Model Companions by completing the form below. All communications will be kept strictly confidential and private. Alternatively you can send an email to <a href="mailto:info@elitemodelcompanions.com.au">info@elitemodelcompanions.com.au</a></p>
		<div class="siteForm">
			<div class="formHeader"><h2><span>Contact Us</span></h2></div>
			<div class="formContent">
				<?php 
					if (isset($errors))
						echo $this->element('errors', array('errors' => $errors));
					if (isset($submitted)):
				?>
					<div class="notice-success"><h3>Thank you</h3><?php echo $submitted; ?></div>
				<?php
					endif;
					
    				echo $this->Form->create('Contact', array(
    					'inputDefaults' => array(
    						'error' => false
    					)
    				));
    				echo $this->Form->input('full_name');
					echo $this->Form->input('email');
					echo $this->Form->input('contact_number');
					echo $this->Form->input('enquiry');
    				echo $this->Form->end('Send', array('div' => array('class' => 'submit')));
				?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="col2">
		<?php
			echo $this->element('featuredModel', array('cache' => '+5 hours'));
		?>
	</div>
</div>
