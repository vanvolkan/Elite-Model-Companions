<div class="floatRight">
	<?php echo $this->Html->link($this->Html->tag('span', 'Edit ' . $eliteModel['EliteModel']['name']), array('action' => 'edit', $eliteModel['EliteModel']['id'], 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'View all Elite Models'), array('controller' => 'elite_models', 'action' => 'index', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'Add an Elite Model'), array('controller' => 'elite_models', 'action' => 'add', 'admin' => true), array('escape' => false, 'class' => 'standardButton')); ?>
</div>
<div class="clear"></div>
<div class="siteForm">
	<div class="formHeader"><h2><span><?php echo $eliteModel['EliteModel']['name']; ?></span></h2></div>
	<div class="formContent">
		<?php if (isset($eliteModel['ModelImage'])): ?>
			<div class="eliteModelImageDivContainer">
				<?php
					$imagesArray = array();
					foreach ($eliteModel['ModelImage'] as $image):
						$src = (isset($image['location'])) ? $image['location'] : '';
						$thumbnail = $phpthumb->generate(array(
							'save_path'			=> WWW_ROOT . 'img/models/thumbs',
							'display_path'		=> 'models/thumbs',
							'error_image_path'	=> 'models/error.jpg',
							'src'				=> $src,
							'w'					=> 110,
							'h'					=> 100,
							'q'					=> 100,
							'zc'				=> 1
						));
						
						$thumbnailLarger = $phpthumb->generate(array(
							'save_path'			=> WWW_ROOT . 'img/models/thumbs',
							'display_path'		=> 'models/thumbs',
							'error_image_path'	=> 'models/error.jpg',
							'src'				=> $src,
							'w'					=> 480,
							'q'					=> 100,
							'zc'				=> 1
						));
						
						$imagesArray[] = array('smaller' => $thumbnail, 'larger' => $thumbnailLarger);
					endforeach;
				?>
				
				<a id="heroImage" rel="prettyPhoto" href="<?php echo $this->webroot . $eliteModel['ModelImage'][0]['location']; ?>"><?php echo $this->Html->image($imagesArray[0]['larger']['src'], array('alt' => $eliteModel['EliteModel']['name'])); ?></a>
				<div class="thumbsContainer">
					<ul>
						<?php
							for ($i = 0; $i < count($imagesArray); $i++) {
								echo '<li>';
								echo '<a href="' . $this->webroot . $eliteModel['ModelImage'][$i]['location'] . '">' . $this->Html->image($imagesArray[$i]['smaller']['src'], array('width' => $imagesArray[$i]['smaller']['w'], 'height' => $imagesArray[$i]['smaller']['h'], 'alt' => $this->webroot . 'img' . DS . $imagesArray[$i]['larger']['src'])) . '</a>';
							}
						?>
					</ul>
				</div>				
			</div>
			<div class="clear"></div>
		<?php endif; ?>
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
				<?php if (isset($eliteModel['EliteModel']['class'])): ?>
				<tr>
					<th>Class:</th>
					<td><?php echo $eliteModel['EliteModel']['class']; ?>
				</tr>
				<?php endif; ?>
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
</div>
<script>
	jQuery(document).ready(function($) {
		$('div.thumbsContainer a').hover(function() {
			var heroIMGLink = $('a#heroImage');
			var heroIMG = heroIMGLink.find('img');
			var hoverIMGLink = $(this);
			var hoverIMG = hoverIMGLink.find('img');
			
			heroIMGLink.attr('href', hoverIMGLink.attr('href'));
			heroIMG.attr('src', hoverIMG.attr('alt'));
		}, function() {
			return;
		}).click(function() {
			return false;
		});
	});
</script>