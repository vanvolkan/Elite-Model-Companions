<div class="modelImages view">
<h2><?php  __('Model Image');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $modelImage['ModelImage']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Elite Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($modelImage['EliteModel']['name'], array('controller' => 'elite_models', 'action' => 'view', $modelImage['EliteModel']['slug'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $modelImage['ModelImage']['location']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Model Image', true), array('action' => 'edit', $modelImage['ModelImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Model Image', true), array('action' => 'delete', $modelImage['ModelImage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $modelImage['ModelImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Model Images', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Model Image', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elite Models', true), array('controller' => 'elite_models', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elite Model', true), array('controller' => 'elite_models', 'action' => 'add')); ?> </li>
	</ul>
</div>
