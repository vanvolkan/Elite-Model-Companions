<?php
class ModelImagesController extends AppController {

	var $name = 'ModelImages';
	var $helpers = array('Phpthumb');
	var $components = array('Session');

	function index() {
		$this->ModelImage->recursive = 0;
		$this->set('modelImages', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid model image', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('modelImage', $this->ModelImage->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ModelImage->create();
			if ($this->ModelImage->save($this->data)) {
				$this->Session->setFlash(__('The model image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The model image could not be saved. Please, try again.', true));
			}
		}
		$eliteModels = $this->ModelImage->EliteModel->find('list');
		$this->set(compact('eliteModels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid model image', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModelImage->save($this->data)) {
				$this->Session->setFlash(__('The model image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The model image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ModelImage->read(null, $id);
		}
		$eliteModels = $this->ModelImage->EliteModel->find('list');
		$this->set(compact('eliteModels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for model image', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ModelImage->delete($id)) {
			$this->Session->setFlash(__('Model image deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Model image was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->ModelImage->recursive = 0;
		$this->set('modelImages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid model image', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('modelImage', $this->ModelImage->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ModelImage->create();
			if ($this->ModelImage->save($this->data)) {
				$this->Session->setFlash(__('The model image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The model image could not be saved. Please, try again.', true));
			}
		}
		$eliteModels = $this->ModelImage->EliteModel->find('list');
		$this->set(compact('eliteModels'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid model image', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModelImage->save($this->data)) {
				$this->Session->setFlash(__('The model image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The model image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ModelImage->read(null, $id);
		}
		$eliteModels = $this->ModelImage->EliteModel->find('list');
		$this->set(compact('eliteModels'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for model image', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ModelImage->delete($id)) {
			$this->Session->setFlash(__('Model image deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Model image was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>