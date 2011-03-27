<div class="floatRight">
	<?php echo $this->Html->link($this->Html->tag('span', 'View all Elite Models'), array('controller' => 'elite_models', 'action' => 'index', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'Add an Elite Model'), array('controller' => 'elite_models', 'action' => 'add', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
</div>
<div class="clear"></div>
<div class="siteForm">
	<div class="formHeader"><h2><span>Edit '<?php echo $eliteModel['EliteModel']['name']; ?>'</span></h2></div>
	<div class="formContent">
		<?php 
			echo $this->Form->create('EliteModel', array('type' => 'file'));
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
			echo $this->Form->input('rank');
			
			$currentImages = $eliteModel['ModelImage'];
			$count = count($currentImages);
		
			if ($count > 0):
			echo $this->Html->tag('h2', 'Model Images', array('class' => 'formHeadingRedSpaced'));
		?>
		<div id="adminModelImageUploads" class="adminModelImageContainer multiRow">	
			<table class="standardTableClass" border="0" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>ID</th>
						<th>Filename</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($currentImages as $image): 
						$src = (isset($image['location'])) ? $image['location'] : '';
						$thumbnail = $phpthumb->generate(array(
							'save_path'			=> WWW_ROOT . 'img/models/thumbs',
							'display_path'		=> 'models/thumbs',
							'error_image_path'	=> 'models/error.jpg',
							'src'				=> $src,
							'w'					=> 50,
								'h'					=> 55	,
							'q'					=> 100,
							'zc'				=> 1
						));
					?>
					<tr>
						<td><?php echo $this->Html->image($thumbnail['src'], array('alt' => $eliteModel['EliteModel']['name'])); ?></td>
						<td class="vMiddleAlign"><?php echo $image['id']; ?></td>
						<td class="vMiddleAlign"><?php echo $image['location']; ?></td>
						<td class="vMiddleAlign"><?php echo $this->Html->link($this->Html->image('assets/icon_trash.gif', array('alt' => 'Delete')), array('controller' => 'ModelImages', 'action' => 'delete', $image['id'], 'admin' => true), array('escape' => false, 'title' => 'Delete'), sprintf(__('Are you sure you want to delete %s?', true), $image['location'])); ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<?php 
				endif;
			
				//echo $this->Form->input('ModelImage.0.location', array('type' => 'file', 'label' => 'Model Image ' . ++$count));		?>
			<?php //</div><a href="#" id="addAnotherModelImage" class="addIcon" title="Add another">Add another image</a> ?>
		<?php
			echo $this->Form->end(__('Submit', true));
		?>
		<div class="clear"></div>
	</div>
</div>