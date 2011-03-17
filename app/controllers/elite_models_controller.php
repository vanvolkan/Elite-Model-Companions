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
				'fields'		=> array('EliteModel.name', 'EliteModel.age', 'EliteModel.description', 'EliteModel.id')
			))) {
				$featuredModel = $this->EliteModel->find('first', array(
					'order'		=> 'RAND()',
					'contain'	=> array('ModelImage.location'),
					'fields'	=> array('EliteModel.name', 'EliteModel.age', 'EliteModel.description', 'EliteModel.id')
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
			$this->Session->setFlash(__('Invalid elite model', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eliteModel', $this->EliteModel->find('first', array(
			'conditions'	=> array('EliteModel.id' => $id),
			'contain'		=> array('ModelImage.location')
		)));
	}

	function admin_add() {
		if ($this->RequestHandler->isPost()) {
			$this->EliteModel->set($this->data);
			unset($this->EliteModel->ModelImage->validate['elite_model_id']);
			if ($this->EliteModel->validates()) {
				//if ($this->data = $this->EliteModel->preSaveHandleUploads()) {
					if ($this->EliteModel->saveAll($this->data, array('validate' => 'first'))) {
						$this->Session->setFlash(__('The elite model has been saved', true), 'flash_success');
						$this->redirect(array('action' => 'index'));
					}
				//}
			} else {
				$this->Session->setFlash(__('The elite model could not be saved. Please review and fix the errors below. Note - Images will need to be readded!', true), 'flash_error');
				$this->set('errors', $this->EliteModel->validationErrors);
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid elite model', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EliteModel->checkImagesAndHandle($id, $this->data)) {
				if ($this->EliteModel->save($this->data)) {
					$this->Session->setFlash(__('The elite model has been saved', true), 'flash_success');
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The elite model could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EliteModel->find('first', array(
				'conditions'	=> array('EliteModel.id' => $id),
				'contain'		=> array('ModelImage')
			));
			$this->set('eliteModel', $this->data);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for elite model', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EliteModel->delete($id)) {
			$this->Session->setFlash(__('Elite model deleted', true), 'flash_success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Elite model was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>