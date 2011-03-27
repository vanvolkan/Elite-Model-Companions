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
		<?php
			echo $this->Form->create('EliteModel');
		?>
		<table cellpadding="0" cellspacing="0" class="standardTableClass">
		<tr>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('age');?></th>
				<th align="center"><?php echo $this->Paginator->sort('cost');?></th>
				<th align="center"><?php echo $this->Paginator->sort('class'); ?></th>
				<th align="center"><?php echo $this->Paginator->sort('is_featured');?></th>
				<th align="center"><?php echo $this->Paginator->sort('viewed');?></th>
				<th align="center"><?php echo $this->Paginator->sort('rank');?></th>
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
			<td align="center"><?php echo (isset($eliteModel['EliteModel']['class']) && !is_null($eliteModel['EliteModel']['class'])) ? $eliteModel['EliteModel']['class'] : '&nbsp;'; ?></td>
			<td align="center"><?php echo ($eliteModel['EliteModel']['is_featured']) ? $this->Html->image('assets/icon-tick-yes-green.png', array('alt' => 'Featured')) : $this->Html->image('assets/icon-cross-no-red.png', array('alt' => 'Not Featured')); ?></td>
			<td align="center"><?php echo $eliteModel['EliteModel']['viewed']; ?></td>
			<td align="center"><?php echo $this->Form->hidden('id', array('default' => $eliteModel['EliteModel']['id'])) . $this->Form->input('rank', array('label' => false, 'class' => 'smallIntInput', 'default' => $eliteModel['EliteModel']['rank'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('assets/icon_edit.png', array('alt' => 'Delete')), array('action' => 'edit', $eliteModel['EliteModel']['id'], 'admin' => true), array('escape' => false, 'title' => 'Edit')); ?>
				<?php echo $this->Html->link($this->Html->image('assets/icon_trash.gif', array('alt' => 'Delete')), array('action' => 'delete', $eliteModel['EliteModel']['id'], 'admin' => true), array('escape' => false, 'title' => 'Delete'), sprintf(__('Are you sure you want to delete %s?', true), $eliteModel['EliteModel']['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
		<?php echo $this->Form->end(array('label' => 'Update ranks', 'div' => array('class' => 'submitButtonRed updateRankBtn'))); ?>
		<div class="clear"></div>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled')); ?>
		| 	<?php echo $this->Paginator->numbers(); ?>
		|
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
	</div>
</div>

<script>
	$(function() {
		$('.smallIntInput').live('keyup', function() {
			var sanitizedValue;
			// strip anything after a alpha character
			sanitizedValue = this.value.replace(/[\.a-zA-Z].*/g,'');
			// strip any additional illegal characters
			sanitizedValue = sanitizedValue.replace(/[^.\-0-9]/g,'');
			// ensure only one decimal point
			var firstDot = sanitizedValue.indexOf('.');
			if (firstDot != -1) {
				var afterDot = sanitizedValue.substring(firstDot+1).replace(/\./g,'');
				sanitizedValue = sanitizedValue.substring(0,firstDot) + afterDot;
			}
			// parse as integer (gets rid of multiple minus signs and 0 prefixes
			if (sanitizedValue.length > 1) {
				sanitizedValue = "" + parseInt(sanitizedValue);
			}
			if (sanitizedValue != this.value)
				this.value = sanitizedValue;
		});
		
		$('#EliteModelAdminIndexForm').bind('submit', function(evt) {
			evt.preventDefault();
			evt.stopPropagation();
			
			var data = [];
			var url = $(this).attr('action');
									
			$(this).find('table').first().find('tr').each(function() {
				if ($(this).find('input[type=text]').val() != "" && $(this).find('input[type=hidden]').length > 0) {
					var obj = $.parseJSON('{"id":"' + $(this).find('input[type=hidden]').val() + '","rank":"' + $(this).find('input[type=text]').val() + '"}');
					data.push(obj);
				}
			});
						
			if (data.length > 0) {
				$.ajax({
					type: "POST",
					dataType: 'json',
					data: {'data': data},
					url: url,
					success: function(msg) {
						if (parseInt(msg.status) == 1)
							document.location.href = url;
					}
				});
			} else
				alert('Please enter a rank for a model');
		});
	});
</script>