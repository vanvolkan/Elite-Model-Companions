<?php
  class EliteModel extends AppModel
  {
    var $name = 'EliteModel';
	var $hasMany = array('ModelImage' => array('className' => 'ModelImage', 'foreignKey' => 'elite_model_id', 'dependent'=> true) );
	
  }

  
?>