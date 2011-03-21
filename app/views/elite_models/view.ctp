<h1 class="hReplaced_red"><?php echo $eliteModel['EliteModel']['name']?></h1>
<?php
	$class = preg_replace('/\s+/', '_', $eliteModel['EliteModel']['class']);
	$class = $class != "" ? 'eliteModel_' . $class : '';
?>
<div class="two_col_layout_smaller_width">
	<div class="col1">
		<div id="modelImageFront">
			<?php
				$imagesArray = array();
				foreach ((array)$eliteModel['ModelImage'] as $modelImage) {
					$src = (isset($modelImage['location'])) ? $modelImage['location'] : '';
					$thumbnail = $phpthumb->generate(array(
						'save_path'			=> WWW_ROOT . 'img/models/thumbs',
						'display_path'		=> 'img/models/thumbs',
						'error_image_path'	=> 'models/error.jpg',
						'src'				=> $src,
						'w'					=> 110,
						'h'					=> 100,
						'q'					=> 100,
						'zc'				=> 1
					));
				
					$thumbnailLarger = $phpthumb->generate(array(
						'save_path'			=> WWW_ROOT . 'img/models/thumbs',
						'display_path'		=> 'img/models/thumbs',
						'error_image_path'	=> 'models/error.jpg',
						'src'				=> $src,
						'w'					=> 400,
						'q'					=> 100,
						'zc'				=> 1
					));
				
					$imagesArray[] = array('smaller' => $thumbnail, 'larger' => $thumbnailLarger);
				}
			?>
			<?php
				$imgURL = (isset($eliteModel['ModelImage'][0]['location'])) ? $eliteModel['ModelImage'][0]['location'] : 'img/models/error.jpg';
				$imgThumbURL = (isset($imagesArray[0]['larger']['src'])) ? $imagesArray[0]['larger']['src'] : 'img/models/error.jpg';
			?>
			<a class="<?php echo $class; ?>" id="heroImage" rel="prettyPhoto" href="<?php echo $this->webroot . $imgURL; ?>">
				<div id="zoomOverlay">
					<span>Zoom</span>
				</div>
				<span class="<?php echo $class; ?>tag"></span>
				<img src="<?php echo $this->webroot . $imgThumbURL; ?>" alt="<?php echo $eliteModel['EliteModel']['name']; ?>" />
			</a>
		</div>
	</div>
	<div class="col2">
		<table border="0" cellpadding="0" cellpadding="0" class="standardTableClass">
			<tr>
				<th width="100">Age:</th>
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
				<td>&#36;<?php echo $eliteModel['EliteModel']['cost']; ?> per hour</td>
			</tr>
		</table>
		<div class="bookModelButton">
			<?php
				echo $this->Html->link($this->Html->tag('span', 'Book this model'), array('controller' => 'bookings', 'action' => 'book', $eliteModel['EliteModel']['id']), array('escape' => false, 'class' => 'blackStandardButton')); ?>
		</div>
	</div>
</div>
<?php echo $eliteModel['EliteModel']['description']; ?>