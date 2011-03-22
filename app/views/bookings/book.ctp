<h1 class="hReplaced_red">Bookings</h1>

<div class="siteForm">
	<div class="formHeader"><h2><span>Make a Booking</span></h2></div>
	<div class="formContent">
		<?php
			if (isset($errors))
				echo $this->element('errors', array('errors' => $errors));
			 else if (isset($submitted))
				echo $this->element('formSuccess', array('data' => $submitted));
		?>
		<div class="two_col_layout">
			<div class="col1">
				<?php 
								
					echo $this->Form->create('Booking', array(
						'inputDefaults' => array(
							'error' => false
						)
					));
			
					$titleOptions = array(
						'Dr'		=> 'Dr',
						'Miss'		=> 'Miss',
						'Mr'		=> 'Mr',
						'Mrs'		=> 'Mrs',
						'Master'	=> 'Master'
					);
			
			
					echo $this->Html->tag('div', $this->Form->label('title', 'Title:') . $this->Form->select('title', $titleOptions, '', array('empty' => false)), array('class' => 'input text'));
					echo $this->Form->input('first_name', array('First Name:'));
					echo $this->Form->input('last_name', array('Last Name:'));
					echo $this->Form->input('email_address', array('Email address:'));
					// $date = date("d-m-Y");
					// 					$minus100years = strtotime("-100 year", strtotime($date));
					// 					$minus30years = strtotime("-30 year", strtotime($date));
					// 					echo $this->Html->tag('div', $this->Form->label('dobDay', 'Date of Birth:') . $this->Form->day('date_of_birth', '', array('class' => 'floatLeft', 'empty' => false)) . $this->Form->month('date_of_birth', '', array('class' => 'floatLeft', 'empty' => false)) . $this->Form->year('date_of_birth', date("Y", $minus100years), date('Y'), date("Y", $minus30years), array('empty' => false)), array('class' => 'input text'));
					echo $this->Form->input('contact_number', array('label' => 'Contact Number:'));
					echo $this->Form->input('city_of_appointment', array('label' => 'City/Suburb of Appointment:'));
					//$plus1year = strtotime("+1 year", strtotime($date));
					// echo $this->Html->tag('div', $this->Form->label('appointmentDay', 'Appointment Date:') . $this->Form->day('appointmentDay', '', array('class' => 'floatLeft', 'empty' => false)) . $this->Form->month('appointmentMonth', '', array('class' => 'floatLeft', 'empty' => false)) . $this->Form->year('appointmentYear', date("Y"), date('Y', $plus1year), date("Y"), array('empty' => false)), array('class' => 'input text'));
					echo $this->Form->input('appointment_date', array('label' => 'Appointment Date:', 'class' => 'datePicker'));
					echo $this->Html->tag('div', $this->Form->label('TimeOfAppointmentHour', 'Time of Appointment:') . $this->Form->hour('time_of_appointment', false, '', array('empty' => false, 'class' => 'floatLeft')) . '<span class="floatLeft"> : </span>' .  $this->Form->minute('time_of_appointment', '', array('empty' => false, 'class' => 'floatLeft')) . $this->Form->meridian('time_of_appointment', '', array('empty' => false)), array('class' => 'input text'));
					echo $this->Form->input('duration_of_appointment', array('label' => 'Duration of Appointment:'));
					echo $this->Html->tag('h2', 'If you are staying in a Hotel:', array('class' => 'employmentHotelHeading'));
					echo $this->Form->input('hotel_name', array('Hotel Name:'));
					$options = array(
						'Yes'	=> 'Yes',
						'No'	=> 'No'
					);
					echo $this->Html->tag('div', $this->Form->label('hotel_reserved', 'Is your Hotel reservation confirmed?:') . $this->Form->select('hotel_reserved', $options, ''), array('class' => 'input text'));
					$options = array(
						'Yellow Pages Online'		=> 'Yellow Pages Online',
						'Newspaper'					=> 'Newspaper',
						'Search Engine'				=> 'Search Engine',
						'Used Before'				=> 'Used Before'
					);
					echo $this->Html->tag('div', $this->Form->label('how_heard', 'How did you hear about us?:') . $this->Form->select('how_heard', $options), array('class' => 'input text paddingTop30'));
					echo $this->Form->input('additional_information', array('label' => 'Additional Information:'));
				?>
			</div>
			<div class="col2">
				<div id="bookingBookModelContainer">
					<h2 class="hReplaced_red">I would like to book</h2>
					<?php
						echo $this->Html->tag('div', $this->Form->select('elite_model_id', $elite_models, @$modelBooking['EliteModel']['id'], array('escape' => false, 'empty' => 'Please select...')), array('class' => 'bookingSelectModel'));
					
					?>
					<div id="elite_model_container" <?php echo (!isset($modelBooking)) ? 'style="display: none;"' : ''; ?>>
					<?php
						if (isset($modelBooking)):
							$modelImage = isset($modelBooking['ModelImage'][0]['location']) ? $modelBooking['ModelImage'][0]['location'] : '';
							
							$thumbnail = $phpthumb->generate(array(
								'save_path'			=> WWW_ROOT . 'img/models/thumbs',
								'display_path'		=> 'models/thumbs',
								'error_image_path'	=> 'models/error.jpg',
								'src'				=> $modelImage,
								'w'					=> 286,
								'q'					=> 100,
								'zc'				=> 1
							));
							
							echo $this->Html->image($thumbnail['src'], array('alt' => $modelBooking['EliteModel']['name']));
					?>
						<div class="elite_model_info_container">
							<h3><?php echo $modelBooking['EliteModel']['name']; ?></h3>
							<p>&#36;<span><?php echo $modelBooking['EliteModel']['cost']; ?></span> per hour</p>
						</div>
					<?php
						else:
						// Add empty tags
					?>
					<img />
					<div class="elite_model_info_container">
						<h3></h3>
						<p>&#36;<span></span> per hour</p>
					</div>
					<?php
						endif;
					?>
					</div>
				</div>
			</div>
		</div>
		<?php 
			echo $this->Form->end('Book');
		?>
		<script>
			$(function() {
				$.datepicker.setDefaults({
					showOn: "both",
					buttonImageOnly: true,
					buttonImage: "<?php echo $this->webroot; ?>img/assets/calendar.gif",
					buttonText: 'Calendar',
					dateFormat: 'dd/mm/yy'
				});
				
				$('.datePicker').datepicker({
					showButtonPanel: true,
					changeMonth: true,
					changeYear: true
				});
								
				$('#BookingAppointmentDate').datepicker("option", "minDate", '0');
				
				$('#BookingEliteModelId').bind('change', function(evt) {
					evt.preventDefault();
					evt.stopPropagation();
					
					var selected = $(this).val();
					
					$.ajax({
						type: "POST",
						url: $('#BookingBookForm').attr('action') + '/' + selected,
						dataType: "json",
						success: function(data) {
							var updateSection = $('#elite_model_container');
							var imgToUpdate = updateSection.find('img');
							var infoContainer = $('div.elite_model_info_container');
							
							updateSection.fadeOut('fast', function() {
								if (data.location)
									var imgTag = '<img src="<?php echo $this->webroot; ?>' + data.location + '" alt="' + data.name + '" />';
								else
									var imgTag = '<img src="<?php echo $this->webroot; ?>' + error_image_path + '" alt="' + data.name + '" />';

								imgToUpdate.replaceWith(imgTag);
								
								infoContainer.find('h3').text(data.name);
								infoContainer.find('p span').text(data.cost);
							}).fadeIn('medium');
						}
					})
				});
			});
		</script>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>