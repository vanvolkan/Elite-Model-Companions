<?php
	if (empty($eliteModel)):
		echo '<h2>Model could not be found</h2>';
		echo '<p>The Elite Model could not be found. Please go back and try selecting another model</p>';
	else:
?>
<h1 class="hReplaced_red"><?php echo $eliteModel['EliteModel']['name']?></h1>
<?php
	$class = preg_replace('/\s+/', '_', $eliteModel['EliteModel']['class']);
	$class = $class != "" ? 'eliteModel_' . $class : '';
?>
<div class="two_col_layout_smaller_width">
	<div class="col1">
		<div id="modelImageFrontContainer">
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
							'w'					=> 121,
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
				<div id="heroImageContainer">
					<a class="<?php echo $class; ?>" id="heroImage" rel="prettyPhoto" href="<?php echo $this->webroot . $imgURL; ?>">
						<div id="zoomOverlay">
							<span>Zoom</span>
						</div>
						<span class="<?php echo $class; ?>tag"></span>
						<img src="<?php echo $this->webroot . $imgThumbURL; ?>" alt="<?php echo $eliteModel['EliteModel']['name']; ?>" />
					</a>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<?php if (count($imagesArray) > 0): ?>
	<div class="col2">
		<div class="contentBox">
			<div class="contentBoxHeading">
				<h2><span>Gallery</span></h2>
			</div>
			<div class="contentBoxContent">
				<div id="modelIMGGallery">
					<?php
						$i = 0;
						foreach ($imagesArray as $imgSmallerThumb): ?>
						<a <?php echo ($i++ % 3 == 0) ? 'class="farLeft"' : ''; ?> href="<?php echo $this->webroot . $imgSmallerThumb['smaller']['__original__']; ?>" rel="prettyPhoto[pp_gal]"><img src="<?php echo $this->webroot . $imgSmallerThumb['smaller']['src']; ?>" alt="<?php echo $this->webroot . $imgSmallerThumb['larger']['src']; ?>" width="<?php echo $imgSmallerThumb['smaller']['w']; ?>" height="<?php echo $imgSmallerThumb['smaller']['h']; ?>" /></a>
					<?php endforeach; ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="bookModelButton">
			<?php echo $this->Html->link($this->Html->tag('span', 'Book this model'), array('controller' => 'bookings', 'action' => 'book', $eliteModel['EliteModel']['id']), array('class' => 'blackStandardButton', 'escape' => false)); ?>
		</div>
		<div class="ratesButton">
			<?php echo $this->Html->link('View Rates', array('controller' => 'pages', 'action' => 'display', 'rates', 'ratesTable'), array('escape' => false, 'target' => '_blank')); ?>
		</div>
	</div>
	<?php endif; ?>
	<div class="clear"></div>
</div>

<div class="modelDescriptionContainer">
	<h2 class="hReplaced_red">All about <?php echo $eliteModel['EliteModel']['name']; ?></h2>
	<div class="two_col_layout_smaller_width">
		<div class="col1">
			<p><?php echo $eliteModel['EliteModel']['description']; ?></p>
		</div>
		<div class="col2">
			<table id="modelDetailsTable" border="0" cellpadding="0" class="standardTableClass">
				<tbody>
					<tr>
						<th width="100">Age:</th>
						<td><?php echo $eliteModel['EliteModel']['age']; ?>
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
						<td><span class="eliteModelCost">&#36;<?php echo $eliteModel['EliteModel']['cost']; ?></span> per hour</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="clear"></div>
	</div>
</div>


<script>
	$(window).load(function() {
		$('a#heroImage').width($('a#heroImage img').width());
		
		$('#modelIMGGallery a').hover(function() {
			var heroIMGLink = $('a#heroImage');
			var heroIMG = heroIMGLink.find('img');
			var hoverIMGLink = $(this);
			var hoverIMG = hoverIMGLink.find('img');
			var newIMG = hoverIMG.attr('alt');
			var pic_real_width;
			$("<img />").attr("src", newIMG).load(function() {
				pic_real_width = this.width;
				
				heroIMGLink.width(pic_real_width).attr('href', hoverIMGLink.attr('href'));
				heroIMG.replaceWith(this);
			});
		}, function() {
			return;
		}).click(function() {
			return false;
		});
	});
</script>
<?php endif; ?>