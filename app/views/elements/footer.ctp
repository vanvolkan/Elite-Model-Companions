<div class="footerSpiel">
	<p>Elite Model Escorts: <a href="<?php echo $this->Html->url('http://www.elitemodelcompanions.com.au'); ?>" title="Sydney Escorts">Sydney Escorts</a> - High Class Female quality, luxury call out girls, full service hotel visits classy beautiful courtesans, VIP dating fine dining champagne adult entertainment, quality stunning ladies travel international, national, Australia wide</p>
</div>
<div class="webCopyright">
	<p>Web design &amp; Web Development - <a href="mailto:ohyeahmedia@gmail.com">Oh Yeah Media</a></p>
</div>
<div class="footerLinks">
	<ul>
		<?php
			$links = customClass::getSiteMenuItems();
			
			$i = 0;
			
			foreach ($links as $key => $link) {
				echo '<li>' . (++$i > 1 ? '<span>|</span>' : '') . $this->Html->link($link['text'], $link['route'], array('escape' => false, 'title' => $link['attr'])) . '</li>';
			}
		?>
	</ul>
</div>