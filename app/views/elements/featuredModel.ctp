<?php
	$featuredModel = $this->requestAction(array('controller' => 'elite_models', 'action' => 'index'));
	if ($featuredModel):
?>
<!-- Featured Model -->
<div class="frontFeaturedModelContainer">
	<h1 class="hReplaced_red floatRight strtoupper">Featured Model</h1>
	
	<div class="modelImageContainer">
		<?php if (!empty($featuredModel['ModelImage'])): ?>
			<div style="background: transparent url(<?php echo $this->webroot; ?><?php echo $featuredModel['ModelImage'][0]['location']; ?>) no-repeat center center;">
		<?php else: ?>
			<div style="background: transparent url(<?php echo $this->webroot; ?>img/models/error.jpg) no-repeat center center;">
		<?php endif; ?>
			<?php
				echo $this->Html->link($this->Html->tag('span', $featuredModel['EliteModel']['name']), array('controller' => 'elite_models', 'action' => 'view', $featuredModel['EliteModel']['slug']), array('escape' => false, 'class' => 'hidespan'));
			?>
		</div>
	</div>
	<h6 class="redText floatLeft"><?php echo $this->Html->link($featuredModel['EliteModel']['name'] . ', ' . $featuredModel['EliteModel']['age'], array('controller' => 'elite_models', 'action' => 'view', $featuredModel['EliteModel']['slug']), array('escape' => false)); ?></h6>
	<span id="fb-root" class="faceBookLike">
		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo Router::url($this->here, true); ?>" layout="button_count" show_faces="false" width="100" font="arial"></fb:like>
	</span>
	<p class="clear"><?php echo $this->Text->truncate($featuredModel['EliteModel']['description'], 400, array('ending' => '...', 'html' => true, 'exact' => false)); ?></p>
</div>
<?php endif; ?>