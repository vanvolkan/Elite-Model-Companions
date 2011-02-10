<div id="mainMenu" class="section">
	<div class="content">
		<div id="mainMenuItems">
			<ul>
				<?php
					$links = customClass::getSiteMenuItems();
					
					foreach ($links as $key => $link) {
						echo '<li id="mainMenu_' . $key . '"' . (isset($link['li_attr']) ? ' class="' . $link['li_attr'] . '"' : '') . '>';
						if ($this->here == "/${key}") 
							echo $this->Html->link($this->Html->tag('span', $link['text']), $link['route'], array('escape' => false, 'class' => 'selected'));
						else
							echo $this->Html->link($this->Html->tag('span', $link['text']), $link['route'], array('escape' => false, 'title' => $this->here));
						echo '</li>';
					}
				?>
			</ul>
		</div>
	</div>
</div>