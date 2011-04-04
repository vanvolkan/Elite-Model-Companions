<?php
App::import('Sanitize');
class EliteModelsController extends AppController {

	var $name = 'EliteModels';
	var $helpers = array('Phpthumb');
	var $paginate = array('order' => array('EliteModel.rank' => 'asc', 'EliteModel.id' => 'desc'));
	
	function index() {
		if (isset($this->params['requested'])) {
			if (!$featuredModel = $this->EliteModel->find('first', array(
				'order'			=> 'RAND()',
				'conditions'	=> array('EliteModel.is_featured' => 1),
				'contain'		=> array('ModelImage.location'),
				'fields'		=> array('EliteModel.name', 'EliteModel.age', 'EliteModel.description', 'EliteModel.id', 'EliteModel.slug')
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
				'fields'		=> array('EliteModel.id', 'EliteModel.name', 'EliteModel.cost', 'EliteModel.class', 'EliteModel.is_featured', 'EliteModel.rank', 'EliteModel.slug'),
				'contain'		=> array('ModelImage.location'),
				'order'			=> array('EliteModel.rank' => 'asc', 'EliteModel.id' => 'desc')
			)));
		
		$metaDescription = "All our photo’s and model’s ages are 100% genuine, so the companion you choose is the model that will arrive. We interview all our escorts and can verify that all girls have been carefully selected for their unique style, beauty, elegance and charismatic personality.";
		$metaKeywords = array('dicerning', 'level service', 'exceeding expectations', 'competency', 'discretion', 'reliability', 'highest standards', 'photos', 'models', 'ages', '100% genuine', 'unique', 'beauty', 'elegance', 'charismatic', 'personality', 'girl next door', 'catwalk', 'bikini', 'promo', 'actresses', 'university students', 'beauty pagents', 'publications', 'penthouse', 'FHM', 'Ralph', 'zoo', 'picture', 'calanders', 'the very best', 'genuine girlfriend experience', 'fun party booking', 'excellent', 'couples', 'real lesbian doubles', 'slim', 'shapely', 'intellectual', 'welcoming', 'attractive', 'well-known magazine model', 'stunning', 'feminine', 'curvaceous', 'fantasy experience', 'sensuality', 'bi-sexual', 'natural', 'toned', 'passion', 'intimacy', 'fetish', 'naughty', 'raunchy', 'kinky', 'musty', 'tall', 'GFE', 'gorgeous', 'Asian', 'glamour', 'slender', 'athletic', 'voluptuous', 'well educated', 'presentable');
		$this->set('page_for_layout', 'elite_models_item');
		$this->set(compact('metaDescription', 'metaKeywords'));
	}
	 
	function view($slug = null) {        
		if (!$slug) {
			$this->Session->setFlash(__('Invalid elite model', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$this->EliteModel->UpdateHits($slug);
		$page_for_layout = 'elite_models_item';
		$eliteModel = $this->EliteModel->find('first', array(
			'conditions'	=> array('EliteModel.slug' => $slug),
			'contain'		=> array('ModelImage.location')
		));
		
		$metaDescription = "All our photo’s and model’s ages are 100% genuine, so the companion you choose is the model that will arrive. We interview all our escorts and can verify that all girls have been carefully selected for their unique style, beauty, elegance and charismatic personality.";
		$metaKeywords = array('dicerning', 'level service', 'exceeding expectations', 'competency', 'discretion', 'reliability', 'highest standards', 'photos', 'models', 'ages', '100% genuine', 'unique', 'beauty', 'elegance', 'charismatic', 'personality', 'girl next door', 'catwalk', 'bikini', 'promo', 'actresses', 'university students', 'beauty pagents', 'publications', 'penthouse', 'FHM', 'Ralph', 'zoo', 'picture', 'calanders', 'the very best', 'genuine girlfriend experience', 'fun party booking', 'excellent', 'couples', 'real lesbian doubles', 'slim', 'shapely', 'intellectual', 'welcoming', 'attractive', 'well-known magazine model', 'stunning', 'feminine', 'curvaceous', 'fantasy experience', 'sensuality', 'bi-sexual', 'natural', 'toned', 'passion', 'intimacy', 'fetish', 'naughty', 'raunchy', 'kinky', 'musty', 'tall', 'GFE', 'gorgeous', 'Asian', 'glamour', 'slender', 'athletic', 'voluptuous', 'well educated', 'presentable');
		
		$this->set('page_for_layout', 'elite_models_item');
		$this->set(compact('metaDescription', 'metaKeywords'));
	}

	function admin_index() {
		if ($this->RequestHandler->isAjax()) {
			$this->view = 'Json';
			$model = array();
			foreach ($_POST['data'] as $key => $val) {
				$this->EliteModel->id = $val['id'];
				$this->EliteModel->saveField('rank', Sanitize::clean($val['rank']));
			}
			
			$json = array(
				'status'	=> 1
			);
			$this->set(compact('json'));
		}
		$this->set('eliteModels', $this->paginate());
		$this->set('page_for_layout', 'elite_models_item');
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
		$this->set('page_for_layout', 'elite_models_item');
	}

	function admin_add() {
		if ($this->RequestHandler->isPost()) {
			$this->EliteModel->set($this->data);
			unset($this->EliteModel->ModelImage->validate['elite_model_id']);
			if ($this->EliteModel->validates()) {
				if ($this->data = $this->EliteModel->preSaveHandleUploads()) {
					if ($this->EliteModel->saveAll($this->data, array('validate' => 'first'))) {
						$this->Session->setFlash(__('The elite model has been saved', true), 'flash_success');
						$this->redirect(array('action' => 'index'));
					}
				}
			} else {
				$this->Session->setFlash(__('The elite model could not be saved. Please review and fix the errors below. Note - Images will need to be readded!', true), 'flash_error');
				$this->set('errors', $this->EliteModel->validationErrors);
			}
		}
		$this->set('page_for_layout', 'elite_models_item');
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid elite model', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//if ($this->EliteModel->checkImagesAndHandle($id, $this->data)) {
				if ($this->EliteModel->save($this->data)) {
					$this->Session->setFlash(__('The elite model has been saved', true), 'flash_success');
					$this->redirect($this->referer());
			//	}
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
		$this->set('page_for_layout', 'elite_models_item');
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