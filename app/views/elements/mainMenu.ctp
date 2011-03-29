<div id="mainMenu" class="section">
	<div class="content">
		<div id="mainMenuItems">
			<ul <?php echo (isset($page_for_layout)) ? 'class="' . $page_for_layout . '"' : ''; ?>>
				<?php
					$isAdmin = (isset($admin)) ? true : false;
					$links = customClass::getSiteMenuItems($isAdmin);
										
					foreach ($links as $key => $link) {
						$html = '<li id="mainMenu_' . $key . '" class="' . (isset($link['li_attr']) ? $link['li_attr'] : '') . '">';
						$html .= $this->Html->link($this->Html->tag('span', $link['text']), $link['route'], array('escape' => false, 'title' => $link['text']));
						$html .= '</li>';
						
						echo $html;
					}
				?>
			</ul>
		</div>
	</div>
</div>