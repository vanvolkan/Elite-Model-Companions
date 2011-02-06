<h1>Models</h1>


<?php foreach ($elite_models as $model): ?>

  
  <?php echo $html->link($model['EliteModel']['name'], 
						  array('controller' => 'elite_models', 'action' => 'view', $model['EliteModel']['id'])); ?><br />

<?php endforeach; ?>
  