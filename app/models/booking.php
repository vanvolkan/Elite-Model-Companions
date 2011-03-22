<?php
	class Booking extends AppModel
	{
		public $name = 'Booking';
		
		public $belongsTo = array('EliteModel' => array(
				'className' => 'EliteModel',
				'foreignKey' => 'elite_model_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
		
		public $validate = array(
			'title' => array(
				'notEmpty'		=> array(
					'rule'		=> 'notEmpty',
					'message'	=> 'Please enter your Title'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 10),
					'message'	=> 'Maximum length of 10 characters for Title'
				)
			),
			'first_name' => array(
				'notEmpty'		=> array(
					'rule'		=> 'notEmpty',
					'message'	=> 'Please enter your First Name'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 50),
					'message'	=> 'Maximum length of 50 characters for First Name'
				)
			),
			'last_name' => array(
				'notEmpty'		=> array(
					'rule'		=> 'notEmpty',
					'message'	=> 'Please enter your Last Name'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 100),
					'message'	=> 'Maximum length of 100 characters for Last Name'
				)
			),
			'email_address' => array(
				'email'			=> array(
					'rule'		=> 'email',
					'message'	=> 'Please enter a valid email address'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 100),
					'message'	=> 'Maximum length of 100 characters for Email Address'
				)
			),
			'contact_number' => array(
				'notEmpty'		=> array(
					'rule'		=> 'notEmpty',
					'message'	=> 'Please enter your Contact Number'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 20),
					'message'	=> 'Maximum of 20 characters for Contact Number'
				)
			),
			'city_of_appointment' => array(
				'notEmpty'		=> array(
					'rule'		=> 'notEmpty',
					'message'	=> 'Please enter your City/Suburb of Appointment'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 50),
					'message'	=> 'Maximum length of 50 characters for City/Suburb of Appointment'
				)
			),
			'appointment_date' => array(
				'date'			=> array(
					'rule'		=> array('date', 'dmy'),
					'message'	=> 'Please enter a valid Date of Appointment in the format DD/MM/YYYY'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 10),
					'message'	=> 'Maximum length of 10 characters for Date of Appointment'
				)
			),
			// 'time_of_appointment' => array(
			// 	'notEmpty'		=> array(
			// 		'rule'		=> 'notEmpty',
			// 		'message'	=> 'Please enter your Time of Appointment'
			// 	),
			// 	'maxLength'		=> array(
			// 		'rule'		=> array('maxLength', 20),
			// 		'message'	=> 'Maximum length of 20 characters for Time of Appointment'
			// 	)
			// ),
			'duration_of_appointment' => array(
				'notEmpty'		=> array(
					'rule'		=> 'notEmpty',
					'message'	=> 'Please enter your Duration of Appointment'
				),
				'maxLength'		=> array(
					'rule'		=> array('maxLength', 10),
					'message'	=> 'Maximum length of 10 characters for Duration of Appointment'
				)
			),
			'hotel_name'		=> array(
				'rule'			=> array('maxLength', 40),
				'message'		=> 'Maximum length of 40 characters for Hotel Name',
				'required'		=> false
			),
			'hotel_reserved'	=> array(
				'rule'			=> array('inList', array('Yes', 'No', '')),
				'message'		=> 'Invalid value for Hotel Reserved',
				'required'		=> false
			),
			'elite_model_id'	=> array(
				'rule'			=> 'notEmpty',
				'message'		=> 'Please select the model you would like to book'
			)
		);
		
		public function getModelDetails($id = null)
		{
			if (is_null($id))
				return false;
				
			$modelDetails = array();
			$modelDetails = $this->EliteModel->find('first', array(
		 		'conditions'		=> array('EliteModel.id' => $id),
				'fields'			=> array('EliteModel.id', 'EliteModel.name', 'EliteModel.cost', 'EliteModel.class'),
				'contain'			=> array('ModelImage.location')
			));
			
			return (empty($modelDetails)) ? false : $modelDetails;
		}
		
		public function beforeSave()
		{
			$this->data['Booking']['time_of_appointment'] = $this->data['Booking']['time_of_appointment']['hour'] . ':' . $this->data['Booking']['time_of_appointment']['min'] . ' ' . $this->data['Booking']['time_of_appointment']['meridian'];

			return true;
		}
	}