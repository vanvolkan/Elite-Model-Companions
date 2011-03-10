<div id="mainMenu" class="section">
	<div class="content">
		<div id="mainMenuItems">
			<ul>
				<?php
					$isAdmin = (isset($admin)) ? true : false;
					$links = customClass::getSiteMenuItems($isAdmin);
					
					$found = false;
					foreach ($links as $key => $link) {
						if ($currentPage == $this->Html->url($link['route'])) {
							$found = true;
							break;
						}
					}
					
					foreach ($links as $key => $link) {
						if ($found)
							$selected = ($currentPage == $this->Html->url($link['route']) ? ' selected' : '');
						else
							$selected = ($this->params['controller'] == $link['route']['controller'] ? ' selected' : '');
						echo '<li id="mainMenu_' . $key . '" class="' . (isset($link['li_attr']) ? $link['li_attr'] : '') . $selected . '">';
						echo $this->Html->link($this->Html->tag('span', $link['text']), $link['route'], array('escape' => false, 'title' => $link['text']));
						echo '</li>';
					}
				?>
			</ul>
		</div>
	</div>
</div>