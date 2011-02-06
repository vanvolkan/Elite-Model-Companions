<div class="eliteModels view">
<h2><?php  __('Elite Model');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Age'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['age']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Height'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['height']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bust Cup Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['bust_cup_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hair Colour'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['hair_colour']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Eye Colour'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['eye_colour']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['cost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Featured'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eliteModel['EliteModel']['is_featured']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Elite Model', true), array('action' => 'edit', $eliteModel['EliteModel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Elite Model', true), array('action' => 'delete', $eliteModel['EliteModel']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eliteModel['EliteModel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Elite Models', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elite Model', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Model Images', true), array('controller' => 'model_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Model Image', true), array('controller' => 'model_images', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Model Images');?></h3>
	<?php if (!empty($eliteModel['ModelImage'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Elite Model Id'); ?></th>
		<th><?php __('Location'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($eliteModel['ModelImage'] as $modelImage):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $modelImage['id'];?></td>
			<td><?php echo $modelImage['elite_model_id'];?></td>
			<td><?php echo $modelImage['location'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'model_images', 'action' => 'view', $modelImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'model_images', 'action' => 'edit', $modelImage['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'model_images', 'action' => 'delete', $modelImage['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $modelImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Model Image', true), array('controller' => 'model_images', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>