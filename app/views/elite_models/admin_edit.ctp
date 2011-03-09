<div class="floatRight">
	<?php echo $this->Html->link($this->Html->tag('span', 'View all Elite Models'), array('controller' => 'elite_models', 'action' => 'index', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'Add an Elite Model'), array('controller' => 'elite_models', 'action' => 'add', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
</div>
<div class="clear"></div>
<div class="siteForm">
	<div class="formHeader"><h2><span>Edit '<?php echo $eliteModel['EliteModel']['name']; ?>'</span></h2></div>
	<div class="formContent">
		<?php 
			echo $this->Form->create('EliteModel');
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
			echo $this->Form->end(__('Submit', true));
		?>
		<div class="clear"></div>
	</div>
</div>