<h1 class="hReplaced_red">Models</h1>

<p class="note">Models are available strictly by appointment only<br/><em>To avoid disappointment, bookings in advance are highly recommended.</em></p>

<div id="elite_models_index">
	<ul class="elite_models_list">
		<?php 
			$i = 0;
			foreach ($elite_models as $model):
				$src = isset($model['ModelImage'][0]['location']) ? $model['ModelImage'][0]['location'] : '';
				$thumbnail = $phpthumb->generate(array(
					'save_path'			=> WWW_ROOT . 'img/models/thumbs',
					'display_path'		=> 'models/thumbs',
					'error_image_path'	=> 'models/error.jpg',
					'src'				=> $src,
					'w'					=> 221,
					'h'					=> 300,
					'q'					=> 100,
					'zc'				=> 1
				));
				echo (++$i % 4 == 0 ? '<li class="farRight">' : '<li>');
				$class = preg_replace('/\s+/', '_', $model['EliteModel']['class']);
				$class = $class != "" ? 'eliteModel_' . $class : '';
				echo $this->Html->link($this->Html->image($thumbnail['src'], array('width' => $thumbnail['w'], 'height' => $thumbnail['h'])) . '<span class="' . $class . 'tag"></span>', array('controller' => 'elite_models', 'action' => 'view', $model['EliteModel']['slug']), array('escape' => false, 'class' => $class));
				$divContent = $this->Html->link($model['EliteModel']['name'] . $this->Html->tag('span', '&#36;' . $model['EliteModel']['cost'] . '&nbsp;per hour'), array('controller' => 'elite_models', 'action' => 'view', $model['EliteModel']['slug']), array('escape' => false));
				echo $this->Html->div('modelDetailsBox', $divContent);
				echo '</li>';
			endforeach; 
		?>
	</ul>
	<div class="clear"></div>
</div>