<div class="floatRight">
	<?php echo $this->Html->link($this->Html->tag('span', 'View all Elite Models'), array('controller' => 'elite_models', 'action' => 'index', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
</div>
<div class="clear"></div>
<div class="siteForm">
	<div class="formHeader"><h2><span><?php __('Add an Elite Model'); ?></span></h2></div>
	<div class="formContent">
		<?php
			if (isset($errors))
				echo $this->element('errors', array('errors' => $errors));
			 else if (isset($submitted))
				echo $this->element('formSuccess', array('data' => $submitted));
			
			echo $this->Form->create('EliteModel', array(
				'type' => 'file',
				'inputDefaults'	=> array(
					'error' => false
				)
			));
			echo $this->Form->input('name', array('label' => 'Name:'));
			echo $this->Form->input('age', array('label' => 'Age:'));
			echo $this->Form->input('height', array('label' => 'Height:'));
			echo $this->Form->input('bust_cup_size', array('label' => 'Bust Cup Size:'));
			echo $this->Form->input('size', array('label' => 'Dress Size:'));
			echo $this->Form->input('hair_colour', array('label' => 'Hair Colour:'));
			echo $this->Form->input('eye_colour', array('label' => 'Eye Colour:'));
			echo $this->Form->input('cost', array('label' => 'Cost:'));
			echo $this->Form->input('description', array('label' => 'Description:'));
			echo $this->Form->input('is_featured', array('label' => 'Is Featured?:'));
			echo $this->Html->tag('h2', 'Model Images', array('class' => 'formHeadingRedSpaced'));
		?>
			<div id="adminModelImageUploads" class="adminModelImageContainer multiRow">
		<?php
			echo $this->Form->input('ModelImage.0.location', array('type' => 'file', 'label' => 'Model Image 1'));		?>
			</div>
			<a href="#" id="addAnotherModelImage" class="addIcon" title="Add another">Add another image</a>
		<?php
			echo $this->Form->end(__('Submit', true));
		?>
		<div class="clear"></div>
	</div>
</div>