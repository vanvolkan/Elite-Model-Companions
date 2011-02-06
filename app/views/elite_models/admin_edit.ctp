<div class="eliteModels form">
<?php echo $this->Form->create('EliteModel');?>
	<fieldset>
 		<legend><?php __('Edit Elite Model'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('age');
		echo $this->Form->input('height');
		echo $this->Form->input('bust_cup_size');
		echo $this->Form->input('size');
		echo $this->Form->input('hair_colour');
		echo $this->Form->input('eye_colour');
		echo $this->Form->input('cost');
		echo $this->Form->input('description');
		echo $this->Form->input('is_featured');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EliteModel.id'), 'admin' => true), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EliteModel.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Elite Models', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Model Images', true), array('controller' => 'model_images', 'action' => 'index', 'admin' => true)); ?> </li>
		<li><?php echo $this->Html->link(__('New Model Image', true), array('controller' => 'model_images', 'action' => 'add', 'admin' => true)); ?> </li>
	</ul>
</div>