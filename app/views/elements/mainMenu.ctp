<div id="mainMenu" class="section">
	<div class="content">
		<div id="mainMenuItems">
			<ul>
				<li id="mainMenu_home" class="farLeft">
					<?php
						echo $this->Html->link($this->Html->tag('span', 'Home'), array('controller' => 'pages', 'action' => 'display', 'home'), array('escape' => false));
					?>
				</li>
				<li id="mainMenu_models">
					<?php
						echo $this->Html->link($this->Html->tag('span', 'Models'), array('controller' => 'elite_models', 'action' => 'index'), array('escape' => false));
					?>
				</li>
				<li id="mainMenu_rates">
					<?php
						echo $this->Html->link($this->Html->tag('span', 'Rates'), array('controller' => 'elite_models', 'action' => 'rates'), array('escape' => false));
					?>
				</li>
				<li id="mainMenu_guide">
					<?php
						echo $this->Html->link($this->Html->tag('span', 'Guide'), array('controller' => 'pages', 'action' => 'guide'), array('escape' => false));
					?>
				</li>
				<li id="mainMenu_employment">
					<?php
						echo $this->Html->link($this->Html->tag('span', 'Employment'), array('controller' => 'employments', 'action' => 'index'), array('escape' => false));
					?>
				</li>
				<li id="mainMenu_contactUs" class="farRight">
					<?php
						echo $this->Html->link($this->Html->tag('span', 'Contact Us'), array('controller' => 'contacts', 'action' => 'index'), array('escape' => false));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>