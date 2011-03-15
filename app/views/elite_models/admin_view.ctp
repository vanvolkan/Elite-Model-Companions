<div class="floatRight">
	<?php echo $this->Html->link($this->Html->tag('span', 'Edit ' . $eliteModel['EliteModel']['name']), array('action' => 'edit', $eliteModel['EliteModel']['id'], 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'View all Elite Models'), array('controller' => 'elite_models', 'action' => 'index', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'Add an Elite Model'), array('controller' => 'elite_models', 'action' => 'add', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
</div>
<div class="clear"></div>
<div class="siteForm">
	<div class="formHeader"><h2><span><?php echo $eliteModel['EliteModel']['name']; ?></span></h2></div>
	<div class="formContent">
		<div class="two_col_layout">
			<div class="col1">
				<table border="0" cellpadding="0" cellpadding="0" class="additionalStandardTableClass">
					<tbody>
						<tr>
							<th>Name:</th>
							<td><?php echo $eliteModel['EliteModel']['name']; ?></td>
						</tr>
						<tr>
							<th>Age:</th>
							<td><?php echo $eliteModel['EliteModel']['age']; ?></td>
						</tr>
						<tr>
							<th>Height:</th>
							<td><?php echo $eliteModel['EliteModel']['height']; ?></td>
						</tr>
						<tr>
							<th>Bust Cup Size:</th>
							<td><?php echo $eliteModel['EliteModel']['bust_cup_size']; ?></td>
						</tr>
						<tr>
							<th>Dress Size:</th>
							<td><?php echo $eliteModel['EliteModel']['size']; ?></td>
						</tr>
						<tr>
							<th>Hair Colour:</th>
							<td><?php echo $eliteModel['EliteModel']['hair_colour']; ?></td>
						</tr>
						<tr>
							<th>Eye Colour:</th>
							<td><?php echo $eliteModel['EliteModel']['eye_colour']; ?></td>
						</tr>
						<tr>
							<th>Cost:</th>
							<td>&#36;<?php echo $eliteModel['EliteModel']['cost']; ?></td>
						</tr>
						<tr>
							<th>Description:</th>
							<td><?php echo $eliteModel['EliteModel']['description']; ?></td>
						</tr>
						<tr>
							<th>Featured?:</th>
							<td><?php echo ($eliteModel['EliteModel']['is_featured']) ? $this->Html->image('assets/icon-tick-yes-green.png', array('alt' => 'Featured')) : $this->Html->image('assets/icon-cross-no-red.png', array('alt' => 'Not Featured')); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col2">
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>