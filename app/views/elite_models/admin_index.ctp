<div class="floatRight">
	<?php echo $this->Html->link($this->Html->tag('span', 'Add an Elite Model'), array('controller' => 'elite_models', 'action' => 'add', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
</div>
<div class="clear"></div>
<div class="contentBox">
	<div class="contentBoxHeading"><h2><span><?php __('Elite Models');?></span></h2></div>
	<div class="contentBoxContent">
		<?php /*
		<div class="legendBox">
			<h3>Legend</h3>
			<div><?php echo $this->Html->image('assets/icon_edit.png', array('alt' => 'Delete')); ?><span>Edit</span></div>
			<div><?php echo $this->Html->image('assets/icon_trash.gif', array('alt' => 'Delete')); ?><span>Delete</span></div>
		</div>
		*/ ?>
		<table cellpadding="0" cellspacing="0" class="standardTableClass">
		<tr>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('age');?></th>
				<th align="center"><?php echo $this->Paginator->sort('cost');?></th>
				<th align="center"><?php echo $this->Paginator->sort('is_featured');?></th>
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
			<td><?php echo $this->Html->link($eliteModel['EliteModel']['name'], array('action' => 'view', $eliteModel['EliteModel']['id']), array('escape' => false)); ?></td>
			<td><?php echo $eliteModel['EliteModel']['age']; ?>&nbsp;</td>
			<td align="center">&#36;<?php echo $eliteModel['EliteModel']['cost']; ?>&nbsp;</td>
			<td align="center"><?php echo ($eliteModel['EliteModel']['is_featured']) ? $this->Html->image('assets/icon-tick-yes-green.png', array('alt' => 'Featured')) : $this->Html->image('assets/icon-cross-no-red.png', array('alt' => 'Not Featured')); ?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('assets/icon_edit.png', array('alt' => 'Delete')), array('action' => 'edit', $eliteModel['EliteModel']['id'], 'admin' => true), array('escape' => false, 'title' => 'Edit')); ?>
				<?php echo $this->Html->link($this->Html->image('assets/icon_trash.gif', array('alt' => 'Delete')), array('action' => 'delete', $eliteModel['EliteModel']['id'], 'admin' => true), array('escape' => false, 'title' => 'Delete'), sprintf(__('Are you sure you want to delete %s?', true), $eliteModel['EliteModel']['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	</div>
</div>
<div class="resultStats">
	<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
			));
		?>
	</p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
		| 	<?php echo $this->Paginator->numbers();?>
		|
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>