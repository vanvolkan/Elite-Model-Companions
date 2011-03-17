<?php
class ModelImagesController extends AppController {

	var $name = 'ModelImages';
	var $helpers = array('Phpthumb');
	var $components = array('Session');

	function admin_index() {
		$this->ModelImage->recursive = 0;
		$this->set('modelImages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid model image', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('modelImage', $this->ModelImage->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ModelImage->create();
			if ($this->ModelImage->save($this->data)) {
				$this->Session->setFlash(__('The model image has been saved', true), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The model image could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		$eliteModels = $this->ModelImage->EliteModel->find('list');
		$this->set(compact('eliteModels'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid model image', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModelImage->save($this->data)) {
				$this->Session->setFlash(__('The model image has been saved', true), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The model image could not be saved. Please, try again.', true), 'flash_error');
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
			$this->Session->setFlash(__('Invalid id for model image', true), 'flash_error');
			$this->redirect($this->referer());
		}
		if ($this->ModelImage->delete($id)) {
			// Attempt to unlink the image and remove from server
			$modelImage = $this->ModelImage->find('first', array(
				'conditions'		=> array('id' => $id),
				'fields'			=> array('ModelImage.location')
			));
			
			if ($modelImage && count($modelImage) > 0)
				@unlink(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . $modelImage['location']);
			
			$this->Session->setFlash(__('Model image deleted', true), 'flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Model image was not deleted', true), 'flash_error');
		$this->redirect($this->referer());
	}
}
?>