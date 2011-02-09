<?php
	$banners = $this->requestAction(array('controller' => 'banners', 'action' => 'getBanners'), array('pass' => array(5)));
	
	if ($banners):
		$numBanners = count($banners);
		/* 
			Developers note: Added the calls to the include css and javascript files in the home view since a call to inline=>false
			in the element would not work - we need the css and the javascript files in the head not in the body
		*/
?>
	<div id="bannersHeader" class="section">
		<div class="content">
			<div id="bannerRotator">
				<div class="main_view">
					<div class="window">
						<div class="image_reel">
							<?php foreach ($banners as $banner): ?>
								<a href="#"><img src="img/banners/<?php echo @$banner['Banner']['image_location']; ?>" alt="<?php echo @$banner['Banner']['title']; ?>" /></a>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="paging">
						<?php for ($i = 1; $i <= $numBanners; $i++): ?>
							<a href="#" rel="<?php echo $i; ?>"><?php echo $i; ?></a>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	endif;
?>