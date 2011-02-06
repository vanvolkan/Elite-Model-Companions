<?php
class ModelImage extends AppModel {
	var $name = 'ModelImage';
	var $displayField = 'location';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'EliteModel' => array(
			'className' => 'EliteModel',
			'foreignKey' => 'elite_model_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>