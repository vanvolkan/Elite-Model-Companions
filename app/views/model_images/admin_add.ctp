<div class="modelImages form">
<?php echo $this->Form->create('ModelImage');?>
	<fieldset>
 		<legend><?php __('Admin Add Model Image'); ?></legend>
	<?php
		echo $this->Form->input('elite_model_id');
		echo $this->Form->input('location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Model Images', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Elite Models', true), array('controller' => 'elite_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elite Model', true), array('controller' => 'elite_models', 'action' => 'add')); ?> </li>
	</ul>
</div>