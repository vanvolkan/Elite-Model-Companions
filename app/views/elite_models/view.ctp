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
						'w'					=> 111,
						'h'					=> 75,
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
					
					$thumbnail['__original__'] = $src;
					$thumbnailLarger['__original__'] = $src;
				
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
			
			<?php if (count($imagesArray) > 0): ?>
			<div id="modelImageGalleryContainer">
				<div class="scrollingHotSpotLeft"></div>
				<div class="scrollingHotSpotRight"></div>
				<div class="scrollWrapper">
					<div class="scrollableArea">
						<?php 
							echo $this->Html->script('jquery.smoothDivScroll-1.1-min', array('inline' => false));
							foreach ($imagesArray as $imgSmallerThumb): ?>
							<a href="<?php echo $this->webroot . $imgSmallerThumb['smaller']['__original__']; ?>" rel="prettyPhoto[pp_gal]"><img src="<?php echo $this->webroot . $imgSmallerThumb['smaller']['src']; ?>" alt="<?php echo $this->webroot . $imgSmallerThumb['larger']['src']; ?>" width="<?php echo $imgSmallerThumb['smaller']['w']; ?>" height="<?php echo $imgSmallerThumb['smaller']['h']; ?>" /></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
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
<div class="modelDescriptionContainer">
	<h2 class="hReplaced_red">A bit about <?php echo $eliteModel['EliteModel']['name']; ?></h2>
	<?php echo $eliteModel['EliteModel']['description']; ?>
</div>

<script>
	$(window).load(function() { 
		$('#modelImageGalleryContainer').smoothDivScroll({
			scrollStep: 10, 
			scrollInterval: 5, 
			visibleHotSpots: "always"
		});
		
		$('#modelImageGalleryContainer a').hover(function() {
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