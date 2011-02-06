<?php
class ModelImage extends AppModel {
	var $name = 'ModelImage';
	var $belongsTo = array('EliteModel' => array('className' => 'EliteModel', 'foreignKey' => 'elite_model_id'));
}


?>