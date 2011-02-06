<?php
  class EliteModelsController extends AppController {
	
	var $name = 'EliteModels';

	function index() {		
	  $this->set('elite_models', $this->EliteModel->find('all'));	
	}
	
	
	function view($id = null) {        
		$this->EliteModel->id = $id;        
		$this->set('elite_model', $this->EliteModel->read());    
	}	
  }
?>