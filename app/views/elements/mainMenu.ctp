<div id="mainMenu" class="section">
	<div class="content">
		<div id="mainMenuItems">
			<ul>
				<?php
					$links = customClass::getSiteMenuItems();
					
					$found = false;
					foreach ($links as $key => $link) {
						if ($currentPage == $this->Html->url($link['route'])) {
							$found = true;
							break;
						}
					}
					
					if ($found) {
						foreach ($links as $key => $link) {
							$selected = ($currentPage == $this->Html->url($link['route']) ? ' selected' : '');
							echo '<li id="mainMenu_' . $key . '" class="' . (isset($link['li_attr']) ? $link['li_attr'] : '') . $selected . '">';
							echo $this->Html->link($this->Html->tag('span', $link['text']), $link['route'], array('escape' => false, 'title' => $link['text']));
							echo '</li>';
						}
					} else {
						foreach ($links as $key => $link) {
							$selected = ($this->params['controller'] == $link['route']['controller'] ? ' selected' : '');
							echo '<li id="mainMenu_' . $key . '" class="' . (isset($link['li_attr']) ? $link['li_attr'] : '') . $selected . '">';
							echo $this->Html->link($this->Html->tag('span', $link['text']), $link['route'], array('escape' => false, 'title' => $link['text']));
							echo '</li>';
						}
					}
				?>
			</ul>
		</div>
	</div>
</div>