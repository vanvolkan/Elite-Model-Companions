<?php
	$featuredModel = $this->requestAction(array('controller' => 'eliteModels', 'action' => 'index'));
	if ($featuredModel):
?>
<!-- Featured Model -->
<div class="frontFeaturedModelContainer">
	<h1 class="hReplaced_red floatRight strtoupper">Featured Model</h1>
	
	
	<div class="modelImageContainer">
		<div style="background: transparent url(img/<?php echo $featuredModel['ModelImage'][0]['location']; ?>) no-repeat center center;"></div>
	</div>
	<h6 class="redText floatLeft"><?php echo $featuredModel['EliteModel']['name'] . ', ' . $featuredModel['EliteModel']['age']; ?></h6>
	<span id="fb-root" class="faceBookLike">
		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo Router::url($this->here, true); ?>" layout="button_count" show_faces="false" width="100" font="arial"></fb:like>
	</span>
	<p class="clear"><?php echo $this->Text->truncate($featuredModel['EliteModel']['description'], 400, array('ending' => '...', 'html' => true, 'exact' => false)); ?></p>
</div>
<?php endif; ?>