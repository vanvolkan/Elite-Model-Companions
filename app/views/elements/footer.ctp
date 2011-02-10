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