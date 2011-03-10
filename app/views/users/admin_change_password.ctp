<div class="siteForm">
	<div class="formHeader"><h2><span>Change your password</span></h2></div>
	<div class="formContent">
		<?php
			if (isset($errors))
				echo $this->element('errors', array('errors' => $errors));
			 else if (isset($submitted))
				echo $this->element('formSuccess', array('data' => $submitted));
			
			echo $this->Form->create('User', array(
				'inputDefaults' => array(
					'error' => false
				)
			));
			
			echo $this->Html->tag('div', $this->Form->label('username', 'Username:') . '<b>' . $loggedInUser['username'] . '</b>', array('class' => 'input text'));
			echo $this->Html->tag('div', $this->Form->label('current_password', 'Current Password:') . $this->Form->password('current_password'));
			echo $this->Html->tag('h4', 'New Password', array('class' => 'paddedHeading'));
		?>
			<div class="floatLeft paddRight20">
		<?php
			echo $this->Html->tag('div', $this->Form->label('new_password', 'New Password:') . $this->Form->password('new_password'));
		?>
			</div>
			<div class="floatLeft">
		<?php
			echo $this->Html->tag('div', $this->Form->label('new_password2', 'Retype New Password:') . $this->Form->password('new_password2'));
		?>
			</div>
		<div class="clear"></div>
		<?php
			echo $this->Form->hidden('id', array('value' => $loggedInUser['id']));
			echo $this->Form->end('Submit');
		?>
		<div class="clear"></div>
	</div>
</div>