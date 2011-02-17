<?php
class EliteModelsController extends AppController {

	var $name = 'EliteModels';
	var $helpers = array('Phpthumb');
	
	function index() {
		if (isset($this->params['requested'])) {
			if (!$featuredModel = $this->EliteModel->find('first', array(
				'order'			=> 'RAND()',
				'conditions'	=> array('EliteModel.is_featured' => 1),
				'contain'		=> array('ModelImage.location'),
				'fields'		=> array('EliteModel.name', 'EliteModel.age', 'EliteModel.description')
			))) {
				$featuredModel = $this->EliteModel->find('first', array(
					'order'		=> 'RAND()',
					'contain'	=> array('ModelImage.location'),
					'fields'	=> array('EliteModel.name', 'EliteModel.age', 'EliteModel.description')
				));
			};
			
			return $featuredModel;
		} else
			$this->set('elite_models', $this->EliteModel->find('all', array(
				'contain'		=> array('ModelImage.location')
			)));
	}
	 
	function view($id = null) {        
		$this->EliteModel->id = $id;        
		$this->set('elite_model', $this->EliteModel->read());    
	}

	function admin_index() {
		$this->set('eliteModels', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid elite model', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eliteModel', $this->EliteModel->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->EliteModel->create();
			if ($this->EliteModel->save($this->data)) {
				$this->Session->setFlash(__('The elite model has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The elite model could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid elite model', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EliteModel->save($this->data)) {
				$this->Session->setFlash(__('The elite model has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The elite model could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EliteModel->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for elite model', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EliteModel->delete($id)) {
			$this->Session->setFlash(__('Elite model deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Elite model was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>