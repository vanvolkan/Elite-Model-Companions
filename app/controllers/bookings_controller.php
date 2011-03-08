<?php
	App::import('Sanitize');
	class BookingsController extends AppController
	{
		public $name = 'Bookings';
		public $components = array('Email');
		public $helpers = array('Phpthumb');
		
		public function book($elite_model_id = null)
		{
			if (!is_null($elite_model_id) || $this->RequestHandler->isAjax()) {
				// Need to locate the model that we are after
				$modelDetails = $this->Booking->EliteModel->find('first', array(
			 		'conditions'		=> array('EliteModel.id' => $elite_model_id),
					'fields'			=> array('EliteModel.id', 'EliteModel.name', 'EliteModel.cost', 'EliteModel.class'),
					'contain'			=> array('ModelImage.location')
				));
				
				if ($this->RequestHandler->isAjax()) {
					$this->view = 'Json';
					$json = array(
						'name'		=> $modelDetails['EliteModel']['name'],
						'cost'		=> $modelDetails['EliteModel']['cost'],
						'class'		=> $modelDetails['EliteModel']['class'],
						'location'	=> $modelDetails['ModelImage']['location'],
						'id'		=> $elite_model_id
					);
					$this->set(compact('json'));
				} else {
					$this->set('modelBooking', $modelDetails);
				}
			}
			
			if ($this->RequestHandler->isPost()) {
				$this->data = Sanitize::clean($this->data);
				$this->Booking->set($this->data);
				if ($this->Booking->validates()) {
					
				} else {
					$this->Session->setFlash(__('Errors occured during submission. Please review and fix the errors below.', true), 'flash_error');
					$this->set('errors', $this->Booking->validationErrors);
				}
			}
			
			$this->set('elite_models', $this->Booking->EliteModel->find('list', array(
				'fields'	=> array('EliteModel.id', 'EliteModel.name')
			)));
		}
	}