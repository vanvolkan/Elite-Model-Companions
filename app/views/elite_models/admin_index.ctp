<div class="eliteModels index">
	<h2><?php __('Elite Models');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('age');?></th>
			<th><?php echo $this->Paginator->sort('height');?></th>
			<th><?php echo $this->Paginator->sort('bust_cup_size');?></th>
			<th><?php echo $this->Paginator->sort('size');?></th>
			<th><?php echo $this->Paginator->sort('hair_colour');?></th>
			<th><?php echo $this->Paginator->sort('eye_colour');?></th>
			<th><?php echo $this->Paginator->sort('cost');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('is_featured');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eliteModels as $eliteModel):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $eliteModel['EliteModel']['id']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['name']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['age']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['height']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['bust_cup_size']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['size']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['hair_colour']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['eye_colour']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['cost']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['description']; ?>&nbsp;</td>
		<td><?php echo $eliteModel['EliteModel']['is_featured']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $eliteModel['EliteModel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $eliteModel['EliteModel']['id'], 'admin' => true)); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $eliteModel['EliteModel']['id'], 'admin' => true), null, sprintf(__('Are you sure you want to delete # %s?', true), $eliteModel['EliteModel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Elite Model', true), array('action' => 'add', 'admin' => true)); ?></li>
		<li><?php echo $this->Html->link(__('List Model Images', true), array('controller' => 'model_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Model Image', true), array('controller' => 'model_images', 'action' => 'add', 'admin' => true)); ?> </li>
	</ul>
</div>