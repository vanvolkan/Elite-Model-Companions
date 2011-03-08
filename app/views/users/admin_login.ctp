<div class="siteForm" style="width: 80%; margin: 0 auto;">
	<div class="formHeader"><h2><span>Login</span></h2></div>
	<div class="formContent">
	<?php
		echo $this->Session->flash('auth');
		echo $this->Form->create('User', array('action' => 'login'));
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->end('Login');
	?>
	<div class="clear"></div>
	</div>
</div>