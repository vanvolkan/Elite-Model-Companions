<?php
	App::import('Sanitize');
	class BookingsController extends AppController
	{
		public $name = 'Bookings';
		public $components = array('Email');
		public $helpers = array('Phpthumb');
		
		public function book($elite_model_id = null)
		{
			if (!is_null($elite_model_id)) {
				Sanitize::clean($elite_model_id);
				// Need to locate the model that we are after
				
				$modelDetails = $this->Booking->getModelDetails($elite_model_id);
				
				if ($this->RequestHandler->isAjax()) {
					$this->view = 'Json';
					$modelImage = (isset($modelDetails['ModelImage'][0]['location'])) ? $modelDetails['ModelImage'][0]['location'] : '';
					$json = array(
						'name'		=> $modelDetails['EliteModel']['name'],
						'cost'		=> $modelDetails['EliteModel']['cost'],
						'class'		=> $modelDetails['EliteModel']['class'],
						'location'	=> $modelImage,
						'id'		=> $modelDetails['EliteModel']['id']
					);
					$this->set(compact('json'));
				} else
					$this->set('modelBooking', $modelDetails);
			}
			
			if ($this->RequestHandler->isPost() && !$this->RequestHandler->isAjax()) {
				$this->data = Sanitize::clean($this->data);
				$this->Booking->set($this->data);
				if ($this->Booking->validates()) {
					// Time to email the details
					$this->Email->to = Configure::read('eliteModelsOwner');
					$this->Email->bcc = Configure::read('eliteModelsAdmins');
					$this->Email->subject = 'New booking submission by ' . $this->data['Booking']['first_name'] . ' ' . $this->data['Booking']['last_name'];
		            $this->Email->from = $this->data['Booking']['email_address'];
					
					$this->Email->template = 'bookingEmail';
					$this->Email->sendAs = 'both';
					$modelBooked = $this->Booking->getModelDetails($this->data['Booking']['elite_model_id']);
					array_push($this->data, $modelBooked);
					
					$this->set('Booking', $this->data);
		            $this->Email->send();
					// Save the record to the database
					$this->Booking->save();
					$this->set('submitted', 'Thank you for your booking enquiry. We will be in contact with you shortly.');
					unset($this->data['Booking']);
					$this->Session->setFlash(__('No errors occurred during submission', true), 'flash_success');
					$this->data = array();
				} else {
					$this->Session->setFlash(__('Errors occured during submission. Please review and fix the errors below.', true), 'flash_error');
					$modelBooking = $this->Booking->getModelDetails($this->data['Booking']['elite_model_id']);
					$errors = $this->Booking->validationErrors;
					$this->set(compact('errors', 'modelBooking'));
				}
			}
			
			$this->set('elite_models', $this->Booking->EliteModel->find('list', array(
				'fields'	=> array('EliteModel.id', 'EliteModel.name')
			)));
			
			$metaDescription = "Make an online Booking for one of our Elite Model Companions. All bookings are private and confidential";
			$metaKeywords = array('Book Elite Model', 'Book escort', 'Booking escort', 'Book escort agency', 'Book escort Newcastle', 'Book escort Sydney');
			$this->set(compact('metaDescription', 'metaKeywords'));
		}
	}